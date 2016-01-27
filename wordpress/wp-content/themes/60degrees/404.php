<?php
/**
	The template for displaying the 404 pages.
*/
get_header(); ?>
				
<section class="section__title">

	<div class="container">
	
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Sorry&hellip;</h1>
			</div>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>
	
				
<section class="section__one-column">

	<div class="container">
	
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section__one-column-text">
				<p>We don&rsquo;t seem to be able to find the page that you&rsquo;re looking for.</p>
				<p><a href="<?php echo home_url(); ?>" title="Click Here">Click here</a> to go back to the home page.</p>
			</div>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>
    
<?php get_footer(); ?>