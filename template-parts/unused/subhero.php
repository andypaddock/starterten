<?php

$heroImage = get_field('background_image');

?>

<section class="hero-outer">
    <div class="hero-image" style="background-image: url(<?php echo $heroImage;?>)"></div>
    <canvas id='canvas' class="h-50"></canvas>
    <div class="subhero-block">
        <div class="row">
            <div class="container">
                <div class="subhero-title">
                    <h1 class="heading-hero"><?php the_field('heading');?></h1>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="subhero-textblock">
    <div class="row">
        <div class="container">
            <div class="subhero-copyblock"><?php the_field('copy');?></div>
        </div>
    </div>
</div>