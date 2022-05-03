<div class="container-fluid">
    <?php $bgColor = get_sub_field('background'); ?>
    <div class="bg-color <?php if($bgColor == true): echo 'highlight'; endif;?>">
        <div class="double">



            <?php $leftImage = get_sub_field('left_image');?>

            <div class="banner">

                <div class="inline-cta" style="background:url(<?php echo $leftImage['url']; ?>);">

                    <div class="content">

                        <h2 class="heading heading__lg heading__caps heading__light">
                            <?php  the_sub_field('left_title');?>
                        </h2>

                        <p class="no-mob"><?php  the_sub_field('left_copy');?></p>

                        <?php 
$link = get_sub_field('left_button_target');
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


            <?php $rightImage = get_sub_field('right_image');?>

            <div class="banner">

                <div class="inline-cta" style="background:url(<?php echo $rightImage['url']; ?>);">

                    <div class="content">

                        <h2 class="heading heading__lg heading__caps heading__light">
                            <?php  the_sub_field('right_title');?>
                        </h2>

                        <p class="no-mob"><?php  the_sub_field('right_copy');?></p>

                        <?php 
$link = get_sub_field('right_button_target');
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


            <!--col-->

        </div>

    </div>
</div>