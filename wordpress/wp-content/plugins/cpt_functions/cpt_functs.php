<?php
/*
	Plugin Name: CPT Plugin
	Author: Steve Ferrar
	Version: 1.0
*/

$cptPluginsInit = new cptPlugins();

class cptPlugins {

	function __construct() {
		add_action('init', array($this, 'cptInit'));
		add_theme_support('thumbnails');
		
	}
	
	function cptInit() {			
		
		register_post_type(
			'speakers',
			array(
				'labels' => array(
					'name' => 'Speakers',
					'singular_name' => 'Speakers'
				),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				// 'rewrite' => true,
				'rewrite' => array( 'slug' => 'speakers' ),
				'hierarchical' => true, // Heirachical, drag/drop option
				'menu_position' => null,
				'has_archive' => true,
				'capability_type' => 'post',
				'supports' => array(
					'title',
					'editor'
				)
			)
		);
	}
};

?>