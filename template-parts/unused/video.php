<?php $flexVideo = get_sub_field('video_file');
        $autoPlay = get_sub_field('autoplay_video');
        $imagePoster = get_sub_field('poster_video');
        ?>

<div class="container-fluid video-container">

    <?php if( have_rows('video') ):?>

    <video <?php if($autoPlay == true): echo 'autoplay'; else: echo 'controls'; endif; ?>
        poster="<?php echo $imagePoster['url'];?>" muted class="flexible-video">

        <source src="<?php echo esc_url( $flexVideo['url'] ); ?>" type="video/mp4">

    </video>

    <?php endif;?>
</div>