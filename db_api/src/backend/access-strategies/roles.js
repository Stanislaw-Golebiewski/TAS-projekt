"use strict";

const Sealious = require("sealious");

module.exports = function(app) {
    return app.createChip(Sealious.AccessStrategyType, {
        name: "roles",
        get_pre_aggregation_stage: function(context, params) {
            if (context.user_id === null) {
                return Promise.resolve([]);
            }
            return app
                .run_action(
                    new app.Sealious.SuperContext(),
                    ["collections", "users", context.user_id],
                    "show"
                )
                .then(function(user) {
                    if (params.indexOf(user.body.role) !== -1) {
                        return [{ $match: { _id: { $exists: true } } }]; //pass
                    } else {
                        return [{ $match: { _id: { $exists: false } } }]; //reject
                    }
                });
        },
        checker_function: function(context, params, item) {
            if (context.user_id === null) {
                return Promise.reject("Musisz być zalogowany");
            }

            const user_id = context.user_id;

            return app
                .run_action(
                    new app.Sealious.SuperContext(),
                    ["collections", "users", user_id],
                    "show",
                    { format: { role: "original" } }
                )
                .then(function(user) {
                    if (params.indexOf(user.body.role) !== -1) {
                        return Promise.resolve();
                    } else {
                        return Promise.reject(
                            "Brak uprawnień do wykonania tej akcji. Akcja dozwolona tylko dla: " +
                                params.join(", ") +
                                "."
                        );
                    }
                });
        },
    });
};
