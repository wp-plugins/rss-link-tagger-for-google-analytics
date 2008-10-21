<?php
/*
Plugin Name: RSS Link Tagger for Google Analytics
Plugin URI: http://trebel.nl/blog/rsslinktagger
Description: Modifies RSS permalinks to include utm query parameters, used by Google Analytics to track non-adwords advertising campaigns.
Version: v0.1
Author: Timan Rebel
Author URI: http://trebel.nl/
*/

/*  Copyright 2008 Timan Rebel  (email : wordpress@trebel.nl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function rsslinktagger($guid) {
	global $wp;
	
	if ($wp->request == 'feed') {
		
		$delimiter = '?';
		
		if (strpos ( $guid, '?' ) > 0)
			$delimiter = '&amp;';
		
		return $guid . $delimiter . 'utm_source=rss&amp;utm_medium=rss&amp;utm_campaign=rss';
	}
}

add_filter ( 'get_the_guid', 'rsslinktagger' );
add_filter ( 'the_permalink_rss', 'rsslinktagger' );

?>
