<?php if( have_rows('accordian') ): ?>
<div class="text-content accordion-outer mt5">
    <?php while( have_rows('accordian') ): the_row();?>
    <button class="info-accordion">
        <span><?php the_sub_field('accordian_header');?></span></button>
    <div class="info-panel">
        <?php the_sub_field('accordian_text');?>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>