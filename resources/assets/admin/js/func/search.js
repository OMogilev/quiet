import {sendData} from "./functions";

let $ = require('jquery');

$(document).click(function(event) {
    if ($(event.target).closest(".searchWrapper").length) return;
    event.stopPropagation();
});

$('.searchWrapper input[type=text]').on('keyup', function(e) {

    if (!/[a-z0-9]/i.test(String.fromCharCode(e.which))) {
        if( e.keyCode != 8 ) return false;
    }

   let that = $(this),
       data = {},
       block = $('.searchWrapper .results');

   data.table = $('.searchWrapper').attr('data-table');
   data.type = $('.searchWrapper').attr('data-type');
   data.type = data.type.length ? data.type : null;
   data.searchKey = that.val();

   if( data.searchKey.length < 3 ) {
       if(! block.hasClass('hidden') ) block.addClass('hidden');
       return false;
   }

    sendData('/ajax/search/getResults',
        'POST',
        {'data' : data},
        function (response) {
            if( response.status == 'ok' ) {
                block.html(response.results);
                block.removeClass('hidden');
            }
        }
    );
});
