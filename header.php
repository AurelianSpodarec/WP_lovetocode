<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta, Title, Styles, Scripts
    ================================================== -->
    <meta name="charset" content="UTF-8">
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width" />
    <title>Webpack to WordPress Starter Theme</title>
	
    <!-- FONT AWESOME | REPLACE WITH NPM IF YOU WANT-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php wp_head(); ?> 

</head>
<body <?php body_class(); ?>>


<header id="masthead" class="site-header" role="banner">
    <div class="site-header__outer">
    <div class="site-header__inner">

        <div class="site-header__nav-head">
        <a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img class="site-header__logo-img" src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=height:60/https://www.filepicker.io/api/file/q8yh1SmySmy5BNapeDem">
            <span class="site-header__logo-text"><?php bloginfo( 'name' ); ?></span>
        </a>

        <button class="site-header__hamburger">
            <div class="site-header__hamburger-bars">
                <span class="site-header__hamburger--bar"></span>
                <span class="site-header__hamburger--bar"></span>
                <span class="site-header__hamburger--bar"></span>
            </div>
        </button>
        </div>

        <div class="site-header__main-nav">
        <form class="site-header__search" action="/" method="get">
            <input class="site-header__search-input" placeholder="Search Lovetocode for your wishes..." type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
            <button class="site-header__search-button">
                <i class="fa fa-search site-header__search-icon" aria-hidden="true"></i>
            </button>
        </form>

        <nav id="site-navigation" class="site-nav__menu" role="navigation">

            <?php

                $args = [
                    'theme_location' => 'main-menu',
                    'container'      => 'ul',
                    'menu_class'     => 'site-nav__list',
                    'container_class' => 'custom-menu-class' ,
                    'walker'        => new Primary_Walker_Nav_Menu()
                ];

                wp_nav_menu( $args ); 

            ?>  

        </nav>
        </div><!-- /site-header__main-nav -->

    </div>
    </div><!-- /site-header__inner -->

    <?php if ( is_home() ) { ?>

    <div class="category__bar">
    <div class="category__bar-inner">

        <?php 
            wp_list_categories( array(
            'orderby'    => 'name',
            'title_li'=> false,
            'walker'     => new Walker_Category_Nav_Menu
            ) );
         ?> 

        <!-- <div class="category__item">
        <a class="category__link" href="">
            <span class="category__item__img">
            <i class="fa fa-code" aria-hidden="true"></i>
            </span> All
        </a>
        </div> -->
    </div>
    </div><!-- /category__bar -->

    <?php } ?>

    <!-- /site-header__category -->
    </header>