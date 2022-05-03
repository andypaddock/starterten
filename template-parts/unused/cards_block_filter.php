<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="cards-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php if(get_sub_field('show_filters')):?>
        <div class="controls">
            <ul class="flex-col alt-font-pop">
                <?php $all_categories = get_terms( array(
  'taxonomy' => 'destinations',
  'hide_empty' => true,
  'parent'   => 0
) );?>

                <?php foreach($all_categories as $category): ?>
                <li class="flex-items" type="button" data-toggle=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <div class="flex-split-col filter-grid">
            <?php
            $customType = get_sub_field('show_posts_from');
$loop = new WP_Query(
    array(
        'post_type' => $customType, 
        'posts_per_page' => -1,
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = wp_get_post_terms( $post->ID, 'destinations' ); ?>
            <div class="card-item mix <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
                <div class="card-image">
                    <a href="<?php echo get_permalink( $post->ID ); ?>"><img
                            src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>"></a>
                </div>
                <div class="item-details">

                    <div class="title">
                        <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                            <a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a>
                        </h3>
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
                    </div>
                </div>


            </div>

            <?php endwhile;
wp_reset_postdata();
?>

        </div>





        <?php
$featured_posts = get_sub_field('select_items');
if( $featured_posts ): ?>
        <div class="flex-split-col">
            <?php foreach( $featured_posts as $post ): 
        $permalink = get_permalink( $post->ID );
        $title = get_the_title( $post->ID );
        $custom_field = get_field( 'call_to_action_text', $post->ID );
        $days_field = get_field( 'how_long', $post->ID );
        $safariType = get_the_terms( $post->ID, 'safaritype' );
        setup_postdata($post); ?>
            <div class="card-item">
                <div class="card-image">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>">
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
?>"><?php the_title(); ?></h3>
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