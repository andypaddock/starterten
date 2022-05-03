<div class="container-fluid">
    <?php $bgBleed = get_sub_field('bleed_reverse'); ?>
    <div class="overlap <?php if($bgBleed == true): echo 'reverse'; endif;?>">
        <div class="divider__bleed"></div>
    </div>
</div>