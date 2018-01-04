<?php get_header(); ?>
		
	<?php get_template_part('template-parts/content', 'hero'); ?>

	<main class="container-narrow content-wrap card-page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


		<article class="resource-single">
		
			<section class="resource-single__content">
				<aside class="resource-single__sidebar">

					<div class="resource-single__widget">
					<h3>Details</h3>
					<ul>
						<li><span>OS: </span><?php echo get_field('operating_system'); ?></li>
						<li><span>Price: </span><?php echo get_field('price'); ?></li>
						<!-- <li><span>Subscribtion: </span>Yes - Monthly</li> -->
					</ul>
					</div>

					<!-- <div class="resource-single__widget">
					<h3>Hardware Requirements</h3>
					<ul>
						<li><span>Processor: </span><?php echo get_field('processor'); ?></li>
						<li><span>RAM: </span><?php echo get_field('ram'); ?></li>
						<li><span>MEMORY: </span><?php echo get_field('memory'); ?></li>
						<li><span>Graphic Card: </span><?php echo get_field('graphic_card'); ?></li>
					</ul>
					</div> -->

					<a class="btn btn--primary btn--full" href="<?php echo get_field('link'); ?>" target="_blank">GET <?php the_title(); ?> HERE</a>
				
				</aside>

				<section class="resource-single__content-desc">
					<p><?php the_content(); ?></p>

				</section>
			</section>

			<footer>

				

			</footer>
		</article>


	<?php endwhile; else : ?>

    	<?php get_template_part( 'template-parts/content', 'none' ); ?>

  	<?php endif; ?>

	</main>

<?php get_footer(); ?>