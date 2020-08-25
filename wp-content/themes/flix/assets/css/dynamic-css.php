<?php

/********************************************************************************/
/* Font styles */
/********************************************************************************/
$main_font = vlog_get_font_option('main_font');
$h_font = vlog_get_font_option('h_font');
$nav_font = vlog_get_font_option('nav_font');

/********************************************************************************/
/* Font sizes */
/********************************************************************************/
$font_size_nav = vlog_get_option('font_size_nav') / 10;
$font_size_p = vlog_get_option('font_size_p') / 10;
$font_size_excerpt_text = vlog_get_option('font_size_excerpt_text') / 10;
$font_size_mfs = vlog_get_option('font_size_mfs') / 10;
$font_size_widget_title = vlog_get_option('font_size_widget_title') / 10;
$font_size_module_title = vlog_get_option('font_size_module_title') / 10;
$font_size_meta_data = vlog_get_option('font_size_meta_data') / 10;
$font_size_price_info = vlog_get_option('font_size_price_info') / 10;
$font_size_h1 = vlog_get_option('font_size_h1') / 10;
$font_size_h2 = vlog_get_option('font_size_h2') / 10;
$font_size_h3 = vlog_get_option('font_size_h3') / 10;
$font_size_h4 = vlog_get_option('font_size_h4') / 10;
$font_size_h5 = vlog_get_option('font_size_h5') / 10;
$font_size_h6 = vlog_get_option('font_size_h6') / 10;
$font_size_h7 = vlog_get_option('font_size_h7') / 10;

/********************************************************************************/
/* Top header styles */
/********************************************************************************/
$price_info = esc_attr(vlog_get_option('price_info_switch'));
$hidePriceInfo = apply_filters('hidePriceInfo', true);
if ($hidePriceInfo) {
	$price_info = 0;
}
$color_header_top_bg = esc_attr(vlog_get_option('color_header_top_bg'));
$color_header_top_txt = esc_attr(vlog_get_option('color_header_top_txt'));
$color_header_top_acc = esc_attr(vlog_get_option('color_header_top_acc'));

/********************************************************************************/
/* Middle header styles */
/********************************************************************************/
$logo_width = esc_attr(vlog_get_option('logo_width'));
$logo_width_mobile = esc_attr(vlog_get_option('logo_width_mobile'));
$color_header_bg = esc_attr(vlog_get_option('color_header_main_bg'));
$color_header_txt = esc_attr(vlog_get_option('color_header_main_txt'));
$color_header_acc = esc_attr(vlog_get_option('color_header_main_acc'));
$header_height = esc_attr(vlog_get_option('header_height'));
$header_shadow_value = esc_attr(vlog_get_option('header_shadow_value'));
$header_login_button_border_color = esc_attr(vlog_get_option('header_login_button_border_color'));
$header_login_button_border_radius = esc_attr(vlog_get_option('header_login_button_border_radius'));
$header_login_button_margin = esc_attr(vlog_get_option('header_login_button_margin'));
$header_login_button_background = esc_attr(vlog_get_option('header_login_button_background'));
$header_login_button_color = esc_attr(vlog_get_option('header_login_button_color'));
$header_login_button_hover_color = esc_attr(vlog_get_option('header_login_button_hover_color'));

/********************************************************************************/
/* Bottom header styles */
/********************************************************************************/
$color_header_bottom_bg = esc_attr(vlog_get_option('color_header_bottom_bg'));
$color_header_bottom_txt = esc_attr(vlog_get_option('color_header_bottom_txt'));
$color_header_bottom_acc = esc_attr(vlog_get_option('color_header_bottom_acc'));
$background_color_header_page_title = esc_attr(vlog_get_option('background_color_header_page_title'));
$color_header_page_title = esc_attr(vlog_get_option('color_header_page_title'));

/********************************************************************************/
/* Sticky header styles */
/********************************************************************************/
$sticky_colors_from = vlog_get_option('header_sticky_colors');
$color_header_sticky_bg = esc_attr(vlog_get_option('color_header_'.$sticky_colors_from.'_bg'));
$color_header_sticky_txt = esc_attr(vlog_get_option('color_header_'.$sticky_colors_from.'_txt'));
$color_header_sticky_acc = esc_attr(vlog_get_option('color_header_'.$sticky_colors_from.'_acc'));

/********************************************************************************/
/* General styles */
/********************************************************************************/
$content_layout = vlog_get_option('content_layout');
$body_background = vlog_get_bg_option('body_background');
$color_content_bg = esc_attr(vlog_get_option('color_content_bg'));
$color_content_title = esc_attr(vlog_get_option('color_content_title'));
$color_content_txt = esc_attr(vlog_get_option('color_content_txt'));
$color_content_acc = esc_attr(vlog_get_option('color_content_acc'));
$color_content_videos_label = esc_attr(vlog_get_option('color_content_videos_label'));
$color_content_videos_label_text = esc_attr(vlog_get_option('color_content_videos_label_text'));
$color_content_meta = esc_attr(vlog_get_option('color_content_meta'));
$color_placeholder = esc_attr(vlog_get_option('color_placeholder'));
$color_carousel_arrows = esc_attr(vlog_get_option('color_carousel_arrows'));
$background_slider_l4 = esc_attr(vlog_get_option('background_slider_l4'));
$background_slider_l5 = esc_attr(vlog_get_option('background_slider_l5'));

/********************************************************************************/
/* Highlight styles */
/********************************************************************************/
$color_highlight_bg = esc_attr(vlog_get_option('color_highlight_bg'));
$color_highlight_txt = esc_attr(vlog_get_option('color_highlight_txt'));

/********************************************************************************/
/* Search styles */
/********************************************************************************/
$search_background_color = esc_attr(vlog_get_option('search_background_color'));
$search_text_color = esc_attr(vlog_get_option('search_text_color'));

