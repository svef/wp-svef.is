<?php
	function winners_func() {
		// creating (registering) the custom type
		register_post_type( 'winners', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array(
				'labels' => array(
					'name' => _x('winners', 'Post Type General Name', 'foundationpress'),
					'singular_name' => _x('Winners', 'Post Type Singular Name', 'foundationpress'),
					'menu_name' => __('Winners', 'foundationpress'),
					'name_admin_bar' => __('Winners posts', 'foundationpress'),
					'archives' => __('Winners Archives', 'foundationpress'),
					'attributes' => __('winners Attributes', 'foundationpress'),
					'parent_item_colon' => __('Parent Item:', 'foundationpress'),
					'all_items' => __('All winners', 'foundationpress'),
					'add_new_item' => __('Add New winners', 'foundationpress'),
					'add_new' => __('Add Winners', 'foundationpress'),
					'new_item' => __('New Winners', 'foundationpress'),
					'edit_item' => __('Edit winners', 'foundationpress'),
					'update_item' => __('Update winners', 'foundationpress'),
					'view_item' => __('View Winners', 'foundationpress'),
					'view_items' => __('View Winners', 'foundationpress'),
					'search_items' => __('Search Winners', 'foundationpress'),
					'not_found' => __('Not found', 'foundationpress'),
					'not_found_in_trash' => __('Not found in Trash', 'foundationpress'),
					'featured_image' => __('Featured Image', 'foundationpress'),
					'set_featured_image' => __('Set featured image', 'foundationpress'),
					'remove_featured_image' => __('Remove featured image', 'foundationpress'),
					'use_featured_image' => __('Use as featured image', 'foundationpress'),
					'insert_into_item' => __('Insert into winners', 'foundationpress'),
					'uploaded_to_this_item' => __('Uploaded to this item', 'foundationpress'),
					'items_list' => __('Winners list', 'foundationpress'),
					'items_list_navigation' => __('Winners list navigation', 'foundationpress'),
					'filter_items_list' => __('Filter winners list', 'foundationpress'),
				), /* end of arrays */
				'label' => __('winners', 'foundationpress'),
				'description' => __('post for winners sections', 'foundationpress'),

				'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies' => array( 'winners_cat'),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 5,
				'menu_icon' => 'dashicons-awards',
				'show_in_admin_bar' => true,
				'show_in_nav_menus' => true,
				'can_export' => true,
				'has_archive' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'capability_type' => 'post',
				// 'show_in_rest' => true,
			) /* end of options */
		); /* end of register post type */

		/* this adds your post categories to your custom post type */
		// register_taxonomy_for_object_type( 'category', 'custom_type' );
		/* this adds your post tags to your custom post type */
		// register_taxonomy_for_object_type( 'post_tag', 'custom_type' );

	}

		// adding the function to the Wordpress init
	add_action( 'init', 'winners_func');

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'winners_cat',
		array('winners'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Winers categories', 'foundationpress' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Winner category', 'foundationpress' ), /* single taxonomy name */
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

	register_taxonomy( 'winners_tag',
		array('winners'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Winers tags', 'foundationpress' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Winner tag', 'foundationpress' ), /* single taxonomy name */
				'search_items' =>  __( 'Search tags', 'foundationpress' ), /* search title for taxomony */
				'all_items' => __( 'All tags', 'foundationpress' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent tag', 'foundationpress' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent tag:', 'foundationpress' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit tag', 'foundationpress' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update tag', 'foundationpress' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New tag', 'foundationpress' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Category Name', 'foundationpress' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'type' ),
		)
	);

?>
