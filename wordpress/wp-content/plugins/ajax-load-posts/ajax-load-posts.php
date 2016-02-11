<?php
/*
	Plugin Name: AJAX Load Posts
	Author: Steve Ferrar
	Version: 1.0
	Description: Load the next page of posts with AJAX (based on PBD Ajax Load Posts by http://www.problogdesign.com)
*/
 

function posts_alp_init() {

	global $wp_query;
 
	// Add code to index pages.
	if( !is_singular() ) {	
		
		// Queue JS file
		wp_enqueue_script(
			'posts-alp-load-posts',
			plugin_dir_url( __FILE__ ) . 'load-posts.js',
			array('jquery'),
			'1.0',
			true
		);
		
		// Grab page from query and max number of pages
		$max = $wp_query->max_num_pages;
		$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
		
		// Add some parameters for the JS.
		wp_localize_script(
			'posts-alp-load-posts',
			'posts_alp',
			array(
				'startPage' => $paged,
				'maxPages' => $max,
				'nextLink' => next_posts($max, false)
			)
		);
	}
 }
 add_action('template_redirect', 'posts_alp_init');
 ?>