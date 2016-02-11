<?php
/**
The template part for displaying the QUOTES section.
*/

$background = wp_get_attachment_image_src(get_field('background'), 'quote-image');

?>

<?php if(get_field('quotes')): ?>
			
	<section class="section__quotes" style="background-image:url('<?php echo $background[0]; ?>');">

		<div class="section__quotes-inner js-flexslider--quotes">

			<div class="container">
			
				<div class="row">

					<div class="col-xs-12 quotes__content">
							
						<ul class="slides">

							<?php 
							while(has_sub_field('quotes')):
							?>
								<li>
									<?php if(get_sub_field('text')): echo '<p class="quotes__text">' .  get_sub_field('text') . '</p>'; endif; ?>
									<?php if(get_sub_field('author')): echo '<p class="quotes__author">' .  get_sub_field('author') . '</p>'; endif; ?>
								</li>

							<?php 
							endwhile; 
							?>

						</ul>

					</div>

				</div>

			</div>

			<div class="clearfix"></div>

		</div>
		
	</section>

<?php endif; ?>