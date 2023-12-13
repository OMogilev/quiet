import {sendData} from "./functions";
import {insertImageToEditor} from "./editor";
import Dropzone from "dropzone";

let $ = require('jquery');

let mediaFileInfinityPaginationPage = 1,
    mediaFileInfinityPaginationEnable = 1,
    mediaFileInfinityPaginationPreviousType = 'search';

let imageContainer;


let dropzoneInChooserModal = {
    disablePreviews: true,
    addedfile: () => {},
    sending: function(file, xhr, formData) {
        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    },
    success: (file, result) => {
        updateDataInFileChooser($('#fileChooserModal .mediaChooserWindow--tabs-wrapper .heading a[data-target=library]').trigger('click'));
    }
};


$(document).on('click', '.imageChooser', function() {
    imageContainer = $(this);

    if( $(this).hasClass('severalImageCanChoose') ) {
        // Несколько изображений можно выбрать
        getModalFileChooser(null, true);
    }
    else {
        getModalFileChooser();
    }
})

export function getModalFileChooser(editor = null, severalImage = false) {
    sendData(
        '/ajax/media/getModalFileChooser',
        'GET',
        {},
        function (response) {
            if( response.status == 'ok') {
                $('#fileChooserModal').html(response.content);
                cash("#fileChooserModal").modal("show");

                $('#fileChooserModal .mediaDeleteBtn').addClass('hidden');

                if( $('#fileChooserModal #mydropzone').length ) {
                    let dropzoneInChooserModalVar = new Dropzone("#fileChooserModal #mydropzone", dropzoneInChooserModal);
                }

                if( editor ) $('#fileChooserModal').addClass('editor');

                $('#fileChooserModal .filesBox').bind('scroll', function() {

                    if( mediaFileInfinityPaginationEnable === 1 ) {
                        let itemsCount = $('.filesBox > div.item').length,
                            oneItemHeight = $('.filesBox > div.item').height(),
                            oneItemMargin = parseInt($('.filesBox > div.item').css('margin-bottom')),
                            boxWidth = $('.filesBox').width(),
                            itemRowsCount = parseInt(boxWidth / (oneItemHeight + oneItemMargin)),
                            fullHeight = (itemsCount / itemRowsCount) * (oneItemHeight + oneItemMargin);

                        console.log($(this).scrollTop() + 100);
                        console.log(fullHeight - 600);

                        if( ($(this).scrollTop() + 100) >= fullHeight - 600 ) {
                            getMediaFromAjax();
                        }
                    }

                });
            }
        }
    );
}
function getMediaFromAjax(searchString = null) {

    mediaFileInfinityPaginationPage++;

    sendData(
        '/ajax/media/pagination',
        'GET',
        {'page' : mediaFileInfinityPaginationPage, 'searchString' : searchString},
        function (response) {
            if( response.status == 'ok') {
                $('#fileChooserModal .mediaInsertHere .filesBox').append(response.content);
                mediaFileInfinityPaginationEnable = 1;
            }
        },
        function() {
            mediaFileInfinityPaginationEnable = 0;
        }
    );

}

$(document).on('keyup', '.searchBox input[type=text]', function(e) {

    if( e.keyCode == 9 || e.keyCode == 27 || e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40 ||
        e.keyCode == 16 || e.keyCode == 17 || e.keyCode == 18 || e.ctrlKey) {
        return false;
    }

    let searchString = $(this).val();

    mediaFileInfinityPaginationPage = 1;

    sendData(
        '/ajax/media/findInFileChooser',
        'GET',
        { 'searchString': searchString },
        function (response) {
            if (response.status == 'ok') {
                $('#fileChooserModal .mediaInsertHere .filesBox').html(response.content);

                $('#fileChooserModal .filesBox').bind('scroll', function() {

                    if( mediaFileInfinityPaginationEnable === 1 ) {

                        if( ($(this).scrollTop() + 20) >= $('.filesBox').height() ) {
                            getMediaFromAjax( searchString );
                        }
                    }
                });
            }
        },
        function() {
            $('#fileChooserModal .mediaInsertHere .filesBox').html('<img src="/images/admin/searchPreloader.gif" />');
        }
    );

});


export function updateDataInFileChooser(successAction = null) {
    sendData(
        '/ajax/media/updateItemsInFileChooser',
        'GET',
        {},
        function (response) {
            if( response.status == 'ok') {
                $('#fileChooserModal .mediaInsertHere .filesBox').html(response.content);
                successAction;
            }
        }
    );
}


$('#fileChooserModal').on('click', '.item img', function(e) {
    let that = $(this),
        mainBlock = that.parents('#fileChooserModal'),
        id = that.attr('data-id'),
        applyBtn = mainBlock.find('.chooseThisImage'),
        deleteBtn = mainBlock.find('.mediaDeleteBtn'),
        fileOptionsBlock = mainBlock.find('.fileOptions');

    if( that.hasClass('active') ) {
        that.removeClass('active');
        fileOptionsBlock.html('');

        if( mainBlock.find('.item img.active').length < 1 ) {
            applyBtn.removeClass('btn-primary').addClass('btn-secondary');
            deleteBtn.addClass('hidden');
        }

        return false;
    }

    if( e.ctrlKey ) {
        that.addClass('active');

        if(! applyBtn.hasClass('btn-primary') ) {
            applyBtn.removeClass('btn-secondary').addClass('btn-primary');
        }

        fileOptionsBlock.html('');
    }
    else {
        mainBlock.find('.item img').removeClass('active');
        that.addClass('active');
        applyBtn.removeClass('btn-secondary').addClass('btn-primary');
        deleteBtn.removeClass('hidden');

        sendData(
            '/ajax/media/getFileProperties',
            'GET',
            {'id' : id},
            function (response) {
                if( response.status == 'ok') {
                    $('#fileChooserModal .fileOptions').html(response.content);
                }
            }
        );
    }

});

