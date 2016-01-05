<?php
/**
	The template for displaying the FOOTER after the close of <div id="page-wrapper">
*/
?>

	<div class="clearfix"></div>
	<?php // header.php: <div id="page-wrapper"> ?>
	</div>
	
	<footer id="footer" class="">
		&copy; <?php echo date('Y') ?>
	</footer>

	<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

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