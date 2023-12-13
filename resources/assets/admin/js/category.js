import {sendData} from "./func/functions";
import "./lib/contentConstructor.js";

let $ = require('jquery');
import {checkSlugUnique} from "./func/slug";

if( $('.slugGenerate') ) import('./func/slug.js');

import('./func/file_chooser.js');

let parentCategorySelect = $('#parentCategorySelect');
if( parentCategorySelect ) {
    parentCategorySelect.on('change', function() {
        let slug = $('select[name=parent_id] option:selected').attr('data-slug');
        $('.slugPrefix').text(slug);
        $('input[name=prefix]').val(slug);

        checkSlugUnique('fullSlug');
    });
}

$('.deleteCategory').click(function(e) {
    e.preventDefault();

    let that = $(this),
        page = that.attr('data-page') === 'true' ? true : false;

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes'),
        id = that.attr('data-id');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/backend/categories/delete',
            'DELETE',
            {'id' : id},
            function (response) {
                if( response.status == 'ok' ) {
                    $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');
                    if( page ) {
                        that.parents('tr.intro-x').remove();
                        let totalPosts = parseInt($('.totalPosts span').text()) - 1;
                        $('.totalPosts span').text(totalPosts);
                    }
                    else {
                        location.href = response.link;
                    }
                }
            }
        );
    });

    return false;
});
