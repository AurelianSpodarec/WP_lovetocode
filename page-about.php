<?php get_header(); ?>
    
    <?php get_template_part('template-parts/content', 'hero'); ?>

    <main class="container-almost-normal content-wrap">
    <div class="about card-page">
 
 
        <div class="about__author"> 
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        



            <div class="about__img-wrap">
                <?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );   ?>
                <div class="about__img" style="background-image: url(<?php echo $thumbnail[0]; ?>)"></div>
            </div>

             
            <?php the_content(); ?>
             

        

        <?php endwhile; else:?>

            <h3>Whoops! Contact form not working!</h3>

        <?php endif; ?>
        </div>


    </div>
    </main>

<?php get_footer(); ?>