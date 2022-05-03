<div class="socials mobile">
    <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
    <a href="<?php the_sub_field('page_link'); ?>" class="<?php the_sub_field('name'); ?>" target="_blank"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
    <?php endwhile; endif; ?>
</div>