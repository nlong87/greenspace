<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Greenspace
 * @since Greenspace 0.1
 */

?>

<header id="masthead" class="site-header mb-5" role="banner">

    <div class="site-brand">
        <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo my-2"><?php the_custom_logo(); ?></div>
        <?php else: ?>
            <div class="site-name"><a href="<?php echo home_url(); ?>">Greenspace</a></div>
            <div class="site-description">Landscape Design</div>
        <?php endif; ?>
    </div>

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav id="site-navigation" class="primary-navigation navbar navbar-expand-lg navbar-dark bg-dark" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'greenspace' ); ?>">
            <div class="container">
                <a class="navbar-brand text-uppercase d-lg-none" href="<?php echo home_url(); ?>">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarPrimary" class="collapse navbar-collapse">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'menu_class'      => 'navbar-nav justify-content-between flex-grow-1 text-center',
                            'container'         => false,
                            'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                            'fallback_cb'     => false,
                        )
                    );
                    ?>
                </div>
            </div>
        </nav><!-- #site-navigation -->
    <?php endif; ?>


    <?php greenspace_header_image(); ?>

</header><!-- #masthead -->