/********************************************************************************/
/* Footer styles */
/********************************************************************************/
$color_footer_bg = esc_attr(vlog_get_option('color_footer_bg'));
$color_footer_txt = esc_attr(vlog_get_option('color_footer_txt'));
$color_footer_acc = esc_attr(vlog_get_option('color_footer_acc'));
$footer_mobile_fixed = esc_attr(vlog_get_option('footer_mobile_fixed'));
$footer_mobile_menu_align = esc_attr(vlog_get_option('footer_mobile_menu_align'));

/********************************************************************************/
/* Cover  styles */
/********************************************************************************/
$cover_h = esc_attr(vlog_get_option('cover_h'));

/********************************************************************************/
/* Login page */
/********************************************************************************/
$login_label_placeholder = esc_attr(vlog_get_option('login_label_placeholder'));
$login_border_radius = esc_attr(vlog_get_option('login_border_radius'));
$login_border_radius_value = esc_attr(vlog_get_option('login_border_radius_value'));
$login_input_color = esc_attr(vlog_get_option('login_input_color'));
$login_input_text_color = esc_attr(vlog_get_option('login_input_text_color'));
$login_button_color = esc_attr(vlog_get_option('login_button_color'));
$login_button_text_color = esc_attr(vlog_get_option('login_button_text_color'));
$login_button_font_size = vlog_get_option('login_button_font_size') / 10;
$login_forgot_pass_link_color = esc_attr(vlog_get_option('login_forgot_pass_link_color'));
$login_tab_link_color = esc_attr(vlog_get_option('login_tab_link_color'));
$login_tab_link_color_active = esc_attr(vlog_get_option('login_tab_link_color_active'));
$login_button_switch = esc_attr(vlog_get_option ('login_button_switch'));
$login_button_background = esc_attr(vlog_get_option('login_button_background'));
$login_text_color = esc_attr(vlog_get_option('login_text_color'));
$um_tab_link_hover_bar = esc_attr(vlog_get_option('um_tab_link_hover_bar'));

/********************************************************************************/
/* Wi-fi page */
/********************************************************************************/
$wifi_bg_color = esc_attr(vlog_get_option('wifi_bg_color'));
$wifi_text_color = esc_attr(vlog_get_option('wifi_text_color'));
$wifi_continue_button_color = esc_attr(vlog_get_option('wifi_continue_button_color'));
$wifi_continue_button_text_color = esc_attr(vlog_get_option('wifi_continue_button_text_color'));
$wifi_input_color = esc_attr(vlog_get_option('wifi_input_color'));
$wifi_input_border_color = esc_attr(vlog_get_option('wifi_input_border_color'));
$wifi_input_text_color = esc_attr(vlog_get_option('wifi_input_text_color'));
$wifi_text_color = esc_attr(vlog_get_option('wifi_text_color'));
$wifi_modal_bg_color = esc_attr(vlog_get_option('wifi_modal_bg_color'));
$wifi_modal_text_color = esc_attr(vlog_get_option('wifi_modal_text_color'));
$wifi_modal_continue_button_color = esc_attr(vlog_get_option('wifi_modal_continue_button_color'));
$wifi_modal_continue_button_text_color = esc_attr(vlog_get_option('wifi_modal_continue_button_text_color'));
$wifi_shadow = esc_attr(vlog_get_option('wifi_shadow'));

?>


body,
#cancel-comment-reply-link,
.vlog-wl-action .vlog-button {
    <?php if ($content_layout == 'boxed') : ?>
        <?php echo $body_background; ?>
    <?php endif; ?>
    color: <?php echo $color_content_txt; ?>;
    font-family: <?php echo $main_font['font-family']; ?>;
    font-weight: <?php echo $main_font['font-weight']; ?>;
    <?php if (isset($main_font['font-style']) && !empty($main_font['font-style'])) : ?>
        font-style: <?php echo $main_font['font-style']; ?>;
    <?php endif; ?>
}
::placeholder {
    color: <?php echo $color_placeholder; ?>;
    opacity: 1;
}
:-ms-input-placeholder {
    color: <?php echo $color_placeholder; ?>;
}
::-ms-input-placeholder {
    color: <?php echo $color_placeholder; ?>;
}
.vlog-body-box {
	background-color: <?php echo $color_content_bg; ?>;
}

/********************************************************************************/
/* Typography styles */
/********************************************************************************/
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6,
blockquote,
.vlog-comments .url,
.comment-author b,
.vlog-site-header .site-title a,
.entry-content thead td,
#bbpress-forums .bbp-forum-title,
#bbpress-forums .bbp-topic-permalink {
    font-family: <?php echo $h_font['font-family']; ?>;
    font-weight: <?php echo $h_font['font-weight']; ?>;
    <?php if (isset($h_font['font-style']) && !empty($h_font['font-style'])) : ?>
        font-style: <?php echo $h_font['font-style']; ?>;
    <?php endif; ?>
}

.vlog-site-header a,
.dl-menuwrapper li a{
    font-family: <?php echo $nav_font['font-family']; ?>;
    font-weight: <?php echo $nav_font['font-weight']; ?>;
    <?php if (isset($nav_font['font-style']) && !empty($nav_font['font-style'])) : ?>
        font-style: <?php echo $nav_font['font-style']; ?>;
    <?php endif; ?>
}

