<?php
/**
The template part for displaying the LATEST LINKEDIN section.
*/

// Linkedin Query

 // if(): 

/*
?>
								
	<section class="section__latestlinkedin">
	
		<div class="section__latestlinkedin-inner">

			<div class="container">
			
				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h4>Latest News</h4>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section__latestlinkedin-posts">
				
						<div class="row">
						
							<?php // while(): ?>
								
								<?php $image = wp_get_attachment_image_src(get_field('image'), 'news-image'); ?>

								<article class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 col-lg-4 section__latestlinkedin-post">

									<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
										<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" class="section__latestlinkedin-post-image" />
										<h6 class="section__latestlinkedin-post-title"><?php echo get_the_title(); ?></h6>
									</a>
									
									<p class="section__latestlinkedin-post-excerpt text--small">
										<?php 
										if(has_excerpt()): 
											echo get_the_excerpt(); 
										else:
											echo excerpt(30); 
										endif;
										?>
									</p>

									<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="section__latestlinkedin-post-button btn btn--blue">Read More</a>
									
								</article>

							<?php // endwhile; ?>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
		
		</div>

		<div class="clearfix"></div>
		
	</section>

<?php // endif; */ ?>