"use strict";

module.exports = function(App) {
    return App.createCollection({
        name: "constituencies",
        fields: [
            {
                name: "kod",
                type: "text",
                required: true,
            },
        ],
        access_strategy: {
            default: ["roles", ["admin"]],
            delete: "noone",
        },
    });
};
