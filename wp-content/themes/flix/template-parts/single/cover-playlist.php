<?php $related = vlog_get_related_videos(); ?>

<?php if( $related->have_posts() ) : ?>

	<div id="vlog-cover-related" class="vlog-playlist-wrapper">
		<div class="row">
		    <div class="vlog-module module-posts col-sm-12 col-md-12 col-lg-12">

                <?php echo vlog_module_heading(array('title' => '<h4 class="widget-title">'.__vlog('related_cover_title').'</h4>')); ?>

			    <div class="row vlog-posts vlog-scrollbar">
			    	<?php while ( $related->have_posts() ) : $related->the_post(); ?>
			     		<?php get_template_part( 'template-parts/single/cover-playlist', 'post' ); ?>
			     	<?php endwhile; ?>
			    </div>

			</div>
		</div>
	</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>