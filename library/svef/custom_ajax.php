<?php
add_action('wp_ajax_nopriv_ajax_request', 'ajax_handle_request');
add_action('wp_ajax_ajax_request', 'ajax_handle_request');

function ajax_handle_request(){

    $postID = $_POST['id'];
    if (isset($_POST['id'])){
        $post_id = $_POST['id'];
    }else{
        $post_id = "";
    }

    global $post;
    $post = get_post($postID);
		$acf = get_fields($postID);

    $response = array(
        'sucess' => true,
        'post' => $post,
				'id' => $postID ,
				'acf' => $acf
    );

    // generate the response
    print json_encode($response);

    // IMPORTANT: don't forget to "exit"
    exit;
}

// We register this function to be accessible to the wp-ajax handler that lives inside the bowels of wordpress
add_action('wp_ajax_nopriv_ajax_scrape_rss', 'ajax_scrape_rss'); // make shure you dont have to be logged in to the backend to access this.
add_action('wp_ajax_ajax_scrape_rss', 'ajax_scrape_rss');

function ajax_scrape_rss(){
	try {
		// we call our function defined in library/svef/custom-scraper.php
		$tvinna = parseRssToJson ('https://tvinna.is/feed');
		print $tvinna;
		// IMPORTANT: don't forget to "exit"
		exit;
	} catch (Exception $err ) {
		print json_encode($err, true);
	}
}






// We register this function to be accessible to the wp-ajax handler that lives inside the bowels of wordpress
// add_action('wp_ajax_nopriv_get_next_page', 'get_next_page'); // make shure you dont have to be logged in to the backend to access this.
add_action('wp_ajax_get_next_events_page', 'get_next_events_page');

function get_next_events_page(){
	$page_number = $_POST['curr_page'];

	global $post;
	$args = array (
		'post_type'       => 'events',
		'posts_per_page'	=>    5,
		'order'						=> 'ASC',
		'paged' 					=> $page_number + 1,

	);
	$the_query = new WP_Query( $args );
	$a_combined_post_data = [];
	$a_wp_posts = $the_query->posts;
	$wp_post = '';
	$acf_obj = '';
	for ($i=0; $i < count($a_wp_posts); $i++) {
		$wp_post = $a_wp_posts[$i];
		$wp_post->permalink = get_post_permalink($wp_post->ID);
		$wp_post->custom_excerpt = wp_trim_words( $wp_post->post_content, 55, '&hellip;' );
		$acf_obj = get_fields($wp_post->ID);

		$a_combined_post_data['post_data'][] = array('wp'  => $wp_post, 'acf'=> $acf_obj);
	}
	$a_combined_post_data['new_page_number'] = $page_number + 1;
	$a_combined_post_data['max_num_pages'] = $the_query->max_num_pages;

	$j_test = json_encode($a_combined_post_data, true);

	echo $j_test ;
	// IMPORTANT: don't forget to "exit"
	exit;
}



?>
