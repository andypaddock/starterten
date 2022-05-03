<?php
/**
 * The template for displaying the footer
 * @package starterten
 */
?>
<footer class="footer">
    <?php $footerSwitch = get_field('footer_override');
            if ($footerSwitch == 'alternate'): ?>


    <?php $footerImage = get_field('footer_image'); ?>

    <div class="footer-hero" style="background-image:  url(<?php echo $footerImage['url']; ?>)">
        <div class="footer-text-container">
            <div class="row centre-line w40">
                <div class="line"></div>
                <div></div>
            </div>
            <div class="row w40">
                <div class="footer_text">
                    <h1 class="heading-secondary">
                        <span class="heading-secondary"><?php the_field('footer_main_text'); ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="footer_link">
                <?php 
$link = get_field('footer_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="footer_button" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span
                        class="link-arrow arrow-right"></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php else:?>
    <?php $footerImage = get_field('footer_image','options'); ?>

    <div class="footer-hero" style="background-image: url(<?php echo $footerImage['url']; ?>)">
        <div class="row">

            <div class="footer-text-container push-right">
                <div class="offset-70"></div>
                <div class="footer-text-block fmright">
                    <h2 class="heading-primary">
                        <span class="heading-primary--main"><?php the_field('footer_main_text','options'); ?></span>
                        <span
                            class="heading-primary--tertiary"><?php the_field('footer_sub_heading','options'); ?></span>
                    </h2>
                    <?php 
$link = get_field('footer_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
    <div class="footer-link-container">
        <div class="row">
            <div class="footer-navbar">
                <div class="footer-social">
                    <div class="logo"><a
                            href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/cplogotxt"); ?></a>
                    </div>
                    <?php if( have_rows('social_media_links','options') ): ?>
                    <ul class="icons">
                        <?php while( have_rows('social_media_links','options') ): the_row();?>
                        <li>
                            <?php 
$link = get_sub_field('social_media_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                            <a href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('font_awesome_icon','options'); ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="footer-contact">

                    <?php if( have_rows('reservation_links','options') ): ?>
                    <ul class="contacts">
                        <?php while( have_rows('reservation_links','options') ): the_row();?>
                        <li>
                            <?php 
$link = get_sub_field('links','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                            <a href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                    <div class="copyright"><?php the_field('copy_text','options'); ?></div>
                </div>
                <div class="nav-area">
                    <menu>
                        <?wp_nav_menu( array( 
                        'theme_location' => 'footer-menu',
                    ) ); ?>
                    </menu>
                    <div class="footer-privacy">

                        <?php if( have_rows('important_menu_items','options') ): ?>
                        <ul class="important-links">
                            <?php while( have_rows('important_menu_items','options') ): the_row();?>
                            <li>
                                <?php 
$link = get_sub_field('important-links','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                                <a href="<?php echo esc_url( $link_url ); ?>"
                                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>

                        <div class="silverless">

                            <a href="https://silverless.co.uk">

                                <?php get_template_part('inc/img/silverless', 'logo');?>

                            </a>

                        </div>
                        <div class="filler"></div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <?php endif; ?>

</footer>
</main>
<div class="sidebar">
    <?wp_nav_menu( array( 
                        'theme_location' => 'mobile-menu',
                        'container' => false,
                        'menu_class' => 'sidebar-list',
                        'list_item_class'  => 'sidebar-item',
    'link_class'   => 'sidebar-anchor'
					) ); ?>
</div>


<?php wp_footer(); ?>
</body>

</html>