const config = require('@silverstripe/eslint-config/.eslintrc');

// disabled just as easy fix solution
config["rules"]["import/no-unresolved"] = "off";
config["rules"]["import/extensions"] = "off";

module.exports = config;


