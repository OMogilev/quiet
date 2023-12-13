import $ from 'jquery'


$(document).ready(function() {

})

$('button.js-toggle-dark-light').click(function() {
    $('html[data-theme]').attr('data-theme') === 'dark' ? $('html[data-theme]').attr('data-theme', 'light') : $('html[data-theme]').attr('data-theme', 'dark')
});
