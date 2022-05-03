<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section
    class="triple-slider linked-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?> row-extended">


        <?php
$featured_posts = get_field('relational_itineraries');
if( $featured_posts ): ?>


        <div class="triple-blocks">
            <?php foreach( $featured_posts as $post ): 
$experienceImage = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>

            <div class="triple-slider--item">
                <div class="image-advert" style="background-image: url(<?php echo $experienceImage; ?>)">
                </div>
                <div class="item-details">

                    <div class="title">
                        <!-- <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
<?php $postType = get_post_type_object(get_post_type());
if ($postType) {
    echo esc_html($postType->labels->singular_name);
} ?></h3> -->
                        <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <span class="alt-font-pop"><?php the_field('length_of_stay'); ?></span>
                    </div>
                    <div class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                        <div class="destinations alt-font-pop">
                            <?php
$taxonomy = 'destinations'; // change this to your taxonomy
$terms = wp_get_post_terms( $post->ID, $taxonomy, array( "fields" => "ids" ) );
if( $terms ) {
  echo '<ul>';

  $terms = trim( implode( ',', (array) $terms ), ' ,' );
  wp_list_categories( 'title_li=&taxonomy=' . $taxonomy . '&include=' . $terms );

  echo '</ul>';
}
?>
                        </div>
                        <div class="sub">

                        </div>
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