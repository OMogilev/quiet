import $ from 'jquery'

$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
});

export function sendData(url, type, data, success = null, beforeSend = null, error = null) {
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'json',
        beforeSend: beforeSend,
        success: success,
        error: error
    });
}
