<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="logo-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="split-col">

            <div class="logo fmleft">
                <?php get_template_part('inc/img/cplogolrg');?>
                <h3 class="heading-secondary"><?php the_sub_field('tag_line'); ?></h3>
            </div>
            <div class="text fmright">
                <p class="lead"><?php the_sub_field('lead_paragraph'); ?></p><?php the_sub_field('paragraphs'); ?>
            </div>
        </div>

    </div>
</section>