<?php

// use Wordpress\Multisite\Commons\Decorator;
// use Wordpress\Multisite\Commons\Analytics;
// use Wordpress\Multisite\Commons\EndlessScroll;
// use Wordpress\Multisite\Commons\AVS;
// use Wordpress\Multisite\Commons\DetailFlow;
// use Wordpress\Multisite\Commons\DetailFlow\Sections;
// use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
// use Wordpress\Multisite\Commons\TemplateSettings;
// use Wordpress\Multisite\Commons\Slider\Homepage;
// use Wordpress\Multisite\Commons\Support\Facades\Session;
// use Wordpress\Multisite\Commons\Decorator\GetPost;
// use Wordpress\Multisite\Commons\Support\Facades\IdentifyResponse;
// use Wordpress\FacebookOpenGraphProtocol\Commons\OpenGraphProtocol;
// use Wordpress\Membership\Commons\Post;

/*
 * Detail Flow
 */


// DetailFlow::instance()
//         ->enable()
//         ->getBilling()
//         ->setPaymentIds([
//             'SUB_500_EUR_IT_VIDEO_1W_LIKEIT',
//             'SUB_500_EUR_IT_VIDEO_1W_HOTGOSSIP',
//             'SUB_500_EUR_1W_VIDEO_IT_REDCARPET',
//             'SUB_509_EUR_IT_VIDEO_1W_VIRALVIDEO',
//             'SUB_509_EUR_IT_VIDEO_1W_FUNTASTICO',
//             'SUB_500_EUR_1W_VIDEO_IT_SPETTACOLO',
//             'SUB_509_EUR_IT_VIDEO_1W_INDICIBILE',
//             'SUB_509_EUR_IT_VIDEO_1W_CURIOSITA',
//             'SUB_500_EUR_1W_VIDEO_IT_FASHIONDAYS',
//             'SUB_509_EUR_IT_VIDEO_1W_COMEUNADONNA',
//             'SUB_500_EUR_1W_VIDEO_IT_MADTV',
//             'SUB_500_EUR_1W_VIDEO_IT_TOPVIRAL',
//             'SUB_500_EUR_1W_VIDEO_IT_N24',
//             'SUB_499_EUR_1W_VIDEO_DE_NEWSFLIX',
//             'SUB_509_EUR_1W_VIDEO_IT_LAVITAN',
//             'SUB_509_EUR_1W_VIDEO_IT_PLANETAVIP',
//             'SUB_509_EUR_1W_VIDEO_IT_STARNEWS',
//             'SUB_509_EUR_1W_VIDEO_IT_STORI',
//             'SUB_509_EUR_1W_VIDEO_IT_TUTTOIT',
//             'SUB_509_EUR_1W_VIDEO_IT_GDIOGGI',
//             'SUB_509_EUR_1W_VIDEO_IT_NCALCIO',
//             'SUB_509_EUR_1W_VIDEO_IT_CUCINA',
//             'SUB_509_EUR_1W_VIDEO_IT_MVIRALI',
//             'SUB_509_EUR_1W_VIDEO_IT_FICASA',
//             'SUB_509_EUR_1W_VIDEO_IT_VOLAREVIA',
//             'SUB_509_EUR_1W_VIDEO_IT_GDIOGGI',
//             'SUB_509_EUR_1W_VIDEO_IT_NCALCIO',
//             'SUB_509_EUR_1W_VIDEO_IT_MVIRALI',
//             'SUB_509_EUR_1W_VIDEO_IT_FICASA',
//             'SUB_500_EUR_IT_VIDEO_1W_GIOCOFOLLIA',
//             'SUB_509_EUR_1W_VIDEO_IT_NOTIZIEBUZZ',
//             'SUB_509_EUR_1W_VIDEO_IT_UNTOLDBUZZ',
//             'SUB_509_EUR_1W_VIDEO_IT_BOREDNEWS',
//             'SUB_509_EUR_1W_VIDEO_IT_BOREDNEWSINFO',
//             'SUB_509_EUR_1W_VIDEO_IT_NOTIZIEONE',
//             'SUB_509_EUR_1W_VIDEO_IT_UNTOLDBUZZONLINE',
//             'SUB_500_EUR_IT_VIDEO_1W_INSOLITO',
//             'SUB_500_EUR_IT_VIDEO_1W_MONDOGOSSIP',
//             'SUB_500_EUR_IT_VIDEO_1W_NOVITA',
//             'SUB_500_EUR_IT_VIDEO_1W_VIAGGI',
//         ])
//         ->setFlows(
//             array('flow','lp_33','lp_33_half', 'lp_33_blank', 'lp_34', 'lp_35', 'lp_35_half', 'lp_37', 'lp_38', 'lp_39')
//         )
// ;
//
// // Age verification
// AVS::instance()
//     ->enable()
//     ->setGate('Overlay')
//     ->addLockpick('AdminPage')
//     ->addLockpick('Cookie')
//     ->addLockpick('Session')
//     ->addLockpick('QuerySkip')
//     ->addLockpick('Spider')
//     ->addLockpick('PageSkip')
//     ->getLockpick('PageSkip')
//         ->merge(array(
//             '/login',
//             '/login/',
//             '/login.php',
//             '/wp-admin',
//             '/wp-admin/',
//             '/cpAuthorize.php',
// ));
//
// AVS::instance()
//     ->getGate()
//         ->setThemeModName(TemplateSettings::AVS_SETTINGS)
// ;
//
// function setAVSPopup_tvme($defaultTemplate)
// {
//     $childTemplate =  get_template_directory() . '/age-popup.php';
//     return file_exists($childTemplate)
//         ? $childTemplate
//         : $defaultTemplate
//     ;
// }

