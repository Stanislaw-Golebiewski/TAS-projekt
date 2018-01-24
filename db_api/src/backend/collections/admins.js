"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "admins",
		fields: [
			{
				name: "email",
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
