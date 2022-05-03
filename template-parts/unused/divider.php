<div class="container-fluid">
    <?php $bgReverse = get_sub_field('background_reverse');
    $dividerImage = get_sub_field('divider_image'); ?>
    <div class="divider <?php if($bgReverse == true): echo 'reverse'; endif;?>">
        <div class="divider__top"></div>
        <div class="divider__image"><img src="<?php echo $dividerImage['url'];?>" /></div>
        <div class="divider__bottom"></div>
    </div>
</div>