<?php
/*
The template for displaying the HOME page.
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
			
							
			<?php
			// Page 
			// get_template_part('part', 'page'); 
			?>
	
			
		<?php endwhile; // end of the loop. ?>
		
	<?php endif; ?>
			
	<div class="clearfix"></div>
	
<?php get_footer(); ?>