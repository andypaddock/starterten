<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$largeImage = get_sub_field('background_image'); ?>
<section
    class="image-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="split-col">

            <div class="image-advert fmleft background-image"
                style="background-image: url(<?php echo $largeImage['url']; ?>)">
            </div>
            <div class="text-box fmright">


                <h3 class="heading-secondary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('title'); ?></h3>



                <article>
                    <p class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('paragraph'); ?></p>
                </article>

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


    </div>
</section>