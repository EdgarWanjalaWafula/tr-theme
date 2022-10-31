<?php
/**
 * Two Rivers functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Two_Rivers
 */

if ( ! function_exists( 'tworivers_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tworivers_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Two Rivers, use a find and replace
	 * to change 'tworivers' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tworivers', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'misc-thumb', 500, 380, true );
	add_image_size( 'gallery-image', 800, 500, true );
	add_image_size( 'feature-thumb', 800, 608, true );
	add_image_size( 'left-vertical', 278, 673, true );
	add_image_size( 'center-top', 570, 355, true );
	add_image_size( 'right-top', 278, 355, true );
	add_image_size( 'center-bottom', 278, 300, true );
	add_image_size( 'right-bottom', 570, 300, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tworivers' ),
		'top_menu' => esc_html__( 'Top Menu', 'tworivers' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'audio',
		'video',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tworivers_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'tworivers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tworivers_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tworivers_content_width', 640 );
}
add_action( 'after_setup_theme', 'tworivers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tworivers_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tworivers' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title"><span>',
		'after_title'   => '</span></h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'tworivers' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'tworivers' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'tworivers' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar (Listings)', 'tworivers' ),
		'id'            => 'sidebar-5',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title"><span>',
		'after_title'   => '</span></h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Search', 'tworivers' ),
		'id'            => 'sidebar-6',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Event Search', 'tworivers' ),
		'id'            => 'sidebar-7',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Eat & Drink Search', 'tworivers' ),
		'id'            => 'sidebar-8',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Advert', 'tworivers' ),
		'id'            => 'sidebar-9',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
}
add_action( 'widgets_init', 'tworivers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tworivers_scripts() {
		
	//styles
	
	wp_enqueue_style( 'tworivers-bootstrap-style' , get_template_directory_uri() . '/css/bootstrap.min.css');
	
	wp_enqueue_style( 'tworivers-fontawesome-icons' , get_template_directory_uri() . '/css/font-awesome.min.css');
	
	wp_enqueue_style( 'tworivers-fonts' , get_template_directory_uri() . '/css/fonts.css');
	
	wp_enqueue_style( 'tworivers-bxslider' , get_template_directory_uri() . '/css/bxslider.css');
		
	wp_enqueue_style( 'tworivers-style', get_stylesheet_uri() );
	
	//scripts
	
	wp_enqueue_script( 'tworivers-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20160119', true );
	
	wp_enqueue_script( 'tworivers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'tworivers-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'tworivers-fitvids', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), '20160202', true );
	
	wp_enqueue_script( 'tworivers-bxslider', get_template_directory_uri() . '/js/bxslider.min.js', array('jquery'), '20160203', true );
	
	wp_enqueue_script( 'tworivers-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery'), '20160224', true );
	
	wp_enqueue_script( 'tworivers-one-page-nav', get_template_directory_uri() . '/js/one_page_nav.js', array('jquery'), '20160225', true );
	if ( is_page() && is_page_template( 'page-slistingaz.php' ) ) {
			
		wp_enqueue_script( 'tworivers-sticky-anything', get_template_directory_uri() . '/js/jq-sticky-anything.min.js', array('jquery'), '20150909', true );
		
		wp_enqueue_script( 'tworivers-sticky-anything-settings', get_template_directory_uri() . '/js/stickyanything_settings.js', array('jquery'), '20160225', true );
	}

	if ( is_page() && is_page_template( 'page-home.php' ) ) {
	
		wp_enqueue_script( 'tworivers-covervid', get_template_directory_uri() . '/js/covervid.min.js', array('jquery'), '20160217', true );

		wp_enqueue_script( 'tworivers-covervid-settings', get_template_directory_uri() . '/js/covervid_settings.js', array('jquery'), '20160218', true );

	}
	
	wp_enqueue_script( 'tworivers-main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '20160119', true );
	
	wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-listings.js', false, null, false);
  	wp_enqueue_script('afp_script');
	
	wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  	);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tworivers_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
