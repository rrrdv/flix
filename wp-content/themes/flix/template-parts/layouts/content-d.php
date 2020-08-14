<article <?php post_class('vlog-lay-d lay-horizontal vlog-post col-lg-6 col-sm-6 col-md-6 col-xs-12'); ?>>
    <div class="row">

        <div class="col-lg-6 col-sm-6 col-xs-12">
            <?php if( $fimg = vlog_get_featured_image('vlog-lay-d') ) : ?>
                <div class="entry-image">
                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                   	<?php echo $fimg; ?>
                    <?php if( vlog_get_option('lay_d_display_play_icon')) { ?>
         	       	      <span class="vlog-format-action x-small"><i class="fa fa-play"></i></span>
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
                        							if($count > 1) break;
                        						}
                        					}
          									?>
          							</div>
          					 <?php } ?>
                </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-6 col-sm-6 col-xs-12">

            <div class="entry-header">

                <?php $taxs = array(); ?>
                <?php if( vlog_get_option( 'lay_d_cat' ) && $cat = vlog_get_category() ) : ?>
                    <?php $taxs[] = $cat; ?>
                <?php endif; ?>

                <?php if( vlog_get_option( 'lay_d_serie' ) && $serie = vlog_get_serie() ) : ?>
                    <?php $taxs[] = $serie; ?>
                <?php endif; ?>

                <?php if( !empty($taxs) ): ?>
                    <span class="entry-category"><?php echo implode(', ', $taxs ); ?></span>
                <?php endif; ?>

                <?php the_title( sprintf( '<h2 class="entry-title h5"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php if( $meta = vlog_get_meta_data( 'd' ) ) : ?>
                    <div class="entry-meta meta-item"><?php echo $meta; ?></div>
                <?php endif; ?>

            </div>

            <?php if( vlog_get_option('lay_d_description') ) : ?>
                <div class="entry-content">
                    <?php echo get_description(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</article>
