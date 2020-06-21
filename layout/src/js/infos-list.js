import { AJAX_URL } from "./consts";
import { masonryInit } from "./vendorsInit";

function find_page_number(element) {
  return parseInt(element.html());
}

$(document).on("click", ".info-list .paginate-links a", function (event) {
  event.preventDefault();
  var current_page = find_page_number($(".paginate-links span.current"));
  var $infolist = $(".info-list");
  var page;
  if ($(this).hasClass("prev")) page = current_page - 1;
  else if ($(this).hasClass("next")) page = current_page + 1;
  else page = find_page_number($(this).clone());
  var cat = parseInt($(".cats-list li.active a").data("catid"));
  var post_type;
  if ($infolist.hasClass("books")) {
    post_type = "book";
  } else {
    post_type = "post";
  }
  $.ajax({
    url: AJAX_URL,
    type: "post",
    data: {
      action: "ajax_info",
      page: page,
      cat: cat,
      post_type: post_type,
      lang: scripts_data.langCode,
    },
    beforeSend: function () {
      $infolist.find(".content").remove();
      $("html, body").animate(
        {
          scrollTop: $(".info-list").offset().top - 20,
        },
        200
      );
      $infolist.append(
        '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> ' +
          scripts_data.lang["pleaseWait"] +
          "</div>"
      );
    },
    success: function (data) {
      if (data != "") {
        var _json = $.parseJSON(data);
        history.pushState({ pageTitle: _json.title }, _json.title, _json.url);
        $infolist.addClass("transit");
        $infolist.find("#loader.content").remove();
        $infolist.append('<div class="content">' + _json.html + "</div>");
        masonryInit();
        setTimeout(function () {
          $infolist.removeClass("transit");
        }, 300);
      }
    },
  });
});

$(".cats-list").on("click", "li:not(.active) a", function (e) {
  e.preventDefault();

  // initialize vars
  var $infolist = $(".info-list");
  var $header = $("#header");
  var $this = $(this);
  var $current = $(this).closest("li");
  var cat_name = $this.find(".front-cat-name").text();
  var cat = parseInt($this.data("catid"));
  var titleOffset = $(".current-cat-name").offset();

  // if force redirect
  if ($this.data("override-redirect")) {
    window.location.href = $this.data("override-redirect");
    $("html, body").animate(
      {
        scrollTop: titleOffset.top - 150,
      },
      200
    );
    $infolist.append(
      '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> ' +
        scripts_data.lang["pleaseWait"] +
        "</div>"
    );
    return;
  }

  // set active items
  $(".cats-list li.active").removeClass("active");
  $current.addClass("active");
  if ($current.hasClass("child-cat"))
    $current.closest("li.parent").addClass("expanded");
  else if ($current.hasClass("parent")) $current.addClass("expanded");
  else $(".cats-list li.expanded").removeClass("expanded");

  // load category name in the heading of dropdown
  $(".cats-list button .selected-value").text(cat_name);

  // determine post type
  var post_type;
  if ($this.closest(".books").length) {
    post_type = "book";
  } else {
    post_type = "post";
  }

  // prepare ajax data
  var _data = {
    action: "ajax_info",
    cat: cat,
    post_type: post_type,
    lang: scripts_data.langCode,
  };

  // send ajax request
  $.ajax({
    url: AJAX_URL,
    type: "post",
    data: _data,
    beforeSend: function () {
      $infolist.find(".content").remove();
      $("html, body").animate(
        {
          scrollTop: titleOffset.top - 150,
        },
        200
      );
      $infolist.append(
        '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> ' +
          scripts_data.lang["pleaseWait"] +
          "</div>"
      );
      $header.removeAttr("data-image-src");
      $header.removeAttr("data-parallax");
    },
    success: function (data) {
      if (data != "" && data != 0) {
        var _json = $.parseJSON(data);
        history.pushState(_data, _json.title, _json.url);
        var $imageEl = $header
          .siblings(".parallax-mirror")
          .find("img.parallax-slider");
        if ($imageEl.length) {
          if (_json.image && _json.image !== "") $imageEl[0].src = _json.image;
          else $imageEl[0].src = "";
        }
        //$header.parallax({imageSrc: _json.image});

        document.title = _json.title;
        $(".top-page-title h2").text(_json.term_name);
        $infolist.addClass("transit");
        $infolist.find("#loader.content").remove();
        $infolist.append('<div class="content">' + _json.html + "</div>");
        masonryInit();
        setTimeout(function () {
          $infolist.removeClass("transit");
        }, 300);
      }
    },
  });
});

window.onpopstate = function (event) {
  if (event.state != "" && event.state != 0) {
    var _data = event.state;
    console.log(JSON.stringify(_data));
    if (_data.action == "ajax_info") {
      var $infolist = $(".info-list");
      $.ajax({
        url: AJAX_URL,
        type: "post",
        data: _data,
        beforeSend: function () {
          $infolist.find(".content").remove();
          $("html, body").animate(
            {
              scrollTop: $(".info-list").offset().top - 20,
            },
            200
          );
          $infolist.append(
            '<div class="content" id="loader"><i class="fa fa-spin fa-circle-o-notch"></i> يرجى الانتظار</div>'
          );
        },
        success: function (data) {
          if (data != "" && data != 0) {
            var _json = $.parseJSON(data);
            history.pushState(_data, _json.title, _json.url);
            document.title = _json.title;
            $(".top-page-title h2").text(_json.term_name);
            $infolist.addClass("transit");
            $infolist.find("#loader.content").remove();
            $infolist.append('<div class="content">' + _json.html + "</div>");
            masonryInit();
            setTimeout(function () {
              $infolist.removeClass("transit");
            }, 300);
          }
        },
      });
    }
  }
};
