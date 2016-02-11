<?php
/**
The template part for displaying the ONE COLUMN section.
*/
?>
	
				
<section class="section__one-column">
	
	<?php if(get_field('subtitle')): ?>

		<div class="section__subtitle">

			<div class="container">
			
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2><?php echo get_field('subtitle')?></h2>
					</div>
					
				</div>
				
			</div>
			
		</div>

	<?php endif; ?>

	<div class="container">
	
		<div class="row">
		
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section__one-column-text">
				<?php the_content(); ?>
			</article>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>