<?php

/**
 * Fired during plugin deactivation
 */
class Custom_Portfolio_Deactivator {
	public static function deactivate() {
		// Unregister post type and taxonomy
		unregister_post_type('portfolio');
		unregister_taxonomy('portfolio_category');

		// Clear permalinks
		flush_rewrite_rules();
	}
}
