<?php
/*
	The template for displaying all GENERIC and most SPECIFIC pages.
*/
get_header(); ?>

	<?php if ( have_posts() ) : ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php 
			// Sectors
			if(is_page(11)): 
				get_template_part('part', 'title');
				get_template_part('part', 'categories');
				get_template_part('part', 'one-column');
				//get_template_part('part', 'sectors');

			// About
			elseif(is_page(7)):
				get_template_part('part', 'title');
				get_template_part('part', 'two-columns');
				get_template_part('part', 'quotes');
				get_template_part('part', 'people');


			// Jobs
			elseif(is_page(9)): 
				get_template_part('part', 'title');
				get_template_part('part', 'jobs');


				// Job Article
				elseif(is_page(93)): 
					get_template_part('part', 'title');
					get_template_part('part', 'jobs-single');


			// Contact
			elseif(is_page(13)): 
				get_template_part('part', 'title');
				get_template_part('part', 'contact');


			// All Other Pages
			else:
				get_template_part('part', 'title');
				get_template_part('part', 'one-column');
		
			endif;
			?>
			
		<?php endwhile; // end of the loop. ?>
		
	<?php endif; ?>
			
	<div class="clearfix"></div>
	
<?php get_footer(); ?>