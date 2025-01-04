<?php

/**
 * Handles the registration of the custom post type and taxonomy
 */
class Custom_Portfolio_Post_Type {
	public function register_post_type() {
		$labels = array(
			'name'               => __('Portfolio', 'custom-portfolio'),
			'singular_name'      => __('Portfolio Item', 'custom-portfolio'),
			'menu_name'          => __('Portfolio', 'custom-portfolio'),
			'add_new'           => __('Add New', 'custom-portfolio'),
			'add_new_item'      => __('Add New Portfolio Item', 'custom-portfolio'),
			'edit_item'         => __('Edit Portfolio Item', 'custom-portfolio'),
			'new_item'          => __('New Portfolio Item', 'custom-portfolio'),
			'view_item'         => __('View Portfolio Item', 'custom-portfolio'),
			'search_items'      => __('Search Portfolio', 'custom-portfolio'),
			'not_found'         => __('No portfolio items found', 'custom-portfolio'),
			'not_found_in_trash' => __('No portfolio items found in Trash', 'custom-portfolio'),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'has_archive'         => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-portfolio',
			'supports'            => array('title', 'editor', 'thumbnail'),
			'hierarchical'        => false,
			'rewrite'            => array('slug' => 'portfolio'),
			'capability_type'     => 'post',
		);

		register_post_type('portfolio', $args);
	}

	public function register_taxonomy() {
		$labels = array(
			'name'              => __('Portfolio Categories', 'custom-portfolio'),
			'singular_name'     => __('Portfolio Category', 'custom-portfolio'),
			'search_items'      => __('Search Portfolio Categories', 'custom-portfolio'),
			'all_items'         => __('All Portfolio Categories', 'custom-portfolio'),
			'parent_item'       => __('Parent Portfolio Category', 'custom-portfolio'),
			'parent_item_colon' => __('Parent Portfolio Category:', 'custom-portfolio'),
			'edit_item'         => __('Edit Portfolio Category', 'custom-portfolio'),
			'update_item'       => __('Update Portfolio Category', 'custom-portfolio'),
			'add_new_item'      => __('Add New Portfolio Category', 'custom-portfolio'),
			'new_item_name'     => __('New Portfolio Category Name', 'custom-portfolio'),
			'menu_name'         => __('Portfolio Categories', 'custom-portfolio'),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'portfolio-category'),
		);

		register_taxonomy('portfolio_category', 'portfolio', $args);
	}
}
