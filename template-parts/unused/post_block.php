<section class="post-block" id="post-section">

    <div class="row">
        <?php if(get_sub_field('show_filters')):?>
        <div class="controls">
            <ul>
                <?php $all_categories = get_categories(array(
        'hide_empty' => true
    ));?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>


        <div class="post-grid filter-grid">
            <?php
            $postNumber = get_sub_field('number_post');
$loop = new WP_Query(
    array(
        'posts_per_page' => $postNumber,
        'post__not_in' => array( $post->ID )
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = get_the_category( $post->ID ); ?>

            <div class="mix tile quote <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <div class="test-image" style="background-image: url(<?php echo $mainImage; ?>)">
                    </div>
                </a>
                <span class="date">
                    <?php echo get_the_date( 'd/m/y' ); ?>
                </span>
                <h2 class="heading-tertiary alt-text"><?php the_title(  ); ?></h2>
                <div class="slash">/</div>
                <div class="post-excerpt">
                    <?php the_excerpt(  ); ?>
                </div>
                <a class="button" href="<?php echo get_permalink( $post->ID ); ?>">Read More</a>
            </div>
            <?php endwhile;
wp_reset_postdata();
?>
        </div>

    </div>

</section>