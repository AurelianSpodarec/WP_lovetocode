<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="resource-product">
		<div class="resource-product__img-wrap">
			<a href="<?php the_permalink(); ?>">
				 
			<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );   ?>
				 
			<img class="resource-product__img" src="<?php echo $thumbnail[0]; ?>">
			</a>
		</div>
		<div class="resource-product__info">
		<div class="resource-product__info-bar">
	        <span class="resource-product__info-item"><strong>Price: </strong><?php echo get_field('price'); ?></span>
	        <span class="resource-product__info-item"><strong>OS: </strong><?php echo get_field('operating_system'); ?></span>

       		<span class="resource-product__info-read"><span><a href="<?php the_permalink(); ?>">Read More</a></span></span>
        </div>

        <a class="resource-product__info-downolad" href="<?php echo get_field('link'); ?>" target="_blank">GET <?php the_title(); ?> HERE</a>
    	</div>
	</article>

<?php endwhile; else : ?>

No the loop in taxonomy doesn't work

<?php endif; ?>