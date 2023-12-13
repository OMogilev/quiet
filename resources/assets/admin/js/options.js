let $ = require('jquery');

import Toastify from "toastify-js";
import tail from "tail.select";

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

let optionsTail = {
    'search' : true,
    'locale' : 'ru'
};

let selectMenu = tail('.selectMenu', optionsTail);

import {sendData} from './func/functions';


$('ul.options--heading-menu li a').click(function(e) {
    e.preventDefault();

    let that = $(this),
        menu = $('.options--heading-menu'),
        tabsBlock = $('.tab-content'),
        id = that.attr('data-target');

    if( that.hasClass('active') ) return false;

    menu.find('a.active').removeClass('active');
    that.addClass('active');

    tabsBlock.find('div.active').removeClass('active');
    tabsBlock.find('div' + id).addClass('active');

})

$('.optionsSaveBtn').click(function (e) {
    e.preventDefault();

    let form = $('form.options--form'),
        data = form.serialize();

    sendData(
        form.attr('action'),
        form.attr('method'),
        data,
        function(response) {
            if( response.status == 'ok' ) {
                successNotify.showToast();
            }
        }
    );
})
