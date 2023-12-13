import "./lib/contentConstructor.js";

import Sortable from 'sortablejs';

let $ = require('jquery');

let bkStucture;

import Toastify from "toastify-js";
import {sendData} from "./func/functions";

if( $('.slugGenerate') ) import('./func/slug.js');
import('./func/file_chooser.js');

import tail from 'tail.select'

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

$('.dateTimeToggleBtn, .dateTimeBlock-cancelBtn').click(function(e) {
    e.preventDefault();

    $('.dateTimeChooseBlock').toggleClass('hidden');
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

$('.dateTimeBlock-OKBtn').click(function (e) {
    e.preventDefault();

    let block = $('.dateTimeChooseBlock'),
        date = {
            'day'    : block.find('input.f-day').val(),
            'month'  : block.find('select.f-month').val(),
            'year'   : block.find('input.f-year').val(),
            'hour'   : block.find('input.f-hour').val(),
            'minute' : block.find('input.f-minute').val(),
        };

    sendData(
        '/ajax/posts/checkPostDate',
        'POST',
        date,
        function(result) {
            if( result.status == 'ok' ) {
                $('.statusBlock span').text(result.date);
                $('input[name=date]').val(result.inputDate);
                $('.dateTimeChooseBlock').addClass('hidden');

                if( result.planned === true ) {
                    $('.saveBtn.toPlan').removeClass('hidden');

                    if(! $('.saveBtn.publish').hasClass('hidden') ) {
                        $('.saveBtn.publish').addClass('hidden');
                    }
                }
                else {
                    if(! $('.saveBtn.toPlan').hasClass('hidden') ) {
                        $('.saveBtn.toPlan').addClass('hidden');
                    }
                    $('.saveBtn.publish').removeClass('hidden');
                }
            }
            else {
                notifySettings.text = result.message;
                Toastify(notifySettings).showToast();
            }
        }
    );

});

$('.deletePost').click(function(e) {
    e.preventDefault();

    let that = $(this),
        page = that.attr('data-page') === 'true' ? true : false;

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes'),
        id = that.attr('data-id');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/backend/posts/delete',
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

$('.getPreview').click(function(e) {
    e.preventDefault();

    let that = $(this),
        data = $("form :input[name != '_method']").serialize();

    sendData(
        '/backend/preview/post/getLink',
        'POST',
        data,
        function(response) {
            if( response.status == 'ok' ) {
                window.open(response.link, '_blank');

                if( response.preview_id ) {
                    $('input[name=preview_id]').val(response.preview_id);
                }
            }
            else {
                notifySettings.text = response.message;
                Toastify(notifySettings).showToast();
            }
        },
        null,
        function(error) {
            if( error.status == 422 ) {
                notifySettings.text = '';

                $.each(error.responseJSON.errors, function(index, val) {
                    notifySettings.text += val[0] + '\n';
                });

                Toastify(notifySettings).showToast();
            }
        }
    );

});

$('select#post_type').change(function() {
   let that = $(this),
       val = that.val();

   if (val === 'faq') {
       sendData(
           '/backend/posts/getFAQ',
           'GET',
           {},
           function(response) {
               if( response.status == 'ok' ) {
                   $('.additional_fields').html(response.code);
                   tail('#faq_list', {
                       search:true,
                       deselect:true,
                   });
                   tail('#faq-which');
               }

           },
       );
   }

   if (val === 'default' ) {
       $('.additional_fields').html('');
   }

   return false;

});

$('#structure').on('click', '#table-of-contents .bb.add', function(e) {
    e.preventDefault();

    sendData(
        '/backend/bk/getTableOfContentItem',
        'GET',
        {},
        function(response) {
            if( response.status == 'ok' ) {
                $('.table-of-contents').append(response.code);
            }
        },
    );
});

$('#structure').on('click', '#table-of-contents .bb.delete', function(e) {
    e.preventDefault();

    $(this).parents('.item:first').remove();
});

$('#structure').on('click', '#table-of-contents .toc_generate', function (e) {
   e.preventDefault();

   let content = tinymce.get('editor').getContent(),
       that = $(this);

   if( that.hasClass('disabled') ) return;

    sendData(
        '/backend/bk/toc-generate',
        'POST',
        {'text' : content},
        function(response) {
            if( response.status == 'empty' ) {
                alert('В тексте не найдено h2 тегов');
            }
            if( response.status == 'ok' ) {
                $('.table-of-contents').html(response.code);
                tinymce.get('editor').setContent(response.content);
            }
            that.find('.button-loading').fadeOut(1);
            that.removeClass('disabled');
        },
        function () {
            that.find('.button-loading').fadeIn(1);
            that.addClass('disabled');
        }
    );
});

$(document).ready(function() {
   let structureBlock = $('#structure');

   if( $('#links_tail1').length > 0 ) {
            tail('#links_tail1', {
                search:true,
                placeholder: 'Выберите ссылку',
                deselect: true,
            });
            tail('#links_tail2', {
                search:true,
                placeholder: 'Выберите ссылку',
                deselect: true,
            });
            tail('#links_tail3', {
                search:true,
                placeholder: 'Выберите ссылку',
                deselect: true,
            });
       }


    tail('.categories-select', {
        search: true,
        hideDisabled: true,
        multiLimit: 20,
        multiShowCount: false,
        multiContainer: true,
        descriptions: true,
        classNames: 'categories-select-tail'
    });

    if( $('.categories-select-tail').length > 0 ) {
        $('.categories-select-tail ul.dropdown-optgroup li.dropdown-option').each(function() {
           $(this).addClass($('select#categories option[value='+$(this).attr('data-key')+']').attr('class'));
        });
    }




        if( $('#bonusType-tail').length > 0 ) {
            tail('#bonusType-tail', {
                placeholder: 'Выберите тип бонуса',
            });
        }
        if( $('#status-tail').length > 0 ) {
            tail('#status-tail', {
                placeholder: 'Выберите тип бонуса',
                select: 1
            });
        }
        if( $('#choose_bk').length > 0 ) {
            tail('#choose_bk', {
                search:true,
                placeholder: 'Выберите букмекера',
                deselect: true,
            });
        }



   if( structureBlock.length > 0 ) {
       let sortable = Sortable.create( structureBlock.find('.items')[0], {
           handle: '.dragItem',
           animation: 150,

           onStart: function(evt){
               $(evt.item).find('textarea.tiny').each(function () {
                   tinymce.execCommand('mceRemoveEditor', false, $(this).attr('id'));
               });
           },
           onEnd: function(evt) {
               $(evt.item).find('textarea.tiny').each(function () {
                   tinymce.execCommand('mceAddEditor', true, $(this).attr('id'));
               });

               let blocksOrder = '';
               $('#structure .items > .item').each(function() {
                   blocksOrder += $(this).attr('data-type') + ', ';
               });

               $('input[name="structure[block_order]"]').val(blocksOrder);
           }
       });
   }

   if( $('.bk_sortable_block').length > 0 ) {
       let sortable = Sortable.create( $('.bk_sortable_block').find('.items')[0], {
           handle: '.dragItem',
           animation: 150,

           onEnd: function(evt) {
               let counter = 1;

               $('.bk_sortable_block .items .item').each(function() {
                   $(this).find('div:first').text(counter);
                   counter++;
               });
           }
       });
   }
});

if( $('div#bk_settings').length > 0 ) {
    $('div#bk_settings').on('keyup', '.block input[data-target]', function() {
        $('.block a.btn[data-target='+ $(this).attr('data-target') +']').text( $(this).val() );
    });
}

$('.saveOrder').click(function (e) {
    e.preventDefault();
    let bk = [];

    $('.bk_sortable_block .items .item').each(function() {
        bk.push($(this).attr('data-id'))
    });

    sendData('/backend/bk/saveOrder',
        'post',
        {'bk' : bk},
        function (response) {
            if( response.status == 'ok' ) {
                notifySettings.text = 'Успешно сохранено!';
                Toastify(notifySettings).showToast();
            }
        }
    );
})

function get_randomString() {
    var abc = "abcdefghijklmnopqrstuvwxyz";
    var rs = "";
    while (rs.length < 6) {
        rs += abc[Math.floor(Math.random() * abc.length)];
    }

    return rs;
}


