<?php
/**
The template part for displaying the CAROUSEL section.
*/
?>
	
<?php if(get_field('carousel')): ?>
			
	<section class="carousel js-flexslider--carousel">
						
		<ul class="slides">

			<?php 
			while(has_sub_field('carousel')):
			$carousel_image = wp_get_attachment_image_src(get_sub_field('image'), 'carousel-image');
			?>

				<li>

					<img src="<?php echo $carousel_image[0]; ?>" alt="<?php if(get_sub_field('title')): echo get_sub_field('title'); endif; ?>" class="carousel__image" data-no-retina/>

					<div class="carousel__content">
					<div class="carousel__content-inner">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
									<?php if(get_sub_field('title')): echo '<p class="carousel__title">' .  get_sub_field('title') . '</p>'; endif; ?>
								</div>
								<div class="hidden-xs col-sm-12 col-md-10 col-lg-8">
									<?php if(get_sub_field('text')): echo '<p class="carousel__text">' .  get_sub_field('text') . '</p>'; endif; ?>
								</div>
							</div>
						</div>
					</div>
					</div>

				</li>

			<?php 
			endwhile; 
			?>

		</ul>
		
	</section>

<?php endif; ?>