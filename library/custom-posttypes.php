<?php
	function events_func() {
		// creating (registering) the custom type
		register_post_type( 'events', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Events', 'foundationpress' ), /* This is the Title of the Group */
				'singular_name' => __( 'Event', 'foundationpress' ), /* This is the individual type */
				'all_items' => __( 'All Events', 'foundationpress' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'foundationpress' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Event', 'foundationpress' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'foundationpress' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Event', 'foundationpress' ), /* Edit Display Title */
				'new_item' => __( 'New Event', 'foundationpress' ), /* New Display Title */
				'view_item' => __( 'View Event', 'foundationpress' ), /* View Display Title */
				'search_items' => __( 'Search Events', 'foundationpress' ), /* Search Custom Type Title */
				'not_found' =>  __( 'Nothing found in the Database.', 'foundationpress' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'Nothing found in Trash', 'foundationpress' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'This is the Events post type', 'foundationpress' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => false,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
				'menu_icon' => 'dashicons-money', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => false, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
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
