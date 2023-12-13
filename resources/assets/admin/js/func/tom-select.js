import TomSelect from "tom-select";

(function (cash) {
    "use strict";

})(cash);

export function updateAllSelects() {
    cash(".tom-select").each(function () {
        let options = {
            plugins: {
                dropdown_input: {},
            },
        };

        if (cash(this).data("placeholder")) {
            options.placeholder = cash(this).data("placeholder");
        }

        if (cash(this).attr("multiple") !== undefined) {
            options = {
                ...options,
                plugins: {
                    ...options.plugins,
                    remove_button: {
                        title: "Remove this item",
                    },
                },
                persist: false,
                create: true,
                onDelete: function (values) {
                    return confirm(
                        values.length > 1
                            ? "Вы уверены, что хотите удалить эти пункты?"
                            : 'Вы точно хотите удалить этот пункт?'
                    );
                },
            };
        }

        if (cash(this).data("header")) {
            options = {
                ...options,
                plugins: {
                    ...options.plugins,
                    dropdown_header: {
                        title: cash(this).data("header"),
                    },
                },
            };
        }

        new TomSelect(this, options);
    });
}

export function updateSelect(that) {
    let options = {
        plugins: {
            dropdown_input: {},
        },
    };

    if (that.data("placeholder")) {
        options.placeholder = that.data("placeholder");
    }

    if (that.attr("multiple") !== undefined) {
        options = {
            ...options,
            plugins: {
                ...options.plugins,
                remove_button: {
                    title: "Remove this item",
                },
            },
            persist: false,
            create: true,
            onDelete: function (values) {
                return confirm(
                    values.length > 1
                        ? "Вы уверены, что хотите удалить эти пункты?"
                        : 'Вы точно хотите удалить этот пункт?'
                );
            },
        };
    }

    if (that.data("header")) {
        options = {
            ...options,
            plugins: {
                ...options.plugins,
                dropdown_header: {
                    title: that.data("header"),
                },
            },
        };
    }
// console.log(that);
// console.log(that[0]);
// console.log(options);
    new TomSelect(that[0], options);
}
