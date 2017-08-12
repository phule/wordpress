<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! function_exists( 'construction_setup' ) ) :
function construction_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on construction, use a find and replace
	 * to change 'construction' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'construction', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'construction' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'construction_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /** Image Size **/
    add_image_size('construction-slider-image',1920,700,true);
    add_image_size('construction-feature-image',75,75,true);
    add_image_size('construction-portfolio-image',385,383,true);
    add_image_size('construction-blog-image',235,235,true);
    add_image_size('construction-testimonial-image',90,90,true);
    add_image_size('construction-client-image',175,135,true);
    add_image_size('construction-recent-post-image',60,55,true);
    add_image_size('construction-single-page',1243,500,true);
    add_image_size('construction-client-logo',195,160,true);
    add_image_size('construction-team-image',270,325,true);
}
endif;
add_action( 'after_setup_theme', 'construction_setup' );
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function construction_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'construction' ),
		'id'            => 'construction-sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Team Member', 'construction' ),
		'id'            => 'construction-team-member',
		'description'   => esc_html__( 'Add widgets here.', 'construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer One', 'construction' ),
		'id'            => 'construction-footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer Two', 'construction' ),
		'id'            => 'construction-footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Footer Three', 'construction' ),
		'id'            => 'construction-footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Header Cart List', 'construction' ),
		'id'            => 'construction-cart-list',
		'description'   => esc_html__( 'Add widgets here.', 'construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'construction_widgets_init' );

function construction_scripts() {
    wp_enqueue_style('owl-carousel',get_template_directory_uri() . '/content/css/libs/owl.carousel.css');
    wp_enqueue_style('style',get_template_directory_uri(). '/content/css/style.css');
	
    wp_enqueue_script('owl_carousel_js', get_template_directory_uri() . '/content/js/libs/owl.carousel.js');
    wp_enqueue_script('ui_core_js', get_template_directory_uri() . '/content/js/ui-core.js');
	wp_enqueue_script('ui_master_js', get_template_directory_uri() . '/content/js/ui-master.js');
    wp_enqueue_script('home_js',get_theme_file_uri('/content/js/pages/home.js'));
    wp_enqueue_script('details_js',get_theme_file_uri('/content/js/pages/details.js'));
    //wp_enqueue_script('games_js',get_theme_file_uri('/content/js/pages/games.js'));
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'construction_scripts' );
add_action( 'init', 'register_footer_menu' ); // this registers your menu with WP
function register_footer_menu() {
    if ( function_exists( 'register_nav_menu' ) ) {
        register_nav_menu( 'footer-menu', 'Footer Menu' );
    }
}
 
add_action('wp_footer', 'display_footer_menu', 1000, 0);  
// display function for your menu:
function display_footer_menu() {
    echo ( has_nav_menu( 'footer-menu' ) ? wp_nav_menu (
        array (
            'theme_location' => 'footer-menu',
            'container_id'    => 'footer-menu',
            'container_class'    => 'footer-menu'
        )
    ).'' : '' );
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}
include_once (ABSPATH."/wp-content/themes/construction-child/plugin/Customer_Walker_Nav_Menu.php");
include_once (ABSPATH."/wp-content/themes/construction-child/plugin/Short_Code.php");
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
 * Customizer Option Fields
 */
require get_template_directory() . '/inc/admin-panel/cunstruction-customizer.php';
/**
 * Construction Function
 */
 require get_template_directory() . '/inc/construction-function.php';
/**
 * Widget Fields
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-widget.php';
/**
 * Team Widget
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-team.php';
/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-recent-post.php';
/**
 * Footer Info Widget
 */
require get_template_directory() . '/inc/admin-panel/widget/construction-info.php';
