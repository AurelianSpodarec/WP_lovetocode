<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="main-banner">
	<div>

		<div style="background-image: url('');"></div>


		<a href="">Sign Up </a> 

	</div>
	</div>

<?php endwhile; else : ?>

No the loop in taxonomy doesn't work

<?php endif; ?>