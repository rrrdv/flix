<?php if (!vlog_is_video_inplay_mode() && is_single()) { ?>
    <a class="vlog-cover" href="javascript: void(0);" data-action="video" data-id="<?php echo esc_attr(get_the_ID()); ?>">
        <?php echo vlog_get_featured_image('vlog-cover-full', false, false, true); ?>
        <span class="vlog-format-action large"><i class="fa fa-play"></i></span>
    </a>
    <div class="video-wrap">
        <?php the_content(); ?>
    </div>
<?php } elseif (is_front_page()) { ?>
    <div class="video-wrap">
        <a class="overlay-home" href="<?php echo get_permalink(); ?>">
            <?php echo vlog_get_featured_image(); ?>
            <?php if(vlog_get_option('cover_display_play_icon')) { ?>
                <span class="vlog-format-action small"><i class="fa fa-play"></i></span>
            <?php } ?>
        </a>
        <?php the_content(); ?>
    </div>
<?php } ?>
