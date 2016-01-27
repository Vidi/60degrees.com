<?php
/**
The template part for displaying the QUOTES section.
*/
?>

<?php if(get_field('quotes')): ?>
			
	<section class="section__quotes js-flexslider--quotes">
						
		<ul class="slides">

			<?php 
			while(has_sub_field('quotes')):
			?>

				<li>

					<div class="container">
					
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 quotes__content">
								<?php if(get_sub_field('text')): echo '<p class="quotes__text">' .  get_sub_field('text') . '</p>'; endif; ?>
								<?php if(get_sub_field('author')): echo '<p class="quotes__author">' .  get_sub_field('author') . '</p>'; endif; ?>
							</div>

						</div>

					</div>

				</li>

			<?php 
			endwhile; 
			?>

		</ul>

		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>