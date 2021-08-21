<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage Greenspace
 * @since Greenspace 0.1
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Greenspace 0.1
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function greenspace_body_classes($classes ) {

	// Helps detect if JS is enabled or not.
	$classes[] = 'no-js';

	// Adds `singular` to singular pages, and `hfeed` to all other pages.
	$classes[] = is_singular() ? 'singular' : 'hfeed';

	// Add a body class if main navigation is active.
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-main-navigation';
	}

	return $classes;
}
add_filter( 'body_class', 'greenspace_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @since Greenspace 0.1
 *
 * @return void
 */
function greenspace_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'greenspace_pingback_header');

/**
 * Remove the `no-js` class from body if JS is supported.
 *
 * @since Greenspace 0.1
 *
 * @return void
 */
function greenspace_supports_js() {
	echo '<script>document.body.classList.remove("no-js");</script>';
}
add_action( 'wp_footer', 'greenspace_supports_js');

/**
 * Determines if post thumbnail can be displayed.
 *
 * @since Greenspace 0.1
 *
 * @return bool
 */
function greenspace_can_show_post_thumbnail() {
	return apply_filters(
		'greenspace_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}

if ( ! function_exists('greenspace_title') ) {
	/**
	 * Add a title to posts and pages that are missing titles.
	 *
	 * @since Greenspace 0.1
	 *
	 * @param string $title The title.
	 *
	 * @return string
	 */
	function greenspace_title($title ) {
		return '' === $title ? esc_html_x( 'Untitled', 'Added to posts and pages that are missing titles', 'greenspace' ) : $title;
	}
}
add_filter( 'the_title', 'greenspace_title');

/**
 * Retrieve protected post password form content.
 *
 * @since Greenspace 0.1
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string HTML content for password form for password protected post.
 */
function greenspace_password_form($post = 0 ) {
	$post   = get_post( $post );
	$label  = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );
	$output = '<p class="post-password-message">' . esc_html__( 'This content is password protected. Please enter a password to view.', 'greenspace' ) . '</p>
	<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<label class="post-password-form__label" for="' . esc_attr( $label ) . '">' . esc_html_x( 'Password', 'Post password form', 'greenspace' ) . '</label><input class="post-password-form__input" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" /><input type="submit" class="post-password-form__submit" name="' . esc_attr_x( 'Submit', 'Post password form', 'greenspace' ) . '" value="' . esc_attr_x( 'Enter', 'Post password form', 'greenspace' ) . '" /></form>
	';
	return $output;
}
add_filter( 'the_password_form', 'greenspace_password_form');

/**
 * Filters the HTML attributes applied to a menu item's anchor element.
 *
 * @since 3.6.0
 * @since 4.1.0 The `$depth` parameter was added.
 *
 * @param array $atts {
 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 *
 *     @type string $title        Title attribute.
 *     @type string $target       Target attribute.
 *     @type string $rel          The rel attribute.
 *     @type string $href         The href attribute.
 *     @type string $aria_current The aria-current attribute.
 * }
 * @param WP_Post  $item  The current menu item.
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param int      $depth Depth of menu item. Used for padding.
 */
function greenspace_nav_menu_link_attributes($atts, $item, $args, $depth) {

    $classes = empty($atts['class']) ? '' : $atts['class'];
    $classes = 'nav-link ' . $classes;
    $atts['class'] = trim($classes);

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'greenspace_nav_menu_link_attributes', 10, 4);


function greenspace_nav_menu_css_class( $classes, $item, $args, $depth ) {

    $classes[] = 'nav-item';
    return $classes;
}
add_filter( 'nav_menu_css_class', 'greenspace_nav_menu_css_class', 10, 4);

function greenspace_filter_nav_menu_items( $items, $menu ) {

    if ( $menu->theme_location !== 'footer' )
        return $items;

    if ( is_array( $items ) && count($items) > 1 ) {

        array_shift( $items );

    }

    return $items;
}

add_filter( 'wp_nav_menu_objects', 'greenspace_filter_nav_menu_items', 10, 2);


function greenspace_filter_front_gallery( $null, $attr ) {

    if ( !is_front_page() || empty( $attr['ids']) )
        return $null;

    // Enqueue the slider javascript
    wp_enqueue_script( 'greenspace-slick-slider' );

    // Get sanitized gallery IDs
    $images = array_filter( array_map( 'intval', explode(',', $attr['ids']) ) );
    $attachments = [];

    foreach( $images as $image_id ) {
        $attachment = get_post($image_id);
        // Check for valid image attachment
        if ( $attachment && $attachment->post_type === 'attachment'
            && strpos(get_post_mime_type($attachment), 'image/' ) !== false ) {
            $attachments[] = $attachment;
        }
    }

    if ( empty($attachments) ) return $null;


    ob_start(); ?>
    <div class="d-flex px-2 px-xl-3 px-xxl-5 align-items-center">
        <figure class="mx-auto mb-4">
            <blockquote class="blockquote fs-1">
                <p>"Every day, I'm surrounded by inspirations."</p>
            </blockquote>
            <figcaption class="blockquote-footer text-end">
                <cite>Louisa Ernst, Designer</cite>
            </figcaption>
        </figure>
    </div>
    <div class="greenspace-slideshow">
        <?php foreach( $attachments as $attachment) {
            printf( '<div>%s</div>', wp_get_attachment_image($attachment->ID, 'large', false, ['class' => 'mx-auto'] ) );
        } ?>
    </div>

    <p class="text-center"><a class="btn btn-primary btn-lg text-uppercase mt-3" href="<?php echo home_url('/portfolio/'); ?>">View Our Work</a></p>

    <script>
        jQuery(function() {
            jQuery('.greenspace-slideshow').slick({
                arrows: false,
                centerMode: true,
                dots: true,
                infinite: true,
                speed: 300,
                fade: true,
                autoplay: true,
                autoplaySpeed: 3000,
                cssEase: 'linear',
                slidesToShow: 1,
                adaptiveHeight: true,
            });
        });
    </script><?php

    return ob_get_clean();
}

add_filter('post_gallery', 'greenspace_filter_front_gallery', 10, 2);


function greenspace_filter_portfolio_gallery( $null, $attr ) {

    if ( is_front_page() || empty( $attr['ids']) )
        return $null;

    // Enqueue the slider javascript
    wp_enqueue_script( 'greenspace-slick-slider' );

    // Get sanitized gallery IDs
    $images = array_filter( array_map( 'intval', explode(',', $attr['ids']) ) );
    $attachments = [];

    foreach( $images as $image_id ) {

        $attachment = get_post($image_id);
        // Check for valid image attachment
        if ( $attachment && $attachment->post_type === 'attachment'
            && strpos(get_post_mime_type($attachment), 'image/' ) !== false ) {
            $attachments[] = $attachment;
        }

    }

    if ( empty($attachments) ) return $null;

    $child_posts = greenspace_get_portfolio_child_pages();

    ob_start(); ?>
    <div class="greenspace-slideshow">
        <?php foreach( $attachments as $attachment) {
            printf( '<div>%s</div>', wp_get_attachment_image($attachment->ID, 'large', false, ['class' => 'mx-auto'] ) );
        } ?>
    </div>
    <script>
        jQuery(function() {
            jQuery('.greenspace-slideshow').slick({
                arrows: false,
                centerMode: true,
                dots: true,
                infinite: true,
                speed: 300,
                fade: true,
                autoplay: true,
                autoplaySpeed: 3000,
                cssEase: 'linear',
                slidesToShow: 1,
                adaptiveHeight: true,
            });
        });
    </script>
    <?php if ( $child_posts ) : ?>
    <h3 class="text-center mb-3">Other Jobs</h3>
    <div class="text-center">
        <?php foreach( $child_posts as $post ) {
            printf('<a class="btn btn-primary mx-1 mb-2" href="%s">%s</a>', get_permalink($post->ID), $post->post_title );
        } ?>
    </div>
    <?php

    endif;

    return ob_get_clean();
}

add_filter('post_gallery', 'greenspace_filter_portfolio_gallery', 10, 2);


function greenspace_portfolio_shortcode() {

    $children = greenspace_get_portfolio_child_pages();

    ob_start();

    if ($children ) : ?>

        <div class="row justify-content-center"> <?php

        foreach($children as $child) {

            $attachments = get_children( array(
                'post_parent' => $child->ID,
                'post_status' => 'inherit',
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'order' => 'ASC',
                'orderby' => 'name',
                'numberposts' => 1
            ) );


            if ( !$attachments ) continue;

            $attachments = array_reverse($attachments);
            $attachment = array_pop($attachments );

            ?>
                <div class="col-sm-6 col-md-4 text-center mb-4">
                    <a href="<?php echo get_permalink($child->ID); ?>"><?php
                        echo wp_get_attachment_image($attachment->ID, 'thumbnail', false, ['classes' => 'img-fluid']); ?></a>
                    <h4 class="pt-2"><a href="<?php echo get_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></h4>
                </div>
            <?php

        } ?>

        </div>
        <?php

    endif;



    return ob_get_clean();

}
add_shortcode('portfolio', 'greenspace_portfolio_shortcode');


function greenspace_get_portfolio_child_pages() {

    $portfolio_page = get_page_by_path( 'portfolio' );

    if ( $portfolio_page ) {
        $post_array = [
            'post_type' => 'page',
            'post_parent' => $portfolio_page->ID,
            'order' => 'ASC',
            'numberposts' => -1
        ];

        $posts = get_posts( $post_array );
    } else {
        $posts = [];
    }

	return ( empty($posts) ) ? false : $posts;
}

function greenspace_header_image() {

    $banner_string = 'banner-%%slug%%.jpg';
    $banner_path = '/assets/images/';

    $post = get_post();

    if ( $post->post_parent ) {
        $parent = get_post( $post->post_parent );
        $page_slug = $parent->post_name;
    } else {
        $page_slug = $post->post_name;
    }


    if ( file_exists( str_replace('%%slug%%', $page_slug, get_template_directory() . $banner_path . $banner_string) ) ) {

        $image_url = get_template_directory_uri() . $banner_path . str_replace('%%slug%%', $page_slug, $banner_string);

    } else {
        $image_url = get_template_directory_uri() . $banner_path . str_replace('%%slug%%', 'home', $banner_string);

    }

    ?>
    <div class="banner-image">
        <img src="<?php echo $image_url; ?>" alt="Greenspace Banner">
    </div>
    <?php

}