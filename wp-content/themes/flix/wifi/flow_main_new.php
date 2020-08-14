<?php
//
// use Wordpress\Multisite\Commons\Decorator\GetPost;
// use Wordpress\Multisite\Commons\TemplateSettings;
// use Wordpress\Membership\Commons\Subscription;
// use Wordpress\Multisite\Commons\Support\Facades\Session;
// use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
//
// global $post;
// Session::append('post_id', get_the_ID());
//
// GetPost::instance()->setViews(get_the_ID());

//$categories = get_the_category(get_the_ID());
//
// $price = Subscription::instance()->price();
// $postImage = urldecode(Flow::instance()->getPostImage(655, 369));

//$countryCode = get_option('GeneralAdapter_options')['GeneralAdapter_CountryCode'];

get_header();
$logo = vlog_get_option('logo');
$brand = !empty($logo) ? '<img class="vlog-logo" src="'.esc_url($logo).'" alt="'.esc_attr(get_bloginfo('name')).'" >' : get_bloginfo('name');
$price_info = vlog_get_option('price_info');

?>
<script type="text/javascript">
    jQuery("#msisdn").keydown(function(e) {
    var oldvalue=jQuery(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('+<?php echo json_encode($countryCode); ?>') !== 0) {
            jQuery(field).val(oldvalue);
        }
    }, 1);
    });

    //phone validation = exclude backspace + length not more than 15 + only numbers 0-9
    jQuery('#wifi-phone-input').keypress(function(e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key != 8 && (this.value.length == 15 || key < 48 || key > 57)) {
            if (e.preventDefault) {
                e.preventDefault();
            }
            else {
                e.returnValue = false;
            }
        }
    });

    /* PIN model */
    jQuery(document).ready(function($){
        let check_tcs;
        check_tcs = $('.wifiTerms:eq(0):checked, .wifiTerms:eq(1):checked').length == 2;

        function msisdnHide() {
            const msisdnModel = document.getElementById('msisdn');
            msisdnModel.style.cssText = 'animation: scale-display--reversed .3s; animation-fill-mode:forwards; display: none;';
        }
        function pinWrapperShow() {
            const pinWrapperModel = document.getElementById('pin');
            pinWrapperModel.style.cssText = 'animation: scale-display .3s; display: flex;';
            if(check_tcs) {
                $('.terms-error').hide();
            }
            $('.cancel').addClass('col-md-push-3')
        }

        $('#msisdn .wifi_submit button').click(function() {
            var phone_number = $('#wifi-phone-input').val().length;

            if (phone_number < 8 || phone_number > 13) {
                $('.error-tooltip.phone').show();
                if (phone_number > 7 && phone_number < 14) {
                    $('.error-tooltip.phone').hide();
                }
            }
            if(!check_tcs) {
                $('.terms-error').show();
                check_tcs = $('.wifiTerms:eq(0):checked, .wifiTerms:eq(1):checked').length == 2;
                $(this).click();
            } else {
                msisdnHide();
                pinWrapperShow();
            }
        });
    });
</script>

