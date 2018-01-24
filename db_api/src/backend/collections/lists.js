"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "lists",
		fields: [
			{
				name: "voting",
				type: "single_reference",
				params: { collection: "voting" },
				required: true,
			},
			{
				name: "candidate",
				type: "single_reference",
				params: { collection: "candidates" },
				required: true,
			},
			{
				name: "fraction",
				type: "single_reference",
				params: { collection: "fracions" },
				required: true,
			},
			{
				name: "number",
				type: "int",
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
