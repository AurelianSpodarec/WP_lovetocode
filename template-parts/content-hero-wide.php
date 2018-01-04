<section class="hero hero--lovetocode hero__gradient--sunset">

	<div class="hero__body hero__text-centered">
	<div class="container">


		<div class="level">
			<div class="level-left">


				<h1 class="hero__title">
					<!-- Check if Category -->
					<?php if (is_category()) : ?>
						Category: 
						<span class="hero__stats"><?php single_cat_title(); ?></span>
					<?php else : ?>

						<?php the_title(); ?>

					<?php endif; ?>
				</h1>

				<?php if (!is_category()) : ?>
				<p class="hero__sub-title">Description</p>
				<?php endif; ?>


			</div>

			<div class="level-right">
				Right
			</div>
		</div>


	</div>
	</div>

</section>