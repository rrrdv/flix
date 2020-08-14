<?php //use Wordpress\Multisite\Commons\Support\Facades\Session; ?>
<?php get_header(); ?>
<?php //$flow = Session::get('flow'); ?>
<?php while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php $single_cover = vlog_get_single_layout(); ?>
		<?php if ($single_cover != 'none'): ?>
			<?php get_template_part('template-parts/single/cover', $single_cover); ?>
		<?php endif; ?>
		<?php get_template_part('template-parts/ads/below-header'); ?>
		<?php global $vlog_sidebar_opts; ?>
		<?php $section_class = $vlog_sidebar_opts['use_sidebar'] == 'none' ? 'vlog-single-no-sid' : '' ?>

		<div class="vlog-section <?php echo esc_attr($section_class); ?>">

			<div class="container">

					<?php if ($vlog_sidebar_opts['use_sidebar'] == 'left'): ?>
						<?php get_sidebar(); ?>
					<?php endif; ?>

					<div class="vlog-content vlog-single-content">

						<?php if ($breadcrumbs = vlog_breadcrumbs()): ?>
							<?php echo $breadcrumbs; ?>
						<?php endif; ?>

						<?php if ($single_cover == 'none'): ?>
							<?php get_template_part('template-parts/single/classic'); ?>
						<?php endif; ?>

						<?php get_template_part('template-parts/single/content'); ?>
						<?php get_template_part('template-parts/ads/below-single'); ?>
						<?php get_template_part('template-parts/single/prev-next'); ?>

						<?php if (vlog_get_option('single_related')) : ?>
							<?php get_template_part('template-parts/single/related'); ?>
						<?php endif; ?>

					</div>

					<?php if ($vlog_sidebar_opts['use_sidebar'] == 'right'): ?>
						<?php get_sidebar(); ?>
					<?php endif; ?>

			</div>

		</div>

	</article>
<?php break; endwhile; ?>
<script type="text/javascript">
	jQuery(window).load(function($){
        var video = jQuery('.video video');
        var flow = '<?php echo $flow; ?>';
        jQuery(video).prop('muted', true);
        if (flow == 'autop') {
        	jQuery('.vlog-cover').hide();
            var playPromise = document.querySelector('video').play();
            if (playPromise !== undefined) {
              playPromise.then(function() {}).catch(function(error) {});
            }
        } else {
            return;
        }
    });
</script>

<?php get_footer(); ?>
