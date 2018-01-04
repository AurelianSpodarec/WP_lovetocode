<?php 

	// Load in CSS
	function theme_styles()
	{
	    wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/public/css/app.css', [] );
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles' ); 



	// Load in JavaScript
	function theme_js()
	{
	    global $wp_scripts;
	    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
		wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
	    $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
		$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
	    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/public/js/app.bundle.js', array('jquery'), '', true );
	}
	add_action( 'wp_enqueue_scripts', 'theme_js' );



	// Add Theme Support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
	add_theme_support( 'html5' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'starter-content' );


	

	// Register Menu Locations
	register_nav_menus( [
		'main-menu' => esc_html__( 'Main Menu', 'wpheirarchy' ),
		'footer-menu' => esc_html__('Footer Menu', 'wpheirarchy')
	]);


	// Setup Widget Areas
	function widget_main_sidebar() {
		$args = 
		register_sidebar([
			'name'			=> esc_html__( 'Main Sidebar', 'wpheirarchy' ),
			'id'			=> 'main-sidebar',
			'description' 	=> esc_html__( 'Add widgets for main sidebar', 'wpheirarchy' ),
			'before_widget' => '<section class="widget">',
			'after_widget' 	=> '</section>',
			'before_title' 	=> '<h2>',
			'after_title' 	=> '</h2>'
		]);
	}
	add_action( 'widgets_init', 'widget_main_sidebar' );

	function widget_contact_sidebar() {
		$args = 
		register_sidebar([
			'name'			=> esc_html__( 'Contact Sidebar', 'wpheirarchy' ),
			'id'			=> 'contact-sidebar',
			'description' 	=> esc_html__( 'Add widgets for contact sidebar', 'wpheirarchy' ),
			'before_widget' => '<section class="widget">',
			'after_widget' 	=> '</section>',
			'before_title' 	=> '<h2>',
			'after_title' 	=> '</h2>'
		]);
	}
	add_action( 'widgets_init', 'widget_contact_sidebar' );



	//Walker Class Nav Menu
	// class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
	//     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	//         if ( array_search( 'menu-item-has-children', $item->classes ) ) {
	//             $output .= sprintf( "\n<li class='dropdown %s'><a href='%s' class=\"dropdown-toggle\" data-toggle=\"dropdown\" >%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'site-nav__item--active' : '', $item->url, $item->title );
	//         } else {
	//             $output .= sprintf( "\n<li class='site-nav__item' %s><a class='site-nav__link' href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="site-nav__item--active"' : '', $item->url, $item->title );
	//         }
	//     }

	//     function start_lvl( &$output, $depth ) {
	//         $indent = str_repeat( "\t", $depth );
	//         $output .= "\n$indent<ul class=\"dropdown-menu\" role=\"menu\">\n";
	//     }
	// }

	class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
  
		// add classes to ul sub-menus
		function start_lvl( &$output, $depth ) {
		    // depth dependent classes
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array(
		        'sub-menu',
		        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
		        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
		        'menu-depth-' . $display_depth
		        );
		    $class_names = implode( ' ', $classes );
		  
		    // build html
		    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}
		  
		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth, $args ) {
		    global $wp_query;
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		  
		    // depth dependent classes
		    $depth_classes = array(
		        ( $depth == 0 ? 'site-nav__item' : 'sub-menu-item' ),
		        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
		        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
		        'menu-item-depth-' . $depth
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		  
		    // passed classes
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		  
		    // build html
		    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		  
		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="site-nav__link ' . ( $depth > 0 ? 'sub-site-nav__link' : 'main-site-nav__link' ) . '"';
		  
		    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
		        $args->before,
		        $attributes,
		        $args->link_before,
		        apply_filters( 'the_title', $item->title, $item->ID ),
		        $args->link_after,
		        $args->after
		    );
		  
		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}



	// function Primary_Walker_Nav_Menu( $classes, $item ) {

	//     if ( is_single() && $item->title == 'Contact' ) {
	//         $classes[] = 'highlight';
	//     }

	//     return $classes;

	// }

	// add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );

	// Walker Class Category Menu 
	class Walker_Category_Nav_Menu extends Walker_Category {  

	 function start_lvl(&$output, $depth=0, $args=array()) {
		$output .= "\n<ul>\n";
		}
		 
		function end_lvl(&$output, $depth=0, $args=array()) {
		$output .= "</ul>\n";
		}
		 
		function start_el(&$output, $item, $depth=0, $args=array(),$current_object_id = 0) {
		$output.= '<li class="category__item"><a class="category__link" href="'.home_url('category/'.$item->slug).'">
		'.esc_attr($item->name);
		//<img src="http://some_path_here/images/'.($item->slug).'.jpg"
		//in this case you should create images with names of category slugs
		}
		 
		function end_el(&$output, $item, $depth=0, $args=array()) {
		$output .= "</a></li>\n";
		}
	}  



	// Add White BG to certain pages
 	function extra_body_class( $classes ) {
 		if( 'resource-single' == get_post_type()) {
 			$classes[] = 'bg-white';
 			return $classes;
 		}
 	}
 	add_filter( 'body_class', 'extra_body_class');



 	//Exclude pages from WordPress Search
	if (!is_admin()) {
		function wpb_search_filter($query) {
			if ($query->is_search) {
			$query->set('post_type', 'post');
			}
			
			return $query;
		}
		add_filter('pre_get_posts','wpb_search_filter');
	}
	 


	//Filter the except length to 20 characters.
	// function wpdocs_custom_excerpt_length( $length ) {
 //    	return 10;
	// }
	// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

 
	function custom_read_more() {
	    return '... <a class="read-more" href="'.get_permalink(get_the_ID()).'">more&nbsp;&raquo;</a>';
	}
	function custom_read_more_empty() {
	    return "";
	}
	function excerpt_empty($limit) {
	    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more_empty());
	}




	// Register Resources Custom Post Type
 	// Our custom post type function
 

	function custom_post_type() {

	    $labels = array(
	        'name'                => _x( 'Resource', 'Post Type General Name', 'wpheirarchy' ),
	        'singular_name'       => _x( 'Resource', 'Post Type Singular Name', 'wpheirarchy' ),
	        'menu_name'           => __( 'Resources', 'wpheirarchy' ),
	        'parent_item_colon'   => __( 'Parent Resource', 'wpheirarchy' ),
	        'all_items'           => __( 'All Resources', 'wpheirarchy' ),
	        'view_item'           => __( 'View Resource', 'wpheirarchy' ),
	        'add_new_item'        => __( 'Add New Resource', 'wpheirarchy' ),
	        'add_new'             => __( 'Add New', 'wpheirarchy' ),
	        'edit_item'           => __( 'Edit Resource', 'wpheirarchy' ),
	        'update_item'         => __( 'Update Resource', 'wpheirarchy' ),
	        'search_items'        => __( 'Search Resource', 'wpheirarchy' ),
	        'not_found'           => __( 'Not Found', 'wpheirarchy' ),
	        'not_found_in_trash'  => __( 'Not found in Trash', 'wpheirarchy' ),
	    );

	    $args = array(
	        'label'               => __( 'Resource', 'wpheirarchy' ),
	        'description'         => __( 'Resources for web developers', 'wpheirarchy' ),
	        'labels'              => $labels,
	        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	        'taxonomies'          => array( 'genres' ),
	        'hierarchical'        => false,
	        'public'              => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_nav_menus'   => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 5,
	        'can_export'          => true,
	        'has_archive'         => true,
	        'exclude_from_search' => false,
	        'publicly_queryable'  => true,
	        'capability_type'     => 'page',
	        'menu_icon' 		  => 'dashicons-category',
	        'taxonomies'          => array( 'category' ), 
	    );
	     
	    // Registering your Custom Post Type
	    register_post_type( 'resource', $args );
	 
	}	 
	add_action( 'init', 'custom_post_type', 0 );

 


	// add_filter('pre_get_posts', 'query_post_type');
	// function query_post_type($query) {
	//   if( is_category() ) {
	//     $post_type = get_query_var('post_type');
	//     if($post_type)
	//         $post_type = $post_type;
	//     else
	//         $post_type = array('nav_menu_item', 'post', 'resource'); // don't forget nav_menu_item to allow menus to work!
	//     $query->set('post_type',$post_type);
	//     return $query;
	//     }
	// }

	function resource_taxonomy() {  
	    register_taxonomy(  
	        'resource_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
	        'resource',        //post type name
	        array(  
	            'hierarchical' => true,  
	            'label' => 'Resource Category',  //Display name
	            'query_var' => true,
	            'rewrite' => array(
	                'slug' => 'resources', // This controls the base slug that will display before each term
	                'with_front' => false // Don't display the category base before 
	            )
	        )  
	    );  
	}  
	add_action( 'init', 'resource_taxonomy');




	// Views 
	