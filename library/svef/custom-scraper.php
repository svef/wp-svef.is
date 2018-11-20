<?php
if(!function_exists()) {
	function scrapeTvinna($url){
			$context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
			$response = file_get_contents($url, false, $context);
			$html = str_get_html($response);
			$a_job = array();
			$i = 0;
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
if(!function_exists()){
	function parseRssToJson ($url) {
		$content = file_get_contents($url); // get XML string
		$x = new SimpleXmlElement($content); // load XML string into object
		$arrOfJobs = array();
		// loop through posts
		$i = 0;
		foreach($x->channel->item as $entry) {

			$arrOfJobs[] = array( 'rss' => $entry, 'scrape' => scrapeTvinna($entry->link));
			$i++;
			if($i >= 4 ) {
				break;
			}
		}
		// return $jRes;
		$jRes = json_encode($arrOfJobs, JSON_UNESCAPED_SLASHES);
		return $jRes;
	}

}
?>
