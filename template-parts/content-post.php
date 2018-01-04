
	<article id="post-<?php the_ID(); ?>" class="article-card">

		<header class="article-card__header">
			<span class="article-card__category">
				<?php

					$the_cat = get_the_category();

					$category_name = $the_cat[0]->cat_name;

					$category_link = get_category_link( $the_cat[0]->cat_ID );

				?>
                
				<a class="article-card__category-link" href="<?php echo $category_link ?>"
				title="<?php echo $category_name ?>"  >
				<?php echo $category_name ?>
				</a>

			</span>
			
			<a  href="<?php the_permalink(); ?>">
			<div class="article-card__img-wrap">
				<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );   ?>
				<img class="article-card__img" src="<?php echo $thumbnail[0]; ?>"/>
			</div>
			<span class="article-card__views">
				<i class="fa fa-eye" aria-hidden="true"></i>View
			</span>
			</a>
		</header>

		<section class="article-card__content">	
			<h2 class="article-card__title">
            <a class="article-card__title-anchor" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

			<?php echo excerpt_empty(13); ?>
		</section>

		<footer class="article-card__footer">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="article-card__author-img-wrap">
				<img class="article-card__author-img" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>">          
			</a>
			<div class="article-card__author-info">
		        <a class="article-card__author-name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
		        <time class="article-card__post-date"><?php echo get_the_date('j F, Y'); ?></time>
	        </div>
		</footer>

	</article>
