<?php
/**
	The template for displaying the FOOTER after the close of <div id="page-wrapper">
*/
?>

		<div class="clearfix"></div>
		<?php // header.php: <div id="page-wrapper"> ?>
		</div>

	<div id="push"></div>
	<?php // header.php: <div id="page-container"> ?>
	</div>

	<div id="footer-container">
	
		<footer id="footer" class="footer">

			<div class="footer__top">

				<div class="container">

					<div class="row">
			
						<?php if (get_field('footer_text',7)): ?>

							<div class="footer__about hidden-xs col-sm-6 col-md-5 col-lg-5">
								<h6>About</h6>
								<?php echo get_field('footer_text',7); ?>
								<a href="<?php echo get_permalink(7); ?>" title="Read More" class="btn btn--blue">Read More</a>
							</div>

						<?php endif; ?>

						<div class="footer__navigation col-xs-12 col-sm-3 col-md-3 col-lg-2">
							<h6>Company</h6>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
						</div>

						<div class="footer__navigation col-xs-12 col-sm-3 col-md-3 col-lg-2">
							<h6>Press</h6>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
						</div>

					</div>

				</div>

			</div>

			<div class="footer__bottom">

				<div class="container">

					<div class="row">

						<div class="footer__social col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<h6>Follow Us</h6>

							<div class="footer__bottom-social">
								<?php if(get_field('facebook', 13)): ?>
									<a href="<?php echo get_field('facebook', 13); ?>"><img src="<?php bloginfo('template_url'); ?>/img/facebook--ffffff.png" alt="Facebook" /></a>
								<?php endif; ?>
								<?php if(get_field('twitter', 13)): ?>
									<a href="<?php echo $data->twitter; ?>"><img src="<?php bloginfo('template_url'); ?>/img/twitter--ffffff.png" alt="Twitter" /></a>
								<?php endif; ?>
								<?php if(get_field('linkedin', 13)): ?>
									<a href="<?php echo $data->linkedin; ?>"><img src="<?php bloginfo('template_url'); ?>/img/linkedin--ffffff.png" alt="LinkedIn" /></a>
								<?php endif; ?>
								<?php if(get_field('google_plus', 13)): ?>
									<a href="<?php echo $data->google_plus; ?>"><img src="<?php bloginfo('template_url'); ?>/img/google_plus--ffffff.png" alt="Google Plus" /></a>
								<?php endif; ?>
							</div>

						</div>

					</div>

				</div>

		</footer>

	</div>

	<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
	
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

	<?php wp_footer(); ?>

	<!-- Google Analytics
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>
	-->
	
</body>
</html>