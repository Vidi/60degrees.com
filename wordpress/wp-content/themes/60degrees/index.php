<?php
/*
	The main template file.
*/
get_header(); ?>
	
	<?php if ( have_posts() ) : ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
				
			<section class="page">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
						
					</div>
					
				</div>
				
				<div class="clearfix"></div>
				
			</section>
			
		<?php endwhile; ?>
		
	<?php else : ?>
		
		<section class="404">
		
			<div class="container">
			
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1>Sorry...</h1>
						<p>There are no articles to display at the moment. Please check back later.</p>
						<p><a href="<?php echo home_url(); ?>" title="Click Here">Click here</a> to go back to the home page.</p>
					</div>
					
				</div>
				
			</div>
			
			<div class="clearfix"></div>
			
		</section>
		
	<?php endif; ?>
			
	<div class="clearfix"></div>
	
<?php get_footer(); ?>