import tail from "tail.select";

import $ from 'jquery'
import Sortable from "sortablejs";
import {sendData} from "../func/functions";
import {tinyInit} from "../func/editor";
import {doTailSelect} from "../func/tail-select";

let blockWrapper = $('.blocks_wrapper');

if( blockWrapper.length > 0 ) {
    let sortable = Sortable.create( blockWrapper.find('.items')[0], {
        handle: '.dragItem',
        animation: 150,

        onEnd: function(evt) {
            // let blocksOrder = '';
            // $('#structure .items > .item').each(function() {
            //     blocksOrder += $(this).attr('data-type') + ', ';
            // });
            //
            // $('input[name="structure[block_order]"]').val(blocksOrder);
        }
    });
}

let emptyModal = $('#emptyModal2');

let activeItem;

blockWrapper.on('click', '.item', function(e) {
// blockWrapper.on('click', '.item .operations .feather-edit', function(e) {

    if( $(e.target).hasClass('feather-trash-2') ||
        $(e.target).hasClass('dragItem') ||
        $(e.target).parents('.dragItem').length > 0 || $(e.target).parents('.feather-trash-2').length > 0
    ) return false;


    let that = $(this),
        item = that,
        type = item.attr('data-type');

    activeItem = item;

    sendData(
        '/backend/editor/editBlock/' + type,
        'GET',
        {},
        function(response) {

            emptyModal.html(response.code);

            if( type == 'text' ) {
                let text = item.find('textarea.content').val(),
                    isMainText = item.find('.isMainText').val();

                if( text.length > 0 ) {
                    emptyModal.find('.tiny').val(text);
                }

                if( isMainText == 1 ) emptyModal.find('.thisIsMainText').prop('checked', true);
                else emptyModal.find('.thisIsMainText').prop('checked', false);
            }
            if( type == 'subcategories' ) {
                let template = item.find('.s_template').val(),
                    source = item.find('.s_source').val();

                if( template.length > 0 && source.length > 0 ) {
                    emptyModal.find('input[type=radio]:checked').prop('checked', false);
                    emptyModal.find('input[name=template][value='+ template + ']').prop('checked', true);
                    emptyModal.find('input[name=source][value='+ source + ']').prop('checked', true);
                }
            }
            if( type == 'table-difference' ) {
                let ids = item.find('input.table-difference').val();
                if( ids.length > 0 ) {
                    ids = ids.split(',');

                    $.each(ids, function(key, val) {
                        emptyModal.find(`.tail-select option[value="${val}"]`).prop('selected', true);
                    });
                }
            }
            if( type == 'table-difference-traffic' ) {
                let ids = item.find('input.table-difference-traffic').val(),
                    sortBy = item.find('input.sortBy').val();

                if( ids.length > 0 ) {
                    ids = ids.split(',');

                    $.each(ids, function(key, val) {
                        emptyModal.find(`.tail-select.bk_select option[value="${val}"]`).prop('selected', true);
                    });

                    emptyModal.find(`.tail-select.sortBy option[value="${sortBy}"]`).prop('selected', true);
                }
            }
            if( type == 'mobileApp' ) {
                let value = item.find('input.mobileAppValue').val();

                if( value.length > 0 ) {
                    let data = JSON.parse(value),
                        ids, imgs;

                    $.each(data, function(i, v) {
                        if( v.images_id.length > 0 ) {
                            ids = v.images_id.split(',');
                            imgs = v.images_src.split(',');

                            $.each(ids, function(j, val) {
                                emptyModal.find('.mobileAppTabContent .item[data-target="' + v.type + '"] .images').append('<div data-id=' + val + '><img src="'+ imgs[j] +'"><div class="close-btn">x</div></div>');
                            });
                        }

                        emptyModal.find('.mobileAppTabContent .item[data-target="' + v.type + '"] input.images_id').val(v.images_id);
                        emptyModal.find('.mobileAppTabContent .item[data-target="' + v.type + '"] textarea.tiny').val(v.text);

                        tinymce.execCommand('mceRemoveEditor', true, "tiny-" + v.type);

                    });


                }
            }
            if( type == 'bonuses' ) {
                let bonus_count = item.find('input.bonuses__bonus_count').val(),
                    bonus_order = item.find('input.bonuses__bonus_order').val();

                if( bonus_count.length > 0 && bonus_order.length > 0 ) {
                    emptyModal.find('#bonuses_count').val(bonus_count);
                    emptyModal.find('#bonuses_order_' + bonus_order.toLowerCase()).prop('checked', true);
                }
            }
            if( type == 'postsFromCategory' ) {
                let postsFromCategory_post_count = item.find('input.postsFromCategory__posts_count').val(),
                    postsFromCategory_post_order = item.find('input.postsFromCategory__posts_order').val(),
                    postsFromCategory_category_id = item.find('input.postsFromCategory__category_id').val();

                emptyModal.find(`.tail-select option[value="${postsFromCategory_category_id}"]`).prop('selected', true);

                emptyModal.find('#posts_count').val(postsFromCategory_post_count);
                emptyModal.find('#posts_order_' + postsFromCategory_post_order.toLowerCase()).prop('checked', true);
            }
            if( type == 'facts' ) {
                let factsData = item.find('.facts__data').val();

                if( factsData.length > 0 ) {
                    factsData = $.parseJSON(factsData);
                    $.each(factsData, function(key, val) {
                        emptyModal.find('input[name=' + val.name + ']').val(val.val)
                    })
                }
            }
            if( type == 'faq' ) {
                let faqId       = item.find('.faq__id').val(),
                    faqQuantity = item.find('.faq__quantity').val(),
                    faqOrder    = item.find('.faq__order').val();

                if( faqId.length > 0 ) {
                    emptyModal.find('select#faq_list option[value=' + faqId + ']').prop('selected', true);
                    emptyModal.find('select#faq_order option[value=' + faqOrder + ']').prop('selected', true);
                    emptyModal.find('.faq_quantity_block input[type=text]').val(faqQuantity);
                }
            }
            if( type == 'plusAndMinus') {
                let pluses  = item.find('.pm__pluses').val(),
                    minuses = item.find('.pm__minuses').val();

                if( pluses.length > 0 || minuses.length > 0 ) {
                    emptyModal.find('#pluses').val(pluses);
                    emptyModal.find('#minuses').val(minuses);
                }
                tinymce.execCommand('mceRemoveEditor', true, "pluses");
                tinymce.execCommand('mceRemoveEditor', true, "minuses");
            }
            if( type == 'toc' ) {
                let generateByBlocks = activeItem.find('.generateByBlocks').val();

                if( generateByBlocks == 1 ) emptyModal.find('.tocByBlockInput').prop('checked', true);
                else {
                    emptyModal.find('.tocByBlockInput').prop('checked', false);
                    let jsonValues = activeItem.find('.toc-content').val();

                    if( jsonValues.length > 0 ) {
                        sendData(
                            '/backend/bk/openTOCModal',
                            'POST',
                            {'data' : jsonValues},
                            function(response) {
                                if( response.status == 'ok' ) {
                                    emptyModal.find('.table-of-contents').html(response.code)
                                }
                            });
                    }
                }



            }
            if( type == 'category-bonuses' ) {
                let fromThisCategory = parseInt(item.find('.category-bonuses__fromThisCategory').val()),
                    categories_id = fromThisCategory === 0 ? item.find('.category-bonuses__categories_id').val() : 0,
                    justBestBonuses = parseInt(item.find('.category-bonuses__justBestBonuses').val()),
                    justNewBonuses = parseInt(item.find('.category-bonuses__justNewBonuses').val()),
                    bonus_count = parseInt(item.find('.category-bonuses__bonus_count').val()),
                    bonus_order = item.find('.category-bonuses__bonus_order').val();

                if( fromThisCategory === 0 ) {
                    emptyModal.find('.fromThisCategory').prop('checked', false);
                    if( categories_id.length > 0 ) {
                        categories_id = categories_id.split(',');

                        $.each(categories_id, function(key, val) {
                            emptyModal.find(`#categories_list option[value="${val}"]`).prop('selected', true);
                        });
                    }
                    emptyModal.find('.chooseCategory').removeClass('hidden');
                }
                else emptyModal.find('.fromThisCategory').prop('checked', true);

                if( justBestBonuses === 1 ) emptyModal.find('.justBestBonuses').prop('checked', true);
                if( justNewBonuses === 1 ) emptyModal.find('.justNewBonuses').prop('checked', true);

                emptyModal.find('#bonuses_count').val(bonus_count);
                emptyModal.find('#bonuses_order_' + bonus_order.toLowerCase()).prop('checked', true);
            }
            if( type == 'prognoze' ) {
                let prognozeVal = item.find('.prognoze__val').val();

                if( prognozeVal.length > 1 ) {
                    prognozeVal = JSON.parse(prognozeVal);

                    emptyModal.find('select#bk_list option[value=' + prognozeVal[0].bk_id + ']').prop('selected', true);
                    emptyModal.find('.prognoze_text_block input[type=text]').val(prognozeVal[0].text);
                    emptyModal.find('.prognoze_koef_block input[type=text]').val(prognozeVal[0].koef);

                    if( prognozeVal.length > 1 ) {
                        prognozeVal.splice(0, 1);

                        let cont = 0;

                        $.each(prognozeVal, function (key, value) {
                            cont = 0;

                            sendData(
                                '/backend/editor/getPrognozeBlock',
                                'GET',
                                {},
                                function(response) {
                                    if( response.status == 'ok' )  {
                                        $('.st_modal .modal-body').append(response.code);
                                        doTailSelect( $('.st_modal .modal-body .prognoze_item:last') );

                                        $('.st_modal .modal-body .prognoze_item:last').find('select#bk_list option[value=' + value.bk_id + ']').prop('selected', true);
                                        $('.st_modal .modal-body .prognoze_item:last').find('.prognoze_text_block input[type=text]').val(value.text);
                                        $('.st_modal .modal-body .prognoze_item:last').find('.prognoze_koef_block input[type=text]').val(value.koef);

                                        cont = 1;
                                    }
                                }
                            );

                        });
                    }

                }

            }

            if( emptyModal.find('.tiny').length > 0 ) {
                tinyInit('#emptyModal2 .tiny');
            }
            if( emptyModal.find('.tail-select').length > 0 ) {
                doTailSelect(emptyModal);
            }


            emptyModal.show();
            $('.overlay').show();
            $('body > .back_wrapper').addClass('openedModal');
        }
    );
});

