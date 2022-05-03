<?php

$heroImage = get_field('background_image');

?>

<section class="hero-outer">
    <div class="hero-image" style="background-image: url(<?php echo $heroImage;?>"></div>
    <canvas id='canvas' class="h-50"></canvas>
    <div class="research-block">
        <?php get_template_part("template-parts/latestresearch"); ?></div>
</section>