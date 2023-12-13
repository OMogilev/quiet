import Dropzone from "dropzone";
let $ = require('jquery');
import Toastify from "toastify-js";

import {sendData} from './func/functions';

let successNotify = Toastify({
    node: $("#success-notification")
        .clone()
        .removeClass("hidden")[0],
    duration: 3000,
    newWindow: true,
    close: true,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
});

$(document).ready(function() {
    $('.menu__content_item input[type=checkbox]').prop('checked', false);

    let url = location.protocol + '//' + location.host + location.pathname;
    $('.media__menu a').each(function() {
        if( $(this).attr('href') == url || $(this).attr('href') + '/' == url ) {
            $(this).addClass('media__menu_item_active');
            return false;
        }
    });
});

let dropzoneData = {
    disablePreviews: true,
    addedfile: () => {},
    sending: function(file, xhr, formData) {
        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    },
    success: (file, result) => {
        $('.content-items').prepend(result['content'])
    }
};

Dropzone.options.mydropzone = dropzoneData;

$('.showDropzone').click((e) => {
    e.preventDefault();
    $('.dropzoneBlock').toggleClass('hidden');
})

$(".content-items").on("click", '.menu__content_item a', function (e) {
    e.preventDefault();

    let id = $(this).parents('.menu__content_item').attr('data-id');

    sendData('/backend/media/getInfo/' + id,
        'POST',
        {'id' : id},
        function (response) {
            if( response.status == 'ok' ) {
                $('#fileproperties_modal').html(response.code);
                cash("#fileproperties_modal").modal("show");
            }
        }
    );
});

function showDeleteButton() {
    let btn = $('.deleteFiles');

    if( $('.menu__content_item input[type=checkbox]:checked').length > 0 ) {
        btn.removeClass('hidden');
    }
    else {
        btn.addClass('hidden');
    }
}

$('#fileproperties_modal').on('click', '.mediaDeleteBtn', function() {
    let id = [];
    id.push($(this).attr('data-id'));

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/backend/media/deleteFiles',
            'DELETE',
            {'id' : id},
            function (response) {
                if( response.status == 'ok' ) {
                    $('#fileproperties_modal .closeBtn').trigger('click');
                    $('.menu__content_item[data-id='+id[0]+']').remove();
                    $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');
                }
            }
        );
    });

    return false;
});

$(".content-items").on("click", '.menu__content_item input[type=checkbox]', function (e) {
    showDeleteButton();
});

$('.deleteFiles').click(function() {
    let ids = [];
    $('.menu__content_item input[type=checkbox]').each(function() {
        if( $(this).prop('checked') ) ids.push($(this).parents('.menu__content_item').attr('data-id'))
    });

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.click(function() {
        sendData('/backend/media/deleteFiles',
            'DELETE',
            {'id' : ids},
            function (response) {
                if( response.status == 'ok' ) {
                    $('.menu__content_item input[type=checkbox]').each(function() {
                        if( $(this).prop('checked') ) $(this).parents('.menu__content_item').remove();
                        $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');
                    });
                }
            }
        );
    });

    return false;
});

let EnableSearchResultPagination = false;
let mediaFileInfinityPaginationPage = 1;

$('.media--search-button').on('keyup', function(e) {

    if( e.keyCode == 9 || e.keyCode == 27 || e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40 ||
        e.keyCode == 16 || e.keyCode == 17 || e.keyCode == 18 || e.ctrlKey) {
        return false;
    }

    let searchString = $(this).val();

    mediaFileInfinityPaginationPage = 1;

    if ( searchString.length == 0 ) {
        $('ul.pagination').show();
    } else {
        $('ul.pagination').hide();
    }

    sendData(
        '/ajax/media/findInFileChooser',
        'GET',
        { 'searchString': searchString, 'type' : 'notModal' },
        function (response) {
            if (response.status == 'ok') {
                $('.content-items').html(response.content);
                EnableSearchResultPagination = true;
            }
            else {
                EnableSearchResultPagination = false;
            }

            if ( searchString.length == 0 ) {
                EnableSearchResultPagination = false;
            }

        },
        function() {
            $('.content-items').html('<img src="/images/admin/searchPreloader.gif" />');
        }
    );

});

$(window).scroll(function() {
    if( EnableSearchResultPagination === true ) {
        if( $(this).scrollTop() + $(window).height() >= $('.content-items').height() ) {
            getMediaFromAjax( $('.media--search-button').val() );
        }
    }
});


function getMediaFromAjax(searchString = null) {

    mediaFileInfinityPaginationPage++;

    sendData(
        '/ajax/media/pagination',
        'GET',
        {'page' : mediaFileInfinityPaginationPage, 'searchString' : searchString, 'type' : 'notModal'},
        function (response) {
            if( response.status == 'ok') {
                $('.content-items').append(response.content);
                EnableSearchResultPagination = true;
            }
            else {
                EnableSearchResultPagination = false;
            }
        },
        function() {
            EnableSearchResultPagination = false;
        }
    );

}



$('#fileproperties_modal').on('click', '.mediaSaveBtn', function() {
    let that = $(this),
        propertiesBlock = $('#fileproperties_modal').find('.fileoptions'),
        data = {
            'alt' : propertiesBlock.find('#alt_input').val(),
            'title' : propertiesBlock.find('#title_input').val(),
            'sign' : propertiesBlock.find('#sign_input').val(),
            'id' : that.attr('data-id')
        };

    sendData('/ajax/media/saveFileProperties',
        'POST',
        {'data' : data},
        function (response) {
            if( response.status == 'ok' ) {
                let notify = $('#success-notification');
                successNotify.showToast();
            }
        }
    );

});





/* Media */
