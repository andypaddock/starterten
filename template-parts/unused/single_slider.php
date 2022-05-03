<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="single-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php 
$terms = get_sub_field('select_items');
if( $terms ): ?>
        <div class="single-slider--blocks">
            <?php foreach( $terms as $term ):
                $image = get_field('background_image', $term);
                $icon = get_field('map_icon', $term);?>



            <div class="single-slider--image">
                <img src="<?php echo $image['url']; ?>" />
                <div class="single-slider--text revealup">
                    <img class="map-icon" src="<?php echo $icon['url']; ?>" />
                    <h3 class="heading-secondary"><?php echo esc_html( $term->name ); ?></h3>
                </div>
                <div class="single-slider--link">
                    <a class="button" href="<?php echo esc_url( get_term_link( $term ) ); ?>">Explore
                        <?php echo esc_html( $term->name ); ?></a>
                </div>
            </div>



            <?php endforeach; ?>
        </div>
        <?php endif; ?>









    </div>
</section>