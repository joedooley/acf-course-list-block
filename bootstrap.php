<?php
/**
 * Plugin Name: ACF Course List Block
 * Plugin URI:   https://developingdesigns.com/
 * Description: Adds a gutenberg block to display videos within a course.
 * Author:       Developing Designs
 * Author URI:   https://developingdesigns.com/
 * Version:      1.0.0
 * Tested up to: 5.2.2
 * Text Domain:  acf-hero-section
 * Domain Path:  /lang
 *
 * @package     DevDesigns\AcfCourseListBlock
 * @author      Developing Designs
 * @since       1.0.0
 */

use function DevDesigns\AcfCourseListBlock\defineConstants;



/**
 * Require Composer autoloader.
 *
 * @since 1.0.0
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}


/**
 * Initialize constants.
 *
 * @since 1.0.0
 */
if ( function_exists( 'DevDesigns\AcfHeroSection\defineConstants' ) ) {
	defineConstants( '1.0.0', __FILE__ );
}


/**
 * Bootstrap plugin.
 *
 * @since 1.0.0
 */
add_action( 'plugins_loaded', function (): void {
	add_action( 'wp_enqueue_scripts', 'DevDesigns\PluginStarter\Assets\Enqueue::enqueue', 999 );
} );


