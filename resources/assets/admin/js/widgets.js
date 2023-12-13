import {sendData} from "./func/functions";
import {updateSelect} from "./func/tom-select";


import $ from 'jquery'
import Sortable from 'sortablejs';
import Toastify from "toastify-js";

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
    sidebarZone.find('select.tom-select').each(function() {
        updateSelect($(this));
    });
});

new Sortable(widgetsList, {
    group: {
        name: 'shared',
        pull: 'clone',
        put: false
    },
    sort: false,
    animation: 150,
    onEnd: function (evt) {
        let item = evt.item,
            to = evt.to.classList,
            type = item.querySelector('.widget input[name=type]').value;

        if( to.contains('widgetArea') ) {

            item.classList.add('temp-class');

            item = $('.sidebarsZone .temp-class');

             let widget = item.find('.widget'),
                thisTypeCount = $('input[value='+type+']').length;

            item.removeClass(['p-5', 'cursor-pointer', 'zoom-in']);
            item.find('.defaultHeading').addClass('hidden');
            widget.removeClass('hidden');
            widget.find('.heading').addClass('opened');

            widget.find('label[for]').each(function() {
               $(this).attr('for', $(this).attr('for') + thisTypeCount);
            });
            widget.find('input[id]').each(function() {
               $(this).attr('id', $(this).attr('id') + thisTypeCount);
            });

            item.removeClass('temp-class');
            newWidgetAdded(item);
        }

    },
});


$('.widgetArea').each(function() {
    new Sortable(this, {
        group: 'shared',
        animation: 150,
        filter: '.widget .body',
        preventOnFilter: false
    });
})

$('.content').on('click', '.toggleWidget', function() {
    let that = $(this),
        parentBlock = that.parents('.widget'),
        heading = parentBlock.find('.heading'),
        body = parentBlock.find('.body'),
        flag = heading.hasClass('opened');

    heading.toggleClass('opened');
    if( flag ) body.slideUp(150);
    else body.slideDown(150);

});

let sidebarZone = $('.sidebarsZone');

sidebarZone.on('click', '.deleteThisWidget', function(e) {
    e.preventDefault();

    let that = $(this),
        widget = $(this).parents('.widgetWrapper');

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.on('click', function() {
        $(this).off('click');
        widget.remove();
        $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');

        let widgetId = that.attr('data-id');

        if( widgetId != 0 ) {
            sendData(
                '/backend/widgets/delete',
                'post',
                {'id' : widgetId}
            );
        }
    });

});

sidebarZone.on('click', '.checkbox-justone input[type=checkbox]', function() {
    let that = $(this),
        block = that.parents('div.checkbox-justone'),
        boxes = block.find('input[type=checkbox]');

    boxes.prop('checked', false);
    that.prop('checked', true);
});

sidebarZone.on('change', '.showPostsFrom input[type=checkbox]', function () {
    showPostFromToggle($(this));
});

function showPostFromToggle(that) {
    let goal = that.attr('data-tab'),
        thisWidget = that.parents('.widget'),
        blocks = thisWidget.find('div[data-tab=showPostsFrom]');

    blocks.each(function() {
        if(! $(this).hasClass('hidden') ) $(this).addClass('hidden');
    });

    thisWidget.find('div[data-value='+goal+']').removeClass('hidden');
}

$('.saveSidebarsOptions').click(function(e) {
    e.preventDefault();

    let data = getAllWidgets();

    sendData(
        '/backend/widgets/save',
        'post',
        {'data' : data},
        function(response) {
            if( response.status == 'ok' ) {
                successNotify.showToast();
            }
        }
    );
});


function getAllWidgets() {
    let data = [];

    sidebarZone.find('.widgetArea').each(function() {
        let currentSidebar = $(this).attr('data-sidebar'),
            widgetInfo = [];

        $(this).find('.widget').each(function() {
           let obj = {};

           $(this).find('input, select, textarea').each(function() {

               let key = $(this).attr('name');

               if( $(this).attr('type') == 'radio' ) {
                   if( $(this).prop('checked') ) obj[key] = $(this).val();
                   return true;
               }

               if( $(this).attr('type') == 'checkbox' ) {

                   if( $(this).val() == 'on' ) {
                       if( $(this).prop('checked') ) obj[key] = true;
                       else obj[key] = false;
                   }
                   else {
                       if( $(this).prop('checked') ) obj[key] = $(this).val();
                   }
                   return true;

               }

               obj[key] = $(this).val();
           });

           obj['sidebar'] = currentSidebar;

           widgetInfo.push(obj);
        });

        data.push(widgetInfo);
    })

    return data;
}

function newWidgetAdded(item) {
    item.find('select.tom-select').each(function() {
        if( $(this).hasClass('tomselected') ) return true;

        updateSelect($(this));
    });

}


sidebarZone.on('change', 'input[name=show_link]', function() {
    let that = $(this),
        block = that.parent('div').siblings('div.link_group');

    if( that.prop('checked') ) {
        block.removeClass('hidden');
    }
    else {
        if(! block.hasClass('hidden') ) block.addClass('hidden');
    }
});


$('.toggleWidget').click(function() {
    let that = $(this),
        headBlock = that.parent('.titleWithToggle'),
        widgetBlock = headBlock.siblings('.widgetArea');

    headBlock.toggleClass('opened');
    widgetBlock.toggleClass('hidden');
});