<?php if (vlog_get_option('wifi_structure') == 'modal') {
    ?>
    <div class="modal-wrap">
        <section class="modal modalWindow" id="modal">
            <section class="modalWrapper">
                <div class="wifi-image-wrap">
                    <img src="<?php echo $postImage; ?>" class="wifi-post-image" />
                    <h5><?php echo get_the_title($id); ?></h5>
                </div>
                <?php if (vlog_get_option('wifi_show_description')) {
        ?>
                    <p class="description"><?php echo get_description(); ?></p>
                <?php
    } ?>
                <?php if (vlog_get_option('wifi_tags_description')) {
        ?>
                    <div class="meta-tags">
            			<?php the_tags(false, ' ', false); ?>
            		</div>
                <?php
    } ?>
                <?php if (vlog_get_option('wifi_show_logo')) {
        ?>
                    <div class="wifi-page-logo">
                        <a href="<?php echo esc_url($logo_url); ?>" rel="home"><?php echo $brand; ?></a>
                    </div>
                <?php
    } ?>
                <h6 class="subscribe"><?php echo __vlog('subscribe_text', 'vlog') ?></h6>
                <?php if ($price_info) {
        ?>
                    <p class="modal-price-info"><?php echo $price_info; ?></p>
                <?php
    } ?>
                <div class="wifi-form-title"><?php echo __vlog('phone_number', 'vlog'); ?></div>
                <form action="<?php echo site_url() ?>" method="post" id="msisdn-form" onsubmit="return msisdn_validate(this);">
                    <input type="hidden" value="<?php the_ID(); ?>" name="post_id">
                    <div class="wifi-form-group">
                        <div class="wifi-input-composite">
                            <label><?php echo '+'.$countryCode; ?></label>
                            <input type="number" id="wifi-phone-input" inputmode="numeric" maxlength="15" pattern="[+0-9]*" name="msisdn" onkeydown="return inputFilter(event, 'number');" required />
                        </div>
                    </div>
                    <div class="wifi-form-group2">
                        <label for="wifi-carrier"><?php echo __vlog('select_carrier', 'vlog'); ?></label><span class="wifi_prefix_arrow"></span>
                        <select name="carrier" id="wifi-carrier-input">
                            <option value="select"><?php echo __vlog('select', 'vlog'); ?></option>
                            <?php
                            foreach ($carriers as $key => $carrier) {
                                echo '<option value="'.$key.'">'.$carrier.'</option>';
                            } ?>
                        </select>

                    </div>
                    <div class="terms">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'=>'wifi-terms-conditions',
                                    'before'=>'<input type="checkbox" class="wifiTerms"/>',
                                    'after'=>'<span class="checkmark"></span>'
                                )
                            ); ?>
                    </div>
                    <div class="wifi_submit">
                        <button type="submit" class="button-primary"><?php echo __vlog('continue'); ?></button>
                        <div class="exit">
                            <a href="<?php echo site_url() ?>"><?php echo __vlog('cancel'); ?></a>
                        </div>
                    </div>
                </form>
                <div class="wifi-policy">
                    <?php echo vlog_get_option('wifi_disclaimer_bottom'); ?>
                </div>
                <div class="wifi-login">
                    <span><?php echo __vlog('already_have_account'); ?></span>
                    <?php echo '<a class="button" href="' . wp_login_url(home_url()) . '">'.__vlog('log_in').'</a>' ?>
                </div>
            </section>
        </section>
    </div>
    <div class="modal overlay"></div>

    <?php while (have_posts()) : the_post(); ?>

    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    		<?php $single_cover = vlog_get_single_layout(); ?>
    		<?php if ($single_cover != 'none'): ?>
    			<?php get_template_part('template-parts/single/cover', $single_cover); ?>
    		<?php endif; ?>

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
    <?php break;
    endwhile; ?>