/********************************************************************************/
/* Font Sizes */
/********************************************************************************/
body {
    font-size: <?php echo $font_size_p; ?>rem;
}
.entry-headline.h4 {
    font-size: <?php echo $font_size_excerpt_text; ?>rem;
}
.vlog-site-header .vlog-main-nav li a {
    font-size: <?php echo $font_size_nav; ?>rem;
}
.vlog-sidebar,
.vlog-site-footer p,
.vlog-lay-b .entry-content p,
.vlog-lay-c .entry-content p,
.vlog-lay-d .entry-content p,
.vlog-lay-e .entry-content p {
    font-size: <?php echo $font_size_mfs; ?>rem;
}
.widget .widget-title {
    font-size: <?php echo $font_size_widget_title; ?>rem;
}
.vlog-mod-head .vlog-mod-title h4 {
    font-size: <?php echo $font_size_module_title; ?>rem;
}
h1, .h1 {
    font-size: <?php echo $font_size_h1; ?>rem;
}
h2, .h2 {
    font-size: <?php echo $font_size_h2; ?>rem;
}
h3, .h3 {
    font-size: <?php echo $font_size_h3; ?>rem;
}
h4, .h4,
.vlog-no-sid .vlog-lay-d .h5,
.vlog-no-sid .vlog-lay-e .h5,
.vlog-no-sid .vlog-lay-f .h5 {
    font-size: <?php echo $font_size_h4; ?>rem;
}
h5, .h5,
.vlog-no-sid .vlog-lay-g .h6 {
    font-size: <?php echo $font_size_h5; ?>rem;
}
h6, .h6 {
    font-size: <?php echo $font_size_h6; ?>rem;
}
.h7 {
    font-size: <?php echo $font_size_h7; ?>rem;
}
.entry-headline h4 {
    font-size: <?php echo $font_size_excerpt_text; ?>rem;
}
.meta-item {
    font-size: <?php echo $font_size_meta_data; ?>rem;
}

/********************************************************************************/
/* Top Header */
/********************************************************************************/
<?php if ($price_info) : ?>
    .vlog-top-bar,
    .vlog-top-bar .sub-menu {
        background-color: <?php echo $color_header_top_bg; ?>;
    }
    .vlog-top-bar .price-info {
        color: <?php echo $color_header_top_txt; ?>;
        font-size: <?php echo $font_size_price_info; ?>rem;
    }
    .vlog-top-bar ul li:hover > a {
        color: <?php echo $color_header_top_acc; ?>;
    }
    @media (max-width: 767px) {
        body:not(.logged-in) .vlog-section,
        body:not(.logged-in) .vlog-featured,
        body:not(.logged-in) .pagewrap {
            padding-top: 30px;
        }
        body:not(.logged-in).home .vlog-featured {
            padding-top: 0;
        }
        body:not(.logged-in).home .vlog-section {
            padding-top: 0;
        }
        body:not(.logged-in).home .vlog-site-content {
            padding-top: 80px;
        }
        body.logged-in .vlog-featured-3,
        body.logged-in .vlog-featured-4 {
            margin-top: 0;
        }
    }
    @media (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
        body:not(.logged-in) .vlog-section,
        body:not(.logged-in) .vlog-featured,
        body:not(.logged-in) .pagewrap,
        body:not(.logged-in) .vlog-featured-2,
        body:not(.logged-in) .vlog-featured-3,
        body:not(.logged-in) .vlog-featured-4 {
            padding-top: 30px;
        }
        body:not(.logged-in) .vlog-featured-4 {
            height: <?php echo $cover_h + 90; ?>px;
        }
        body:not(.logged-in) .vlog-featured-5 {
            margin-top: 30px;
        }
    }
<?php endif; ?>

/********************************************************************************/
/* Main Header */
/********************************************************************************/
.site-title img {
    max-width: <?php echo $logo_width; ?>px;
}
@media (max-width: 767px) {
    .site-title img {
        max-width: <?php echo $logo_width_mobile; ?>px;
    }
}
.vlog-header-middle {
    height: <?php echo $header_height; ?>px;
}
.vlog-header-middle .site-title img {
    max-height: <?php echo $header_height; ?>px;
}
.vlog-site-header,
.vlog-header-shadow .vlog-header-wrapper,
.vlog-actions-search input[type=text]:focus,
.vlog-responsive-header,
.dl-menuwrapper .dl-menu {
    background-color: <?php echo $color_header_bg; ?>;
}
<?php if ($header_bg = vlog_get_bg_option('background_header')) : ?>
    .vlog-header-wrapper {
        <?php echo $header_bg; ?>
    }
<?php endif; ?>
<?php if ($header_shadow_value) : ?>
    .vlog-header-shadow .vlog-header-wrapper,
    .vlog-sticky-header {
        -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.<?php echo $header_shadow_value; ?>);
           -moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.<?php echo $header_shadow_value; ?>);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.<?php echo $header_shadow_value; ?>);
    }
<?php endif; ?>
.vlog-site-header,
.vlog-site-header .entry-title a,
.vlog-site-header a,
.dl-menuwrapper li a,
.vlog-responsive-header,
.vlog-responsive-header a
.vlog-responsive-header .entry-title a,
.dl-menuwrapper button,
.vlog-remove-wl {
    color: <?php echo $color_header_txt; ?>;
}
.vlog-main-nav .sub-menu li:hover > a,
.vlog-main-nav > .current_page_item > a,
.vlog-main-nav .current-menu-item > a,
.vlog-main-nav li:not(.menu-item-has-children):hover > a,
.vlog-slot-r .vlog-menu > li:not(.active):hover i,
.vlog-site-header .vlog-main-nav > li > al,
.vlog-site-header li:hover > a,
.vlog-header-1 .vlog-slot-r .vlog-menu > li:hover a,
.vlog-actions-button.vlog-action-search:hover span,
.vlog-actions-button.vlog-cart-icon:hover a,
.vlog-actions-button a:hover,
.dl-menuwrapper li a:focus,
.dl-menuwrapper li a:hover,
.dl-menuwrapper button:hover,
.vlog-main-nav .vlog-mega-menu .entry-title a:hover,
.vlog-menu-posts .entry-title a:hover,
.vlog-menu-posts .vlog-remove-wl:hover {
    color: <?php echo $color_header_acc; ?>;
}
.vlog-watch-later-count {
    background: <?php echo $color_header_acc; ?>;
}
.pulse {
    -webkit-box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo vlog_hex2rgba($color_header_acc, 0.7); ?>;
            box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo vlog_hex2rgba($color_header_acc, 0.7); ?>;
}

.vlog-action-search .vlog-search-form input[type=text],
.vlog-action-search.active i {
	background: <?php echo $search_background_color; ?>;
	color: <?php echo $search_text_color; ?>;
}

