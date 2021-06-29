<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Greenspace
 * @since Greenspace 0.1
 */

?>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #content -->
    </div><!-- .container -->

	<footer id="colophon" class="site-footer bg-dark text-white mt-5" role="contentinfo">
        <div class="container pt-4 pb-5">
            <div class="row">
                <div class="col-sm-7">
                    <?php if ( has_nav_menu( 'footer' ) ) : ?>
                        <nav class="footer-navigation navbar navbar-expand-md navbar-dark pt-0" aria-label="<?php esc_attr_e( 'Secondary menu', 'greenspace' ); ?>">
                            <ul class="navbar-nav footer-navigation-wrapper">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer',
                                        'items_wrap'     => '%3$s',
                                        'container'      => false,
                                        'depth'          => 1,
                                        'fallback_cb'    => false,
                                    )
                                );
                                ?>
                            </ul><!-- .footer-navigation-wrapper -->
                        </nav><!-- .footer-navigation -->
                    <?php endif; ?>
                    <div><strong>Louisa Ernst</strong> (707) 849-0307</div>
                </div>
                <div class="col-sm-5">
                    <p class="text-start text-sm-end text-muted">&copy; 2010 - <?php echo date('Y'); ?> Greenspace<br>
                        All Rights Reserved</p>
                </div>
            </div>

        </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
