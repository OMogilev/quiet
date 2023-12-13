import $ from 'jquery'

$('input[name=image]').change(function() {
    var reader = new FileReader(),
        input = this;

    reader.onload = function (e) {
        $('.profile--photo').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);

    $('.deletePhoto').removeClass('hidden');
});

$('.deletePhoto').click(function(e) {
    e.preventDefault();

    $('.profile--photo').attr('src', $('.profile--photo').attr('data-src'));
    $('input[name=image]').val('');

    $(this).addClass('hidden');
});

$('textarea[name=biography]').keyup(function() {
   countTextareaSymbols($(this));
});

$(document).ready(function() {
    countTextareaSymbols($('textarea[name=biography]'));
});


function countTextareaSymbols(that) {
    let max = 500,
        length = that.val().length,
        diff = max - length;

    that.siblings('p').find('span').text(diff);
}
