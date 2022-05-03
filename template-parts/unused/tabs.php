<section class="section-tabbed">
    <div class="row w60">
        <div class="container col-2 page-section">
            <div class="tabbed-section">
                <div class="tabbed-section__head">
                    <?php if( have_rows('tabs') ):
                
            while( have_rows('tabs') ): the_row();?>
                    <div class="tabbed-section__head--tab" data-tab="tab-number<?php echo get_row_index(); ?>">
                        <h3><?php the_sub_field('icon');?><?php the_sub_field('title');?></h3>
                    </div>
                    <?php endwhile; endif;?>
                </div>

                <div class="tabbed-section__body">
                    <?php if( have_rows('tabs') ):
                
            while( have_rows('tabs') ): the_row();?>
                    <div id="<?php $anchorLink = get_sub_field('title');
            $anchorLink = strtolower($anchorLink);
            $anchorLink = str_replace(' ', '', $anchorLink);
            echo $anchorLink;?>" class="tabbed-section__body--item tab-number<?php echo get_row_index(); ?>">

                        <?php
                if( have_rows('content_blocks') ):
                while ( have_rows('content_blocks') ) : the_row();?>

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
                    <?php endwhile; endif;?>
                </div>

            </div>
        </div>
    </div>
</section>