.account-header-link {
	border: 1px solid <?php echo $header_login_button_border_color; ?>;
    border-radius: <?php echo $header_login_button_border_radius; ?>px;
    margin-left: <?php echo $header_login_button_margin; ?>px;
    background: <?php echo $header_login_button_background; ?>;
}
.vlog-site-header li.account-header-link:hover > a {
	color: <?php echo $header_login_button_hover_color; ?>;
}
.account-header-link a {
	color: <?php echo $header_login_button_color; ?> !important;
}

@media (max-width: 767px) {
    .account-header-link {
		margin-left: 0;
        margin-top: <?php echo $header_login_button_margin; ?>px;
    }
}

/********************************************************************************/
/* Bottom Header */
/********************************************************************************/
.vlog-header-bottom,
.vlog-site-header .vlog-main-nav .sub-menu,
.vlog-actions-button .sub-menu {
    background: <?php echo $color_header_bottom_bg; ?>;
}
.vlog-header-bottom,
.vlog-header-bottom .entry-title a,
.vlog-header-bottom a {
    color: <?php echo $color_header_bottom_txt; ?>;
}
.vlog-header-bottom .vlog-main-nav .sub-menu li:hover > a,
.vlog-header-bottom .vlog-main-nav > .current_page_item > a,
.vlog-header-bottom .vlog-main-nav .current-menu-item > a,
.vlog-header-bottom .vlog-main-nav li:not(.menu-item-has-children):hover > a,
.vlog-header-bottom .vlog-actions-button.vlog-action-search:hover span,
.vlog-header-bottom .entry-title a:hover,
.vlog-header-bottom .vlog-remove-wl:hover,
.vlog-header-bottom .vlog-mega-menu .entry-title a:hover{
    color: <?php echo $color_header_bottom_acc; ?>;
}
.vlog-header-bottom .pulse {
    -webkit-box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo vlog_hex2rgba($color_header_bottom_acc, 0.7); ?>;
            box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo vlog_hex2rgba($color_header_bottom_acc, 0.7); ?>;
}

/********************************************************************************/
/* Login */
/********************************************************************************/
.vlog-page-title.entry-title,
#login_page_title {
    background: <?php echo $background_color_header_page_title; ?>;
    color: <?php echo $color_header_page_title; ?>;
}
#login_page_title h1 {
    color: <?php echo $color_header_page_title; ?>;
}
#loginform input[type="submit"],
#lostpasswordform input[type="submit"],
.renew-details .cancel-account #cancel-button {
    background-color: <?php echo $login_button_color; ?>;
    color: <?php echo $login_button_text_color; ?>;
    font-size: <?php echo $login_button_font_size; ?>rem;
}
#loginform fieldset p a {
    color: <?php echo $login_forgot_pass_link_color; ?>;
}
#loginform input,
#lostpasswordform input {
    background-color: <?php echo $login_input_color; ?>;
    <?php if ($login_border_radius) : ?>
        border: none;
        -webkit-border-radius: <?php echo $login_border_radius_value; ?>px;
           -moz-border-radius: <?php echo $login_border_radius_value; ?>px;
                border-radius: <?php echo $login_border_radius_value; ?>px;
    <?php endif; ?>
	box-shadow: none;
}
<?php if ($login_label_placeholder) : ?>
    ::-webkit-input-placeholder {
        color: <?php echo $login_input_text_color; ?>;
    }
    ::-moz-placeholder {
        color: <?php echo $login_input_text_color; ?>;
    }
    :-ms-input-placeholder {
        color: <?php echo $login_input_text_color; ?>;
    }
    :-moz-placeholder {
        color: <?php echo $login_input_text_color; ?>;
    }
<?php else: ?>
    #loginform label,
    #lostpasswordform label {
        color: <?php echo $login_input_text_color; ?>;
    }
    #loginform input,
    #lostpasswordform input {
        margin-top: 0;
    }
<?php endif; ?>
.tabs ul.account-items li label {
    color: <?php echo $login_tab_link_color; ?>
}
.tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul.account-items > li:nth-child(1) > label,
.tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul.account-items > li:nth-child(2) > label,
.tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul.account-items > li:nth-child(3) > label,
.tabs ul.account-items li label:hover,
.tabs ul.account-items li label:focus,
.tabs ul.account-items li label:active {
    color: <?php echo $login_tab_link_color_active; ?>
}
.gestione-profile .menu-item {
    background: <?php echo $background_color_header_page_title; ?>;
    border-left: 5px solid <?php echo $color_header_acc; ?>;
}
.gestione-profile .menu-item:hover {
    background: <?php echo $login_tab_link_color_active; ?>;
}
.gestione-profile .menu-item a {
    color: <?php echo $login_tab_link_color; ?>
}
.wifi_submit button {
    background-color: <?php echo $wifi_modal_continue_button_color; ?>;
    color: <?php echo $wifi_modal_continue_button_text_color; ?>;
}
#loginform .forgetmenot,
#loginform p:last-of-type,
.account-details li span,
#loginwrap .message,
.renew-details .account-options,
.renew-details .account-option-name {
    color: <?php echo $login_text_color; ?>
}

<?php if ($um_tab_link_hover_bar) { ?>
	.tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul.account-items > li:nth-child(1) > label span,
	.tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul.account-items > li:nth-child(2) > label span,
	.tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul.account-items > li:nth-child(3) > label span {
		border-bottom: 3px solid <?php echo $login_tab_link_color; ?>;
	    padding: 10px 0px;
	    transition: 0.3s;
	}
<?php }; ?>

