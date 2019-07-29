<?php

namespace DevDesigns\AcfCourseListBlock;



/**
 * Define constants for plugins version, path, and URL.
 *
 * @since 1.0.0
 *
 * @param string $version
 * @param string $filepath
 */
function defineConstants( string $version, string $filepath ): void {
	if ( ! defined( 'ACF_COURSE_LIST_BLOCK_VERSION' ) ) {
		define( 'ACF_COURSE_LIST_BLOCK_VERSION', $version );
	}

	if ( ! defined( 'ACF_COURSE_LIST_BLOCK_URL' ) ) {
		define( 'ACF_COURSE_LIST_BLOCK_URL', plugin_dir_url( $filepath ) );
	}

	if ( ! defined( 'ACF_COURSE_LIST_BLOCK_PATH' ) ) {
		define( 'ACF_COURSE_LIST_BLOCK_PATH', plugin_dir_path( $filepath ) );
	}
}
