<?php
/**
 * Business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business
 */
/**
Required: set 'ot_theme_mode' filter to true.
Все фильтры можно найти в файле примеров /option-tree/assets/theme-mode/demo-functions.php
*/
add_filter( 'ot_theme_mode', '__return_true' );

/**
Отключили Layout-ы
*/
add_filter( 'ot_show_new_layout', '__return_false' );

/**
Отображать/не отображать в сайдбаре админки WP пункт меню - "Option Tree" - настройки плагина
*/
add_filter( 'ot_show_pages', '__return_true' );

/**
"Обнуляем" фильтр 'ot_theme_options_parent_slug' - пункт меню "Настройки темы"
начинает отображаться в сайдбаре админки WP отдельно в другом месте ниже
*/
function theme_options_parent($parent) {
	$parent = '';
	return $parent;
}
add_filter('ot_theme_options_parent_slug' , 'theme_options_parent' , 20);

/**
Required: include OptionTree.
*/
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
/**
Файлы demo-meta-boxes.php и demo-theme-options.php перенести 
из option-tree/assets/theme-modeв корень темы /functions переименовать (без демо) 
Там будут все-все настройки темы - мета-боксы для постов и глобальные настройки темы.
После функции trailingslashit( get_template_directory() ) - слеш у указании пути НЕ НУЖЕН!
*/
require( trailingslashit( get_template_directory() ) . 'functions/meta-boxes.php' );
require( trailingslashit( get_template_directory() ) . 'functions/theme-options.php' );

/**
Список всех фильтров для плагина Option-Theme (по выводу в админке):
Корень темы/option-tree/includes/ot-option-admin.php
*/

if ( ! function_exists( 'html2wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 * if - поддержка дочерних тем
	 */
	function html2wp_setup() {
		
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'html2wp' ),
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

		
		
	}
endif;
add_action( 'after_setup_theme', 'html2wp_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function html2wp_widgets_init() {
	register_sidebar( array(
		'name'          => 'Область виждетов',
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'html2wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'html2wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function html2wp_style() {
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css');
	wp_enqueue_style( 'artbt-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700');
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'colorScheme', get_template_directory_uri() . '/css/colorScheme-2.css');
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl-carousel.css');
}
add_action( 'wp_enqueue_scripts', 'html2wp_style' ); 
 
function html2wp_scripts() {
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array ('jquery'), '', true );
	wp_enqueue_script( 'magnific-popup-script', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
/**	
	wp_enqueue_script( 'html2wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'html2wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
*/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'html2wp_scripts' );


 
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
