"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "candidates",
		fields: [
			{
				name: "name",
				type: "text",
				required: true,
			},
			{
				name: "surname",
				type: "text",
				required: true,
			},
		],
		access_strategy: {
			default: ["roles", ["admin"]],
			retrive: ["public"],
			delete: "noone",
		},
	});
};
