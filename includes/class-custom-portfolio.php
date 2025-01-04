<?php

/**
 * The core plugin class
 */
class Custom_Portfolio {
	protected $loader;
	protected $version;

	public function __construct() {
		$this->version = CUSTOM_PORTFOLIO_VERSION;
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once CUSTOM_PORTFOLIO_PLUGIN_DIR . 'includes/class-custom-portfolio-post-type.php';
		require_once CUSTOM_PORTFOLIO_PLUGIN_DIR . 'includes/class-custom-portfolio-shortcode.php';
	}

	private function define_admin_hooks() {
		$post_type = new Custom_Portfolio_Post_Type();
		add_action('init', array($post_type, 'register_post_type'));
		add_action('init', array($post_type, 'register_taxonomy'));
	}

	private function define_public_hooks() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));

		$shortcode = new Custom_Portfolio_Shortcode();
		add_shortcode('portfolio', array($shortcode, 'render_shortcode'));
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			'custom-portfolio',
			CUSTOM_PORTFOLIO_PLUGIN_URL . '/assets/css/portofolio.css',
			array(),
			$this->version,
			'all'
		);
	}

	public function run() {
		// Initialize all hooks
		do_action('custom_portfolio_init');
	}
}
