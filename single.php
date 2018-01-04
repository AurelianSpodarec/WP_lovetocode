<?php get_header(); ?>
			
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part( 'template-parts/content', 'banner'); ?>

	<?php endwhile; endif; ?>

	<main class="container content-wrap">


		<div class="article-row">
		<article class="article-single">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>

		<?php endwhile; else : ?>

        	<?php get_template_part( 'template-parts/content', 'none' ); ?>

      	<?php endif; ?>
        	
        <!-- START Author -->
        <?php get_template_part( 'template-parts/content', 'author-excerpt' ); ?>
        <!-- END Author -->

        

      	</article><!-- / article-single -->

      	<!-- START SIDEBAR -->
      		<?php get_sidebar('main'); ?>
      	<!-- END SIDEBAR -->

      	</div>

      	<!-- New Article Extra Row -->
      	<div class="article__extra">

      		<!-- DIfferent Articles  -->
      		<?php get_template_part( "template-parts/content", 'more-posts' ); ?>

			<!-- START Comments -->
	      	<?php comments_template(); ?>
	      	<!-- END Comments -->

      	</div>

	</main>

<?php get_footer(); ?>