//add_filter('wpc_avs_popup_template', 'setAVSPopup_tvme');

// if (ENVIRONMENT !== 'production' && IdentifyResponse::getAll()) {
//   Sections::instance()
//           ->add('it', Sections::COUNTRY)
//           ->add('3g', Sections::NETWORK)
//           ->add('22201', Sections::CARRIER)
//           ->addLanding('lp_33')
//   ;
//   Session::setNetwork('3G'); Session::setLevel('lp_33'); Session::setOperatorcode('22201');
// }

/* Define Theme Vars */
define('VLOG_THEME_VERSION', '3.5.9');

/* Define content width */
if (!isset($content_width)) {
    $content_width = 1104;
}

/* Localization */
load_theme_textdomain('vlog', get_template_directory()  . '/languages');

/* After theme setup main hook */
add_action('after_setup_theme', 'vlog_theme_setup');

/* Hide Forgot your password and add Hotline & Support from login.php */
add_filter('loginhideForgotPass', 'hideForgotPass', true);
add_filter('loginaddHotlineSupport', 'addHotlineSupport', true);

/**
 * After Theme Setup
 *
 * Callback for after_theme_setup hook
 *
 * @return void
 * @since  1.0
 */

function vlog_theme_setup()
{

    /* Add thumbnails support */
    add_theme_support('post-thumbnails');

    /* Add theme support for title tag (since wp 4.1) */
    add_theme_support('title-tag');


    /* Add image sizes */
    $image_sizes = vlog_get_image_sizes();

    if (!empty($image_sizes)) {
        foreach ($image_sizes as $id => $size) {
            add_image_size($id, $size['args']['w'], $size['args']['h'], $size['args']['crop']);
        }
    }

    /* Add post formats support */
    add_theme_support('post-formats', array(
            'audio', 'gallery', 'image', 'video'
        ));

    /* Support for HTML5 */
    add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ));

    /* Automatic Feed Links */
    add_theme_support('automatic-feed-links');

    /* Declare WooCpommerce support */
    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

/* Helpers and utility functions */
include_once(get_template_directory() . '/core/helpers.php');

/* Load frontend scripts */
include_once(get_template_directory() . '/core/enqueue.php');

// /* Module-specific functions */
include_once(get_template_directory() . '/core/modules.php');

/* Template functions */
include_once(get_template_directory() . '/core/template-functions.php');

/* Menus */
include_once(get_template_directory() . '/core/menus.php');

/* Sidebars */
include_once(get_template_directory() . '/core/sidebars.php');

/* Widgets */
include_once(get_template_directory() . '/core/widgets.php');

/* Extensions (hooks and filters to add/modify specific features ) */
include_once(get_template_directory() . '/core/extensions.php');

/* Add support for our mega menu */
include_once(get_template_directory() . '/core/mega-menu.php');

