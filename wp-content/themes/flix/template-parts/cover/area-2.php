<?php
$slider_class = isset($fa->post_count) && $fa->post_count > 1 ? 'vlog-featured-slider' : '';
$format = vlog_get_post_format(true);
$taxs = array();
if (vlog_get_option('lay_fa2_cat') && $cat = vlog_get_category()) {
	$taxs[] = $cat;
}
if (vlog_get_option('lay_fa2_serie') && $serie = vlog_get_serie()) {
	$taxs[] = $serie;
}
?>
<div class="vlog-featured-2 <?php echo esc_attr($slider_class); ?>">
	<?php if ($fa->have_posts()) { ?>
		<?php while ($fa->have_posts()) : $fa->the_post(); ?>
			<div class="vlog-featured-item <?php echo esc_attr($format); ?>">
				<div class="vlog-cover-bg">
					<?php get_template_part('template-parts/formats/'.vlog_get_post_format(true).'-cover'); ?>
				</div>
				<div class="vlog-featured-info-2 container vlog-pe-n vlog-active-hover vlog-f-hide">
					<div class="vlog-fa-item">
						<div class="entry-header vlog-pe-a">
		                    <?php if (!empty($taxs)) { ?>
		                        <span class="entry-category"><?php echo implode(', ', $taxs); ?></span>
		                    <?php } ?>
			                <?php the_title(sprintf('<h2 class="entry-title h1"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
				            <?php if ($meta = vlog_get_meta_data('fa2')) { ?>
	    						<div class="entry-meta"><?php echo $meta; ?></div>
					  		<?php } ?>
			             </div>
		             </div>
		             <?php if ($actions = vlog_get_meta_actions('fa2')) { ?>
		             	<div class="vlog-fa-item">
						   <div class="entry-actions vlog-pe-a"><?php echo $actions; ?></div>
						</div>
					<?php } ?>
				</div>
				<div class="vlog-format-inplay vlog-bg">
					<div class="container"></div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php } ?>
</div>
