"use strict";

module.exports = function(App) {
	return App.createCollection({
		name: "voters",
		fields: [
			{
				name: "user",
				type: "single_reference",
				params: { collection: "users" },
				required: true,
			},
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
			{
				name: "email",
				type: "email",
				required: true,
			},
			{
				name: "document_type",
				type: "enum",
				params: {
					values: ["passport", "identity_card"],
				},
				required: true,
			},
			{
				name: "document_code",
				type: "text",
				required: true,
			},
		],
		access_strategy: {
			default: ["roles", ["admin"]],
			retrieve: ["or", ["same-voter", ["roles", ["admin"]]]],
			delete: "noone",
		},
	});
};