emptyModal.on('click', '.fromThisCategory', function() {
   if( $(this).prop('checked') ) {
       emptyModal.find('.chooseCategory').addClass('hidden');
   }
   else {
       emptyModal.find('.chooseCategory').removeClass('hidden');
   }
});

$('.overlay, .st_modal .closeButton').click(function() {
    closeModal();

    tinymce.remove();
    activeItem = null;
});

blockWrapper.on('click', '.items .item .operations .feather-trash-2', function() {
    let that = $(this),
        item = that.parents('.item');

    cash('#modal-confirm-delete').modal('show');

    let btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.on('click', function() {
        btn.off('click');
        $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');

        item.remove();
    });
});

$('.editor_wrapper').on('click', '.blocks_wrapper > a.addBlock', function(e) {
    e.preventDefault();

    let pageType = $('.editor_wrapper').attr('page-type');

    sendData(
        '/backend/modal/addBlock',
        'GET',
        { 'pageType' : pageType },
        function(response) {
            $('#emptyModal').html(response.code);

            cash("#emptyModal").modal("show");
        }
    );
});

$('#emptyModal').on('click', '.addElement__modal .items .item[data-type]', function() {
    let that = $(this),
        type = that.attr('data-type');

    sendData(
        '/backend/editor/getBlock/' + type,
        'GET',
        { 'nextArrayNumber' : getNextArrayNumber() },
        function(response) {
            if( response.status == 'ok' )  {
                blockWrapper.find('.items').append(response.code);
            }
            $('.modal .closeButton').trigger('click');
        }
    );
});

