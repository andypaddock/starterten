<section class="section-links">
    <div class="row w70">
        <?php $actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
        <div class="col-1-of-3">
            <?php $link1 = get_field('link_one','options'); ?>
            <a class="<?php if($actual_link == $link1) echo 'active' ?>"
                href="<?php the_field('link_one','options'); ?>">
                <div class="feature-box">
                    <?php get_template_part("inc/img/exec"); ?>
                    <h3 class="heading-tertiary light"><?php the_field('link_one_title','options'); ?></h3>
                    <?php the_field('sub_title_one','options'); ?>
                    <div class="arrow">
                        <?php get_template_part("inc/img/down"); ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-1-of-3">
            <?php $link2 = get_field('link_two','options'); ?>
            <a class="<?php if($actual_link == $link2) echo 'active' ?>"
                href="<?php the_field('link_two','options'); ?>">
                <div class="feature-box">
                    <?php get_template_part("inc/img/single"); ?>
                    <h3 class="heading-tertiary light"><?php the_field('link_two_title','options'); ?></h3>
                    <?php the_field('sub_title_two','options'); ?>
                    <div class="arrow">
                        <?php get_template_part("inc/img/down"); ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-1-of-3">
            <?php $link3 = get_field('link_three','options'); ?>
            <a class="<?php if($actual_link == $link3) echo 'active' ?>"
                href="<?php the_field('link_three','options'); ?>">
                <div class="feature-box">
                    <?php get_template_part("inc/img/small"); ?>
                    <h3 class="heading-tertiary light"><?php the_field('link_three_title','options'); ?>
                    </h3>
                    <?php the_field('sub_title_three','options'); ?>
                    <div class="arrow">
                        <?php get_template_part("inc/img/down"); ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>