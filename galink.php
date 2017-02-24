<?php
/**
 * Plugin Name: Google Analytics Link Tracking for WYSIWYG
 * Plugin URI: http://www.github.com/PavelK27/galink
 * Description: The simple plugin for adding Google Analytics Event tracking links via default WordPress WYSIWYG editor - TinyMCE. Please note, that you must have Google Analytics API (analytics.js) installed on your website in order for these links to work correctly.
 * Author: Pavel Korotenko
 * Version: 1.0
 * Author URI: http://www.github.com/PavelK27
 *
 * @package Google Analytics Link Tracking for WYSIWYG
 */

/**
 * Add Hooks for GA Link button if we're in the editor
 */
function galink_add_button() {
	global $typenow;
	// check user permissions.
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		return;
	}
	// verify the post type.
	if ( ! in_array( $typenow, array( 'post', 'page' ), true ) ) {
		return;
	}
	// check if WYSIWYG is enabled.
	if ( get_user_option( 'rich_editing' ) === 'true' ) {
	    add_filter( 'mce_external_plugins', 'galink_add_tinymce_plugin' );
	    add_filter( 'mce_buttons', 'galink_register_button' );
	}
}
add_action( 'admin_head', 'galink_add_button' );

/**
 * Adds js code for this plugin.
 *
 * @param array $plugin_array All TinyMCE Plugins.
 */
function galink_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['galink_button'] = plugins_url( '/text-button.js', __FILE__ );
	return $plugin_array;
}

/**
 * Adds button for this plugin.
 *
 * @param array $buttons All TinyMCE Buttons.
 */
function galink_register_button( $buttons ) {
	array_push( $buttons, 'galink_button' );
	return $buttons;
}

/**
 * Adds css for this plugin.
 */
function galink_css() {
	wp_enqueue_style( 'galink', plugins_url( '/style.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'galink_css' );

/**
 * Processes shortcode.
 *
 * @param array $atts shortcode attributes.
 */
function galink_process_shortcode( $atts ) {
	// Sanitize shortcode attributes.
	foreach ( $atts as $key => $value ) {
		$atts[ $key ] = sanitize_text_field( $value );
	}

	// Set link target.
	if ( 'true' === $atts['blank'] ) {
	    $target = 'target="_blank" ';
	} else {
	    $target = '';
	}

	return '<a href="' . $atts['url'] . '" ' . $target . 'onclick="ga(\'send\', \'event\', \'' . $atts['ecat'] . '\', \'' . $atts['eaction'] . '\', \'' . $atts['elabel'] . '\', \'' . $atts['evalue'] . '\');">' . $atts['title'] . '</a>';
}
add_shortcode( 'galink', 'galink_process_shortcode' );
