<section class="section-boxedcontent">
    <div class="row w60">
        <div class="tabbed-section">
            <div class="tabbed-section__body">
                <div class="tabbed-section__body--item boxed tab-number<?php echo get_row_index(); ?>">
                    <?php
                if( have_rows('boxedarea') ):
                while ( have_rows('boxedarea') ) : the_row();?>
                    <div class="content-title">
                        <h2 class="heading-tertiary"><?php the_sub_field('content_title');?></h2>
                    </div>
                    <div class="content-text"><?php the_sub_field('content_text');?>
                        <?php 
$link = get_sub_field('content_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                    <!--***** END TOGGLE LIST *****-->
                    <?php endwhile; endif;?>
                </div>
            </div>
        </div>
    </div>
</section>