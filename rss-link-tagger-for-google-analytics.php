<?php
/*
Plugin Name: RSS Link Tagger for Google Analytics
Plugin URI: http://wordpress.rebelic.nl/rsslinktagger
Description: Modifies RSS permalinks to include utm query parameters, used by Google Analytics to track non-adwords advertising campaigns.
Version: 1.1.1
Author: Timan Rebel
Author URI: http://wordpress.rebelic.nl/
*/

function rsslinktagger($guid) {
	global $wp;

	if (strpos($wp->request, 'feed') !== false) {

		$delimiter = '?';

		if (strpos ( $guid, $delimiter ) > 0)
			$delimiter = '&amp;';

		return $guid . $delimiter . 'utm_source=rss&amp;utm_medium=rss&amp;utm_campaign=rss';
	}
}

//add_filter ( 'get_the_guid', 'rsslinktagger' );
add_filter ( 'the_permalink_rss', 'rsslinktagger' );

?>