<?php
/**
 * Plugin Name: Plugin Starter
 * Description: WordPress starter plugin utilizing webpack and composer autoloading.
 * Version:     1.0.0
 * Author:      Developing Designs
 *
 * @package     DevDesigns\PluginStarter
 * @author      Developing Designs
 * @since       1.0.0
 */

namespace DevDesigns\PluginStarter;



/**
 * Require Composer autoloader.
 *
 * @since 1.0.0
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}


/*
 * Plugin directory.
 *
 * @since 1.0.0
 */
if ( ! defined( 'PLUGIN_STARTER_VERSION' ) ) {
	define( 'PLUGIN_STARTER_VERSION', '1.0.0' );
}

if ( ! defined( 'PLUGIN_STARTER_URL' ) ) {
	define( 'PLUGIN_STARTER_URL', plugin_dir_url( __FILE__ ) );
}


/*
 * Bootstrap plugin files that aren't autoloaded by composer.
 *
 * @since 1.0.0
 */
add_action( 'plugins_loaded', function (): void {
	add_action( 'wp_enqueue_scripts', 'DevDesigns\PluginStarter\Assets\Enqueue::enqueue' );
} );


