<?php get_header(); ?>

<?php global $vlog_sidebar_opts; ?>
<?php $section_class = $vlog_sidebar_opts['use_sidebar'] == 'none' ? 'vlog-single-no-sid' : '' ?>

<div class="vlog-section <?php echo esc_attr( $section_class ); ?>">
	<?php the_title( '<h1 class="entry-title vlog-page-title">', '</h1>' ); ?>
	<div class="container">

			<?php if( $vlog_sidebar_opts['use_sidebar'] == 'left' ): ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

			<div class="vlog-content">

				<?php if( $breadcrumbs = vlog_breadcrumbs() ): ?>
						<?php echo $breadcrumbs; ?>
				<?php endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="entry-content entry-content-single">
							<?php the_content(); ?>
						</div>

						<?php if( vlog_is_paginated_post() ) : ?>
							<?php get_template_part( 'template-parts/single/paginated-nav' ); ?>
						<?php endif; ?>

					</article>

				<?php endwhile; ?>

			</div>

			<?php if( $vlog_sidebar_opts['use_sidebar'] == 'right' ): ?>
					<?php get_sidebar(); ?>
			<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>
