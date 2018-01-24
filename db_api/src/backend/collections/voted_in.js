"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "voted_in",
		fields: [
			{
				name: "voter",
				type: "single_reference",
				params: { collection: "voters" },
				required: true,
			},
			{
				name: "voting",
				type: "single_reference",
				params: { collection: "voting" },
				required: true,
			},
		],
		access_strategy: {
			default: ["roles", ["admin"]],
			create: ["roles", ["admin", "voter"]],
			retrive: ["roles", ["admin", "voter"]],
			delete: "noone",
		},
	});
};
