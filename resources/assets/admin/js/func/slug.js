import {sendData} from "./functions";

import $ from 'jquery',
    slugGen = $('.slugGenerate'),
    slugInput = $('input[name=slug]'),
    pageType = $('input[name=title]').attr('data-type');

    if(! pageType ) pageType = $('input[name=name]').attr('data-type');

    let pageId = $('input[type=hidden][name*=_id]').val();

slugGen.on('change', function() {
    generateSlug();
});

slugInput.on('change', function() {
    let v = $(this).val();
    v = v.replace(/\//g,'');
    $(this).val(v);
    checkSlugUnique();
});

function generateSlug() {
    let titleInput = $('.slugGenerate'),
        title = titleInput.val(),
        slugInput = $('input[name=slug]'),
        data = {
            'title' : title,
            'id' : $('input[name=page_id]').val() ? $('input[name=page_id]').val() : 0
        };

    sendData(
        '/ajax/slug/'+pageType+'/generate',
        'GET',
        data,
        function (response) {
            $('.slug-loading').addClass('hidden');
            if( response.status === 'ok') {
                slugInput.val(response.slug);
                slugInput.parents('.input-group').removeClass('alert-outline-danger');
                $('p.slug_unique_error').addClass('hidden');
            }
        },
        function () {
            $('.slug-loading').removeClass('hidden')
        }
    );

}
export function checkSlugUnique(field = 'slug') {
    let slug = '';

    if( pageType == 'categories' ) {
        let pc = $('#parentCategorySelect option:selected');

        if( pc.val() !== 0 ) {
            slug = $('#parentCategorySelect option:selected').attr('data-slug');
        }
    }

    let slugInput = $('input[name=slug]');


     let data = {
        'id' : pageId
    };

     data[field] = slug + slugInput.val();


    sendData(
        '/ajax/slug/'+pageType+'/isUnique',
        'GET',
        data,
        function (response) {
            $('.slug-loading').addClass('hidden');
            if( response.status === 'ok') {
                if( response.isUnique ) {
                    slugInput.parents('.input-group').removeClass('alert-outline-danger');
                    $('p.slug_unique_error').addClass('hidden')
                }
                else {
                    slugInput.parents('.input-group').addClass('alert-outline-danger');
                    $('p.slug_unique_error').removeClass('hidden')
                }
            }
        },
        function () {
            $('.slug-loading').removeClass('hidden')
        }
    );
}