$('#fileChooserModal').on('click', '.chooseThisImage', function() {
    let that = $(this);

    chooseThisImage(that, imageContainer);
    imageContainer = null;
});

$('.st_modal').on('click', '.gallery .images .close-btn', function() {
  let that = $(this),
      block = that.parent('div'),
      id = block.attr('data-id'),
      input = block.parents('.item').find('input.images_id'),
      ids = input.val(),
      newIds = '';

  ids = ids.split(',');

  $.each(ids, function(index, value) {
      if( value == id ) return true;

      if( newIds.length < 1 ) newIds = value;
      else newIds += ',' + value;
  });

  block.remove();
  input.val(newIds);
});

function chooseThisImage(that, imagePlace) {
    let mainBlock = that.parents('#fileChooserModal'),
        choosedImg = mainBlock.find('.item img.active'),
        id = choosedImg.attr('data-id');

    if( that.hasClass('btn-secondary') ) return false;

    if( imagePlace.hasClass('severalImageCanChoose') ) {
        let imagesBlock = imagePlace.parents('.gallery').find('.images'),
            hiddenInputWithImagesId = imagePlace.parents('.item').find('input.images_id');

        choosedImg.each(function() {
            if( imagesBlock.find('img[src="'+ $(this).attr('src') +'"]').length > 0 ) return true;

            imagesBlock.append('<div data-id="'+ $(this).attr('data-id') +'"><img src="' + $(this).attr('src') + '" /><div class="close-btn">x</div></div>');

            if( hiddenInputWithImagesId.val().length < 1 ) hiddenInputWithImagesId.val($(this).attr('data-id'));
            else hiddenInputWithImagesId.val(hiddenInputWithImagesId.val() + ',' + $(this).attr('data-id'));
        });
    }
    else {
        let imagePath = choosedImg.attr('src');

        if( $('#fileChooserModal').hasClass('editor') ) {
            insertImageToEditor(imagePath);
            $('#fileChooserModal').removeClass('editor');
        }
        else {
            imagePlace.attr('src', imagePath);
            $('input[name='+ imagePlace.attr('data-target') +']').val(id);
            $('.deleteThumbnail').removeClass('hidden');
        }
    }

    mainBlock.find('.closeBtn').trigger('click');

}

$('.deleteThumbnail').click(function() {
    let that = $(this),
        img = that.siblings('.imageChooser'),
        noimg = img.attr('data-noimg'),
        thumb_input = $('input[name=thumbnail_id]');

    $('.deleteThumbnail').addClass('hidden');
    img.attr('src', noimg);
    thumb_input.val(null);
});

$('#fileChooserModal').on('click', '.pagination__link', function(e) {
    e.preventDefault();

    let that = $(this);

    sendData(
        that.attr('href'),
        'GET',
        {},
        function(response) {
            if( response.status == 'ok' ) {
                $('#fileChooserModal').html(response.content);
            }
        }
    );
})

$('#fileChooserModal').on('click', '.mediaChooserWindow--tabs-wrapper .heading a', function(e) {
    e.preventDefault();

    let that = $(this),
        block = $('.mediaChooserWindow--tabs-wrapper'),
        target = that.attr('data-target');

    if( that.hasClass('active') ) return false;

    block.find('.heading a').removeClass('active');
    that.addClass('active');

    block.find('.tab-body').removeClass('active');
    block.find('.tab-body[data-tab='+ target +']').addClass('active');

    if( target == 'upload' ) {
        $('#fileChooserModal .dropzoneBlock').removeClass('hidden');
    }
});

$('#fileChooserModal').on('click', '.mediaDeleteBtn', function() {
    let id = [],
        activeImage = $('.mediaChooserWindow--tabs-wrapper .item img.active');
    id.push(activeImage.attr('data-id'));

    if( activeImage.length < 1 ) return false;

    cash('#modal-confirm-delete').modal('show');
    let btn = $('#modal-confirm-delete').find('.delete-yes');

    btn.on('click', function() {
        $(this).off('click');

        sendData('/backend/media/deleteFiles',
            'DELETE',
            {'id' : id},
            function (response) {
                if( response.status == 'ok' ) {
                    $('#modal-confirm-delete').find('.closedeleteconfirmmodal').trigger('click');
                    activeImage.parent('.item').remove();
                }
            }
        );
    });

    return false;
});

$('#fileChooserModal').on('change', '#alt_input, #title_input, #sign_input', function() {

    let that = $(this),
        id = $('#fileChooserModal .filesBox img.active').attr('data-id'),
        propertiesBlock = $('#fileChooserModal .fileOptions'),
        data = {
            'alt'   : propertiesBlock.find('#alt_input').val(),
            'title' : propertiesBlock.find('#title_input').val(),
            'sign'  : propertiesBlock.find('#sign_input').val(),
            'id'    : id
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




