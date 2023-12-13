import "./lib/contentConstructor.js";
let $ = require('jquery');

import Toastify from "toastify-js";
import {sendData} from "./func/functions";

let editor = document.getElementById('editor');
if( editor )             import('./func/editor.js');
if( $('.slugGenerate') ) import('./func/slug.js');
import('./func/file_chooser.js');

let notifySettings = {
    duration: 3000,
    className: 'toastify-content',
    newWindow: true,
    close: true,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
};

$('.content').on('click', '.saveBtn', function (e) {
    e.preventDefault();

    if( $(this).hasClass('save') ) {
        $('form').append('<input type="hidden" name="save" value="1" />');
    }

    $('.mainForm').submit();
});

$('.deletePage').click(function(e) {
    e.preventDefault();

    let that = $(this),
        page = that.attr('data-page') === 'true' ? true : false;

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes'),
        id = that.attr('data-id');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/backend/pages/delete',
            'DELETE',
            {'id' : id},
            function (response) {
                if( response.status == 'ok' ) {
                    $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');
                    if( page ) {
                        that.parents('tr.intro-x').remove();
                        let totalPages = parseInt($('.totalPages span').text()) - 1;
                        $('.totalPages span').text(totalPages);
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

$('.changeSlug a, .hiddenInput a').click(function(e) {
    e.preventDefault();

    let that = $(this),
        block = $('.changeSlug'),
        slugInput = $('.hiddenInput');

    if(! slugInput.hasClass('hidden') ) {
        block.find('div > span').text( slugInput.find('input[name=slug]').val() );
    }

    block.toggleClass('hidden');
    slugInput.toggleClass('hidden');
});

$('.getPreview').click(function(e) {
    e.preventDefault();

    let that = $(this),
        data = $("form :input[name != '_method']").serialize();


    sendData(
        '/backend/preview/page/getLink',
        'POST',
        data,
        function(response) {
            if( response.status == 'ok' ) {
                window.open(response.link, '_blank');

                if( response.preview_id ) {
                    $('input[name=page_id]').val(response.preview_id);
                }
            }
        },
        null,
        function(error) {
            if( error.status == 422 ) {
                notifySettings.text = error.responseJSON.errors.title[0];
                Toastify(notifySettings).showToast();
            }
         }
        );

});

$('.faq-block').on('click', '.bb.add', function(e) {
    e.preventDefault();

    sendData(
        '/backend/faq/getItemBlock',
        'GET',
        {},
        function(response) {
            if( response.status == 'ok' ) {
                $('.faq-block .item .buttonsBlock').hide();
                $('.faq-block').append(response.code);
            }
        }
    );
});

$('.faq-block').on('click', '.bb.delete', function(e) {
    e.preventDefault();

    let that = $(this),
        item = that.parents('.item');

    item.remove();
    $('.faq-block .item:last').find('.buttonsBlock').show();
});

$('.saveFAQ').click(function(e) {
   e.preventDefault();
   let error = 0;

   $('.faq-block .item').find('input[type=text], textarea').each(function() {
       if( $(this).val().length < 1 ) {
           $(this).addClass('faq-error');
           error = 1;
       }
   });

   if(! error ) {
       $('form').submit();
   }

   return false;
});


$('.faq-block').on('keyup', '.faq-error', function() {
   if( $(this).val().length > 1 ) {
       $(this).removeClass('faq-error');
   }
});

$('.deleteFAQ').click(function(e) {
    e.preventDefault();

    let that = $(this);

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes'),
        id = that.attr('data-id');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/backend/faq/delete',
            'DELETE',
            {'id' : id},
            function (response) {
                if( response.status == 'ok' ) {
                    $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');
                    that.parents('tr.intro-x').remove();
                    let totalPages = parseInt($('.totalPages span').text()) - 1;
                    $('.totalPages span').text(totalPages);
                }
            }
        );
    });

    return false;
});
