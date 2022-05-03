<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$advertImage = get_sub_field('background_image'); ?>
<section
    class="advert-image <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="image-advert" style="background-image: url(<?php echo $advertImage['url']; ?>)">
            <div class="tri-col fmbottom">

                <div class="title">
                    <h3 class="heading-tertiary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('highlight'); ?></h3>
                    <h3 class="heading-secondary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('title'); ?></h3>
                </div>
                <div class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                    <p><?php the_sub_field('paragraph'); ?></p>
                </div>
                <div class="link ">
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

    </div>
</section>