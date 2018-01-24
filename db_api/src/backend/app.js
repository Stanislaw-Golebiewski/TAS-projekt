const Sealious = require("sealious");
const uuid = require("uuid/v4");

const App = new Sealious.App();

const dependencies = [
	"access-strategies/roles.js",
	"access-strategies/same-voter.js",
	"field-types/role.js",
	"collections/users.js",
	"collections/voters.js",
	"collections/voting.js",
	"collections/voted_in.js",
	"collections/admins.js",
	"collections/candidates.js",
	"collections/fractions.js",
	"collections/lists.js",
];

dependencies.forEach(dependency => require(`./${dependency}`)(App));

module.exports = {
	start: () => App.start().then(after_start),
	_app: App,
};

function after_start() {
	return App.run_action(
		new App.Sealious.SuperContext(),
		["collections", "users"],
		"show",
		{ filter: { username: "admin" } }
	).then(function(results) {
		if (results.length === 0) {
			const random_password = uuid();
			return App.run_action(
				new App.Sealious.SuperContext(),
				["collections", "users"],
				"create",
				{
					username: "admin",
					password: random_password,
					role: "admin",
				}
			)
				.then(() =>
					console.log(
						`\n\n\n
                        Created admin account with random password:
                        ${random_password}
                        Remember to change it after the first login!
                        \n\n\n`
					)
				)
				.catch(error => console.log(JSON.stringify(error.message)));
		} else return null;
	});
}
