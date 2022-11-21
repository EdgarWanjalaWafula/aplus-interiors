<?php
/**
 * A-plus Interiors functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package A-plus_Interiors
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function a_plus_interiors_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on A-plus Interiors, use a find and replace
		* to change 'a-plus-interiors' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'a-plus-interiors', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Main', 'a-plus-interiors' ),
			'menu-2' => esc_html__( 'Main 2', 'a-plus-interiors' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'a_plus_interiors_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'a_plus_interiors_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function a_plus_interiors_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'a_plus_interiors_content_width', 640 );
}
add_action( 'after_setup_theme', 'a_plus_interiors_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function a_plus_interiors_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'a-plus-interiors' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'a-plus-interiors' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'a_plus_interiors_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function a_plus_interiors_scripts() {
	wp_enqueue_style( 'a-plus-interiors-aos', '//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-owl-theme', '//unpkg.com/flickity@2/dist/flickity.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-bs-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css', array(), _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-bs', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-montserrat', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap', array(), [] );
	wp_enqueue_style( 'a-plus-interiors-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'a-plus-interiors-style', 'rtl', 'replace' );
	wp_enqueue_style( 'a-plus-interiors-mobile', get_template_directory_uri() . '/css/responsive.css', _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-preloader', get_template_directory_uri() . '/css/preloader.css', _S_VERSION );
	wp_enqueue_style( 'a-plus-interiors-custom-font', get_template_directory_uri() . '/css/custom-font.css', _S_VERSION );
	
	wp_enqueue_script( 'a-plus-interiors-jquery-js', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'a-plus-interiors-popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'a-plus-interiors-bootstrap-js', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'a-plus-interiors-flickity', '//unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), _S_VERSION, true );
	// wp_enqueue_script( 'a-plus-interiors-flickity-hash', '//unpkg.com/flickity-hash@2/hash.js', array(), _S_VERSION, true );
	// wp_enqueue_script( 'a-plus-interiors-aos', '//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), _S_VERSION, true );
	// wp_enqueue_script( 'a-plus-interiors-parallax', get_template_directory_uri() . '/js/parallax.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'a-plus-interiors-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'a-plus-interiors-slider', get_template_directory_uri() . '/js/flickity.slider.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'a_plus_interiors_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

