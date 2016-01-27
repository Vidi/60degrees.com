<?php
/**
The template part for displaying the CAROUSEL section.
*/
?>
	
<?php if(get_field('carousel')): ?>
			
	<section class="section__carousel">

		<div class="container-fluid">
		
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
					<div class="row">
					
						<div class="js-flexslider--carousel carousel">
						
							<ul class="slides">

								<?php 
								while(has_sub_field('carousel')):
								$carousel_image = wp_get_attachment_image_src(get_sub_field('image'), 'carousel-image');
								$carousel_text = get_sub_field('text');
								?>

									<li>

										<img src="<?php echo $carousel_image[0]; ?>" alt="<?php if(get_sub_field('title')): echo get_sub_field('title'); endif; ?>" class="carousel__image" />

										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 carousel__content">
											<?php if(get_sub_field('title')): echo '<p class="carousel__title">' .  get_sub_field('title') . '</p>'; endif; ?>
											<?php if(get_sub_field('text')): echo '<p class="carousel__text">' .  get_sub_field('text') . '</p>'; endif; ?>
										</div>
									</li>
					
								<?php 
								endwhile; 
								?>

							</ul>

						</div>
					
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>