/********************************************************************************/
/* Sticky Header */
/********************************************************************************/
.vlog-sticky-header.vlog-site-header,
.vlog-sticky-header.vlog-site-header .vlog-main-nav .sub-menu,
.vlog-sticky-header .vlog-actions-button .sub-menu,
.vlog-sticky-header .vlog-action-search.active.vlog-actions-button > span,
.vlog-sticky-header .vlog-actions-search input[type=text]:focus {
    background-color: <?php echo $color_header_sticky_bg; ?>;
}
.vlog-sticky-header,
.vlog-sticky-header .entry-title a,
.vlog-sticky-header a,
.vlog-sticky-header.vlog-site-header a{
    color: <?php echo $color_header_sticky_txt; ?>;
}
.vlog-sticky-header .vlog-main-nav .sub-menu li:hover > a,
.vlog-sticky-header .vlog-main-nav > .current_page_item > a,
.vlog-sticky-header .vlog-main-nav li:hover > a,
.vlog-sticky-header .vlog-slot-r .vlog-menu > li:not(.active):hover i,
.vlog-sticky-header .vlog-main-nav li:not(.menu-item-has-children):hover > a,
.vlog-sticky-header .vlog-actions-button.vlog-action-search:hover span,
.vlog-sticky-header.vlog-header-bottom .vlog-main-nav .current-menu-item > a,
.vlog-sticky-header.vlog-header-bottom .entry-title a:hover,
.vlog-sticky-header.vlog-header-bottom  .vlog-remove-wl:hover,
.vlog-sticky-header .vlog-main-nav .vlog-mega-menu .entry-title a:hover,
.vlog-sticky-header .vlog-menu-posts .entry-title a:hover,
.vlog-sticky-header .vlog-menu-posts .vlog-remove-wl:hover {
    color: <?php echo $color_header_sticky_acc; ?>;
}
.vlog-sticky-header .pulse {
    -webkit-box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo vlog_hex2rgba($color_header_sticky_acc, 0.7); ?>;
            box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo vlog_hex2rgba($color_header_sticky_acc, 0.7); ?>;
}

/********************************************************************************/
/* General */
/********************************************************************************/
a {
    color: <?php echo $color_content_acc; ?>;
}
.meta-item,
.meta-icon,
.meta-comments a,
.vlog-prev-next-nav .vlog-pn-ico,
.comment-metadata a,
.widget_calendar table caption,
.widget_archive li,
.widget_recent_comments li,
.rss-date,
.widget_rss cite,
.widget_tag_cloud a:after,
.widget_recent_entries li .post-date,
.meta-tags a:after,
.bbp-forums .bbp-forum-freshness a,
#vlog-video-sticky-close{
    color: <?php echo $color_content_meta; ?>;
}
.vlog-pagination .dots:hover,
.vlog-pagination a,
.vlog-post .entry-category a:hover,
a.meta-icon:hover,
.meta-comments:hover,
.meta-comments:hover a,
.vlog-prev-next-nav a,
.widget_tag_cloud a,
.widget_calendar table tfoot tr td a,
.vlog-button-search,
.meta-tags a,
.vlog-all-link:hover,
.vlog-sl-item:hover,
.entry-content-single .meta-tags a:hover,
#bbpress-forums .bbp-forum-title,
#bbpress-forums .bbp-topic-permalink {
    color: <?php echo $color_content_txt; ?>;
}
.vlog-button,
.vlog-pagination .vlog-button,
.vlog-pagination .vlog-button:hover,
.vlog-listen-later-count,
.vlog-cart-icon a .vlog-cart-count,
a.page-numbers:hover,
.widget_calendar table tbody td a,
.vlog-load-more a,
.vlog-next a,
.vlog-prev a,
.vlog-pagination .next,
.vlog-pagination .prev,
.mks_author_link,
.mks_read_more a,
.vlog-wl-action .vlog-button,
body .mejs-controls .mejs-time-rail .mejs-time-current,
.vlog-link-pages a {
    background-color: <?php echo $color_content_acc; ?>;
}
.vlog-count {
    background-color: <?php echo $color_content_videos_label; ?>;
	color: <?php echo $color_content_videos_label_text; ?>;
}
.vlog-pagination .uil-ripple-css div:nth-of-type(1),
.vlog-pagination .uil-ripple-css div:nth-of-type(2),
blockquote {
    border-color: <?php echo $color_content_acc; ?>;
}
.entry-content-single a,
#bbpress-forums .bbp-forum-title:hover,
#bbpress-forums .bbp-topic-permalink:hover {
    color: <?php echo $color_content_acc; ?>;
}
.entry-content-single a:hover {
    color: <?php echo $color_content_txt; ?>;
}
.vlog-site-content,
.vlog-content .entry-content-single a.vlog-popup-img {
    background: <?php echo $color_content_bg; ?>;
}
.vlog-content .entry-content-single a.vlog-popup-img {
    color: <?php echo $color_content_bg; ?>;
}
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6,
.entry-title a,
.vlog-comments .url,
.rsswidget:hover,
.vlog-format-inplay .entry-category a:hover,
.vlog-format-inplay .meta-comments a:hover,
.vlog-format-inplay .action-item,
.vlog-format-inplay .entry-title a,
.vlog-format-inplay .entry-title a:hover {
    color: <?php echo $color_content_title; ?>;
}
.widget ul li a{
    color: <?php echo $color_content_txt; ?>;
}
.widget ul li a:hover,
.entry-title a:hover,
.widget .vlog-search-form .vlog-button-search:hover,
.bypostauthor .comment-body .fn:before,
.vlog-comments .url:hover,
#cancel-comment-reply-link,
.widget_tag_cloud a:hover,
.meta-tags a:hover,
.vlog-remove-wl:hover {
    color: <?php echo $color_content_acc; ?>;
}
.entry-content p {
    color: <?php echo $color_content_txt; ?>;
}
.widget_calendar #today:after {
    background: <?php echo vlog_hex2rgba($color_content_txt, 0.1); ?>
}
.vlog-button,
.vlog-button a,
.vlog-pagination .vlog-button,
.vlog-pagination .next,
.vlog-pagination .prev,
a.page-numbers:hover,
.widget_calendar table tbody td a,
.vlog-featured-info-2 .entry-title a,
.vlog-load-more a,
.vlog-next a,
.vlog-prev a,
.mks_author_link,
.mks_read_more a,
.vlog-wl-action .vlog-button,
.vlog-link-pages a,
.vlog-link-pages a:hover {
    color: #FFF;
}
#cancel-comment-reply-link,
.comment-reply-link,
.vlog-rm,
.vlog-mod-actions .vlog-all-link {
    color: <?php echo $color_content_bg; ?>;
    background-color: <?php echo vlog_hex2rgba($color_content_acc, 0.9); ?>
}
.vlog-mod-actions .vlog-all-link:hover {
    background-color: <?php echo vlog_hex2rgba($color_content_txt, 0.7); ?>
}
.vlog-slider-controls .owl-next,
.vlog-slider-controls .owl-prev {
    color: <?php echo $color_carousel_arrows; ?>;
    border-color: <?php echo vlog_hex2rgba($color_carousel_arrows, 0.7); ?>
}
.vlog-slider-controls .owl-next:hover,
.vlog-slider-controls .owl-prev:hover {
    border-color: <?php echo $color_carousel_arrows; ?>
}
.comment-reply-link:hover,
.vlog-rm:hover,
#cancel-comment-reply-link:hover {
    color: <?php echo $color_content_txt; ?>;
    border-color: <?php echo $color_content_txt; ?>;
}
.vlog-featured-4 {
	background: <?php echo vlog_hex2rgba($background_slider_l4, 0.75); ?>
}
.vlog-featured-5 {
	background: <?php echo vlog_hex2rgba($background_slider_l5, 0.75); ?>
}

