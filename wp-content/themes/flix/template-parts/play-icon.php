<?php if (vlog_get_option('play_icon') == "1") { ?>
    <span class="vlog-format-action large icon-one"><i class="fa fa-play"></i></span>
<?php } elseif (vlog_get_option('play_icon') == "2") { ?>
    <span class="vlog-format-action"><img src="<?php echo get_template_directory_uri().'/assets/img/play.svg' ?>"</span>
<?php } else { ?>
    <span class="vlog-format-action large white round"><i class="fa fa-play"></i></span>
<?php } ?>
