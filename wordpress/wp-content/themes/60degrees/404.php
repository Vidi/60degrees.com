<?php
/**
	The template for displaying the 404 pages.
*/
get_header(); ?>
				
<section class="title">

	<div class="container">
	
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Sorry&hellip;</h1>
			</div>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>
	
				
<section class="one-column">

	<div class="container">
	
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 one-column-__text">
				<p>We don&rsquo;t seem to be able to find the page that you&rsquo;re looking for.</p>
				<p><a href="<?php echo home_url(); ?>" title="Click Here" class="btn btn--blue">Click here to go back to the home page.</a></p>
			</div>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>
    
<?php get_footer(); ?>