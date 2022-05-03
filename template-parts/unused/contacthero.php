<?php

$heroImage = get_field('background_image');

?>

<section class="hero-outer contact-hero">
    <div class="hero-image" style="background-image: url(<?php echo $heroImage;?>)"></div>
    <canvas id='canvas' class="h-50"></canvas>

</section>