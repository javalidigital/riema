<?php
/**
 * Riema Theme functions and definitions
 *
 * @package Riema Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'riema_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function riema_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Riema Theme, use a find and replace
	 * to change 'riema-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'riema-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails'); 

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-primary' => __( 'Primary Menu', 'riema-theme' ),
		'menu-top' => __( 'Top Menu', 'riema-theme' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'riema_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // riema_theme_setup
add_action( 'after_setup_theme', 'riema_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function riema_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar - Geral', 'riema-theme' ),
		'id'            => 'sidebar-general',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Grupo', 'riema-theme' ),
		'id'            => 'sidebar-grupo',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Administração', 'riema-theme' ),
		'id'            => 'sidebar-administracao',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Imobiliária', 'riema-theme' ),
		'id'            => 'sidebar-imobiliaria',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Hospedagem', 'riema-theme' ),
		'id'            => 'sidebar-hospedagem',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Hospedagem - Áustria', 'riema-theme' ),
		'id'            => 'sidebar-hospedagem-austria',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Hospedagem - Paulista', 'riema-theme' ),
		'id'            => 'sidebar-hospedagem-paulista',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Hospedagem - Saint', 'riema-theme' ),
		'id'            => 'sidebar-hospedagem-saint',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Incorporação', 'riema-theme' ),
		'id'            => 'sidebar-incorporacao',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Gestão', 'riema-theme' ),
		'id'            => 'sidebar-gestao',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	) );


	register_sidebar( array(
		'name'          => __( 'Landing Page - Boxes', 'riema-theme' ),
		'id'            => 'landing-page-boxes',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'riema_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function riema_theme_scripts() {
	wp_enqueue_style( 'riema-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'riema-cidadesbrasil', get_template_directory_uri() . '/js/cidades-estados-1.2-utf8.js', array(), '20110206', true );

	wp_enqueue_script( 'riema-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'riema-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'riema_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
