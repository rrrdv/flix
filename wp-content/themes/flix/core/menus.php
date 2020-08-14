<?php

add_action( 'init', 'vlog_register_menus' );

/**
 * Register menus
 *
 * Callback function theme menus registration and init
 *
 * @return void
 * @since  1.0
 */

if (!function_exists('vlog_register_menus')) {
    function vlog_register_menus() {
        register_nav_menu('vlog_main_menu', esc_html__('Main Menu', 'vlog'));
        register_nav_menu('wifi-terms-conditions', esc_html__('Wifi Terms and conditions menu', 'vlog'));
        if (vlog_get_option('um_italian_regulation')) {
            register_nav_menu('gestione_profilo', esc_html__('Gestione profilo', 'vlog'));
        }
    }
}

?>
