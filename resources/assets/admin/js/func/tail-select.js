import tail from "tail.select";

export function doTailSelect(selector) {
    selector.find(".tail-select").each(function () {
        let options = {};

        if (cash(this).data("placeholder")) {
            options.placeholder = cash(this).data("placeholder");
        }

        if (cash(this).attr("class") !== undefined) {
            options.classNames = cash(this).attr("class");
        }

        if (cash(this).data("search")) {
            options.search = true;
        }


        if (cash(this).attr("multiple") !== undefined) { console.log('test');
            options.descriptions = true;

            if( cash(this).attr('dontHideSelected') === undefined ) {
                options.hideSelected = true;
            }
            else {
                options.hideSelected = false;
            }

            options.hideDisabled = true;
            options.multiLimit = 20;
            options.multiShowCount = false;
            options.multiContainer = true;
        }



        tail(this, options);
    });
}

