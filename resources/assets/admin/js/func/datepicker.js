import dayjs from "dayjs";
import Litepicker from "litepicker";

import $ from 'jquery'

$(".st_datepicker").each(function () {
    let options = {
        singleMode: false,
        numberOfColumns: 2,
        numberOfMonths: 2,
        showWeekNumbers: true,
        format: "DD-MM-YYYY",
        lang: 'ru-RU',
        buttonText: {
            'apply' : 'Выбрать',
            'cancel' : 'Отмена',
            'reset' : 'Сброс'
        },
        dropdowns: {
            minYear: 1990,
            maxYear: null,
            months: true,
            years: true,
        },
    };

    if ($(this).data("single-mode")) {
        options.singleMode = true;
        options.numberOfColumns = 1;
        options.numberOfMonths = 1;
    }

    if ($(this).data("format")) {
        options.format = $(this).data("format");
    }

    if (!$(this).val()) {
        let date = dayjs().format(options.format);
        date += !options.singleMode
            ? " - " + dayjs().add(1, "month").format(options.format)
            : "";
        $(this).val(date);
    }

    new Litepicker({
        element: this,
        ...options,
    });
});
