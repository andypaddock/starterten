<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="section-title<?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <?php if( !get_sub_field('title') ): ?>
    <div class="row centre-line w50 fmbottom">
        <div class="line"></div>
        <div></div>
    </div>
    <?php endif; ?>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <h3 class="heading-secondary fmbottom <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>
            <span class="heading-secondary--sub"><?php the_sub_field('sub_title'); ?></span>
        </h3>
    </div>
</section>