<?php get_header(); ?>
    
    <?php get_template_part('template-parts/content', 'hero'); ?>

    <main class="container content-wrap">
     

    <section class="contact-main card-page">

        <?php the_field('contact_textarea'); ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <?php the_content(); ?>

        <?php endwhile; else:?>

            <h3>Whoops! Contact form not working!</h3>

        <?php endif; ?>

    </section>


    <!-- START SIDEBAR -->
        <?php get_sidebar('contact'); ?>
    <!-- END SIDEBAR -->



    </main>

<?php get_footer(); ?>