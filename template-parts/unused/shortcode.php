<section>
    <div class="row  w60">
        <?php
        if ( get_sub_field('shortcode') ) {
            echo do_shortcode( get_sub_field('shortcode') );
        }
        ?>
    </div>
</section>