<?php
	function boardmembers_func() {
		// creating (registering) the custom type
		register_post_type( 'boardmembers', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array(
				'labels' => array(
					'name' => _x('Boardmembers', 'Post Type General Name', 'foundationpress'),
					'singular_name' => _x('Boardmembers', 'Post Type Singular Name', 'foundationpress'),
					'menu_name' => __('Boardmembers', 'foundationpress'),
					'name_admin_bar' => __('Boardmember posts', 'foundationpress'),
					'archives' => __('Boardmember Archives', 'foundationpress'),
					'attributes' => __('Boardmember Attributes', 'foundationpress'),
					'parent_item_colon' => __('Parent Boardmember:', 'foundationpress'),
					'all_items' => __('All Boardmember', 'foundationpress'),
					'add_new_item' => __('Add New Boardmember', 'foundationpress'),
					'add_new' => __('Add New', 'foundationpress'),
					'new_item' => __('New Boardmember', 'foundationpress'),
					'edit_item' => __('Edit Boardmember', 'foundationpress'),
					'update_item' => __('Update Boardmember', 'foundationpress'),
					'view_item' => __('View Boardmember', 'foundationpress'),
					'view_items' => __('View Boardmembers', 'foundationpress'),
					'search_items' => __('Search Boardmembers', 'foundationpress'),
					'not_found' => __('Not found', 'foundationpress'),
					'not_found_in_trash' => __('Not found in Trash', 'foundationpress'),
					'featured_image' => __('Featured Image', 'foundationpress'),
					'set_featured_image' => __('Set featured image', 'foundationpress'),
					'remove_featured_image' => __('Remove featured image', 'foundationpress'),
					'use_featured_image' => __('Use as featured image', 'foundationpress'),
					'insert_into_item' => __('Insert into Boardmember', 'foundationpress'),
					'uploaded_to_this_item' => __('Uploaded to this Boardmember', 'foundationpress'),
					'items_list' => __('Boardmembers list', 'foundationpress'),
					'items_list_navigation' => __('Boardmembers list navigation', 'foundationpress'),
					'filter_items_list' => __('Filter Boardmembers list', 'foundationpress'),
				), /* end of arrays */
				'label' => __('boardmembers', 'foundationpress'),
				'description' => __('post for boardmembers sections', 'foundationpress'),

				'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies' => array('boardmembers_cat', 'boardmembers_year'),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-groups',
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
	add_action( 'init', 'boardmembers_func');

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'boardmembers_cat',
		array('boardmembers'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
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

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'boardmembers_year',
		array('boardmembers'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Boardmember Year', 'foundationpress' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Boardmember Year', 'foundationpress' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Boardmember Years', 'foundationpress' ), /* search title for taxomony */
				'all_items' => __( 'All Categories', 'foundationpress' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Boardmember Year', 'foundationpress' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Boardmember Year:', 'foundationpress' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Boardmember Year', 'foundationpress' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Boardmember Year', 'foundationpress' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Boardmember Year', 'foundationpress' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Boardmember Year Name', 'foundationpress' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'type' ),
		)
	);

?>
