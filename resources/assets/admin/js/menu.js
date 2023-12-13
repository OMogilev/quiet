import Toastify from "toastify-js";
import tail from "tail.select";

let optionsTail = {
    'search' : true,
    'locale' : 'ru'
};

let selectMenu = tail('.selectMenu', optionsTail);

import {sendData} from './func/functions';

let menuItems = []; //Тут находятся элементы меню, выбранные в модалке

$('.content').on('click', '.addMenuItem', function(e) {
    e.preventDefault();
    cash("#AddMenuItemModal").modal("show");
});

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

let nestableSettings = {
    'maxDepth' : 3
};

$(document).ready(function () {
    addNestable();
});

$('.dragArea').on('click', '.showBody', function () {
    let that = $(this),
        div = that.parents('div.dd-handle'),
        body = div.siblings('.body');

    body.toggleClass('hidden');
})

let notifySettings = {
    duration: 3000,
    className: 'toastify-content',
    newWindow: true,
    close: true,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
};

$('.searchInput').on('keyup', function() {
    let that = $(this),
        string = that.val(),
        searchBlock = that.parents('.search').find('.search-result');

    if( string.length > 2 ) {
        sendData(
            '/ajax/menu/search',
            'POST',
            {'string' : string},
            function(response) {
                if(response.status == 'ok') {
                    searchBlock.html(response.code);
                    searchBlock.addClass('show');
                }
            },
        );
    }
    else {
        searchBlock.removeClass('show');
    }
});

$('.search-result').on('click', '.takeThisItem', function(e) {
    e.preventDefault();

    let that = $(this),
        data = {
            'id' : that.attr('data-id'),
            'name' : that.attr('data-name'),
            'type' : that.attr('data-type')
        };

    menuItems.push(data);
    choosedItemsVision(data);

    $('.search-result').removeClass('show');
    $('.searchInput').val('');
});

$('.content').on('click', '.deleteThisItem', function() {
    let that = $(this),
        id = that.attr('data-id'),
        menu_id = $('select.selectMenu').val();

    sendData(
        '/ajax/menu/deleteMenuItem',
        'post',
        {'id' : id, 'menu_id' : menu_id},
        function(response) {
            if( response.status == 'ok' ) {
                that.parents('li.dd-item:first').remove();
            }
        }
    );
});

$('#AddMenuItemModal').on('click', '.menuModal-choosed li a.delete', function(e) {
   e.preventDefault();

   let that = $(this),
       li = that.parent('li'),
       id = that.attr('data-id'),
       arrayKey = menuItems.findIndex(item => item.id === id);

   menuItems.splice(arrayKey, 1);
   li.remove();
   choosedItemsVision();
});

$('#AddMenuItemModal').on('click', '.addCustomLink', function() {
    let that = $(this),
        form = that.parents('div.custom-link'),
        textBlock = form.find('input#custom-link-textInput'),
        text = textBlock.val(),
        linkBlock = form.find('input#custom-link-urlInput'),
        link = linkBlock.val();

    if( link.length <= 1 ) {
        link = '';
    }

    if( text.length < 2 ) {
        notifySettings.text = 'Для добавления ссылки необходимо добавить текст';
        Toastify(notifySettings).showToast();

        return false;
    }

    let id = 'c-1';

    if( $('[data-id=' + id + ']').length > 0 ) {
        for(let i = 2; i < 100; i++) {
            id = 'c-' + i;
            if( $('[data-id=' + id + ']').length < 1 ) break;
        }
    }

    let data = {
            'id' : id,
            'name' : text,
            'link' : link,
            'type' : 'custom'
        };

    menuItems.push(data);

    choosedItemsVision(data);
    textBlock.val('');
    linkBlock.val('');

});

$('#AddMenuItemModal').on('click', '.menuAddItemsBtn', function() {

    if( menuItems.length < 1 ) {
        notifySettings.text = 'Нечего добавлять :(';
        Toastify(notifySettings).showToast();
        return false;
    }

    sendData(
        '/ajax/menu/addMenuItems',
        'POST',
        {'data' : menuItems},
        function(response) {
            if(response.status == 'ok') {
                let flag = $('.dragArea .dd ol li').length;
                $('.dragArea .dd > ol.dd-list').append(response.code);
                if( flag < 1 ) {
                    $('.dd').nestable(nestableSettings);
                }
                menuItems = [];
                $('.menuModal-choosed ul').html('');
                $('#AddMenuItemModal .closeBtn').trigger('click');
            }
        },
    );
});

$('.addMenu').click(function(e) {
    e.preventDefault();

    let that = $(this),
        nameBlock = that.siblings('input.menuName'),
        name = nameBlock.val();

    if(name.length < 2) {
        notifySettings.text = 'Введите название для нового меню';
        Toastify(notifySettings).showToast();

        return false;
    }

    sendData(
        '/ajax/menu/addMenu',
        'POST',
        {'name' : name},
        function(response) {
            if(response.status == 'ok') {
                $('.selectMenu option:selected').prop('selected', false);
                $('.selectMenu').append('<option value="'+ response.data.id +'" selected>'+ response.data.name +'</option>');
                selectMenu.reload();
                $('.selectMenu option:selected').length ? switchMenu($('.selectMenu option:selected').val()) : switchMenu('empty');
                nameBlock.val('');
            }
            if(response.status == 'bad') {
                notifySettings.text = response.message;
                Toastify(notifySettings).showToast();
            }
        },
    );

});

