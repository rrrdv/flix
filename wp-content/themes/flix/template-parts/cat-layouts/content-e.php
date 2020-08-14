<?php require('entry-data.php'); ?>

<article <?php post_class('vlog-lay-e vlog-cat col-lg-4 col-sm-4 col-md-4 col-xs-12'); ?>>
	<?php if ($fimg = vlog_get_featured_image('vlog-lay-e', $module)) { ?>
		<div class="entry-image">
			<a href="<?php echo esc_url(get_term_link($cat_id)); ?>" title="<?php echo esc_html($cat_name); ?>">
				<?php echo $fimg; ?>
				<?php echo $entry_image; ?>
			</a>
		</div>
	<?php } ?>
	<?php echo ($entry_data ? $entry_data : ''); ?>
</article>
