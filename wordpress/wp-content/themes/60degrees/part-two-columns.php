<?php
/**
The template part for displaying the Two COLUMN section.
*/
?>
	
				
<section class="two-columns">
	
	<?php if(get_field('subtitle')): ?>

		<div class="subtitle">

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
		
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 two-columns__text">
				<?php the_content(); ?>
			</article>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>