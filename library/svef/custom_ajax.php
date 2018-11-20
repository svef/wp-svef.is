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

add_action('wp_ajax_nopriv_ajax_scrape_rss', 'ajax_scrape_rss');
add_action('wp_ajax_ajax_scrape_rss', 'ajax_scrape_rss');

function ajax_scrape_rss(){

	$tvinna =parseRssToJson ('https://tvinna.is/feed');

	print $tvinna;
	// IMPORTANT: don't forget to "exit"
	exit;
}
?>