.vlog-featured-7 .entry-header .entry-title a {
	background-color: <?php echo $color_header_txt; ?>;
    color: <?php echo $color_header_bg ?>;
}
.vlog-featured-7 .entry-header .entry-category a {
	background-color: <?php echo $color_content_videos_label; ?>;
}


/********************************************************************************/
/* Highlight */
/********************************************************************************/
.vlog-highlight .entry-category,
.vlog-highlight .entry-category a,
.vlog-highlight .meta-item a,
.vlog-highlight .meta-item span,
.vlog-highlight .meta-item,
.vlog-highlight .widget_tag_cloud a:hover {
    color: <?php echo vlog_hex2rgba($color_highlight_txt, 0.7); ?>;
}
.vlog-highlight {
    background: <?php echo $color_highlight_bg; ?>;
    color: <?php echo $color_highlight_txt; ?>;
    border: none;
}
.vlog-highlight .widget-title {
    border-bottom-color: <?php echo vlog_hex2rgba($color_highlight_txt, 0.1); ?>;
}
.vlog-highlight .entry-title,
.vlog-highlight .entry-category a:hover,
.vlog-highlight .action-item,
.vlog-highlight .meta-item a:hover,
.vlog-highlight .widget-title span,
.vlog-highlight .entry-title a,
.widget.vlog-highlight ul li a,
.vlog-highlight.widget_calendar table tfoot tr td a,
.vlog-highlight .widget_tag_cloud a {
    color: <?php echo $color_highlight_txt; ?>;
}
.vlog-highlight .widget_calendar #today:after {
    background: <?php echo vlog_hex2rgba($color_highlight_txt, 0.1); ?>;
}
.widget.vlog-highlight input[type=number],
.widget.vlog-highlight input[type=text],
.widget.vlog-highlight input[type=email],
.widget.vlog-highlight input[type=url],
.widget.vlog-highlight input[type=tel],
.widget.vlog-highlight input[type=date],
.widget.vlog-highlight input[type=password],
.widget.vlog-highlight select,
.widget.vlog-highlight textarea {
    background: #FFF;
    color: #111;
    border-color: <?php echo vlog_hex2rgba($color_highlight_txt, 0.1); ?>;
}
.vlog-highlight .vlog-button-search{
    color: #111;
}

/********************************************************************************/
/* Gray areas */
/********************************************************************************/
.vlog-bg-box,
.author .vlog-mod-desc,
.vlog-bg {
    background: <?php echo vlog_hex2rgba($color_content_txt, 0.05); ?>;
}

.vlog-pagination .current {
    background: <?php echo vlog_hex2rgba($color_content_txt, 0.1); ?>;
}

/********************************************************************************/
/* Footer */
/********************************************************************************/
.vlog-site-footer {
    background: <?php echo $color_footer_bg; ?>;
    color: <?php echo $color_footer_txt; ?>;
}
.vlog-site-footer .widget-title,
.vlog-site-footer .widget_calendar table tbody td a,
.vlog-site-footer .widget_calendar table tfoot tr td a,
.vlog-site-footer .widget.mks_author_widget h3,
.vlog-site-footer .mks_author_link,
.vlog-site-footer .vlog-button:hover,
.vlog-site-footer .meta-item a:hover,
.vlog-site-footer .entry-category a:hover {
    color: <?php echo $color_footer_txt; ?>;
}
.vlog-site-footer a,
.vlog-site-footer ul li a,
.vlog-site-footer .widget_calendar table tbody td a:hover,
.vlog-site-footer .widget_calendar table tfoot tr td a:hover {
    color: <?php echo vlog_hex2rgba($color_footer_txt, 0.8); ?>;
}
.vlog-site-footer .meta-item a,
.vlog-site-footer .meta-item .meta-icon,
.vlog-site-footer .widget_recent_entries li .post-date,
.vlog-site-footer .meta-item {
    color: <?php echo vlog_hex2rgba($color_footer_txt, 0.5); ?>;
}
.vlog-site-footer .meta-comments:hover,
.vlog-site-footer ul li a:hover,
.vlog-site-footer a:hover {
    color: <?php echo $color_footer_acc; ?>;
}
.vlog-site-footer .widget_calendar table tbody td a,
.vlog-site-footer a.mks_author_link,
.vlog-site-footer a.mks_author_link:hover,
.vlog-site-footer .widget_calendar table tbody td a:hover {
    color: <?php echo $color_footer_bg; ?>;
    background: <?php echo $color_footer_acc; ?>;
}
.vlog-site-footer .widget .vlog-search-form input[type=text],
.vlog-site-footer select {
    background: #FFF;
    color: #111;
    border: <?php echo $color_footer_txt; ?>;
}
.vlog-site-footer .widget .vlog-search-form .vlog-button-search {
    color: #111;
}
.vlog-site-footer .vlog-mod-actions .vlog-all-link,
.vlog-site-footer .vlog-slider-controls .owl-next,
.vlog-site-footer .vlog-slider-controls .owl-prev {
    color: <?php echo vlog_hex2rgba($color_footer_txt, 0.8); ?>;
    border-color: <?php echo vlog_hex2rgba($color_footer_txt, 0.8); ?>;
}
.vlog-site-footer .vlog-mod-actions .vlog-all-link:hover,
.vlog-site-footer .vlog-slider-controls .owl-next:hover,
.vlog-site-footer .vlog-slider-controls .owl-prev:hover {
    color: <?php echo vlog_hex2rgba($color_footer_txt, 1); ?>;
    border-color: <?php echo vlog_hex2rgba($color_footer_txt, 1); ?>;
}
.entry-content-single ul > li:before,
.vlog-comments .comment-content ul > li:before {
  color: <?php echo $color_content_acc; ?>;
}