emptyModal.on('click', '.buttonsBlock .add', function(e) {
    e.preventDefault();

    sendData(
        '/backend/modal/addTocBlock',
        'GET',
        {},
        function(response) {
            if( response.status == 'ok' ) {
                emptyModal.find('.table-of-contents').append(response.code);
            }
        });
})

emptyModal.on('click', '.buttonsBlock .delete', function(e) {
    e.preventDefault();

    $(this).parents('.item').remove();
})

emptyModal.on('click', '.doTOCgenerate', function() {

    let textBlock = $('.editor_wrapper .blocks_wrapper .items .isMainText[value=1]');
    if( textBlock.length === 0 ) {
        alert('Не выбран основной текст. Откуда мне генерировать?!');
        return false;
    }

    textBlock = textBlock.parents('.item');
    let text = textBlock.find('.content').val();

    sendData(
        '/backend/bk/toc-generate',
        'POST',
        {'text' : text},
        function(response) {
            if( response.status == 'ok' ) {
                emptyModal.find('.table-of-contents').html(response.code);
                textBlock.find('.content').val(response.content);
            }
            if( response.status == 'empty' ) {
                alert('В тексте не найдено h2 тегов');
            }
        });
});

emptyModal.on('click', '.closeButton', function() {
    closeModal();

    activeItem = null;
});


