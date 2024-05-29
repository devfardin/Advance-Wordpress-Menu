<?php
/**
 * Plugin Name: Cf Plugin
 * Plugin URI: https://devzet.com
 * Description: Custom plugin for Axiusweb.com
 * Version: 0.1.2
 * Author: Devzet
 * Author URI: https://devzet.com
 * Text Domain: cf-plugin
 */

if( ! defined( 'ABSPATH' ) ) {
    die( 'Please do not access directly!' );
};

define ( 'CF_ASSETS_URI', plugin_dir_url( __FILE__ ) . 'assets' );
define ( 'CF_VERSION', '1.2.3' );





function cf_elementor_addon( $widgets_manager ) {;
	require_once( __DIR__ . '/includes/widgets/nav-menu.php' );
	$widgets_manager->register( new \Elementor_nav_menu());
}
add_action( 'elementor/widgets/register', 'cf_elementor_addon' );


// Register all css file
function render_style(){


}

add_action( 'wp_enqueue_scripts', 'render_style' );