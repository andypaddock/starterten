<?php
$researchVideo = get_field('video_file');
$videoImage = get_field('video_placeholder');

?>

<?php if ( is_user_logged_in() ) { ?>


<div class="flexible-content">

    <?php if( get_field('research_post_type') == 'mail' ):?>

    <div class="embed-block">
        <?php if (get_field('mailchimp_url')):?>
        <iframe src="<?php the_field('mailchimp_url'); ?>">
        </iframe>
        <?php endif; ?>
    </div>

    <?php elseif( get_field('research_post_type') == 'video' ): ?>
    <div class="row">
        <div class="container">
            <div class="video-block">
                <video playsinline controls loop poster="<?php echo $videoImage['url'];?>" id="bgvideo" width="x"
                    height="y">
                    <source src="<?php echo $researchVideo['url'];?>" type="video/mp4">
                </video>
            </div>
        </div>
    </div>

    <?php elseif( get_field('research_post_type') == 'plain' ): ?>
    <div class="row">
        <div class="container">
            <div class="post-block">
                <?php the_field( 'research_post_copy' );?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
<div class="oldcontent">
    <?php $content = apply_filters( 'the_content', get_the_content() );
echo $content; ?></iframe>
</div>
<?php } else { ?>
<div class="row">
    <div class="container">
        <div class="log-in-link">
            <p>This content has restricted access, please <a
                    href="<?php echo wp_login_url( $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ); ?>"
                    title="Members Area Login" rel="home">log in</a> to
                view this content.</p>
            <a href="<?php echo wp_login_url( $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ); ?>"
                title="Members Area Login" class="btn btn--darkblue" rel="home">Sign in</a>

        </div>
    </div>
</div>
<?php } ?>