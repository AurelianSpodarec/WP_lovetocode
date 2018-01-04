<?php get_header(); ?>
		
	<!-- START HERO -->
	<?php get_template_part('template-parts/content', 'hero-wide'); ?>
	<!-- END HERO -->

		
	<main class="container-almost-normal content-wrap">

	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'post' ); ?>
		<?php endwhile; endif; ?>

	</div><!-- /row -->


	</main>

<?php get_footer(); ?>