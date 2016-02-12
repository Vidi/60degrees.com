<?php
/**
The template part for displaying the PEOPLE section.
*/
?>
	
<?php if(get_field('people')): ?>

	<section class="people">

		<div class="container">
		
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h4 class="people__title">Our Team</h4>
				</div>

				<div class="people__people">

					<?php 
					while(has_sub_field('people')): 
					$photo = wp_get_attachment_image_src(get_sub_field('photo'), 'people-image');
					?>

						<article class="col-xxs-12 col-xs-6 col-sm-4 col-md-3 col-lg-3 people__person">
							
							<div class="people__person-inner">

								<div class="people__person-image">
									<img src="<?php echo $photo[0]; ?>" alt="<?php echo get_sub_field('name') . '|' . get_sub_field('job_title')?>" data-no-retina>
								</div>

								<div class="people__person-title">
									<h6 class="people__person-name"><?php echo get_sub_field('name')?></h6>
									<p class="people__person-job"><?php echo get_sub_field('job_title')?></p>
								</div>
								
								<?php if(get_sub_field('biography')): ?>
									<div class="people__person-biography">
										<?php echo get_sub_field('biography')?>
									</div>
								<?php endif; ?>

								
								<?php if(get_sub_field('facebook') || get_sub_field('twitter') || get_sub_field('linkedin') || get_sub_field('instagram')): ?>
									<div class="people__person-social">
										
										<?php if(get_sub_field('facebook')): ?>
											<a href="<?php echo get_sub_field('facebook'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/facebook--000000.png" alt="Facebook" /></a>
										<?php endif; ?>

										<?php if(get_sub_field('twitter')): ?>
											<a href="<?php echo get_sub_field('twitter'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/twitter--000000.png" alt="Twitter" /></a>
										<?php endif; ?>

										<?php if(get_sub_field('linkedin')): ?>
											<a href="<?php echo get_sub_field('linkedin'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/linkedin--000000.png" alt="LinkedIn" /></a>
										<?php endif; ?>

										<?php if(get_sub_field('instagram')): ?>
											<a href="<?php echo get_sub_field('instagram'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/instagram--000000.png" alt="Instagram" /></a>
										<?php endif; ?>

									</div>

								<?php endif; ?>

							</div>

						</article>
					
					<?php endwhile; ?>
		
					<div class="clearfix"></div>

				</div>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>