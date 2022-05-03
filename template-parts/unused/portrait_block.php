<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="portrait-cards-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
$featured_posts = get_sub_field('select_items');
if( $featured_posts ): ?>
        <div class="quad-col">
            <?php foreach( $featured_posts as $post ): 
        $permalink = get_permalink( $post->ID );
        $title = get_the_title( $post->ID );
        $custom_field = get_field( 'call_to_action_text', $post->ID );
        $days_field = get_field( 'how_long', $post->ID );
        $safariType = get_the_terms( $post->ID, 'safaritype' );
        setup_postdata($post); ?>
            <div class="card-item tile">
                <div class="card-image imageoff-<?php the_field('image_offset');?>"
                    style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>)">
                    <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                        <?php echo esc_html( $title ); ?>
                    </h3>
                    <a class="button" href="<?php echo get_permalink( $post->ID ); ?>">Read More</a>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>