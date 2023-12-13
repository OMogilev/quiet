import {sendData} from "./func/functions";

let $ = require('jquery');

let seo = $('#seo');

seo.find('.post__tabs a').click(function(e) {
    e.preventDefault();

    let that = $(this),
        id = that.attr('data-tab'),
        headBlock = seo.find('.post__tabs'),
        bodyBlock = seo.find('.post__content');

    if( that.hasClass('active') ) return false;

    headBlock.find('a.active').removeClass('active');
    bodyBlock.find('> div.active').removeClass('active');

    that.addClass('active');
    bodyBlock.find('div#' + id).addClass('active');
});

$('a.seoGenerate').click(function(e) {
   e.preventDefault();

   let that = $(this),
       path = that.attr('href'),
       data = $("form :input[name != '_method']").serialize();

   sendData(
        path,
       'post',
       data,
       function (response) {
            if( response.status == 'ok' ) {
                seo.find('#inputs-list input[name="seo[title]"]').val(response.seo.title).change();
                seo.find('#inputs-list textarea[name="seo[description]"]').text(response.seo.description).change();

                seo.find('#comps .seo-box .slug').text(response.seo.slug);
                seo.find('#phones .seo-box .slug').text(response.seo.mobile_slug);

                if( $('.thumbnail_id').val() != 0 ) {
                    seo.find('#phones div.image img').attr('src', $('img.imageChooser').attr('src'));
                }

                seo.find('#seo-analize-list').html(response.seo.errors.view);
                seo.find('input[name="seo[errors]"').val(response.seo.errors.json)
            }
       }
   );
});

$(document).on('change', '#inputs-list input[name="seo[title]"], #inputs-list textarea[name="seo[description]"]', function() {
    let that = $(this),
        text = that.val();

    if( that.attr('name') == 'seo[title]' ) seo.find('.seo-box .title').text(text);
    else seo.find('.seo-box .description').text(text);
});


