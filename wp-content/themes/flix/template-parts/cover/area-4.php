<?php $slider_class = isset($fa->post_count) && $fa->post_count > 1 ? 'vlog-featured-slider-4' : ''; ?>
<div class="vlog-featured-4">

<div class="<?php echo esc_attr($slider_class); ?>">


	<?php if($fa->have_posts()): ?>

		<?php while( $fa->have_posts()): $fa->the_post(); ?>

    <div class="fa-item">
      <a class="fa-item-image" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
      	 <?php echo vlog_get_featured_image('vlog-cover-large', false, false, true ); ?>
		 <?php if( vlog_get_option('cover_display_play_icon')) { ?>
			<?php get_template_part('template-parts/play-icon'); ?>
		 <?php } ?>
      </a>
		<?php if( has_tag() ) { ?>
			<div class="tags-wrapper">
				<?php
					$tags = get_the_tags();
					$count=0;
					if ($tags) {
						foreach($tags as $tag) {
							$count++;
							echo '<a href="' . get_tag_link($tag->term_id) . '" class="vlog-format-label">' . $tag->name . '</a>';
							if($count > 5) break;
						}
					}
				?>
			</div>
		<?php } ?>

      <div class="fa-inner">

        <?php $taxs = array(); ?>
        <?php if( vlog_get_option( 'lay_fa4_cat' ) && $cat = vlog_get_category() ) : ?>
            <?php $taxs[] = $cat; ?>
        <?php endif; ?>

        <?php if( vlog_get_option( 'lay_fa4_serie' ) && $serie = vlog_get_serie() ) : ?>
            <?php $taxs[] = $serie; ?>
        <?php endif; ?>

        <?php if( !empty($taxs) ): ?>
            <span class="entry-category"><?php echo implode(', ', $taxs ); ?></span>
        <?php endif; ?>

    		<?php the_title( sprintf( '<h2 class="entry-title h1"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if( $meta = vlog_get_meta_data( 'fa4' ) ) : ?>
				  <div class="entry-meta"><?php echo $meta; ?></div>
	  		<?php endif; ?>


      </div>

  	</div>

		<?php endwhile; ?>

	<?php endif; ?>


</div>


</div>
