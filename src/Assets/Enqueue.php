<?php
/**
 * Enqueue webpack compiled js and css.
 *
 * @package     DevDesigns\PluginStarter
 * @author      Developing Designs
 * @since       1.0.0
 */

namespace DevDesigns\PluginStarter\Assets;



class Enqueue {
	public static function enqueue (): void {
		self::scripts();
		self::styles();
	}


	private static function styles(): void {
		wp_enqueue_style(
			'plugin-starter/main.css',
			PLUGIN_STARTER_URL . '/dist/styles/main.css',
			[],
			PLUGIN_STARTER_VERSION
		);
	}


	private static function scripts(): void {
		wp_enqueue_script(
			'plugin-starter/main.js',
			PLUGIN_STARTER_URL . '/dist/scripts/main.js',
			[],
			PLUGIN_STARTER_VERSION,
			true
		);
	}
}
