<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section class="section-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?>
    <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php if (get_sub_field('text_block_header')):?>
        <h2 class="heading-<?php the_sub_field('header_size'); ?>">
            <?php the_sub_field('text_block_header'); ?> </h2>
        <?php endif; ?>

        <div class="text-para <?php the_sub_field('columns'); ?>">
            <?php the_sub_field('paragraphs'); ?>
            <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>