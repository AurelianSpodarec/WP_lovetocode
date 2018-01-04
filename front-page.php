<?php get_header(); ?>
		
	<main class="container content-wrap">


	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'post' ); ?>
		<?php endwhile; else: ?>

		<?php get_template_part( 'template-parts/content', 'none' ) ?>
            
	    <?php endif; ?>

	    <?php wp_reset_query(); ?>
	</div><!-- /row -->


	</main>

<?php get_footer(); ?>