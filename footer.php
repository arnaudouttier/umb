<?php
/**
 * The footer template file
 *
 * @package umb
 */

?>

</div><!-- #page-wapper -->

<footer id="site-footer" role="contentinfo" class="header-footer-group">

    <div class="to-the-top">
        <a href="#site-header">
            <span class="arrow" aria-hidden="true">&uarr;</span>
        </a>
    </div><!-- .to-the-top -->

    <div class="footer-site-info">

        <?php if ( get_theme_mod( 'footer_display_title_and_tagline_setting' , true ) ) : ?>

            <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif ; ?>

            <?php if ( has_nav_menu( 'social' ) ) : ?>

                <nav aria-label="<?php esc_attr_e( 'Social links', 'umb' ); ?>" class="footer-social-wrapper">

                    <ul class="social-menu footer-social reset-list-style fill-children-current-color">

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'social',
                                'container'       => '',
                                'container_class' => '',
                                'items_wrap'      => '%3$s',
                                'menu_id'         => '',
                                'menu_class'      => '',
                                'depth'           => 1,
                                'link_before'     => '<span class="screen-reader-text">',
                                'link_after'      => '</span>',
                                'fallback_cb'     => '',
                            )
                        );
                        ?>

                    </ul><!-- .footer-social -->

                </nav><!-- .footer-social-wrapper -->

            <?php endif ; ?>
            
            <?php $copyrightFooterText = get_theme_mod('umb_site_info_footer_setting') ; ?>

            <?php  if(!empty($copyrightFooterText)): ?>

                <p><?php echo esc_html($copyrightFooterText) ; ?></p>

            <?php else: ?>

                <p>©  <?php  echo get_the_date( 'Y') ; ?> <span><?php bloginfo( 'name' ); ?></span></p>

            <?php endif; ?>

        <?php endif; ?>

    </div><!-- .footer-site-info -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>

</body>

</html>