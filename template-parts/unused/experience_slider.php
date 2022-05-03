<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section
    class="experience-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php
$featured_posts = get_sub_field('select_experiences');
if( $featured_posts ): ?>
        <div class="experience-blocks">
            <?php foreach( $featured_posts as $post ): 
$experienceImage = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>


            <div class="image-advert" style="background-image: url(<?php echo $experienceImage; ?>)">
                <div class="tri-col revealup">

                    <div class="title">
                        <h3 class="heading-tertiary alt-font-pop <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php $postType = get_post_type_object(get_post_type());
if ($postType) {
    echo esc_html($postType->labels->singular_name);
} ?></h3>
                        <h3 class="heading-secondary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_title(); ?></h3>
                    </div>
                    <div class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                    </div>
                    <div class="link">
                        <a class="button" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
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