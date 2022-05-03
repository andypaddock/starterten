<div class="container-fluid">
    <?php $bgColor = get_sub_field('background'); ?>
    <div class="bg-color <?php if($bgColor == true): echo 'highlight'; endif;?>">
        <div class="about-carousel owl-carousel owl-theme">

            <?php if( have_rows('process') ):
        while ( have_rows('process') ) : the_row();
        $imageItem = get_sub_field('image');
        ?>



            <div class="row process__item mb3">

                <div class="col-6">
                    <div class="process-image" style="background-image: url(<?php echo $imageItem['url'];?>);"></div>

                </div>
                <!--col-->

                <div class="col-6">
                    <div class="content">
                        <h3 class="heading heading__lg heading__caps"><?php the_sub_field( 'heading' );?>

                            <?php if(get_sub_field('sub_heading')):?>
                            <span><?php the_sub_field( 'sub_heading' );?></span>
                            <?php endif;?>

                        </h3>

                        <?php the_sub_field( 'copy' );?>
                    </div>
                </div>
                <!--col-->

            </div>
            <!--r-->

            <?php endwhile; endif;?>
        </div>
    </div>
</div>