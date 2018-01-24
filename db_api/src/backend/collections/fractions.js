"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "fractions",
		fields: [
			{
				name: "name",
				type: "text",
				required: true,
			},
			{
				name: "short_name",
				type: "text",
				required: true,
			},
			{
				name: "leader",
				type: "single_reference",
				params: { collection: "candidates" },
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
