<?php
/**
The template part for displaying the PEOPLE section.
*/
?>
	
<?php if(get_field('people')): ?>

	<section class="section__people">

		<div class="container">
		
			<div class="row">

				<?php while(has_sub_field('people')): ?>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php echo get_sub_field('photo')?>
						<br />
						<?php echo get_sub_field('name')?>
						<br />
						<?php echo get_sub_field('job_title')?>
						<br />
						<?php echo get_sub_field('biography')?>
						<br />
						<?php echo get_sub_field('facebook')?>
						<br />
						<?php echo get_sub_field('twitter')?>
						<br />
						<?php echo get_sub_field('linkedin')?>
						<br />
						<?php echo get_sub_field('instagram')?>
					</div>
				
				<?php endwhile; ?>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>