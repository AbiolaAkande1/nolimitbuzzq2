<?php

/**
 * Plugin Name: Nolimitbuzz Q2
 * Description: Creates a custom portfolio post type with categories and shortcode display
 * Version: 1.0
 * Author: Abiola Akande
 * Text Domain: nolimitbuzz-q2
 */

// If this file is called directly, abort.
if (! defined('ABSPATH')) {
	exit;
}

// Define plugin constants
define('CUSTOM_PORTFOLIO_VERSION', '1.0.0');
define('CUSTOM_PORTFOLIO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CUSTOM_PORTFOLIO_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required files
require_once CUSTOM_PORTFOLIO_PLUGIN_DIR . 'includes/class-custom-portfolio.php';
require_once CUSTOM_PORTFOLIO_PLUGIN_DIR . 'includes/class-custom-portfolio-activator.php';
require_once CUSTOM_PORTFOLIO_PLUGIN_DIR . 'includes/class-custom-portfolio-deactivator.php';

// Activation Hook
register_activation_hook(__FILE__, array('Custom_Portfolio_Activator', 'activate'));

// Deactivation Hook
register_deactivation_hook(__FILE__, array('Custom_Portfolio_Deactivator', 'deactivate'));

// Initialize the plugin
function run_custom_portfolio() {
	$plugin = new Custom_Portfolio();
	$plugin->run();
}
run_custom_portfolio();
