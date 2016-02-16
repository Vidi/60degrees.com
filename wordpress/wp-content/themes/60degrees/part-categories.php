<?php
/**
The template part for displaying the CATEGORIES section.
*/
?>

<?php
if(get_field('categories')):
?>
			
	<section class="categories">

		<div class="container">
		
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<h4 class="text-left">Popular Categories</h4>

						<div class="categories__container">

						<?php
						while(has_sub_field('categories')):
						?>

							<div class="col-xxs-12 col-xs-6 col-sm-4 col-md-4 col-lg-3 categories__category">
								<a href="<?php echo get_sub_field('link'); ?>">
									<i class="fa fa-<?php echo get_sub_field('Icon'); ?>"></i>
									<span><?php echo get_sub_field('name'); ?></span>
								</a>	
							</div>

						<?php
						endwhile;
						?>

						<div class="clearfix"></div>

					</div>

				<button class="btn btn--blue">Browse All Categories</button>

			</div>

		</div>

	</div>

	<div class="clearfix"></div>
	
</section>

<?php
endif;
?>