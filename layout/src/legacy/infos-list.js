import { AJAX_URL } from './consts';
import { masonryInit } from './vendorsInit';

function find_page_number (element) {
  return parseInt(element.html());
}

$(document).on('click', '.info-list .paginate-links a', function (event) {
  event.preventDefault();
  const current_page = find_page_number($('.paginate-links span.current'));
  const $infolist = $('.info-list');
  let page;
  if ($(this).hasClass('prev')) {page = current_page - 1;}
  else if ($(this).hasClass('next')) {page = current_page + 1;}
  else {page = find_page_number($(this).clone());}
  const cat = parseInt($('.cats-list li.active a').data('catid'));
  let post_type;
  if ($infolist.hasClass('books')) {
    post_type = 'book';
  } else {
    post_type = 'post';
  }
  $.ajax({
    url: AJAX_URL,
    type: 'post',
    data: {
      action: 'ajax_info',
      page: page,
      cat: cat,
      post_type: post_type,
      lang: scripts_data.langCode,
    },
    beforeSend: function () {
      $infolist.find('.content').remove();
      $('html, body').animate(
        {
          scrollTop: $('.info-list').offset().top - 20,
        },
        200
      );
      $infolist.append(
        '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> ' +
          scripts_data.lang['pleaseWait'] +
          '</div>'
      );
    },
    success: function (data) {
      if (data != '') {
        const _json = $.parseJSON(data);
        history.pushState({ pageTitle: _json.title }, _json.title, _json.url);
        $infolist.addClass('transit');
        $infolist.find('#loader.content').remove();
        $infolist.append('<div class="content">' + _json.html + '</div>');
        masonryInit();
        setTimeout(() => {
          $infolist.removeClass('transit');
        }, 300);
      }
    },
  });
});

$('.cats-list').on('click', 'li:not(.active) a', function (e) {
  e.preventDefault();

  // initialize vars
  const $infolist = $('.info-list');
  const header = document.querySelector('.bottom-header');
  const $this = $(this);
  const $current = $(this).closest('li');
  const cat_name = $this.find('.front-cat-name').text();
  const cat = parseInt($this.data('catid'));
  const titleOffset = $('.current-cat-name').offset();

  // if force redirect
  if ($this.data('override-redirect')) {
    window.location.href = $this.data('override-redirect');
    $('html, body').animate(
      {
        scrollTop: titleOffset.top - 150,
      },
      200
    );
    $infolist.append(
      '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> ' +
        scripts_data.lang['pleaseWait'] +
        '</div>'
    );
    return;
  }

  // set active items
  $('.cats-list li.active').removeClass('active');
  $current.addClass('active');
  if ($current.hasClass('child-cat'))
  {$current.closest('li.parent').addClass('expanded');}
  else if ($current.hasClass('parent')) {$current.addClass('expanded');}
  else {$('.cats-list li.expanded').removeClass('expanded');}

  // load category name in the heading of dropdown
  $('.cats-list button .selected-value').text(cat_name);

  // determine post type
  let post_type;
  if ($this.closest('.books').length) {
    post_type = 'book';
  } else {
    post_type = 'post';
  }

  // prepare ajax data
  const _data = {
    action: 'ajax_info',
    cat: cat,
    post_type: post_type,
    lang: scripts_data.langCode,
  };

  // send ajax request
  $.ajax({
    url: AJAX_URL,
    type: 'post',
    data: _data,
    beforeSend: function () {
      $infolist.find('.content').remove();
      $('html, body').animate(
        {
          scrollTop: titleOffset.top - 150,
        },
        200
      );
      $infolist.append(
        '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> ' +
          scripts_data.lang['pleaseWait'] +
          '</div>'
      );
    },
    success: function (data) {
      if (data != '' && data != 0) {
        const _json = $.parseJSON(data);
        history.pushState(_data, _json.title, _json.url);
        if (_json.image && _json.image !== '')
        {header.style.backgroundImage = `url(${_json.image})`;}
        else {header.style.backgroundImage = '';}

        document.title = _json.title;
        $('.top-page-title h2').text(_json.term_name);
        $infolist.addClass('transit');
        $infolist.find('#loader.content').remove();
        $infolist.append('<div class="content">' + _json.html + '</div>');
        masonryInit();
        setTimeout(() => {
          $infolist.removeClass('transit');
        }, 300);
      }
    },
  });
});

window.onpopstate = function (event) {
  if (event.state != '' && event.state != 0) {
    const _data = event.state;
    if (_data.action == 'ajax_info') {
      const $infolist = $('.info-list');
      $.ajax({
        url: AJAX_URL,
        type: 'post',
        data: _data,
        beforeSend: function () {
          $infolist.find('.content').remove();
          $('html, body').animate(
            {
              scrollTop: $('.info-list').offset().top - 20,
            },
            200
          );
          $infolist.append(
            '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> يرجى الانتظار</div>'
          );
        },
        success: function (data) {
          if (data != '' && data != 0) {
            const _json = $.parseJSON(data);
            history.pushState(_data, _json.title, _json.url);
            document.title = _json.title;
            $('.top-page-title h2').text(_json.term_name);
            $infolist.addClass('transit');
            $infolist.find('#loader.content').remove();
            $infolist.append('<div class="content">' + _json.html + '</div>');
            masonryInit();
            setTimeout(() => {
              $infolist.removeClass('transit');
            }, 300);
          }
        },
      });
    }
  }
};
