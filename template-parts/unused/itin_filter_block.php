<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="itin-filter-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="controls">
            <ul class="flex-col alt-font-pop">
                <?php $all_categories = get_terms( array(
  'taxonomy' => 'destinations',
  'hide_empty' => true,
  'parent'   => 0
) );?>

                <?php foreach($all_categories as $category): ?>
                <?php
$image = get_field('map_icon', $category);?>
                <li class="flex-items mixitup-control-active" type="button"
                    data-toggle=".<?php echo $category->slug; ?>"><img src="<?php echo esc_url($image['url']); ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>