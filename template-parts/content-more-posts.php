<div class="more-posts">
	<h3 class="more-posts__header">Latest Posts</h3>

	<ul class="more-posts__list">
	<?php
		$args = array( 
			'numberposts' => 10,
			'orderby' => 'rand',
		);
		$rand_posts = get_posts( $args );
	?>
	<?php foreach( $rand_posts as $post ) : ?>

			<li class="more-posts__item">
				<a href="<?php the_permalink(); ?>">
				<div class="more-posts__img-wrap">
					<div class="more-posts__img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
				</div>
				</a>
				<a class="more-posts__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<p><?php echo get_the_date('F j, Y'); ?> / By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></p>
			</li>

		<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
	</ul>
</div>