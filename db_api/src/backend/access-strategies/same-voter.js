"use strict";
const Sealious = require("sealious");

module.exports = app =>
    app.createChip(Sealious.AccessStrategyType, {
        name: "same-voter",
        get_pre_aggregation_stage: function(context, params) {
            if (!context.user_id) {
                return [{ $match: { _id: { $exists: false } } }];
            } else {
                return [
                    {
                        $match: {
                            "body.user": context.user_id,
                        },
                    },
                ];
            }
        },
        checker_function: function(context, params, item) {
            if (!context.user_id) {
                return Promise.reject("You need to be logged in");
            }
            if (item.body.user === context.user_id) {
                return Promise.resolve();
            } else {
                return Promise.reject("Nie masz dostępu do tego konta");
            }
        },
        item_sensitive: true,
    });
