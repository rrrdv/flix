<article <?php post_class('vlog-lay-f lay-horizontal vlog-post col-lg-4 col-sm-4 col-md-4 col-md-f6 col-xs-12'); ?>>
    <div class="row">

        <div class="col-lg-6 col-md-6 col-xs-6">
            <?php if( $fimg = vlog_get_featured_image('vlog-lay-f') ) : ?>
                <div class="entry-image">
                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                   	<?php echo $fimg; ?>
                    <?php if( vlog_get_option('lay_a_display_play_icon')) { ?>
         	       	      <span class="vlog-format-action x-small"><i class="fa fa-play"></i></span>
         	       	<?php } ?>
                </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-6 col-md-6 col-xs-6 no-left-padding">

            <div class="entry-header">

                <?php $taxs = array(); ?>
                <?php if( vlog_get_option( 'lay_f_cat' ) && $cat = vlog_get_category() ) : ?>
                    <?php $taxs[] = $cat; ?>
                <?php endif; ?>

                <?php if( vlog_get_option( 'lay_f_serie' ) && $serie = vlog_get_serie() ) : ?>
                    <?php $taxs[] = $serie; ?>
                <?php endif; ?>

                <?php if( !empty($taxs) ): ?>
                    <span class="entry-category"><?php echo implode(', ', $taxs ); ?></span>
                <?php endif; ?>

                <?php the_title( sprintf( '<h2 class="entry-title h6"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php if( $meta = vlog_get_meta_data( 'f' ) ) : ?>
                    <div class="entry-meta"><?php echo $meta; ?></div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</article>
