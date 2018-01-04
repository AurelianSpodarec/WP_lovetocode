<?php get_header(); ?>
	
	<?php get_template_part('template-parts/content', 'hero'); ?>


	<?php if ( is_page('affiliate-disclosure') ) { ?>

		<main class="container-very-narrow content-wrap">

	<?php } else {
		echo  '<main class="container-almost-normal content-wrap">';
		}
	?>



	<div class="row">
	<div class="card-page">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <?php the_content(); ?>

        <?php endwhile; else:?>

            <h3>Whoops! Nothing here!</h3>

        <?php endif; ?>

    </div>
	</div><!-- /row -->


	</main>

<?php get_footer(); ?>