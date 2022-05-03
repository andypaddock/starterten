<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="faq-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="col toggle-block block accordion">



            <?php if( have_rows('faq_item') ): 
            
                     while ( have_rows('faq_item') ) : the_row(); ?>


            <div class="block__item">
                <div class="block__title">
                    <h3 class="heading"><span
                            class="highlight-letter"><?php the_sub_field('letter'); ?></span><?php the_sub_field('title'); ?>
                    </h3>
                </div>
                <div class="block__text">
                    <?php the_sub_field('description'); ?>
                    <?php 
$link = get_sub_field('faq_link');
$callBack = get_sub_field('call_back');
if( $link ): 
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
	?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php if($callBack == true): echo '<i class="fas fa-phone"></i>'; endif;?>
                        <?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>

            </div>

            <?php endwhile; endif; ?>


        </div>
    </div>
</section>