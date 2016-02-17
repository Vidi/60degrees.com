<?php
/**
	The template for displaying the single NEWS posts.
*/
get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
				
			<section class="title">

				<div class="container">
				
					<div class="row">
					
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>News</h1>
						</div>
						
					</div>
					
				</div>
				
				<div class="clearfix"></div>
				
			</section>

			<section class="news">

				<div class="container">

					<div class="row">

						<!-- Post Content -->
						<article class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
								
							<div class="news__image">
								<?php $image = wp_get_attachment_image_src(get_field('image'), 'news-image'); ?>
								<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" />
							</div>
								
							<div class="news__text">
								<h2><?php echo get_the_title(); ?></h2>
								<?php the_content(); ?>
							</div>

						</article>

						<!-- Post Sidebar -->
						<aside class="hidden-xs col-sm-4 col-md-4 col-lg-3">
							<?php get_template_part('part', 'news-sidebar'); ?>
						</aside>

					</div>
					
				</div>
				
				<div class="clearfix"></div>
				
			</section>
			
		<?php endwhile; // end of the loop. ?>

		<?php
		get_template_part('part', 'separator');
		get_template_part('part', 'latest-news');
		?>
		
	<?php endif; ?>
			
	<div class="clearfix"></div>
	
<?php get_footer(); ?>