if (is_admin()) {

/* Admin helpers and utility functions  */
    include_once(get_template_directory() . '/core/admin/helpers.php');

    /* Load admin scripts */
    include_once(get_template_directory() . '/core/admin/enqueue.php');

    /* Theme Options */
    include_once(get_template_directory() . '/core/admin/options.php');

    /* Include plugins - TGM Init */
    include_once(get_template_directory() . '/core/admin/plugins.php');

    /* Include AJAX action handlers */
    include_once(get_template_directory() . '/core/admin/ajax.php');

    /* Extensions ( hooks and filters to add/modify specific features ) */
    include_once(get_template_directory() . '/core/admin/extensions.php');

    /* Custom metaboxes */
    include_once(get_template_directory() . '/core/admin/metaboxes.php');
}

/* Remove Lost your password from login errors */
$lostPassword = __('Lost your password?');
function remove_lostpassword_text($text)
{
    global $lostPassword;
    if ($text !== $lostPassword) {
        return $text;
    }
}
add_filter('gettext', 'remove_lostpassword_text');

/* Redirect from lostpassword page */
$hideForgotPass = apply_filters('loginhideForgotPass', false);
$lostPassPage = (isset($_GET['action']) ? $_GET['action'] : '');
if ($hideForgotPass && $lostPassPage == 'lostpassword') {
    wp_redirect(site_url('login.php'));
    exit;
}

/**
 * Decide hiding Forgot your password
 *
 * @return boolean
 */
function hideForgotPass()
{
    return vlog_get_option('login_hide_forgot_pass') ? true : false;
}

/**
 * Show Hotline and Support on login page
 *
 * @return html
 */
function addHotlineSupport()
{
    $login_hotline = vlog_get_option('login_hotline') ? vlog_get_option('login_hotline') : '';
    $login_support = vlog_get_option('login_support') ? vlog_get_option('login_support') : '';
    $login_email = vlog_get_option('login_email') ? vlog_get_option('login_email') : '';
    $hs_html = '';
    if ($login_hotline || $login_support || $login_email) {
        $hs_html .= '
        <div id="hotline_support">';
        if ($login_hotline) {
            $hs_html .= '
                <div>
                    Hotline:
                    <a class="login_reminder" href="tel:'.$login_hotline.'" title="">
                        '.$login_hotline.'
                    </a>
                </div>';
        }
        if ($login_email) {
            $hs_html .= '
                <div>
                    E-mail:
                    <a class="login_reminder" href="mailto:'.$login_email.'" title="'.$login_email.'">
                        '.$login_email.'
                    </a>
                </div>';
        }
        if ($login_support) {
            $hs_html .= '
                <div>
                    Support:
                    <a class="login_reminder" href="'.$login_support.'" title="'.$login_support.'" target="_blank">
                        '.$login_support.'
                    </a>
                </div>';
        }
        $hs_html .= '
        </div>';
    }
    return $hs_html;
}

/* Get account page url */
function get_account_page_url()
{
    $pages = get_pages(array('meta_value' => 'account.php'));
    $i = 0;
    foreach ($pages as $page) {
        $i++;
        if ($i == 1) {
            $account_page_id = $page->ID;
        }
    }
    return get_page_link($account_page_id);
}