selectMenu.on('change', function (item) {
    switchMenu(item.key);
});

function switchMenu(menu_id) {

    sendData(
        '/ajax/menu/loadMenu',
        'POST',
        {'menu_id' : menu_id},
        function(response) {
            if(response.status == 'ok') {
                $('.menuHere').html(response.content);
                addNestable();
            }
        },
    );
}

$('.content').on('click', '.deleteMenu', function(e) {
    e.preventDefault();

    let option = $('.selectMenu option:selected'),
        id = option.val(),
        btn;

    cash('#modal-confirm-delete').modal('show');
    btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/ajax/menu/delete',
            'POST',
            {'id' : id},
            function (response) {
                if( response.status == 'ok' ) {
                    //убираем меню из списка
                    option.remove();
                    selectMenu.reload();
                    //обновляем экран с меню
                    $('.selectMenu option:selected').length ? switchMenu($('.selectMenu option:selected').val()) : switchMenu('empty');
                    //закрываем модалку с подтверждением удаления
                    $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');

                }
            }
        );
    });
})

$('.content').on('click', '.menuSaveBtn', function(e) {
    e.preventDefault();

    let parentLi = $('.dragArea .dd > ol.dd-list > li'),
        data = [];

    if( parentLi.length < 1 ) {
        data = 'empty';
    }
    else {
        parentLi.each(function() {

            let tempArray = getMenuData($(this));

            data.push(tempArray);
        });
    }

    let menu_id = $('.selectMenu option:selected').val();

    sendData(
        '/ajax/menu/saveMenu',
        'POST',
        {'data' : data, 'menu_id' : menu_id},
        function(response) {
            if(response.status == 'ok') {
                successNotify.showToast();
            }
        },
    );
});

function getMenuData(li) {
    let tempArray = {};
    tempArray.id = li.attr('data-id');
    tempArray.type = li.attr('data-type');
    tempArray.name = li.find('> .body input[name=name]').val();
    tempArray.class = li.find('> .body input[name=icon]').val();
    tempArray.link = tempArray.type == 'custom' ? li.find('> .body input[name=link]').val() : null;
    tempArray.children = [];

    if( li.find('> ol.dd-list').length > 0 ) {
        li.find('> ol.dd-list > li').each(function() {
            tempArray.children.push(getMenuData($(this)));
        });
    }

    return tempArray;
}

$('.content').on('click', '.menuEdit', function (e) {
    e.preventDefault();

    let that = $(this),
        h2 = that.parents('h2'),
        inputGroup = h2.find('.inputGroup'),
        input = inputGroup.find('input[type=text]'),
        span = h2.find('> div > span');

    span.toggleClass('hidden');
    inputGroup.toggleClass('hidden');

    if(! inputGroup.hasClass('hidden') ) {
        let inputVal = input.val();
        input.val('').focus().val(inputVal);
    }
})

$('.content').on('click', '.saveMenuEditName', function(e) {
   e.preventDefault();

   let that = $(this),
       id = $('.selectMenu option:selected').val(),
       newName = that.siblings('input[type=text]').val();

   if( newName.length < 2 ) {
       notifySettings.text = 'Введите название для меню';
       Toastify(notifySettings).showToast();

       return false;
   }

    sendData(
        '/ajax/menu/saveMenuEditedName',
        'POST',
        {'id' : id, 'newName' : newName},
        function(response) {
            if(response.status == 'ok') {
                let h2 = $('.header-zone h2'),
                    inputGroup = h2.find('.inputGroup'),
                    input = inputGroup.find('input[type=text]'),
                    span = h2.find('> div > span');

                span.toggleClass('hidden');
                inputGroup.toggleClass('hidden');

                h2.text(newName);
                $('.selectMenu option:selected').text(newName);
                selectMenu.reload();
            }
            if(response.status == 'bad') {
                notifySettings.text = response.message;
                Toastify(notifySettings).showToast();
            }
        },
    );

});




function choosedItemsVision(data = null) {
    let choosedBlock = $('.menuModal-choosed');

    if( menuItems.length == 0 ) {
        if(! choosedBlock.hasClass('hidden') ) {
            choosedBlock.addClass('hidden');
        }
    }

    if( data ) {
        sendData(
            '/ajax/menu/getChoosedItemView',
            'post',
            {'data' : data},
            function(response) {
                if( response.status == 'ok' ) {
                    choosedBlock.find('ul').append(response.code);
                    choosedBlock.removeClass('hidden');
                }
            }
        );
    }
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function addNestable() {
    if( $('.dd ol li').length > 0 ) {
        $('.dd').nestable(nestableSettings);
    }
}
