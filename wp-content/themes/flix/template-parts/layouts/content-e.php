<?php
	 $duration = trim(get_post_meta(get_the_ID(),'duration', true));
?>

<article <?php post_class('vlog-lay-e vlog-post col-lg-4  col-sm-4 col-md-4  col-xs-12'); ?>>

	<?php if( $fimg = vlog_get_featured_image('vlog-lay-e') ) : ?>
    <div class="entry-image">
    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
       	<?php echo $fimg; ?>
		<?php if( vlog_get_option('lay_e_display_play_icon')) { ?>
			  <span class="vlog-format-action small"><i class="fa fa-play"></i></span>
		<?php } ?>
					<?php if( has_tag() ) { ?>
							<div class="tags-wrapper">
									<?php
									$tags = get_the_tags();
									$count=0;
									if ($tags) {
										foreach($tags as $tag) {
											$count++;
											echo '<a href="' . get_tag_link($tag->term_id) . '" class="vlog-format-label">' . $tag->name . '</a>';
											if($count > 4) break;
										}
									}
									?>
							</div>
					 <?php } ?>
    </a>
    </div>
	<?php endif; ?>

	<div class="entry-header">

		<?php $taxs = array(); ?>
        <?php if( vlog_get_option( 'lay_e_cat' ) && $cat = vlog_get_category() ) : ?>
            <?php $taxs[] = $cat; ?>
        <?php endif; ?>

	    <?php the_title( sprintf( '<h2 class="entry-title h5"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</div>

	<?php if( $meta = vlog_get_meta_data( 'e' ) ) : ?>
			<div class="entry-meta"><?php echo $meta; ?></div>
	<?php endif; ?>

	<?php if( vlog_get_option('lay_e_description') ) : ?>
			<div class="entry-content">
					<?php echo get_description(); ?>
			</div>
	<?php endif; ?>

</article>
