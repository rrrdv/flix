<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\TemplateSettings;
use Wordpress\Membership\Commons\Subscription;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\Support\Facades\GeneralAdapter;

Session::append('post_id', get_the_ID());

GetPost::instance()->setViews(get_the_ID());

$countryCode = GeneralAdapter::getCountryCode();

get_header();

?>

<style>
.shadowgr {
    filter: blur(8px);
    -webkit-filter: blur(8px);
}
.vlog-slot-c, .vlog-slot-r {
    display: none;
}
.msisdn-video-overlay {
    position: absolute;
    top: 10%;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: 1000;
    color: #fff;
    width: 850px;
    margin: 0 auto;
    line-height: 3.5rem;
    font-size: 3.5rem;
    font-weight: bold;
}
.plus18 {
    position: absolute;
    left: 0;
    top: 0;
    font-size: 0;
    background: url(https://s3-eu-west-1.amazonaws.com/wpupload/wp-content/uploads/sites/490/2019/12/20093143/18.png);
    background-size: contain;
    width: 40px;
    height: 40px;
}
.site-title .plus18 {
    left: 130px;
    top: 25%;
}
.avs-text {
    position: absolute;
    left: 0;
    top: 50px;
    text-align: left;
    font-weight: 100;
    opacity: 0.5;
}
.padlock {
    position: absolute;
    right: 0;
    top: 0;
    font-size: 0;
    background: url(https://s3-eu-west-1.amazonaws.com/wpupload/wp-content/uploads/sites/490/2019/12/20093141/locked-padlock.png);
    background-size: contain;
    background-repeat: no-repeat;
    width: 30px;
    height: 40px;
}
.vlog-format-action.large {
    padding: 23px 0 0 7px;
}
.msisdn {
    margin-top: -200px;
    text-align: center;
    z-index: 9999;
}
.msisdn-wrapper {
    margin-top: -150px;
    z-index: 9999;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}
.msisdn-form {
    width: 640px;
}
.wifi-policy {
    color: #fff;
}
#msisdn-phone-input,
#pin-input {
    background: #fff;
    color: #000;
    border-radius: 5px;
    box-shadow: 0 5px 10px 10px rgba(0, 0, 0, 0.4);
}
.wifi_submit button {
    width: 200px;
    text-transform: uppercase;
    font-weight: 800;
    font-size: 2rem;
    box-shadow: 2px 6px 12px 0 rgba(0,0,0,.5);
}
#msisdn, #pin {
    display: none;
}
.age-verification-main .wifi_submit button {
    display: block;
    margin: 0 auto;
    margin-bottom: 20px;
}
#policy-popup,
#pin-popup {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, .8);
    -webkit-transition: 500ms;
    transition: 500ms;
    z-index: 90000001;
    display: none;
    transition: opacity 1s ease-out;
    opacity: 0;
}
.policy-main,
.pin-main {
    position: relative;
    background: #6D6D6D;
    width: 350px;
    max-width: 80%;
    padding: 40px 20px;
    border-radius: 40px;
    margin: 10% auto;
    text-align: center;
}
.vlog-site-content .vlog-section:last-child {
    padding-bottom: 76px;
}
@keyframes scale-display {
	0% {
		opacity: 0;
		transform: scale(0);
    -webkit-transform: scale(0);
	}

	100% {
		opacity: 1;
		transform: scale(1);
    -webkit-transform: scale(1);
	}
}

@keyframes scale-display--reversed {
	0% {
		display: inline-flex;
		opacity: 1;
		transform: scale(1);
		-webkit-transform: scale(1);
	}
	99% {
		display: inline-flex;
		opacity: 0;
		transform: scale(0);
		-webkit-transform: scale(0);
	}
	100% {
		display: none;
		opacity: 0;
		transform: scale(0);
		-webkit-transform: scale(0);
	}
}

