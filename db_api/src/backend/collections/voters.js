"use strict";

module.exports = function(App) {
    return App.createCollection({
        name: "voters",
        fields: [
            {
                name: "user",
                type: "single_reference",
                params: { collection: "users" },
                required: true,
            },
            {
                name: "imię",
                type: "text",
                required: true,
            },

            {
                name: "nazwisko",
                type: "text",
                required: true,
            },
            // {
            //     name: "okręg_wybroczy",
            //     type: "single_reference",
            //     params: { collection: "constituancies" },
            //     required: true,
            // },
            {
                name: "numer_telefonu",
                type: "text",
                required: true,
            },
            {
                name: "adres",
                type: "html",
                required: true,
            },
        ],
        access_strategy: {
            default: ["roles", ["admin"]],
            retrieve: ["or", ["same-voter", ["roles", ["admin"]]]],
            delete: "noone",
        },
    });
};
