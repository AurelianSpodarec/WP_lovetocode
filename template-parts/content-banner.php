<div class="banner banner--blue">
<div class="banner__outer">
<div class="banner__inner">

	<h3 class="banner__title"><?php the_title(); ?></h3>

	<div class="banner__author-info">
		<div class="banner__author-img-wrap">
		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
		<img class="banner__author-img" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>">
		</a>
		</div>

		<span class="banner__author-name">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
				<?php the_author(); ?>
			</a>
		</span>

		<span>
			<i class="fa fa-clock-o" aria-hidden="true"></i>
			<time class="entry-date" datetime="2017-01-25T20:34:42+00:00"><?php echo get_the_date('F j, Y'); ?></time>
		</span>

		<span class="banner__author-category">
			<?php
				$category_link = get_category_link( $the_cat[0]->cat_ID );
			?>
			<a href="<?php echo $category_link ?>">
				<i class="fa fa-list-alt" aria-hidden="true"></i>
				<?php
					$category = get_the_category();
					echo $category[0]->cat_name;
				?>
			</a>
		</span>
	</div>

</div>
</div>
</div>