<?php

/**
 * Fired during plugin activation
 */
class Custom_Portfolio_Activator {
	public static function activate() {
		// Register post type and taxonomy on activation
		$post_type = new Custom_Portfolio_Post_Type();
		$post_type->register_post_type();
		$post_type->register_taxonomy();

		// Clear permalinks
		flush_rewrite_rules();
	}
}
