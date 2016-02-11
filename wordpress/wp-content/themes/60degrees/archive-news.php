<?php
/**
	The template for displaying the NEWS archive.
*/
get_header(); 

$count = 0;
?>

	<?php if ( have_posts() ) : ?>
				
			<section class="section__title">

				<div class="container">
				
					<div class="row">
					
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>News</h1>
						</div>
						
					</div>
					
				</div>
				
				<div class="clearfix"></div>
				
			</section>

			<section class="section__news">

				<div class="container">

					<div class="row">
						
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
							
							<div class="row js-posts__container">

								<!-- Post Content -->
								<?php 
								while( have_posts()): the_post(); 
								?>

									<div class="section__news-post js-posts__content">
										
										<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												
											<div class="section__news-image">
												<?php $image = wp_get_attachment_image_src(get_field('image'), 'news-image'); ?>
												<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
													<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" />
												</a>
											</div>
												
											<div class="section__news-text">
												<h4>
													<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
												</h4>
												<p class="section__news-excerpt">
													<?php 
													if(has_excerpt()): 
														echo get_the_excerpt(); 
													else:
														echo excerpt(30); 
													endif;
													?>
												</p>
												<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="section__news-button btn btn--blue">Read More</a>
											</div>

										</article>

									</div>

								<?php 
								$count++;
								endwhile; 
								?>

							</div>

							<div class="row js-posts__loadmore">

								<?php 
								// Make sure the count is one less than the set posts_per_page limit
								// Only show load more if there's more than the posts_per_page limit
								$cms_posts_per_page = $wp_query->query_vars['posts_per_page'];
								if($count > ($cms_posts_per_page - 1) ): 
								?>

									<div class="row posts__loadmore-button js-posts__load">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="section__news-navigation">
												<?php next_posts_link('Load More Articles'); ?>
											</div>
										</div>
									</div>

								<?php 
								endif; 
								// echo $cms_posts_per_page;
								?>

							</div>

						</div>

						<!-- Post Sidebar -->
						<aside class="hidden-xs col-sm-4 col-md-4 col-lg-3">
							<?php get_template_part('part', 'sidebar'); ?>
						</aside>

					</div>
					
				</div>
				
				<div class="clearfix"></div>
				
			</section>
		
	<?php endif; ?>
			
	<div class="clearfix"></div>
	
<?php get_footer(); ?>