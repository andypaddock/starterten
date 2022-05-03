<section class="section-borderedcontent">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="bordered-section">
            <div class="content-text"><?php the_sub_field('content');?>
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
        </div>
    </div>
</section>