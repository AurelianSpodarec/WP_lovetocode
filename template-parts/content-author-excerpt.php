<div class="author-excerpt">
<div class="author-excerpt__inner">

	<div class="author-excerpt__bar">
		<h3>Meet the author</h3>
	</div>

	<div class="author-excerpt__author-col">
	<div class="author-excerpt__img-wrap">
	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
		<img class="author-excerpt__img" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>">
	</a>
	</div>

	<div class="author-excerpt__author-info">
		<span>Meet the author</span>
		<h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></h3>
	</div>
	</div>

	<div class="author-excerpt__desc"><?php echo the_author_meta( 'description', $post->post_author ); ?></div>

</div>
</div>