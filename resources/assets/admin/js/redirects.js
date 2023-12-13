let $ = require('jquery');
import {sendData} from "./func/functions";

$('.deletePost').click(function(e) {
    e.preventDefault();

    let that = $(this),
        url = that.attr('data-url'),
        page = that.attr('data-page');

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.on('click', function() {
        $(this).off('click');

        sendData(url,
            'DELETE',
            {},
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
