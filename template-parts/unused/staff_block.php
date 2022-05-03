<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="staff-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="split-col">
            <?php if( have_rows('staff_block') ): ?>
            <?php while( have_rows('staff_block') ): the_row(); 
$staffImage = get_sub_field('image'); 
        ?>

            <div class="fmleft background-image" style="background-image: url(<?php echo $staffImage['url']; ?>)">
            </div>
            <div class="text-box fmright">


                <h3 class="heading-secondary <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>">
                    <span class="heading-secondary--tertiary"><?php the_sub_field('title'); ?></span>
                    <span class="heading-secondary--tertiary"><?php the_sub_field('sub_title'); ?></span>
                </h3>







                <p class="text <?php
if(get_sub_field('switch_text'))
{
	echo 'alt-color';
}
?>"><?php the_sub_field('paragraph'); ?></p>


            </div>
            <?php endwhile; ?>

            <?php endif; ?>
        </div>


    </div>
</section>