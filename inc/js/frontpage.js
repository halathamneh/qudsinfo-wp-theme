(function ($) {
    var FB = {
        $form: false,
        ajax_url: '',
        searchForm: false,

        init: function () {
            FB.$form = $('form.select-info-form');
            FB.searchForm = FB.$form.find('.fb-posts-search');
            FB.ajax_url = FB.$form.data('ajaxurl');
            FB.controller();
            FB.$form.on('submit', function (e) {

            });
            FB.$form.find('.infos-load-more').on('click', function (e) {
                e.preventDefault();
                var offset = $(this).data('offset');
                console.log(offset);
                FB.loadMore(offset);
                $(this).data('offset', parseInt(offset) + 15);
            });
            FB.searchForm.find('input').on('keypress',function (e) {

                if(e.which === 13) {
                    e.preventDefault();
                    FB.search();
                }
            });
            FB.searchForm.find('button').on('click',function (e) {
                e.preventDefault();
                FB.search();
            });
        },
        controller: function () {
            FB.$form.find('input[type="radio"]').on('change', function (e) {
                FB.on.deselect();
                if ($(this).is(':checked')) {
                    var row = $(this).closest('tr');
                    FB.on.select(row);
                    FB.on.change($(this));
                }
            });
            FB.$form.find('tr').on('click', function (e) {
                var radio = $(this).find('input[type="radio"]');
                radio.prop('checked', true);
                FB.on.deselect();
                FB.on.select($(this));
                FB.on.change(radio);
            });
        },
        on: {
            select: function (elem) {
                elem.addClass('selected');
            },
            deselect: function () {
                var row = FB.$form.find('tr');
                row.removeClass('selected');
            },
            change: function (elem) {
                var data = elem.data();
                var info = $(".info-review");
                var preview = info.find(".notification-preview");
                preview.find('.noti-title').text(data.title);
                preview.find('.noti-content').text(data.content);
                preview.find('.noti-image').css('background-image', 'url(' + data.image + ')');
                info.show();
            }
        },
        loadMore: function (offset) {
            $.ajax({
                url: FB.ajax_url,
                type: 'get',
                data: {
                    action: 'TI_load_more_infos',
                    offset: offset
                },
                beforeSend: function () {

                },
                success: function (data) {
                    var json = JSON.parse(data);
                    if (json.status !== 0) {
                        console.error(json.result);
                        return;
                    }
                    var table = FB.$form.find('.table tbody');
                    for (var i = 0; i < json.result.length; i++)
                        table.append('<tr>' +
                            '           <th scope="row">' +
                            '               <input type="radio" name="selected_info" value="' + json.result[i].id + '"' +
                            '                   data-title="' + json.result[i].title + '" data-content="' + json.result[i].content + '"' +
                            '                   data-image="' + json.result[i].image + '">' +
                            '           </th>' +
                            '           <td>' +
                            '               <div class="row flex-nowrap">' +
                            '                   <div>' +
                            '                       <img src="' + json.result[i].thumb + '" height="50" width="50" alt="">' +
                            '                   </div>' +
                            '                   <div class="px-3">' +
                            '                       <b>' + json.result[i].title + '</b>' +
                            '                       <p>' + json.result[i].content + '</p>' +
                            '                   </div>' +
                            '               </div>' +
                            '           </td>' +
                            '         </tr>');
                    FB.controller();
                }
            });
        },
        search: function () {
            var s = FB.searchForm.find('input[type="text"]').val();
            $.ajax({
                url: FB.ajax_url,
                type: 'get',
                data: {
                    action: 'TI_search_infos',
                    s: s
                },
                beforeSend: function () {

                },
                success: function (data) {
                    var json = JSON.parse(data);
                    if (json.status !== 0) {
                        console.error(json.result);
                        return;
                    }
                    var table = FB.$form.find('.table tbody');
                    table.html("");
                    for (var i = 0; i < json.result.length; i++)
                        table.append('<tr>' +
                            '           <th scope="row">' +
                            '               <input type="radio" name="selected_info" value="' + json.result[i].id + '"' +
                            '                   data-title="' + json.result[i].title + '" data-content="' + json.result[i].content + '"' +
                            '                   data-image="' + json.result[i].image + '">' +
                            '           </th>' +
                            '           <td>' +
                            '               <div class="row flex-nowrap">' +
                            '                   <div>' +
                            '                       <img src="' + json.result[i].thumb + '" height="50" width="50" alt="">' +
                            '                   </div>' +
                            '                   <div class="px-3">' +
                            '                       <b>' + json.result[i].title + '</b>' +
                            '                       <p>' + json.result[i].content + '</p>' +
                            '                   </div>' +
                            '               </div>' +
                            '           </td>' +
                            '         </tr>');
                    FB.controller();
                }
            });
        }
    };
    $(document).ready(function () {
        FB.init();
        console.log("cc");
    });
})(jQuery);