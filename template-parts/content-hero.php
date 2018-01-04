
<section class="hero hero--lovetocode hero__gradient--sunset">
	
	<div class="hero__body hero__text-centered">
	<div class="container">

				<h1 class="hero__title">
				 
					<?php if(is_page() || (is_single())): ?>

 						<?php the_title(); ?>

					<?php elseif(is_tax('resource_categories')): ?>

					    <?php single_cat_title() ?>
					    
					<?php endif; ?>

				</h1>


				<?php if (!is_category) : ?>
				<p class="hero__sub-title">Description</p>
				<?php endif; ?>
		<p class="hero__sub-title">Description</p>


	</div>
	</div>

</section>