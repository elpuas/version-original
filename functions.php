<?php
/**
 * Version Original Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Version_Original
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'VERSION_ORIGINAL_VERSION', '1.0.0' );
define( 'VERSION_ORIGINAL_THEME_DIR', get_template_directory() );
define( 'VERSION_ORIGINAL_THEME_URI', get_template_directory_uri() );

/**
 * Enqueue block editor assets.
 */
function version_original_block_editor_assets() {
	// Editor Scripts
	$editor_script_asset = require_once VERSION_ORIGINAL_THEME_DIR . '/build/index.asset.php';
	
	wp_enqueue_script(
		'version-original-editor-script',
		get_theme_file_uri( '/build/index.js' ),
		$editor_script_asset['dependencies'],
		$editor_script_asset['version'],
		true
	);

	// Editor Styles
	wp_enqueue_style(
		'version-original-editor-style',
		get_theme_file_uri( '/build/index.css' ),
		array(),
		$editor_script_asset['version']
	);
}
add_action( 'enqueue_block_editor_assets', 'version_original_block_editor_assets' );

/**
 * Enqueue frontend assets.
 */
function version_original_frontend_assets() {
	// Only load frontend scripts if they exist
	if ( file_exists( VERSION_ORIGINAL_THEME_DIR . '/build/index.asset.php' ) ) {
		$frontend_asset = require_once VERSION_ORIGINAL_THEME_DIR . '/build/index.asset.php';
		
		wp_enqueue_script(
			'version-original-frontend-script',
			get_theme_file_uri( '/build/index.js' ),
			$frontend_asset['dependencies'],
			$frontend_asset['version'],
			true // Load in footer for better performance
		);

        wp_enqueue_style(
            'version-original-editor-style',
            get_theme_file_uri( '/build/index.css' ),
            array(),
            $frontend_asset['version']
        );
	}
}
add_action( 'wp_enqueue_scripts', 'version_original_frontend_assets' );

function version_original_register_acf_blocks() {
    register_block_type( __DIR__ . '/acf-blocks/menu-block' );
}

add_action( 'init', 'version_original_register_acf_blocks' );