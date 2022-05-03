<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section class="testimonial <?php if($bgColor == true): echo 'alt-bg'; endif; ?>
    <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="owl-carousel owl-theme testimonial-carousel">

            <?php if( have_rows('short_testimonial','options') ): ?>
            <?php while( have_rows('short_testimonial','options') ): the_row(); ?>

            <div class="quote">
                <div class="mark">&ldquo;</div>
                <div class="copy"><?php the_sub_field('testimonial');?></div>
                <div class="centre-line">
                    <div class="line"></div>
                    <div></div>
                </div>
                <p class="quote-cite"><?php the_sub_field('name');?></p>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>