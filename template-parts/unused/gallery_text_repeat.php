<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$largeImage = get_sub_field('background_image'); ?>
<section
    class="slider-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php if( have_rows('slider_and_text_element') ): ?>
        <?php while( have_rows('slider_and_text_element') ): the_row();?>
        <?php $switchImage = get_sub_field('switch_text_to_left'); ?>
        <div class="split-col <?php if($switchImage == true): echo 'switch-order'; endif; ?>">
            <div class="slider-images">
                <?php 
$images = get_sub_field('gallery_images');
if( $images ): ?>
                <?php foreach( $images as $image ): ?>
                <div class="image" style="background-image: url(<?php echo esc_url($image['sizes']['large']); ?>)">

                </div>

                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="text-box">


                <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('title'); ?></h3>

                <p class="text lead-para <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('lead_paragraph'); ?></p>


                <p class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('paragraph'); ?></p>


                <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>