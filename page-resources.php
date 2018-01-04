<?php get_header(); ?>
		
	<?php get_template_part('template-parts/content', 'hero'); ?>

	<main class="container-almost-normal content-wrap">

	<?php
		$taxonomy = 'resource_categories';
		$terms = get_terms($taxonomy); // Get all terms of a taxonomy
	?>

	<?php if ( $terms && !is_wp_error( $terms ) ) : ?>
	<?php foreach ( $terms as $term ) { ?>
	<article class="resource-card">
	<a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
	<div class="resource-card__img-wrap">

		<div class="resource-card__img" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRN72OQ4ASU_Q7hWUpYdBOF9VHPqmTqsgJqbewrep4sYju-2_Gm');"></div>

		<div class="resource-card__front">
			<h3 class="resource-card__title"><?php echo $term->name; ?></h3>
			<p class="resource-card__sub-title">Awesome WordPress Themes</p>
		</div>

		<div class="resource-card__back">
		<div class="resource-card__back--inner">
			<p class="resource-card__link">VISIT ME</p>
		</div>
		</div>

	</div>
	</a>
	</article>
	<?php } ?>
	<?php endif; ?>

    <?php wp_reset_postdata(); ?>


	</main>

<?php get_footer(); ?>