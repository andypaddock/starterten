<section class="section-text">
    <div class="row centre-line w40">
        <div class="line"></div>
        <div></div>
    </div>

    <div class="row w40 contact-links">

        <?php if( have_rows('links') ): ?>

        <?php while( have_rows('links') ): the_row();?>

        <p><?php the_sub_field('icon'); ?> <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </p>

        <?php endwhile; ?>

        <?php endif; ?>





    </div>
</section>