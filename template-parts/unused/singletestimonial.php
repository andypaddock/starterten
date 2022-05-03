<section class="single-testimonial">
    <div class="row w50">
        <div class="centre-line">
            <div class="line"></div>
            <div></div>
        </div>
        <?php $singleType = get_sub_field('testimonial_type');
                        if ($singleType == 'invideo'): ?>
        <div class="internal-video">
            <?php $singleVideo = get_sub_field('video_file');
            $singlePoster = get_sub_field('video_poster_image'); ?>
            <video playsinline controls id="singletestvid" poster="<?php echo $singlePoster['url'];?>">
                <source src="<?php echo $singleVideo['url'];?>" type="video/mp4">
            </video>
            <span
                class="overlay-text onview"><?php the_sub_field('video_overlay_text');?><cite><?php the_sub_field('cite');?></cite></span>
        </div>
        <?php elseif ($singleType == 'quote') :?>

        <div class="quote">
            <!-- <?php get_template_part("inc/img/quote"); ?> -->

            <p class="copy"><?php the_sub_field('testimonial_text');?></p>

            <p class="quote-cite"><?php the_sub_field('cite');?></p>

        </div>
        <?php else:?>
        <?php the_sub_field('external_video_link'); ?>
        <?php endif;?>
    </div>
</section>