/* Mobile */
@media screen and (max-width: 768px) {
    .vlog-site-content .vlog-section:last-child {
        padding-bottom: 220px;
    }
    .msisdn-wrapper {
        margin-top: 0;
    }
    .msisdn-video-overlay {
        width: 100%;
        line-height: 1.5rem;
        font-size: 1.5rem;
    }
    .plus18 {
        left: 10px;
    }
    .site-title .plus18 {
        left: 60px;
        top: 10px;
    }
    .avs-text {
        left: 65px;
        top: 0;
    }
    .padlock {
        width: 40px;
        height: 53px;
        right: 50%;
        top: 50%;
        transform: translateX(50%) translateY(-50%);
    }
    .vlog-format-action.large {
        display: none;
    }
    .msisdn-form {
        width: 140%;
        margin-left: -20%;
        margin-right: 0;
    }
    .vlog-slot-l, .vlog-slot-r, .vlog-top-bar {
        display: none;
    }
}
</style>
<script type="text/javascript">
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
    jQuery("#msisdn-phone-input").keydown(function(e) {
    var oldvalue=jQuery(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('+<?php echo json_encode($countryCode); ?>') !== 0) {
            jQuery(field).val(oldvalue);
        }
    }, 1);
    });

    //phone validation = exclude backspace + length not more than 15 + only numbers 0-9
    jQuery('#msisdn-phone-input').keypress(function(e) {
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

    //age verification
    var ageCookieName = "age-verification-verified-43212342";
    var body = document.body;
    var wrapper = document.getElementById("content");

    function ageSetCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function ageGetCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function ageVerificationHide() {
        var ageVerificationModel = document.getElementById('age-verification');
        ageVerificationModel.style.display = 'none';
        document.getElementById("msisdn").style.display = 'block';
    }
    function ageVerificationShow() {
        var ageVerificationModel = document.getElementById('age-verification');
        ageVerificationModel.style.display = 'block';
    }

    function ageVerificationLoad() {
        try {
            var agePass = ageGetCookie(ageCookieName);
            if (agePass != "") {
                ageVerificationHide();
            return;
            }
            else {
                ageVerificationShow();
            }
        }
        catch(err) {
            ageVerificationShow();
        }
    }

    function ageVerificationConfirm() {
        ageSetCookie(ageCookieName, "verified", 365);
        ageVerificationHide();
        wrapper.classList.remove("blur");
        body.classList.remove("overflow-hidden");
    }

    function ageVerificationFailed() {
        window.history.back();
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        ageVerificationLoad();
    });
    function policyVerificationHide() {
        let policyVerificationModel = document.getElementById('policy-popup');
        policyVerificationModel.style.display = 'none';
    }
    function policyVerificationShow() {
        let policyVerificationModel = document.getElementById('policy-popup');
        policyVerificationModel.style.cssText = 'opacity: 1; display: block;';
    }
    function msisdnHide() {
        const msisdnModel = document.getElementById('msisdn');
        msisdnModel.style.cssText = 'animation: scale-display--reversed .3s; animation-fill-mode:forwards; display: none;';
    }
    function pinWrapperShow() {
        const pinWrapperModel = document.getElementById('pin');
        pinWrapperModel.style.cssText = 'animation: scale-display .3s; display: block;';
    }
    function pinVerificationHide() {
        let pinVerificationModel = document.getElementById('pin-popup');
        pinVerificationModel.style.display = 'none';
    }
    function pinVerificationShow() {
        let pinVerificationModel = document.getElementById('pin-popup');
        pinVerificationModel.style.cssText = 'opacity: 1; display: block;';
    }

    jQuery(document).ready(function($){
        $('#msisdn .wifi_submit button').click(function() {
            if(!$('#policy').is(':checked')) {
                policyVerificationShow();
            } else {
                msisdnHide();
                pinWrapperShow();
            }
        });
        $('#policy-popup button').click(function() {
            policyVerificationHide();
        });
        $('#pin button').click(function() {
            pinVerificationShow();
        });
        $('#pin-popup button').click(function() {
            pinVerificationHide();
        });
        if (!$('article .plus18').length) {
            $(".site-title").append($("<span class='plus18'>Plus 18</span>"));
        }
    });
</script>

    <?php while (have_posts()) : the_post(); ?>

    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    		<?php $single_cover = vlog_get_single_layout(); ?>
                <div class="vlog-featured vlog-featured-1 vlog-single-cover <?php echo vlog_is_video_inplay_mode() ? esc_attr('inplay-mode-acitve') : ''; ?> <?php echo vlog_get_option('display_playlist_mode') ? esc_attr('vlog-playlist-mode-acitve') : ''; ?>">
            		<div class="vlog-featured-item">
            			<?php $format = vlog_get_post_format(true); ?>
            			<div class="vlog-cover-bg video avs">
                            <?php if (!vlog_is_video_inplay_mode() && is_single()) { ?>
                            <div class="wifi-overlay">
                                <a class="wifi-pic" href="#wifi-form">
                                    <?php echo vlog_get_featured_image('vlog-cover-full', false, false, true); ?>
                                    <div class="msisdn-video-overlay">
                                        <!--<?php echo __vlog('subscribe_text', 'vlog') ?>-->
                                        <div class="plus18">Plus 18</div>
                                        <div class="avs-text">
                                            Απολαύστε τώρα<br>
                                            τα πιο καυτά και<br>
                                            σκανδαλιστικά βίντεο!
                                        </div>
                                        <div class="padlock"></div>
                                        <span class="vlog-format-action large"><i class="fa fa-play"></i></span>
                                    </div>
                                </a>
                                <div class="video-wrap">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <?php } ?>
            			</div>
            		</div>
                </div>

    		<?php global $vlog_sidebar_opts; ?>
    		<?php $section_class = $vlog_sidebar_opts['use_sidebar'] == 'none' ? 'vlog-single-no-sid' : '' ?>

    		<div class="vlog-section <?php echo esc_attr($section_class); ?>">
    			<div class="container">
					<div class="vlog-content vlog-single-content">
                        <!-- START FORM -->
                        <div class="msisdn-wrapper text-center" id="msisdn-form">
                            <div id="age-verification" >
                                <div class="age-verification-main">
                                    <h3 class="subscribe">Επιβεβαίωσε ότι είσαι άνω των 18.</h3>
                                    <div class="wifi_submit">
                                        <button class="button-primary age-button" onclick="ageVerificationConfirm()">ΝΑΙ</button>
                                        <button class="button-primary age-button" onclick="ageVerificationFailed()">ΟΧΙ</button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" id="msisdn">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3 class="subscribe">Συμπληρώστε το κινητό σας</h3>
                                    </div>
                                </div>
                                <div class="row msisdn-form">
                                    <div class="col-sm-push-2 col-sm-8 col-xs-12">
                                        <div class="msisdn-form-title"></div>
                                        <div class="msisdn-input-composite">
                                            <label></label>
                                            <input type="number" id="msisdn-phone-input" inputmode="numeric" maxlength="15" pattern="[+0-9]*" name="msisdn" onkeydown="return inputFilter(event, 'number');" value="<?php echo '00'.$countryCode; ?>" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-push-2 col-sm-8 col-xs-12">
                                        <div class="msisdn-policy">
                                            <input type="radio" id="policy" value="policy"> Έχω λάβει γνώση των όρων χρήσης και αποδέχομαι να ενεργοποιήσω την συνδρομητική υπηρεσία περιεχομένου ενηλίκων Sexy Tube με χρέωση δύο ευρώ και οχτώ λεπτά ανά sms, τρία sms ανά εβδομάδα. Τελική Τιμή Μηνύματος
                                        </div>
                                    </div>
                                    <div class="col-sm-push-2 col-sm-8 col-xs-12">
                                        <div class="wifi_submit">
                                            <button type="submit" class="button-primary"><?php echo __vlog('continue'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" id="pin">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3 class="subscribe">Παρακαλούμε εισάγετε τον PIN που λάβ ατε με δωρεάν SMS </h3>
                                    </div>
                                </div>
                                <div class="row msisdn-form">
                                    <div class="col-sm-push-2 col-sm-8 col-xs-12">
                                        <div class="msisdn-form-title"></div>
                                        <div class="msisdn-input-composite">
                                            <label></label>
                                            <input type="number" id="pin-input" inputmode="numeric" maxlength="15" pattern="[+0-9]*" name="msisdn" onkeydown="return inputFilter(event, 'number');" required />
                                        </div>
                                    </div>
                                    <div class="col-sm-push-2 col-sm-8 col-xs-12">
                                        <div class="msisdn-policy">
                                            <input type="radio" id="policy-pin" value="policy"> Έχω λάβει γνώση των όρων χρήσης και αποδέχομαι να ενεργοποιήσω την συνδρομητική υπηρεσία περιεχομένου ενηλίκων Sexy Tube με χρέωση δύο ευρώ και οχτώ λεπτά ανά sms, τρία sms ανά εβδομάδα. Τελική Τιμή Μηνύματος
                                        </div>
                                    </div>
                                    <div class="col-sm-push-2 col-sm-8 col-xs-12">
                                        <div class="wifi_submit">
                                            <button type="submit" class="button-primary">ΕΠΙΒΕΒΑΙΩΣΗ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END FORM -->
                    </div>
    			</div>
    		</div>

    	</article>
        <div id="policy-popup" >
            <div class="policy-main">
                <h3 class="subscribe">Παρακαλούμε επιβεβαιώστε ότι αποδέχεστε τους όρους χρήσης </h3>
                <div class="wifi_submit">
                    <button class="button-primary"><?php echo __vlog('continue'); ?></button>
                </div>
            </div>
        </div>
        <div id="pin-popup" >
            <div class="pin-main">
                <h3 class="subscribe">Συμπληρώστε τον σωστό κωδικό PIN.</h3>
                <div class="wifi_submit">
                    <button class="button-primary"><?php echo __vlog('continue'); ?></button>
                </div>
            </div>
        </div>
    <?php break;
        endwhile; ?>

<?php get_footer(); ?>
