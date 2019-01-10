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
    exit;
}

// We register this function to be accessible to the wp-ajax handler that lives inside the bowels of wordpress
add_action('wp_ajax_nopriv_ajax_scrape_rss', 'ajax_scrape_rss'); // make shure you dont have to be logged in to the backend to access this.
add_action('wp_ajax_ajax_scrape_rss', 'ajax_scrape_rss');

function ajax_scrape_rss(){
	try {
		// we call our function defined in library/svef-custom-functions/custom-scraper.php
		$tvinna = parseRssToJson('https://tvinna.is/feed');
		print $tvinna;
		exit;
	} catch (Exception $err ) {
		print json_encode($err, true);
	}
}

// We register this function to be accessible to the wp-ajax handler that lives inside the bowels of wordpress
add_action('wp_ajax_nopriv_get_next_page', 'get_next_page'); // make shure you dont have to be logged in to the backend to access this.
add_action('wp_ajax_get_next_page', 'get_next_page');
function get_next_page(){
	$page_number = $_POST['curr_page'];
	$s_post_type = $_POST['post_type'];
	global $post;
	$args = array(
		'events' => array (
			'post_type'       => $s_post_type,
			'posts_per_page'	=>    5,
			'order'						=> 'DESC',
			'meta_key'		=> 'event_start_date',
			'orderby'			=> 'meta_value',
			'paged' 					=> $page_number + 1,
		),
		'post' =>	array(
				'post_type'       => $s_post_type,
				'posts_per_page'	=>    5,
				'order'						=> 'DESC',
				'paged' 					=> $page_number + 1,
		)
	);
	;
	$the_query = new WP_Query( $args[$s_post_type] );
	$a_combined_post_data = [];
	$a_wp_posts = $the_query->posts;
	$wp_post = '';
	$acf_obj = '';
	for ($i=0; $i < count($a_wp_posts); $i++) {
		$wp_post = $a_wp_posts[$i];
		$wp_post->permalink = get_permalink($wp_post->ID);
		$acf_obj = get_fields($wp_post->ID);
		if($s_post_type == 'events') {
			$event_is_over = strtotime($acf_obj['event_start_date']) < time() ? true : false;
			$event_is_over_class = $event_is_over ? ' section__event--passed ' : '';
			$local_date = date_i18n("d M Y", strtotime($acf_obj['event_start_date']));
			$wp_post->custom_excerpt = wp_trim_words( $wp_post->post_content, 55, '...' );
			$wp_post->event_is_over = $event_is_over;
			$wp_post->event_is_over_class = $event_is_over_class;
			$wp_post->local_date = $local_date;
		}
		if($s_post_type == 'post') {
			$wp_post->custom_excerpt = wp_trim_words( $wp_post->post_content, 20, '...' );
			$pub_date = date_i18n( 'j M Y', strtotime( $wp_post->post_date ) );
			$wp_post->localised_date = $pub_date;
		}

		$a_combined_post_data['post_data'][] = array('wp'  => $wp_post, 'acf'=> $acf_obj);
	}
	$a_combined_post_data['new_page_number'] = $page_number + 1;
	$a_combined_post_data['max_num_pages'] = $the_query->max_num_pages;
	$j_posts = json_encode($a_combined_post_data, true);
	echo $j_posts;
	exit;
}



add_action('wp_ajax_nopriv_submitPostlist', 'submitPostlist'); // make sure you dont have to be logged in to the backend to access this.
add_action('wp_ajax_submitPostlist', 'submitPostlist');
function submitPostlist(){

	$input_values['input_2'] = $_POST['email'];
	$form_id = (int)$_POST['formId'];
	$result = GFAPI::submit_form( $form_id, $input_values );
	$j_result = json_encode($result, true);
	echo $j_result;

	exit;
}

?>
