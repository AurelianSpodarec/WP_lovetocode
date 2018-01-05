<section class="main-banner" style="background-image: url(');">
<div class="main-banner__outer">
<div class="main-banner__inner">
  
   <div class="main-banner__desc">
   	<div>
		<h1>Build Real Web Projects</h1>
		<p>Learn to build projects step-by-step while building your portfolio</p>
		<a class="main-banner__btn" href="">Comming Soon!</a> <!-- View Projects -->
	</div>
	</div>
  	
  <?php
		$args = array( 
		  'post_type' => 'resource', 
		  'posts_per_page' => 1,
		  'orderby' => 'rand'
		);

		$loop = new WP_Query( $args );
	?>
	

	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <div class="main-banner__promotion">
  		<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );   ?>
		<div class="main-banner__promotion-img" style="background-image: url('<?php echo $thumbnail[0]; ?>')">
		</div>

		<div class="main-banner__link-wrap">
    	<a class="main-banner__link" href="<?php echo get_field('link'); ?>">Get <?php the_title(); ?> Here!</a>
      	<a class="main-banner__link-sub" href="<?php the_permalink() ?>">Read More!</a>
      	</div>

	</div>  

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

</div>
</div>
</section>