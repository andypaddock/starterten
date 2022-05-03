<div class="row">
    <div class="tabs-wrapper norm-margin">
        <?php if( have_rows('tabs') ):
                $i = 1;
            while( have_rows('tabs') ): the_row();?>

        <input type="radio" name="tab" id="tab<?= $i;?>" class="tab-head"
            <?php if ($i === 1) echo 'checked="checked"'; ?> />
        <label for="tab<?= $i;?>"><?php the_sub_field('title');?></label>
        <?php $i ++;?>
        <?php endwhile; endif;?>


        <div class="tab-body-wrapper">
            <?php if( have_rows('tabs') ):
                $i = 1;
            while( have_rows('tabs') ): the_row();?>

            <div id="tab-body-<?= $i;?>" class="tab-body">
                <?php
                if( have_rows('content') ):
                while ( have_rows('content') ) : the_row();?>

                <?php if( get_row_layout() == 'icon_list' ):?>
                <div class="head">
                    <h3 class="heading heading__6"><?php the_sub_field('icon_heading');?></h3>
                    <p><?php the_sub_field('icon_copy');?></p>
                </div>
                <div class="icon-list">
                    <?php
                            if( have_rows('list_item') ):?>
                    <?php while ( have_rows('list_item') ) : the_row();?>
                    <div class="icon-list__item">
                        <img src="<?php the_sub_field('icon');?>" />
                        <h3 class="heading heading__5 heading__accent"><?php the_sub_field('heading');?></h3>
                        <?php the_sub_field('copy');?>
                    </div>
                    <?php endwhile; endif;?>
                </div>
                <?php endif;?>

                <!--***** END ICON LIST *****-->

                <?php if( get_row_layout() == 'team' ):?>
                <div class="head">
                    <h3 class="heading heading__6"><?php the_sub_field('team_heading');?></h3>
                    <p><?php the_sub_field('team_copy');?></p>
                </div>
                <div class="team-list">
                    <?php
                            if( have_rows('team_member') ):?>
                    <?php while ( have_rows('team_member') ) : the_row();
                            $teamImage = get_sub_field('image');?>
                    <div class="team-list__item">
                        <div class="image">
                            <img <?php $thisImage = $teamImage;
                                            $largeImage = $thisImage['sizes']['large'];
                                            ?> src="<?php echo $largeImage;?>"
                                title="<?php echo $thisImage['title'];?>" alt="<?php echo $thisImage['alt'];?>" />
                        </div>
                        <div class="detail">
                            <h3 class="heading heading__4"><?php the_sub_field('name');?></h3>
                            <h3 class="heading heading__7"><?php the_sub_field('position');?></h3>
                            <p><?php the_sub_field('bio');?></p>
                        </div>
                    </div>
                    <?php endwhile; endif;?>
                </div>
                <?php endif;?>

                <!--***** END TEAM SECTION *****-->

                <?php if( get_row_layout() == 'toggle_list' ):?>
                <div class="head">
                    <h3 class="heading heading__6"><?php the_sub_field('toggle_heading');?></h3>
                    <p><?php the_sub_field('toggle_copy');?></p>
                </div>
                <div class="toggle-list js-toggle-wrapper">
                    <?php
                        if( have_rows('toggle_item') ):
                            $t = 1;?>
                    <?php while ( have_rows('toggle_item') ) : the_row();?>
                    <div class="toggle-list__item js-toggle-parent">
                        <div class="head js-toggle-trigger">
                            <p>0<?= $t;?></p>
                            <h4 class="heading heading__5"><?php the_sub_field('heading');?></h4>
                        </div>
                        <div class="body js-toggle-target">
                            <p><?php the_sub_field('copy');?></p>
                        </div>
                    </div>
                    <?php $t ++;?>
                    <?php endwhile; endif;?>
                </div>

                <?php
                    if( have_rows('call_to_action') ):?>
                <?php while ( have_rows('call_to_action') ) : the_row();
                    $ctaImage = get_sub_field('background_image');?>
                <div class="image-cta">
                    <div class="background-image">
                        <img <?php $thisImage = $ctaImage;
                            $largeImage = $thisImage['sizes']['large'];
                            ?> src="<?php echo $largeImage;?>" title="<?php echo $thisImage['title'];?>"
                            alt="<?php echo $thisImage['alt'];?>" />
                    </div>
                    <a href="<?php the_sub_field('button_target');?>" target="_blank" class="button button__boxed">
                        <?php the_sub_field('button_text');?>
                    </a>
                </div>
                <?php endwhile; endif;?>

                <?php endif;?>

                <!--***** END TOGGLE LIST *****-->

                <?php endwhile; endif;?>

            </div>
            <?php $i ++;?>
            <?php endwhile; endif;?>
        </div>

    </div>
</div>