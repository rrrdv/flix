<?php do_action('vlog_before_end_content'); ?>
<?php get_template_part('template-parts/ads/above-footer'); ?>

</div><!-- id="content" -->


    <footer id="footer" class="vlog-site-footer">

    	<?php if( vlog_get_option('footer_widgets') ): ?>

	        <div class="container">
                <div id="fdiscl" class="row">
                    <?php if (vlog_get_option('footer_disclaimer')) { ?>
                        <div id="footer_discl" class="col-md-12">
                            <div>
                                <?php echo vlog_get_option('footer_disclaimer'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                </div>

	            <div class="row">
	                <?php
						$layout = explode( "_", vlog_get_option('footer_layout') );
						$columns = $layout[0];
						$col_class = $layout[1];
					?>

					<?php for($i = 1; $i <= $columns; $i++) : ?>
						<div class="col-lg-<?php echo esc_attr($col_class); ?> col-md-<?php echo esc_attr($col_class); ?>">
							<?php if( is_active_sidebar( 'vlog_footer_sidebar_'.$i ) ) : ?>
								<?php dynamic_sidebar( 'vlog_footer_sidebar_'.$i );?>
							<?php endif; ?>
						</div>
					<?php endfor; ?>

	            </div>
	        </div>

	    <?php endif; ?>

        <?php if( vlog_get_option('footer_bottom') ): ?>

    	<?php endif; ?>

    </footer>

<?php if( vlog_get_option( 'content_layout' ) == 'boxed' ): ?>
		</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>
