<?php
if(!function_exists('scrapeTvinna')) {
	function scrapeTvinna($url){
		// we are using a php pluggin called simple_html_dom and below we are calling it to find elements in the page we are going to crawl, in this case tvinna.is

			// in the documentation for simple_html_dom you would use a function called file_get_html and then just start itterating through the resaults but we got hit by a bool false responce, So I found this context solution where the header context is set and then you can get the file.
			$context = stream_context_create(array('https' => array('header' => 'User-Agent: Mozilla compatible')));

			//  so now we can get the responce
			$response = file_get_contents($url, false, $context);
			// we parse the responce
			$html = str_get_html($response);

			// create an empty array for our data to be stored in
			$a_job = array();
			// we want to break out of each loop after one itteration so we don't get caught in an endless loop
			$i = 0;

			// wee need to loop to differnt depths of the responce and there fore we need different loops to get to the data we need
			foreach($html->find('div[class="job-info-bar"] span[class="company"]') as $company){
				$i++;
				$a_job['company'] = $company->nodes[0]->nodes[0]->_[4];
				//  break;
				if($i > 0) {
					break;
				}
			}
			foreach($html->find('div[class="job-info-bar"] span[class="date"]') as $company){
				$i++;
				$a_job['date'] = $company->nodes[0]->_[4];
				//  break;
				if($i > 0) {
					break;
				}
			}
			foreach($html->find('section[class="job-listing"] article[class="job-detail"]') as $company){
				$i++;
				$a_job['title'] = $company->nodes[0]->parent->children[0]->nodes[0]->_[4];
				//  break;
				if($i > 0) {
					break;
				}
			}
			return $a_job;
	}
}

if(!function_exists('parseRssToJson')){
	function parseRssToJson ($url) {
		// we have a rss feed url taht we can use to get the XML string
		$content = file_get_contents($url); // get XML string
		$x = new SimpleXmlElement($content); // load XML string into object

		$arrOfJobs = array();
		// loop through posts
		$i = 0;
		foreach($x->channel->item as $entry) {

			$arrOfJobs[] = array( 'rss' => $entry, 'scrape' => scrapeTvinna($entry->guid));
			$i++;
			// we limit our response to 4 items because we are only goint to show 4 cards on the page
			if($i >= 4 ) {
				break;
			}
		}

		// We are going to use this Feed with javaScript so we parse our $arrayOfJobs to a JSON object
		$jRes = json_encode($arrOfJobs, JSON_UNESCAPED_SLASHES);
		return $jRes;
	}

}



// add_filter('wp_handle_upload_prefilter', 'wpse47415_pre_upload');
// add_filter('wp_handle_upload', 'wpse47415_post_upload');

// function wpse47415_pre_upload($file){
// 		$extension = substr(strrchr($file['name'],'.'),1);
// 		if(!empty($file['error']) ||  $extension != 'svg') { return $path; }
// 		add_filter('upload_dir', 'wpse47415_custom_upload_dir');
// 		$file['name'] = $file['name'].'.php';
//     return $file;
// }

// function wpse47415_post_upload($fileinfo){
//     remove_filter('upload_dir', 'wpse47415_custom_upload_dir');
//     return $fileinfo;
// }

// function wpse47415_custom_upload_dir($path){
//     $extension = substr(strrchr($_POST['name'],'.'),1);
//     if(!empty($path['error']) ||  $extension != 'svg') { return $path; } //error or other filetype; do nothing.
//     $customdir = '/svg';
//     $path['path']    = str_replace($path['subdir'], '', $path['path']); //remove default subdir (year/month)
//     $path['url']     = str_replace($path['subdir'], '', $path['url']);
//     $path['subdir']  = $customdir;
//     $path['path']   .= '/test';
// 		$path['url']    .= $customdir;
// 		// var_dump($path);
//     return $path;
// }
// function cc_mime_types($mimes) {
// 	$mimes['svg'] = 'image/svg+xml';
// 	$mimes['svg.php'] = 'image/svg+xml';
//   return $mimes;
// }
// add_filter('upload_mimes', 'cc_mime_types');
// if( function_exists('acf_add_options_page') ) {

// 	acf_add_options_page();

// }

?>
