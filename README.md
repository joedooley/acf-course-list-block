# Plugin Starter
Barebones starter plugin with composer autoloading and webpack.

## Installation

1. Clone plugin to WordPress plugin directory.
1. Rename plugin, constants in `bootstrap.php`, and update all namespaces to your own.
	1. Don't forget to update the namespace in `composer.json`
1. Run `npm install` from plugin root directory.
	1. The postinstall npm script runs `composer install` for you.
1. Run `npm run watch` from plugin root directory to watch for `scss` and `js` changes.

## Notes
- All class files in the `src` directory will be autoloaded by composer.
- Composer will not autoload PHP files that are not classes unless you add each file to the files array
in your `composer.json`. You will have to run `composer update` as well.
