module.exports = function(app) {
    var Users = app.ChipManager.get_chip("collection", "users");

    Users.add_fields([{ name: "role", type: "role", required: true }]);
    Users.set_access_strategy({
        create: ["roles", ["admin"]],
        retrieve: ["or", ["themselves", ["roles", ["admin", "moderator"]]]],
        update: ["or", ["themselves", ["roles", ["admin", "moderator"]]]],
        delete: "noone",
    });
};
