<?php
/**
The template part for displaying the LATEST NEWS section.
*/

$news = new WP_Query(
	array(
		'post_type' => 'news',
		'posts_per_page' => 3,
		'order' => 'DESC'
	)
);
?>
	
<?php if( $news->have_posts() ): ?>
				
	<section class="section__latestnews">
	<div class="section__latestnews-inner">

		<div class="container">
		
			<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4>Latest News</h4>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section__latestnews-posts">
		
				<div class="row">
				
					<?php while( $news->have_posts()): $news->the_post(); ?>
						
						<?php $image = wp_get_attachment_image_src(get_field('image'), 'news-image'); ?>

						<article class="col-xxs-12 col-xs-6 col-sm-6 col-md-4 col-lg-4 section__latestnews-post">

							<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
								<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" class="section__latestnews-post-image" />
								<h6 class="section__latestnews-post-title"><?php echo get_the_title(); ?></h6>
							</a>
							
							<p class="section__latestnews-post-excerpt text--small">
								<?php 
								if(has_excerpt()): 
									echo get_the_excerpt(); 
								else:
									echo excerpt(30); 
								endif;
								?>
							</p>

							<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="section__latestnews-post-button btn btn--blue">Read More</a>
							
						</article>

					<?php endwhile; ?>
					
				</div>
				
			</div>
				
			</div>
			
		</div>
		
		<div class="clearfix"></div>
		
	</section>

<?php endif; ?>