$is_login_icon = isset(array_filter(vlog_get_option('header_actions'))['login-icon']) ;
if (!$is_login_icon) {
    function add_login_logout_register_menu($items, $args)
    {
        if ($args->theme_location != 'vlog_main_menu') {
            return $items;
        }

        if (is_user_logged_in()) {
            $items .= '<li class="account-header-link"><a href="' . wp_logout_url(home_url()) . '">'.__vlog('log_out').'</a></li>';
        } else {
            $items .= '<li class="account-header-link"><a href="' . wp_login_url(home_url()) . '">'.__vlog('log_in').'</a></li>';
        }

        return $items;
    }
    add_filter('wp_nav_menu_items', 'add_login_logout_register_menu', 10, 2);
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

show_admin_bar(false);

// // analytics logic
// Analytics::instance()->enable();
// //Ecommerce::instance()->observeMembership();
// function setGoogleAccount_tvme()
// {
//     $account = get_theme_mod('analytics_id');
//     if ($account) {
//         Analytics::instance()->setAccount($account);
//     }
// }
// add_action('wpcommons.analytics.render', 'setGoogleAccount_tvme');

function doctype_opengraph($output)
{
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

/**
 * Add Metabox for Payment failed page to load diffrent promo tool
 */
if (is_admin()) {
    $post_id = $_GET['post'];

    if (get_post_meta($post_id, '_wp_page_template', true) == 'payment-failed-promo.php') {
        /**
         * Adds a metabox to the main column on the Payment Failed Page edit screens.
         */
        function meta_box_promo_tool()
        {
            add_meta_box('promo-tool-payment-failed', 'Promo Tool Box', 'meta_box_callback', 'page', 'normal', 'high');
        }
        add_action('add_meta_boxes', 'meta_box_promo_tool');
    }

    /**
     * Add style in the admin area for payment failed page
     * @return [CSS]
     */
    function admin_style() {
      echo '
        <style>
            #repeatsWaitTime:after {content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0;}
        </style>
        ';
    }
    add_action('admin_enqueue_scripts', 'admin_style');

    /**
     * Prints the box content.
     *
     * @param WP_Post $post The object for the current page.
     */
    function meta_box_callback($post)
    {
        $values = get_post_meta($post->ID, 'promo-tool', false)[0]; ?>
        <p>
            <label for="promoToolType"><p><b>Select promo tool type:</b></p></label>
            <select name="promoToolType" id="promoToolType">
               <option value="none" <?php selected($values['promoToolType'], ''); ?>>Select</option>
                <option value="redirect" <?php selected($values['promoToolType'], 'redirect'); ?>>With Redirect</option>
                <option value="no-redirect" <?php selected($values['promoToolType'], 'no-redirect'); ?>>No Redirect</option>
            </select>
            <hr>
            <div id="repeatsWaitTime">
                <div id="timesToLoad" style="width: 30%;float: left;">
                    <label for="repeat-times"><p><b>How many times you want to load: </b></p></label>
                    <input type="number" name="repeat-times" id="repeat-times" value="<?php echo  $values['repeat-times']; ?>" col="2" />
                </div>
                <div id="waitTime" style="width: 30%;float: right;">
                    <label for="secondsToWait"><p><b>Enter time to wait in miliseconds: <br>(1s = 1000 ms)</b></p></label>
                    <input type="number" name="secondsToWait" id="secondsToWait" value="<?php echo  $values['secondsToWait']; ?>" col="2" />
                </div>
            </div>
            <hr>
            <label for="promo-tool-link-load"><p><b>Enter link to load</b></p></label>
            <input type="text" name="promo-tool-link-load" id="promo-tool-link-load" value="<?php echo  $values['promo-tool-link-load']; ?>" style="width:98%;"/>
            <hr>
            <script>
                jQuery(document).ready(function($){
                    if ($('#promoToolType').val() == 'redirect') {
                        $('#redirectLink').show();
                    }
                    $('select#promoToolType').change(function(){
                        if ($(this).children("option:selected").val() == 'redirect') {
                            $('#redirectLink').show();
                        } else {
                            $('#redirectLink').hide();
                        }
                    })
                })
            </script>
            <div id="redirectLink" style="display:none;">
                <label for="promo-tool-link-redirect"><p><b>Enter redirect link:</b></p></label>
                <input type="text" name="promo-tool-link-redirect" id="promo-tool-link-redirect" value="<?php echo  $values['promo-tool-link-redirect']; ?>" style="width:98%;"/>
            </div>

            <label for="loadElement"><p><b>How to load link in HTML:</b></p></label>
            <select name="loadElement" id="loadElement">
                <option value="none" <?php selected($values['loadElement'], ''); ?>>Select</option>
                <option value="img" <?php selected($values['loadElement'], 'img'); ?>>In a image</option>
                <option value="iframe" <?php selected($values['loadElement'], 'iframe'); ?>>In a iframe</option>
            </select>

        </p>
        <?php
    }

    /**
     * When the page is saved, saves custom data.
     *
     * @param int $post_id The ID of the page being saved.
     */
    function savePromoToolValues($post_id)
    {
        if (isset($_POST['save'])) {
            update_post_meta($post_id, 'promo-tool', array(
                    'secondsToWait'                 => $_POST['secondsToWait'],
                    'loadElement'              => $_POST['loadElement'],
                    'promoToolType'               => $_POST['promoToolType'],
                    'repeat-times'             => $_POST['repeat-times'],
                    'promo-tool-link-load'     => $_POST['promo-tool-link-load'],
                    'promo-tool-link-redirect' => $_POST['promo-tool-link-redirect']
                ));
        }
    }

    add_action('save_post', 'savePromoToolValues'); //update_postmeta
}