@media (max-width: 767px) {
    .vlog-popup-on .vlog-featured-slider {
        margin-top: -30px;
    }
    .vlog-featured-2 .vlog-cover-bg a img,
    .vlog-featured-3 .vlog-cover-bg a img {
        max-width: 100%;
    }
    .vlog-featured-2 .vlog-format-action {
        top: <?php echo $cover_h / 3; ?>px;
    }
    .vlog-site-footer ul li {
        border-right: 1px solid <?php echo vlog_hex2rgba($color_footer_txt, 0.8); ?>;
    }
    .vlog-site-footer .widget_nav_menu {
        text-align: <?php echo $footer_mobile_menu_align; ?>;
    }
    <?php if ($login_button_switch) : ?>
        .dl-menuwrapper .account-header-link a {
            background: <?php echo $login_button_background; ?>;
            background-clip: content-box;
            color: <?php echo $login_button_color; ?>;
        }
    <?php endif; ?>
}

/********************************************************************************/
/* For each column selected, hide it on mobile */
/********************************************************************************/
<?php
$hide_footer_on_mobile = vlog_get_option('hide_footer_on_mobile');
if (!empty($hide_footer_on_mobile)) {
    foreach ($hide_footer_on_mobile as $col => $val) {
        if ($val) {
            echo '
            @media (max-width: 767px) {
                footer .container .row:not(#fdiscl)>div:'.$col.' {
                    display: none;
                }
            }';
        }
    }
}
?>
input[type=number],
input[type=text],
input[type=email],
input[type=url],
input[type=tel],
input[type=date],
input[type=password],
select,
textarea,
.widget,
.vlog-comments,
.comment-list,
.comment .comment-respond,
.widget .vlog-search-form input[type=text],
.vlog-content .vlog-prev-next-nav,
.vlog-wl-action,
.vlog-mod-desc .vlog-search-form,
.entry-content table,
.entry-content td,
.entry-content th,
.entry-content-single table,
.entry-content-single td,
.entry-content-single th,
.vlog-comments table,
.vlog-comments td, .vlog-comments th {
    border-color: <?php echo vlog_hex2rgba($color_content_txt, 0.1); ?>;
}
input[type=number]:focus,
input[type=text]:focus,
input[type=email]:focus,
input[type=url]:focus,
input[type=tel]:focus,
input[type=date]:focus,
input[type=password]:focus,
select:focus,
textarea:focus {
    border-color: <?php echo vlog_hex2rgba($color_content_txt, 0.3); ?>;
}
input[type=number],
input[type=text],
input[type=email],
input[type=url],
input[type=tel],
input[type=date],
input[type=password],
select,
textarea {
    background-color: <?php echo vlog_hex2rgba($color_content_txt, 0.03); ?>;
}
.vlog-button,
input[type="submit"],
.wpcf7-submit,
input[type="button"] {
    background-color: <?php echo $color_content_acc; ?>;
}
.renew-details .cancel-account #cancel-button {
	border: 1px solid <?php echo $color_content_acc; ?>;
}
.vlog-comments .comment-content {
    color: <?php echo vlog_hex2rgba($color_content_txt, 0.8); ?>;
}
li.bypostauthor > .comment-body,
.vlog-rm {
    border-color: <?php echo $color_content_acc; ?>;
}
.vlog-ripple-circle {
    stroke: <?php echo $color_content_acc; ?>;
}
.vlog-cover-bg,
.vlog-featured-2 .vlog-featured-item,
.vlog-featured-3 .vlog-featured-item,
.vlog-featured-4 .owl-item {
    height: <?php echo $cover_h; ?>px;
}
.vlog-fa-5-wrapper {
    height: <?php echo $cover_h - 72; ?>px;
}
.vlog-fa-5-wrapper .fa-item {
    height: <?php echo ($cover_h - 144) / 2; ?>px;
}
.vlog-featured-5 {
    height: <?php echo $cover_h - 10; ?>px;
}
@media (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
    .vlog-featured-1 .vlog-cover-bg a img {
        max-width: 100%;
    }
    .vlog-cover-bg,
    .vlog-featured-2 .vlog-featured-item,
    .vlog-featured-3 .vlog-featured-item,
    .vlog-cover-bg.vlog-cover-playlist-active,
    .vlog-featured-5 {
        height: <?php echo $cover_h - 132; ?>px;
    }
    .vlog-featured-4 {
        height: <?php echo $cover_h + 60; ?>px;
    }
    .vlog-featured-5 {
        height: <?php echo $cover_h - 100; ?>px;
    }
    .vlog-featured-1 .vlog-featured-item .vlog-cover,
    .vlog-featured-2 .vlog-featured-item .vlog-cover,
    .vlog-featured-3 .vlog-featured-item .vlog-cover {
        display: block;
    }
}
<?php if (!vlog_get_option('cover_shadow_enabled')) : ?>
    .vlog-cover:before,
    .vlog-cover:after {
        display: none;
    }
    .vlog-featured-3 .vlog-cover img {
        opacity: 1;
    }
