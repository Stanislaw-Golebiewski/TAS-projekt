"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "voting",
		fields: [
			{
				name: "name",
				type: "single_reference",
				params: { collection: "users" },
				required: true,
			},
			{
				name: "start_date",
				type: "date",
				required: true,
			},
			{
				name: "end_date",
				type: "date",
				required: true,
			},
		],
		access_strategy: {
			default: ["roles", ["admin"]],
			retrive: ["roles", ["admin", "voter"]],
			delete: "noone",
		},
	});
};
