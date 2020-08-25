<?php
$slider_class = isset($fa->post_count) && $fa->post_count > 1 ? 'vlog-featured-slider' : '';
$format = vlog_get_post_format(true);
?>
<div class="container">
	<div class="vlog-featured-wrapper-7">
		<div class="vlog-featured-7 <?php echo esc_attr($slider_class); ?>">
			<?php if ($fa->have_posts()) { ?>
				<?php while ($fa->have_posts()) : $fa->the_post(); ?>
					<div class="vlog-featured-item <?php echo esc_attr($format); ?>">
						<div class="vlog-cover-bg">
							<?php get_template_part('template-parts/formats/'.vlog_get_post_format(true).'-cover'); ?>
							<div class="vlog-featured-info-7 container vlog-pe-n vlog-active-hover vlog-f-hide">
								<div class="vlog-fa-item">
									<div class="entry-header vlog-pe-a">
										<?php $taxs = array(); ?>
										<?php if( vlog_get_option( 'lay_fa7_cat' ) && $cat = vlog_get_category() ) : ?>
											<?php $taxs[] = $cat; ?>
										<?php endif; ?>
										<?php if( !empty($taxs) ): ?>
											<span class="entry-category"><?php echo implode(', ', $taxs ); ?></span>
										<?php endif; ?>
										<?php the_title(sprintf('<h2 class="entry-title h1"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
										<?php if ($meta = vlog_get_meta_data('fa7')) { ?>
											<div class="entry-meta"><?php echo $meta; ?></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="vlog-format-inplay vlog-bg">
							<div class="container"></div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php } ?>
		</div>
	</div>
</div>
