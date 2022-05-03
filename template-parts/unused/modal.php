<div class="popup" id="<?php the_sub_field('modal_name');?>">
    <div class="popup__content">


        <div class="popup__full">
            <div class="popup__form">
                <h2 class="heading-tertiary alt-text"><?php the_sub_field('title');?></h2>
                <?php the_sub_field('text');?>
                <?php
        if ( get_sub_field('shortcode') ) {
            echo do_shortcode( get_sub_field('shortcode') );
        }
        ?>
            </div>

            <a href="#testimonial-section" id="popup<?php echo ($counter); ?>" target="_self" class="popup__close"><i
                    class="fal fa-times-circle"></i><span>Close</span></a>
        </div>
    </div>
</div>