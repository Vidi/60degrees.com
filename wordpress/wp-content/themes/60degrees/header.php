<?php
/**
	The template for displaying the HEADER from <div id="page-container"> until <div id="page-wrapper">
*/
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->

<head>
	
	<title>
		<?php
			global $page, $paged;
			wp_title( '|', true, 'right' );
			bloginfo( 'name' );
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'blanktheme' ), max( $paged, $page ) );
		?>
	</title>
	
	<?php // Meta SEO handled by plugin ?>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-144x144-precomposed.png" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.8.3.js"></script>

	<?php wp_head(); ?>
	
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<style type="text/css">
				.gradient {
					filter: none;
				}
			</style>
	<![endif]-->
	
</head>

<body <?php body_class(); ?>>

	<div id="page-container">

	<!--[if lt IE 7]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p><![endif]--> 

	<header id="header" class="header">

		<div class="container-fluid">

			<div class="header__logo col-xs-6 col-sm-3 col-md-2 col-lg-2">
				<a href="<?php echo home_url(); ?>" title="60 Degrees">
					<img src="<?php bloginfo('template_url'); ?>/img/60Degrees.png" alt="60 Degrees" />
				</a>
			</div>
					
			<div class="header__button col-xs-6 hidden-sm hidden-md hidden-lg">
				<a href="#" class="header__button-open js-menu-open"><img src="<?php bloginfo('template_url'); ?>/img/menu.png" alt="Menu" /></a>
			</div>
					
			<nav class="header__navigation js-header-navigation col-xs-12 col-sm-9 col-md-7 col-lg-6">
				<a href="#" class="header__button-close js-menu-close hidden-sm hidden-md hidden-lg"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt="Close" /></a>
				<div class="header__navigation-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</div>
			</nav>
					
			<nav class="header__buttons hidden-xs hidden-sm col-md-3 col-lg-4">
				<ul>
					<li><a href="<?php echo get_permalink(70); ?>" title="Sign Up" class="btn--sign-up"><i class="fa fa-user"></i><span>Sign Up</span></a></li>
					<li><a href="<?php echo get_permalink(68); ?>" title="Register" class="btn--register"><i class="fa fa-lock"></i><span>Register</span></a></li>
				</ul>
			</nav>
	
	</header>
	
	<div id="page-wrapper"><?php // footer.php: </div> ?>