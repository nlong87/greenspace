<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since Greenspace 0.1
 */

if ( ! function_exists('greenspace_setup') ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Greenspace 0.1
	 *
	 * @return void
	 */
	function greenspace_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Add post formats support
        add_theme_support('post-formats',
            array('link', 'aside', 'gallery', 'image', 'quote', 'status',));

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'greenspace' ),
				'footer'  => __( 'Secondary menu', 'greenspace' ),
			)
		);

        // Make core output html5
        add_theme_support('html5', array('gallery', 'caption', 'navigation-widgets'));

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => false,
			)
		);

	}

	// No block editor for this theme
    add_filter('use_block_editor_for_post', '__return_false');

}
add_action( 'after_setup_theme', 'greenspace_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Greenspace 0.1
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function greenspace_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'greenspace_content_width', 1296 );
}
add_action( 'after_setup_theme', 'greenspace_content_width', 0 );


/**
 * Enqueue scripts and styles.
 *
 * @since Greenspace 0.1
 *
 * @return void
 */
function greenspace_scripts() {

    wp_enqueue_style( 'greenspace-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

	// Print styles.
	wp_enqueue_style( 'greenspace-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	wp_enqueue_script( 'greenspace-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), wp_get_theme()->get( 'Version' ) );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'greenspace-slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
	    // Enqueue navigation script
	}

    // No Gutenberg blocks
    wp_dequeue_style( 'wp-block-library' );

}
add_action( 'wp_enqueue_scripts', 'greenspace_scripts');


// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';


/**
 * Calculate classes for the main <html> element.
 *
 * @since Greenspace 1.0
 *
 * @return void
 */
function greenspace_the_html_classes() {
	$classes = apply_filters( 'greenspace_the_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}
