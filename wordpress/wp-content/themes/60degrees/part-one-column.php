<?php
/**
The template part for displaying the ONE COLUMN section.
*/
?>
	
<?php if(get_field('subtitle')): ?>	

	<section class="section__subtitle">

		<div class="container">
		
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h2><?php echo get_field('subtitle')?></h2>
				</div>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>
	
				
<section class="section__one-column">

	<div class="container">
	
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section__one-column-text">
				<?php the_content(); ?>
			</div>
			
		</div>
		
	</div>
	
	<div class="clearfix"></div>
	
</section>