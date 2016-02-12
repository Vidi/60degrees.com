<?php 
/** 
	Actions & Filters
*/

// ACTIONS
	add_action('login_enqueue_scripts', 'my_login_stylesheet' );

// FILTERS
	add_filter('login_headerurl', 'my_login_logo_url');
	add_filter('login_headertitle', 'my_login_logo_url_title');


/** 
	Login Stylesheet 
*/

// Custom Login Stylesheet	  
	function my_login_stylesheet() { ?>
		<link rel="stylesheet" id="custom_wp_admin_css"	 href="<?php echo get_bloginfo( 'stylesheet_directory' ) . '/css/style-login.css'; ?>" type="text/css" media="all" />
	<?php };
		
	// Custom Login Logo URL	
	function my_login_logo_url() {
		return get_bloginfo( 'url' );
	};
	
	function my_login_logo_url_title() {
		return '60 Degrees';
	};


/** 
	Read More Button
*/

// Add classes .btn and .btn--blue
	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');

	function posts_link_attributes() {
	    return 'class="btn btn--blue"';
	}


/** 
	Excerpts
*/

// Excerpt Length
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'&hellip;';
		} else {
			$excerpt = implode(" ",$excerpt);
		} 
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'&hellip;';
		} else {
			$content = implode(" ",$content);
		} 
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}


/** 
	Menus
*/

// Register Header Menu
	function register_my_menu() {
	  register_nav_menu('header-menu',__( 'Header Menu' ));
	  register_nav_menu('footer-menu-1',__( 'Footer Menu 1' ));
	  register_nav_menu('footer-menu-2',__( 'Footer Menu 2' ));
	}
	add_action( 'init', 'register_my_menu' );


/** 
	Images 
*/

// Set post thumbnail size
	
	if(function_exists('add_image_size')) { 
		// Set image size
		add_image_size( 'carousel-image', 1920, 720, true);
		add_image_size( 'news-image', 840, 430, true);
		add_image_size( 'quote-image', 1600, 640, true);
		add_image_size( 'people-image', 320, 320, true);
		// Dynamic image size
		// add_image_size( 'header-image', 1440, 9999, false);
	};


/** 
	Custom Editors
*/

//Edit tiny MCE to remove elements
	if (isset($wp_version)) {
		add_filter("mce_buttons", "extended_editor_mce_buttons", 0);
		add_filter("mce_buttons_2", "extended_editor_mce_buttons_2", 0);
	}

// First toolbar line
	function extended_editor_mce_buttons($buttons) {
		return array(
			"bold", 
			"italic", 
			"underline", 
			"strikethrough",
			"separator",
			"bullist", 
			"numlist", 
			// "blockquote", 
			"hr", 
			// "removeformat", 
			"separator",
			"justifyleft", 
			"justifycenter", 
			"justifyright", 
			"seperator",
			"undo", 
			"redo", 
			"separator", 
			"link", 
			"unlink", 
			"separator", 
			"code", 
			"separator"
		);
	}
	

// Second toolbar line
	function extended_editor_mce_buttons_2($buttons) {
		return array(
		);
	}


/** 
	Admin Bar 
*/

// Remove Admin Bar Front End
	add_filter('show_admin_bar', '__return_false');
