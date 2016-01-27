<?php
/**
The template part for displaying the QUOTES section.
*/
?>
	
<?php if(get_field('quotes')): ?>
			
	<section class="section__quotes">

		<div class="container">
		
			<div class="row">
	
				<?php while(has_sub_field('quotes')): ?>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php echo get_sub_field('text')?>
						<br />
						<?php echo get_sub_field('author')?>
					</div>
				
				<?php endwhile; ?>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>