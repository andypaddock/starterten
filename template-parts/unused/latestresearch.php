<div class="row">
    <div class="container">
        <div class="research-title">
            <h2 class="heading-secondary">Our Research</h2>
        </div>
        <div class="research-feed"><?php
$args = array( 'numberposts' => 4,  );
$postslist = get_posts( $args );
foreach ($postslist as $post) :  setup_postdata($post); ?>
            <div class="research-item"><?php 
$image = get_field('thumbnail_image');
$fallbackImage = get_field ('fallback_image', 'options'); ?>


                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <div class="research-image" style="background-image: url('<?php echo $image[0]; ?>')">

                </div>
                <?php endif; ?>

                <div class="research-copy">
                    <h3 class="heading-secondary"><a href="<?php 
            the_permalink();
            ?>"><?php the_title(); ?></a></h3>
                    <span class="pub-date">Published <?php the_date(); ?></span>
                    <p class="research-excerpt"><?php echo excerpt(15);?></p>
                </div>
                <div class="research-link">
                    <a href="<?php 
            the_permalink();
            ?>">Read More</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>