emptyModal.on('click', '.saveEdit-confirm', function() {
    let content =  tinymce.activeEditor.getContent(),
        isMainText = emptyModal.find('.thisIsMainText').prop('checked');

    if( isMainText ) {
        let error = 0;
        $('.editor_wrapper .blocks_wrapper .items .item[data-type=text]').each(function() {
            if( $(this).find('.isMainText').val() == 1 ) {
                if( $(this)[0] == activeItem[0] ) return false;
                alert('Другой текст уже выбран как основной. Только один текст можно выбрать основным.');
                error = 1;
                return false;
            }
        });
        if( error === 1 ) {
            return false;
        }
    }

    activeItem.find('textarea.content').val(content);
    activeItem.find('div.text-content').html(content);

    if( isMainText ) activeItem.find('.isMainText').val(1);
    else activeItem.find('.isMainText').val(0);

    closeModal();
});

emptyModal.on('click', '.saveSubcategory-confirm', function() {
    let block = $(this).parents('.st_modal'),
        template = block.find('.subcategories-view-type input[type=radio]:checked').val(),
        source = block.find('.source input[type=radio]:checked').val();

    activeItem.find('.s_template').val(template);
    activeItem.find('.s_source').val(source);

    closeModal();
});

emptyModal.on('click', '.saveTableDifferense-confirm', function() {
    let block = $(this).parents('.st_modal'),
        category_ids = block.find('select').val();

    activeItem.find('.table-difference').val(category_ids);

    closeModal();
});

emptyModal.on('click', '.saveTableDifferense-traffic-confirm', function() {
    let block = $(this).parents('.st_modal'),
        category_ids = block.find('select.bk_select').val(),
        sortBy = block.find('select.sortBy').val();

    activeItem.find('.table-difference-traffic').val(category_ids);
    activeItem.find('.sortBy').val(sortBy);

    closeModal();
});

emptyModal.on('click', '.saveMobileApp-confirm', function() {
    let block = $(this).parents('.st_modal'),
        data = [],
        images_src;

    emptyModal.find('.mobileAppTabContent .item').each(function() {
        images_src = '';

        if( $(this).find('.images_id').val().length > 0 ) {
            $(this).find('.images img').each(function() {
                if( images_src.length < 1 ) {
                    images_src = $(this).attr('src');
                }
                else {
                    images_src += ',' + $(this).attr('src')
                }
            })
        }

        data.push({
            'type' : $(this).attr('data-target'),
            'images_id' : $(this).find('.images_id').val(),
            'images_src' : images_src,
            'text' : tinymce.get('tiny-' + $(this).attr('data-target')).getContent()
        });
    });

    activeItem.find('.mobileAppValue').val(JSON.stringify(data));

    closeModal();
});

emptyModal.on('click', '.savePosts-confirm', function() {
    let block = $(this).parents('.st_modal'),
        posts_count = block.find('#posts_count').val(),
        posts_order = block.find('.posts_order_block input[type=radio]:checked').val();

    activeItem.find('.posts__posts_count').val(posts_count);
    activeItem.find('.posts__posts_order').val(posts_order);

    closeModal();
});

emptyModal.on('click', '.savePostsFromCategory-confirm', function() {

    let block = $(this).parents('.st_modal'),
        category_id = block.find('select[name=category_id] option:selected').val(),
        category_name = block.find('select[name=category_id] option:selected').text(),
        posts_count = block.find('#posts_count').val(),
        posts_order = block.find('.posts_order_block input[type=radio]:checked').val();

    if(! category_id.length ) {
        alert('Пожалуйста, выберите категорию');
        return false;
    }

    activeItem.find('.text-content span').text(category_name);

    activeItem.find('.postsFromCategory__category_id').val(category_id);
    activeItem.find('.postsFromCategory__category_name').val(category_name);
    activeItem.find('.postsFromCategory__posts_count').val(posts_count);
    activeItem.find('.postsFromCategory__posts_order').val(posts_order);

    closeModal();
});

emptyModal.on('click', '.saveBonuses-confirm', function() {
    let block = $(this).parents('.st_modal'),
        bonus_count = block.find('#bonuses_count').val(),
        bonus_order = block.find('.bonuses_order_block input[type=radio]:checked').val();

    activeItem.find('.bonuses__bonus_count').val(bonus_count);
    activeItem.find('.bonuses__bonus_order').val(bonus_order);

    closeModal();
});

emptyModal.on('click', '.justBestBonuses', function() {
    if( $(this).prop('checked') ) $('.justNewBonuses').prop('checked', false);
});

emptyModal.on('click', '.justNewBonuses', function() {
    if( $(this).prop('checked') ) $('.justBestBonuses').prop('checked', false);
});

