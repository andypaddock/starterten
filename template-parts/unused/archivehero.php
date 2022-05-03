<?php
$term = get_queried_object();
$largeImage = get_field('background_image', $term); ?>

<div class="hero" style="background-image: url(<?php echo $largeImage['url']; ?>)">

    <div class="row header__text-box">
        <h1 class="heading-primary fmtop alt-color">
            <span
                class="heading-primary--main fmleft"><?php if (get_field('header')): ?><?php the_field('header'); ?><?php else: ?><?php echo single_term_title(); ?><?php endif ?></span>
            <span class="heading-primary--main fmright"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-4x" href="#content"></a>
        </div>
    </div>

</div>