<?php endif; ?>

/********************************************************************************/
/* WooCommerce classes */
/********************************************************************************/
<?php if (vlog_is_woocommerce_active()) { ?>
    .woocommerce ul.products li.product .button,
    .woocommerce ul.products li.product .added_to_cart,
    body.woocommerce .button,
    body.woocommerce-page .button,
    .woocommerce .widget_shopping_cart_content .buttons .button,
    .woocommerce div.product div.summary .single_add_to_cart_button,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
    .woocommerce-page #payment #place_order,
    .woocommerce #review_form #respond .form-submit input {
        color: #FFF;
        background-color: <?php echo $color_content_acc; ?>;
    }
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
        border-bottom: 3px solid <?php echo $color_content_acc; ?>;
    }
    .product-categories li,
    .product-categories .children li {
        color:<?php echo $color_content_meta; ?>;
    }
    .product-categories .children li {
        border-top: 1px solid <?php echo vlog_hex2rgba($color_content_txt, 0.1); ?>;
    }
    .product-categories li {
        border-bottom: 1px solid <?php echo vlog_hex2rgba($color_content_txt, 0.1); ?>;
    }
    .woocommerce .woocommerce-breadcrumb a {
        color: <?php echo $color_content_acc; ?>;
    }
    .woocommerce .woocommerce-breadcrumb a:hover {
        color: <?php echo $color_content_txt; ?>;
    }
<?php } ?>

div.bbp-submit-wrapper button,
#bbpress-forums #bbp-your-profile fieldset.submit button {
    color: #FFF;
    background-color: <?php echo $color_content_acc; ?>;
}
.vlog-breadcrumbs a:hover {
    color: <?php echo $color_content_txt; ?>;
}
.vlog-breadcrumbs {
    border-bottom: 1px solid <?php echo vlog_hex2rgba($color_content_txt, 0.1); ?>;
}
.vlog-special-tag-label {
    background-color: <?php echo vlog_hex2rgba($color_content_acc, 0.5); ?>;
}
.vlog-special-tag-label {
    background-color: <?php echo vlog_hex2rgba($color_content_acc, 0.5); ?>;
}
.entry-image:hover .vlog-special-tag-label {
    background-color: <?php echo vlog_hex2rgba($color_content_acc, 0.8); ?>;
}
.entry-image img {
	width: 100%;
}

/********************************************************************************/
/* In play wrapper colors */
/********************************************************************************/
.vlog-format-inplay .entry-category a,
.vlog-format-inplay .action-item:hover,
.vlog-featured .vlog-format-inplay .meta-icon,
.vlog-featured .vlog-format-inplay .meta-item,
.vlog-format-inplay .meta-comments a,
.vlog-featured-2 .vlog-format-inplay .entry-category a,
.vlog-featured-2 .vlog-format-inplay .action-item:hover,
.vlog-featured-2 .vlog-format-inplay .meta-icon,
.vlog-featured-2 .vlog-format-inplay .meta-item,
.vlog-featured-2 .vlog-format-inplay .meta-comments a {
    color: <?php echo vlog_hex2rgba($color_content_title, 0.7); ?>;
}

/********************************************************************************/
/* My account */
/********************************************************************************/
.tabs ul.account-items {
    background: <?php echo $background_color_header_page_title; ?>;
}

/********************************************************************************/
/* Wi-Fi Page */
/********************************************************************************/
.modalWindow {
   background: #FFF;
   border-radius: 10px;
   -moz-border-radius: 10px;
   -webkit-border-radius: 10px;
}
.wifi-wrapper {
    background: <?php echo $wifi_bg_color; ?>;
    border-radius: 10px;
    padding: 25px;
    color: <?php echo $wifi_text_color; ?>;
    <?php if ($wifi_shadow) { ?>
        -webkit-box-shadow: 0 5px 10px 0 rgba(0,0,0,0.3);
           -moz-box-shadow: 0 5px 10px 0 rgba(0,0,0,0.3);
                box-shadow: 0 5px 10px 0 rgba(0,0,0,0.3);
    <?php } ?>
}
.wifi-wrapper h2,
.wifi-wrapper a,
.wifi-wrapper .terms ul li a,
.wifi-wrapper .wifi-policy {
    color: <?php echo $wifi_text_color; ?>;
}
.wifi-wrapper .corner-ribbon {
    background: <?php echo $wifi_text_color; ?>;
    color: <?php echo $wifi_bg_color; ?>;
}
.wifi-wrapper .wifi-form #wifi-phone-input,
.wifi-wrapper .wifi-form #wifi-carrier-input {
    border: 1px solid <?php echo $wifi_input_border_color; ?>;
    background-color: <?php echo $wifi_input_color; ?>;
    color: <?php echo $wifi_input_text_color; ?>;
}
.wifi-wrapper .wifi-input-composite label {
    color: <?php echo $wifi_input_text_color; ?>;
}
.wifi-wrapper .wifi_submit button {
    background-color: <?php echo $wifi_continue_button_color; ?>;
    color: <?php echo $wifi_continue_button_text_color; ?>;
}
.wifi-video-overlay {
    font-family: <?php echo $h_font['font-family']; ?>;
}
.arrow-down {
    border-top: 35px solid <?php echo $wifi_bg_color; ?>;
}
<?php if ($footer_mobile_fixed) { ?>
    @media (max-width: 767px) {
        .vlog-site-footer {
          position: fixed;
          bottom: 0;
          z-index: 10;
        }
    }
<?php } ?>

/********************************************************************************/
/* Apply uppercase options */
/********************************************************************************/
<?php
$uppercase = vlog_get_option('uppercase');
if (!empty($uppercase)) {
    foreach ($uppercase as $text_class => $val) {
        if ($val) {
            echo '
            .'.$text_class.'{
                text-transform: uppercase;
            }';
        } else {
            echo '
            .'.$text_class.'{
                text-transform: none;
            }';
        }
    }
}

?>