emptyModal.on('click', '.saveCategory-Bonuses-confirm', function() {
    let block = $(this).parents('.st_modal'),
        fromThisCategory = block.find('.fromThisCategory').prop('checked') ? 1 : 0,
        justBestBonuses = block.find('.justBestBonuses').prop('checked') ? 1 : 0,
        justNewBonuses = block.find('.justNewBonuses').prop('checked') ? 1 : 0,
        category_ids = fromThisCategory === 0 ? block.find('#categories_list').val() : 0,
        bonus_count = block.find('#bonuses_count').val(),
        bonus_order = block.find('.bonuses_order_block input[type=radio]:checked').val();

    activeItem.find('.category-bonuses__fromThisCategory').val(fromThisCategory);
    activeItem.find('.category-bonuses__categories_id').val(category_ids);
    activeItem.find('.category-bonuses__justBestBonuses').val(justBestBonuses);
    activeItem.find('.category-bonuses__justNewBonuses').val(justNewBonuses);
    activeItem.find('.category-bonuses__bonus_count').val(bonus_count);
    activeItem.find('.category-bonuses__bonus_order').val(bonus_order);

    closeModal();
});

emptyModal.on('click', '.saveFacts-confirm', function() {
    let block = $(this).parents('.st_modal'),
        data = [];

    block.find('input[type=text]').each(function() {
        data.push({
            'name' : $(this).attr('name'),
            'val'  : $(this).val()
        });
    });

    activeItem.find('.facts__data').val(JSON.stringify(data));

    closeModal();
});

emptyModal.on('click', '.saveFaq-confirm', function() {
    let block = $(this).parents('.st_modal'),
        id = block.find('#faq_list option:selected').val(),
        order = block.find('#faq_order option:selected').val(),
        quantity = block.find('.faq_quantity_block input[type=text]').val();

    activeItem.find('.faq__id').val(id);
    activeItem.find('.faq__quantity').val(quantity);
    activeItem.find('.faq__order').val(order);

    closeModal();
});

emptyModal.on('click', '.savePlusAndMinus-confirm', function() {
    let block = $(this).parents('.st_modal'),
        pluses = tinyMCE.get('pluses').getContent(),
        minuses = tinyMCE.get('minuses').getContent();

    activeItem.find('.pm__pluses').val(pluses);
    activeItem.find('.pm__minuses').val(minuses);

    closeModal();
});

emptyModal.on('click', '.saveTOC-confirm', function() {
    let block = $(this).parents('.st_modal'),
        generateByBlocks = block.find('.tocByBlockInput').prop('checked'),
        values = [];

    if(! generateByBlocks ) {
        block.find('.table-of-contents .item').each(function() {
            values.push({
                'text' : $(this).find('.toc__text_input').val(),
                'slug' : $(this).find('.toc__link_input').val(),
            });
        });

        activeItem.find('.toc-content').val(JSON.stringify(values));
    }

    activeItem.find('.generateByBlocks').val(generateByBlocks ? 1 : 0);

    closeModal();
});

emptyModal.on('click', '.savePrognoze-confirm', function() {
    let block = $(this).parents('.st_modal'),
        prognoze_block = block.find('.prognoze_item'),
        data = [],
        error = 0,
        bk_id, text, koef;

    prognoze_block.each(function() {
        bk_id = $(this).find('#bk_list option:selected').val();
        text = $(this).find('.prognoze_text_block input').val();
        koef = $(this).find('.prognoze_koef_block input').val();

        if( text.length < 1 || koef.length < 1  ) {
            alert('Текст прогноза или коэффициент не заполнены!');
            error = 1;
            return false;
        }

        data.push({
            'bk_id' : bk_id,
            'text' : text,
            'koef' : koef
        })
    });

    if( error == 1 ) return false;

    activeItem.find('.prognoze__val').val(JSON.stringify(data, null, 2));

    closeModal();
});

emptyModal.on('click', '.addPrognoze', function() {
    sendData(
        '/backend/editor/getPrognozeBlock',
        'GET',
        {},
        function(response) {
            if( response.status == 'ok' )  {
                $('.st_modal .modal-body').append(response.code);
                doTailSelect( $('.st_modal .modal-body .prognoze_item:last') );
            }
        }
    );
});

emptyModal.on('click', '.prognoze_delete_block', function(e) {
    e.preventDefault();

    $(this).parents('.prognoze_item').remove();
});



function closeModal() {
    $('.st_modal').hide();
    $('.overlay').hide();

    $('body > .back_wrapper').removeClass('openedModal');
}

function getNextArrayNumber() {
    return $('.editor_wrapper .blocks_wrapper .item').length + 1;
}