<?php
} else {
        ?>
    <?php while (have_posts()) : the_post(); ?>

    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    		<?php $single_cover = vlog_get_single_layout(); ?>
    		<?php //if ($single_cover != 'none'): //VPG-6553 - Wi-Fi page isn't working with Classic layout ?>
                <div class="vlog-featured vlog-featured-1 vlog-single-cover <?php echo vlog_is_video_inplay_mode() ? esc_attr('inplay-mode-acitve') : ''; ?> <?php echo vlog_get_option('display_playlist_mode') ? esc_attr('vlog-playlist-mode-acitve') : ''; ?>">
            		<div class="vlog-featured-item">
            			<?php $format = vlog_get_post_format(true); ?>
            			<div class="vlog-cover-bg video">
                            <?php if (!vlog_is_video_inplay_mode() && is_single()) {
            ?>
                            <div class="wifi-overlay">
                                <a class="wifi-pic" href="#wifi-form">
                                    <?php echo vlog_get_featured_image('vlog-cover-full', false, false, true); ?>
                                    <div class="wifi-video-overlay">
                                        <?php echo __vlog('subscribe_text', 'vlog') ?>
                                        <div class="arrow-down"></div>
                                    </div>

                                </a>
                                <div class="video-wrap">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <?php
        } ?>
            				<?php get_template_part('template-parts/single/prev-next-cover'); ?>
            			</div>
            			<?php if (vlog_display_cover_info($format)): ?>
            				<div class="vlog-featured-info container vlog-cover-hover-mode vlog-f-hide">
            					<div class="row">
            							<div class="col-lg-12">
            								<div class="vlog-featured-info-bg vlog-highlight">
            									<div class="entry-header">
            						                <?php $taxs = array(); ?>
            										<?php if (vlog_get_option('single_cat') && $cat = vlog_get_category()) : ?>
            										    <?php $taxs[] = $cat; ?>
            										<?php endif; ?>
            										<?php if (!empty($taxs)): ?>
            										    <span class="entry-category"><?php echo implode(', ', $taxs); ?></span>
            										<?php endif; ?>
            						                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            							          <?php if ($meta = vlog_get_meta_data('single')) : ?>
            		                				<div class="entry-meta"><?php echo $meta; ?></div>
            		            				  <?php endif; ?>
            						             </div>
            						             <?php if ($actions = vlog_get_meta_actions('single')) : ?>
            							             <div class="entry-actions vlog-vcenter-actions">
            							             	<?php echo $actions; ?>
            							             </div>
            							         <?php endif; ?>
            					            </div>
            					        </div>
            					</div>
            				</div>
            			<?php endif; ?>
            			<?php get_template_part('template-parts/single/cover-inplay'); ?>
            		</div>
                </div>

    		<?php //endif; ?>

    		<?php global $vlog_sidebar_opts; ?>
    		<?php $section_class = $vlog_sidebar_opts['use_sidebar'] == 'none' ? 'vlog-single-no-sid' : '' ?>

    		<div class="vlog-section <?php echo esc_attr($section_class); ?>">
    			<div class="container">
    					<div class="vlog-content vlog-single-content">

    						<?php if ($breadcrumbs = vlog_breadcrumbs()): ?>
    							<?php echo $breadcrumbs; ?>
    						<?php endif; ?>
    						<?php //if ($single_cover == 'none'): ?>
    							<?php //get_template_part('template-parts/single/classic'); ?>
    						<?php //endif; ?>

    						<?php get_template_part('template-parts/single/content'); ?>

                          <!-- START WIFI FORM -->
                          <form action="" method="post" id="msisdn-form">
                            <div class="wifi-wrapper" id="wifi-form">
                                <div class="corner-ribbon top-right"><?php echo __vlog('wifi_subcription_badge'); ?></div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="subscribe"><?php echo __vlog('wifi_subcription_form_title_only') . ' ' . $price . '€ ' . __vlog('wifi_subcription_form_title_weekly'); ?></h2>
                                        <?php if ($price_info) {
            ?>
                                            <p class="modal-price-info"><?php echo $price_info; ?></p>
                                        <?php
        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="terms">
                                            <?php
                                            if (has_nav_menu('wifi-terms-conditions')) {
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'wifi-terms-conditions',
                                                        'before' => '<input type="checkbox" class="wifiTerms"/>',
                                                        'after' => '<span class="checkmark"></span>'
                                                    )
                                                );
                                            } ?>
                                            <span class="terms-error"><?php echo __vlog('error_terms', 'vlog'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row wifi-form" id="msisdn">
                                    <div class="col-md-3 col-xs-12">
                                        <div class="wifi-form-title"><?php echo __vlog('phone_number', 'vlog'); ?></div>
                                        <div class="wifi-input-composite">
                                            <label><?php echo '+'.$countryCode; ?></label>
                                            <input type="number" id="wifi-phone-input" inputmode="numeric" minlength="8" maxlength="13" pattern=".{8,13}" name="msisdn" onkeydown="return inputFilter(event, 'number');" required />
                                            <span class="error-tooltip phone"><?php echo __vlog('phone_number_error', 'vlog'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="wifi-form-title"><?php echo __vlog('select_carrier', 'vlog'); ?></div>
                                        <select name="carrier" required id="wifi-carrier-input">
                                            <?php
                                            foreach ($carriers as $key => $carrier) {
                                                echo '<option value="'.$key.'">'.$carrier.'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="wifi_submit">
                                            <button type="button" class="button-primary"><?php echo __vlog('continue'); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- START PIN FORM -->
                                <div class="row wifi-form" id="pin">
                                    <div class="col-md-3 col-xs-12">
                                        <div class="wifi-form-title"><?php echo __vlog('pin_text', 'vlog'); ?></div>
                                        <div class="wifi-input-composite">
                                            <label>PIN</label>
                                            <input type="number" id="wifi-pin-input" inputmode="numeric" maxlength="6" pattern="[+0-9]*" name="msisdn" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="wifi_submit">
                                            <button type="submit" onclick="window.location.href='<?php echo site_url() ?>';" class="button-primary"><?php echo __vlog('second_continue'); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PIN FORM -->
                                <div class="row">
                                    <div class="cancel col-sm-12 col-md-3 col-md-push-6 center">
                                        <div class="exit">
                                            <a href="<?php echo  site_url() ?>"><?php echo __vlog('cancel'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                          <!-- END WIFI FORM -->
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
    <?php break;
        endwhile; ?>
<?php
    } ?>
<?php get_footer(); ?>

<script>
function inputFilter(evt, type) {
    var key = evt.keyCode || evt.which;
    var is_ok = (((key >= 48 && key <= 57) && (evt.key >= 0 && evt.key <= 9)) || key == 8 || key == 16);
    if (!is_ok) {
        return false;
    }
    if (type == 'number') {
        var regex = /^8$|^13$|4[8-9]|5[0-7]/g;
        if (!regex.test(key)) {
            return false;
        }
    }
}
</script>
