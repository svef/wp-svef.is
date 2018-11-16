<?php
	function events_func() {
		// creating (registering) the custom type
		register_post_type( 'events', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array(
				'labels' => array(
					'name' => _x('events', 'Post Type General Name', 'foundationpress'),
					'singular_name' => _x('Event', 'Post Type Singular Name', 'foundationpress'),
					'menu_name' => __('Events', 'foundationpress'),
					'name_admin_bar' => __('Event posts', 'foundationpress'),
					'archives' => __('Item Archives', 'foundationpress'),
					'attributes' => __('Item Attributes', 'foundationpress'),
					'parent_item_colon' => __('Parent Item:', 'foundationpress'),
					'all_items' => __('All Items', 'foundationpress'),
					'add_new_item' => __('Add New Item', 'foundationpress'),
					'add_new' => __('Add New', 'foundationpress'),
					'new_item' => __('New Item', 'foundationpress'),
					'edit_item' => __('Edit Item', 'foundationpress'),
					'update_item' => __('Update Item', 'foundationpress'),
					'view_item' => __('View Item', 'foundationpress'),
					'view_items' => __('View Items', 'foundationpress'),
					'search_items' => __('Search Item', 'foundationpress'),
					'not_found' => __('Not found', 'foundationpress'),
					'not_found_in_trash' => __('Not found in Trash', 'foundationpress'),
					'featured_image' => __('Featured Image', 'foundationpress'),
					'set_featured_image' => __('Set featured image', 'foundationpress'),
					'remove_featured_image' => __('Remove featured image', 'foundationpress'),
					'use_featured_image' => __('Use as featured image', 'foundationpress'),
					'insert_into_item' => __('Insert into item', 'foundationpress'),
					'uploaded_to_this_item' => __('Uploaded to this item', 'foundationpress'),
					'items_list' => __('Items list', 'foundationpress'),
					'items_list_navigation' => __('Items list navigation', 'foundationpress'),
					'filter_items_list' => __('Filter items list', 'foundationpress'),
				), /* end of arrays */
				'label' => __('events', 'foundationpress'),
				'description' => __('post for events sections', 'foundationpress'),

				'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies' => array('category', 'post_tag'),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-location-alt',
				'show_in_admin_bar' => true,
				'show_in_nav_menus' => true,
				'can_export' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'post',
				'show_in_rest' => true,
			) /* end of options */
		); /* end of register post type */

		/* this adds your post categories to your custom post type */
		// register_taxonomy_for_object_type( 'category', 'custom_type' );
		/* this adds your post tags to your custom post type */
		// register_taxonomy_for_object_type( 'post_tag', 'custom_type' );

	}

		// adding the function to the Wordpress init
	add_action( 'init', 'events_func');

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'events_cat',
		array('events'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Categories', 'foundationpress' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Category', 'foundationpress' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Categories', 'foundationpress' ), /* search title for taxomony */
				'all_items' => __( 'All Categories', 'foundationpress' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Category', 'foundationpress' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Category:', 'foundationpress' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Category', 'foundationpress' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Category', 'foundationpress' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Category', 'foundationpress' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Category Name', 'foundationpress' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'type' ),
		)
	);

?>
