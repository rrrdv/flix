<?php require('entry-data.php'); ?>

<article <?php post_class('vlog-lay-c vlog-cat col-lg-6 col-md-6 col-sm-6 col-xs-12'); ?>>
	<?php if ($fimg = vlog_get_featured_image('vlog-lay-c', $module)) { ?>
		<div class="entry-image">
			<a href="<?php echo esc_url(get_term_link($cat_id)); ?>" title="<?php echo esc_html($cat_name); ?>">
				<?php echo $fimg; ?>
				<?php echo $entry_image; ?>
			</a>
		</div>
	<?php } ?>
	<?php echo ($entry_data ? $entry_data : ''); ?>
</article>
