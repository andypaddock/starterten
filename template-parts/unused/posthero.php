<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');?>





<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="row header__text-box">
        <h1 class="heading-primary">
            <span class="heading-primary--main"><?php echo esc_html( get_the_title() ); ?></span>
        </h1>
    </div>


    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-4x" href="#content"></a>
        </div>
    </div>

</div>