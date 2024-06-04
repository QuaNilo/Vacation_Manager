(function () {
    "use strict";

    // flatpickr
    $(".flatpickr").each(function () {
        let options = {
            locale: 'pt',
            enableTime: false,
            dateFormat: "Y-m-d",
            //dateFormat: "Y-m-d H:i",
            time_24hr: true,
        };


        if ($(this).data("date-format")) {
            options.dateFormat = $(this).data("date-format");
        }else if ($(this).data("format")) {
            options.dateFormat = $(this).data("format");
        }
        if ($(this).data("locale")) {
            options.locale = $(this).data("locale");
        }
        if ($(this).data("enable-time")) {
            options.enableTime = $(this).data("enable-time");
        }
        if ($(this).data("time_24hr")) {
            options.time_24hr = $(this).data("time_24hr");
        }

        if (!$(this).val()) {
            let date = dayjs().format(options.format);
            /*date += !options.singleMode
                ? " - " + dayjs().add(1, "month").format(options.format)
                : "";*/
            $(this).val(date);
        }
        flatpickr($(this),options);
    });
})();
