import {sendData} from "./func/functions";
import $ from 'jquery'

import('./func/search.js');

$(".side-menu").on("click", function (e) {

    if ($(this).parent().find("ul").length) {
        e.preventDefault();

        if (
            $(this).parent().find("ul").first()[0].offsetParent !== null
        ) {
            $(this)
                .find(".side-menu__sub-icon")
                .removeClass("transform rotate-180");
            $(this).removeClass("side-menu--open");
            $(this).parent().find("ul").first().slideUp().removeClass('side-menu__sub-open');
        } else {
            $(this)
                .find(".side-menu__sub-icon")
                .addClass("transform rotate-180");
            $(this).addClass("side-menu--open");
            $(this).parent().find("ul").first().slideDown().addClass('side-menu__sub-open');
        }
    }
});

$(document).ready(function() {
    let url = location.protocol + '//' + location.host + location.pathname;

    $('.side-nav a.side-menu').each(function() {
        if( $(this).attr('href') == url ) {
            $(this).addClass('side-menu--active');
            let parent = $(this).parents('ul.subMenu');
            if( parent ) {
                parent.addClass('side-menu__sub-open');
                parent.siblings('a.side-menu').addClass('side-menu--active');
            }
        }
    });

    if( $('.tinyEditor').length > 0 ) {
        tinymce.init({
            mode : "textarea",
            selector: '.tinyEditor',
            height: '350px',
            language : 'ru',
            setup: function(editor) {
                editor.on('change', function(e) {
                    $('textarea[name=text]').text(tinymce.activeEditor.getContent());
                });
            },
        });
    }
});

/* Menu */

/* Tab Seo In Posts */

$('.st_seo_tab_system').click(function() {
    let block = $(this).siblings('.st_tab_content');

    if( $(this).hasClass('hided') ) {
        $(this).removeClass('hided');
        block.slideDown(150);
    }
    else {
        $(this).addClass('hided');
        block.slideUp(150);
    }
})

/* Tab Seo In Posts */


/* Main Search */

$(document).on('click', function(e)
{
    var search_block = $('.mainTopSearch'),
        search_results_list = search_block.find('.search-result');

    if (!search_block.is(e.target) && search_block.has(e.target).length === 0)
    {
        search_results_list.removeClass('show');
    }
});

$('.mainTopSearch input.search__input').on('keyup', function(e) {

    if (!/[a-z0-9]/i.test(String.fromCharCode(e.which))) {
        if( e.keyCode != 8 ) return false;
    }

    let that = $(this),
        string = that.val(),
        block = $('.mainTopSearch .search-result');

    if( string.length < 3 ) {
        if( block.hasClass('show') ) block.removeClass('show');
        return false;
    }

    sendData('/ajax/mainSearch/getResults',
        'POST',
        {'string' : string},
        function (response) {
            if( response.status == 'ok' ) {
                block.html(response.results);
                block.addClass('show');
            }
        }
    );

});


/* Main Search */

$(document).on('click', '.st_tab .item', function(e) {
    if( $(this).hasClass('active') ) return false;

    let that = $(this),
        target = that.attr('data-target');

    $('.st_tab .item, .st_tab_content .item').removeClass('active');
    that.addClass('active');

    $('.st_tab_content .item[data-target='+target+']').addClass('active');
});

$(document).on('change', '.bonusTitleInput', function() {
    let text = $('.bonusTitleInput').val(),
        widgetTitleInput = $('input#widget__title');

    if( widgetTitleInput.val().length < 1 ) {
        widgetTitleInput.val(text);
    }
});


