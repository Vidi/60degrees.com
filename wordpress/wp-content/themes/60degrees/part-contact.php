<?php
/**
The template part for displaying the CONTACT section.
*/

// Place objects into $data array
$data = (object)array();
if ( function_exists('get_field') ) {
	$location = get_field('map');
	$data->locationLng = $location['lng'];
	$data->locationLat = $location['lat'];
	$data->locationURL = get_bloginfo('template_url') . '/img/map@2x.png';
	
	$data->shortcode = '[contact-form-7 id="6" title="Contact"]';

	$data->intro = get_field('intro');
	$data->address = get_field('address');
	$data->phone = get_field('phone');
	$data->email = get_field('email');
	$data->websiteURL = get_field('website');
	if(substr((str_replace(array('http://','https://'), '', $data->websiteURL)), -1) == '/') {
	    $data->website = substr((str_replace(array('http://','https://'), '', $data->websiteURL)), 0, -1);
	} else {
		$data->website = str_replace(array('http://','https://'), '', $data->websiteURL);
	}

	$data->facebook = get_field('facebook');
	$data->twitter = get_field('twitter');
	$data->linkedin = get_field('linkedin');
	$data->google_plus = get_field('google_plus');
}

?>
	
<?php // if(get_field('people')): ?>

	<section class="section__contact">

		<div class="container">

			<?php 
			// Map
			if( !empty($location)):
			?>
		
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section__contact-map">
						<div id="google_map" data-lat="<?php echo $data->locationLat; ?>" data-lng="<?php echo $data->locationLng; ?>" data-url="<?php echo $data->locationURL; ?>"></div>
					</div>
				</div>

			<?php
			endif;
			?>
		
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 section__contact-form">
					<h2>Contact</h2>
					<?php 
					// Contact Form
					echo do_shortcode($data->shortcode); 
					?>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-1 section__contact-info-social">
					
					<h2>Address</h2>
					
					<div class="section__contact-info">
						<?php if(!empty($data->intro)): ?>
							<p><?php echo $data->address; ?></p>
						<?php endif; ?>

						<?php if(!empty($data->address)): ?>
							<p><span class="section__contact-info--address"><i class="fa fa-map-marker"></i><?php echo $data->address; ?></span></p>
						<?php endif; ?>

						<?php if(!empty($data->phone)): ?>
							<p><span class="section__contact-info--phone"><i class="fa fa-phone"></i><?php echo $data->phone; ?></span></p>
						<?php endif; ?>

						<?php if(!empty($data->email)): ?>
							<p><span class="section__contact-info--email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a></span></p>
						<?php endif; ?>

						<?php if(!empty($data->website)): ?>
							<p><span class="section__contact-info--website"><i class="fa fa-globe"></i><a href="<?php echo $data->websiteURL; ?>"><?php echo $data->website; ?></a></span></p>
						<?php endif; ?>
					</div>

					<div class="section__contact-social">
						<?php if(!empty($data->facebook)): ?>
							<a href="<?php echo $data->facebook; ?>"><img src="<?php bloginfo('template_url'); ?>/img/facebook--000000.png" alt="Facebook" /></a>
						<?php endif; ?>
						<?php if(!empty($data->twitter)): ?>
							<a href="<?php echo $data->twitter; ?>"><img src="<?php bloginfo('template_url'); ?>/img/twitter--000000.png" alt="Twitter" /></a>
						<?php endif; ?>
						<?php if(!empty($data->linkedin)): ?>
							<a href="<?php echo $data->linkedin; ?>"><img src="<?php bloginfo('template_url'); ?>/img/linkedin--000000.png" alt="LinkedIn" /></a>
						<?php endif; ?>
						<?php if(!empty($data->google_plus)): ?>
							<a href="<?php echo $data->google_plus; ?>"><img src="<?php bloginfo('template_url'); ?>/img/google_plus--000000.png" alt="Google Plus" /></a>
						<?php endif; ?>
					</div>

				</div>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php // endif; ?>