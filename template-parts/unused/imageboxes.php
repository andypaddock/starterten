<section class="section-imageboxes">
    <div class="row">
        <div class="image-grid">
            <?php
                if( have_rows('content_block') ):
                while ( have_rows('content_block') ) : the_row();?>
            <div class="grid-item image-block tile">
                <div class="image">
                    <?php $image = get_sub_field('image'); ?>
                    <?php if($image): //dont output an empty image tag ?>
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['caption']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="text">
                    <div class="title">
                        <h2 class="heading-tertiary"><?php the_sub_field('title');?></h2>
                    </div>
                    <div class="content-text"><?php the_sub_field('text');?>
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
            </div>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>