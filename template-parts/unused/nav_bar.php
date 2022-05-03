<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$stickNav = get_sub_field('stick_nav');?>
<section
    class="nav-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?> <?php if($stickNav == true): echo 'stick-top'; else: echo 'fmtop'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="flex-col">
            <?php if( have_rows('nav_block') ): ?>
            <?php while( have_rows('nav_block') ): the_row(); ?>

            <?php $actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
            <div class="nav-links flex-items">

                <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="button page-navbar <?php if($actual_link == $link_url) echo 'active' ?>"
                    href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('icon_text'); ?><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>

            <?php endif; ?>
        </div>


    </div>
</section>