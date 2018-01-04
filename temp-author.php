<?php get_header(); ?>
		
	<main class="container content-wrap">
        <?php
            $user_id = get_the_author_meta('ID');
        ?>

		<div class="author-profile__general-info">

            <div class="author-profile__img-wrap">
                 <img class="author-profile__img" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>">
            </div>

            <div class="author-profile__about">

                <div class="clearfix">
                <div class="author-profile__info">
                <h1 class="author-profile__name"><?php the_author(); ?></h1>
                <h2 class="author-profile__role"><?php the_field('description_role','user_'.$user_id); ?></h2>
                <ul class="author-profile__social-links">


               <?php
 
// check if the flexible content field has rows of data
if( have_rows('social_media') ):

     // loop through the rows of data
    while ( have_rows('social_media') ) : the_row();

        if( get_row_layout() == 'social_media_icons' ):

            the_sub_field('media_facebook', $user);
 

        endif;

    endwhile;

else :

     echo "nodthing";// no layouts found
endif;

?>
                    <!--  <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                    <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                    <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                    <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-reddit-alien" aria-hidden="true"></i></i></a></li>
                    <li class="author-profile__social-item"><a href="" class="author-profile__social-anchor" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a></li> -->
                </ul>
                </div>
                <ul class="author-profile__stats">
                    <li class="author-profile__stats-item" title="Courses">
                        <i class="fa fa-film" aria-hidden="true"></i> 
                        3
                    </li>
                    <li class="author-profile__stats-item" title="Posts">
                        <i class="fa fa-book" aria-hidden="true"></i> 
                        <?php the_author_posts() ?>
                    </li>
                    <li class="author-profile__stats-item" title="Profile Views">
                        <i class="fa fa-eye" aria-hidden="true"></i> 
                        23.000
                    </li>
                </ul>
                </div>

                <div class="clearfix">
                <p class="author-profile__bio"><?php echo the_author_meta( 'description', $post->post_author ); ?></p>
                </div>

                <div class="clearfix">
                    <h6 class="author-profile__tag-title">Topics & Specialties</h6>
                    <ul class="author-profile__tag-list">
                        <li class="author-profile__tag-item">
                            <a class="author-profile__tag-link author-profile__tag-link--html" href="">HTML</a>
                        </li>
                        <li class="author-profile__tag-item">
                            <a class="author-profile__tag-link author-profile__tag-link--css" href="">CSS</a>
                        </li>
                        <li class="author-profile__tag-item">
                            <a class="author-profile__tag-link author-profile__tag-link--javascript" href="">JavaScript</a>
                        </li>
                        <li class="author-profile__tag-item">
                            <a class="author-profile__tag-link author-profile__tag-link--wordpress" href="">WordPress</a>
                        </li>
                        <li class="author-profile__tag-item">
                            <a class="author-profile__tag-link author-profile__tag-link--personal-growth" href="">Personal Growth</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

	 <?php

// check if the repeater field has rows of data
if( have_rows('a') ):

    // loop through the rows of data
    while ( have_rows('a') ) : the_row();

        // display a sub field value
        the_sub_field('a');

    endwhile;

else :

   echo "nottingh";

endif;

?>
		
	 
	 <?php
/* Start the single post Loop */
while ( have_posts() ) : the_post();

    if( have_rows('social_media') ):
        // loop through the rows of data
        while ( have_rows('social_media') ) : the_row();
        // check current row layout
            if( get_row_layout() == 'social_media_icons' ):
            echo get_sub_field('media_facebook');       
        endif;
        endwhile;
    else :
        // no layouts found
        echo 'no content <br>';
    endif;

endwhile; // End of the loop.
?>

		<h3><i class="fa fa-book" aria-hidden="true"></i> <?php the_author(); ?> Posts</h3>
		<div class="row">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'post' ); ?>
		<?php endwhile; else: ?>

		<?php get_template_part( 'template-parts/content', 'none' ) ?>
            
	    <?php endif; ?>

	    <?php wp_reset_query(); ?>
		</div><!-- /row -->


	</main>

<?php get_footer(); ?>