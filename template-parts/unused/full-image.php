<div class="container-fluid">
    <?php $image = get_sub_field('image');
    $largeImage = get_sub_field('large_image') ?>
    <div class="image-frame <?php if($largeImage == true): echo 'large'; endif; ?>"
        style="background-image: url(<?php echo $image['url']; ?>">
    </div>
</div>