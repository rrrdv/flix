<?php

/**
 * Get the list of available options for post ordering
 *
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_post_order_opts' ) ) :
	function vlog_get_post_order_opts() {

		$options = array(
			'date' => esc_html__( 'Date', 'vlog' ),
			'comment_count' => esc_html__( 'Number of comments', 'vlog' ),
			'views' => esc_html__( 'Number of views', 'vlog' ),
			'title'	=> esc_html__( 'Title (alphabetically)', 'vlog' ),
			'rand' => esc_html__( 'Random', 'vlog' ),
		);

		$options = apply_filters('vlog_modify_post_order_opts', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;


/**
 * Get the list of time limit options
 *
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_time_diff_opts' ) ) :
	function vlog_get_time_diff_opts() {

		$options = array(
			'-1 day' => esc_html__( '1 Day', 'vlog' ),
			'-3 days' => esc_html__( '3 Days', 'vlog' ),
			'-1 week' => esc_html__( '1 Week', 'vlog' ),
			'-1 month' => esc_html__( '1 Month', 'vlog' ),
			'-3 months' => esc_html__( '3 Months', 'vlog' ),
			'-6 months' => esc_html__( '6 Months', 'vlog' ),
			'-1 year' => esc_html__( '1 Year', 'vlog' ),
			'0' => esc_html__( 'All time', 'vlog' )
		);
		$options = apply_filters('vlog_modify_time_diff_opts', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;

/**
 * Get the list of available options to filter posts by format
 *
 * @return array List of available post formats
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_post_format_opts' ) ) :
	function vlog_get_post_format_opts() {

		$options = array();
		$options['standard'] = esc_html__( 'Standard', 'vlog' );

		$formats = get_theme_support('post-formats');
		if(!empty($formats) && is_array($formats[0])){
			foreach($formats[0] as $format){
				$options[$format] = ucfirst($format);
			}
		}

		$options['0'] = esc_html__( 'All', 'vlog' );

		$options = apply_filters('vlog_modify_post_format_opts', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;


/**
 * Get the list of available post layouts
 *
 * @param bool    $ihnerit Whether you want to add "inherit" option
 * @param bool    $none    Whether you want to add "none" option ( to set layout to "off")
 * @param array   $exclude    Array to optionally exclude some of layouts
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_main_layouts' ) ):
	function vlog_get_main_layouts( $inherit = false, $none = false, $exclude = array() ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png', 'col' => 0 );
		}

		if ( $none ) {
			$layouts['none'] = array( 'title' => esc_html__( 'None', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/none.png', 'col' => 0 );
		}

		$layouts['a'] = array( 'title' => esc_html__( 'Layout A', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_a.png', 'col' => 12 );
		$layouts['b'] = array( 'title' => esc_html__( 'Layout B', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_b.png', 'col' => 12 );
		$layouts['c'] = array( 'title' => esc_html__( 'Layout C', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_c.png', 'col' => 6 );
		$layouts['d'] = array( 'title' => esc_html__( 'Layout D', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_d.png', 'col' => 6 );
		$layouts['e'] = array( 'title' => esc_html__( 'Layout E', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_e.png', 'col' => 4 );
		$layouts['f'] = array( 'title' => esc_html__( 'Layout F', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_f.png', 'col' => 4 );
		$layouts['g'] = array( 'title' => esc_html__( 'Layout G', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_g.png', 'col' => 3 );
		$layouts['h'] = array( 'title' => esc_html__( 'Layout H', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_h.png', 'col' => 3 );

		if( !empty( $exclude ) ){
			foreach($exclude as $layout){
				if(array_key_exists($layout, $layouts)){
					unset($layouts[$layout]);
				}
			}
		}

		$layouts = apply_filters('vlog_modify_main_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

/**
 * Get the list of available featured layouts
 *
 * @param bool    $ihnerit Whether you want to add "inherit" option
 * @param bool    $none    Whether you want to add "none" option ( to set layout to "off")
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_featured_layouts' ) ):
	function vlog_get_featured_layouts( $inherit = false, $none = false, $exclude = array() ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png');
		}

		if ( $none ) {
			$layouts['none'] = array( 'title' => esc_html__( 'None', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/none.png');
		}

		$layouts['1'] = array( 'title' => esc_html__( 'Layout 1', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa1.png');
		$layouts['2'] = array( 'title' => esc_html__( 'Layout 2', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa2.png');
		$layouts['3'] = array( 'title' => esc_html__( 'Layout 3', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa3.png');
		$layouts['4'] = array( 'title' => esc_html__( 'Layout 4', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa4.png');
		$layouts['5'] = array( 'title' => esc_html__( 'Layout 5', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa5.png');
		$layouts['6'] = array( 'title' => esc_html__( 'Layout 6', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa4.png');
		$layouts['custom'] = array( 'title' => esc_html__( 'Custom Content', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa_custom.png');

		if( !empty( $exclude ) ){

			foreach($exclude as $layout){
				if(array_key_exists($layout, $layouts)){
					unset($layouts[$layout]);
				}
			}
		}

		$layouts = apply_filters('vlog_modify_featured_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;


/**
 * Get the list of available layouts for single posts
 *
 * @param bool    $ihnerit Whether you want to add "inherit" option
 * @return array List of available options
 * @since  1.8
 */

if ( !function_exists( 'vlog_get_single_layouts' ) ):
	function vlog_get_single_layouts( $inherit = false, $exclude = array() ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png');
		}

		$layouts['none'] = array( 'title' => esc_html__( 'Classic', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_classic.png');
		$layouts['1'] = array( 'title' => esc_html__( 'Cover 1', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa1.png');
		$layouts['2'] = array( 'title' => esc_html__( 'Cover 2', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_fa2.png');

		if( !empty( $exclude ) ){

			foreach($exclude as $layout){
				if(array_key_exists($layout, $layouts)){
					unset($layouts[$layout]);
				}
			}
		}

		$layouts = apply_filters('vlog_modify_single_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;


/**
 * Get the list of available post layouts
 *
 * @param bool    $ihnerit Whether you want to add "inherit" option
 * @param bool    $none    Whether you want to add "none" option ( to set layout to "off")
 * @param array   $exclude    Array to optionally exclude some of layouts
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_cat_layouts' ) ):
	function vlog_get_cat_layouts( $inherit = false ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png', 'col' => 0 );
		}

		$layouts['c'] = array( 'title' => esc_html__( '2 Columns', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_c.png', 'col' => 6 );
		$layouts['e'] = array( 'title' => esc_html__( '3 Columns', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_e.png', 'col' => 4 );
		$layouts['g'] = array( 'title' => esc_html__( '4 Columns', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_g.png', 'col' => 3 );

		$layouts = apply_filters('vlog_modify_cat_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

if ( !function_exists( 'vlog_get_tags_layouts' ) ):
	function vlog_get_tags_layouts( $inherit = false ) {

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png', 'col' => 0 );
		}

		$layouts['c'] = array( 'title' => esc_html__( '2 Columns', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_c.png', 'col' => 6 );
		$layouts['e'] = array( 'title' => esc_html__( '3 Columns', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_e.png', 'col' => 4 );
		$layouts['g'] = array( 'title' => esc_html__( '4 Columns', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/layout_g.png', 'col' => 3 );

		$layouts = apply_filters('vlog_modify_tags_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

/**
 * Get the list of available sidebar layouts
 *
 * You may have left sidebar, right sidebar or no sidebar
 *
 * @param bool    $ihnerit Whether you want to include "inherit" option in the list
 * @return array List of available sidebar layouts
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_sidebar_layouts' ) ):
	function vlog_get_sidebar_layouts( $inherit = false ) {

		$layouts = array();

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png' );
		}

		$layouts['none'] = array( 'title' => esc_html__( 'None', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/none.png' );
		$layouts['left'] = array( 'title' => esc_html__( 'Left sidebar', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/content_sid_left.png' );
		$layouts['right'] = array( 'title' => esc_html__( 'Right sidebar', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/content_sid_right.png' );

		$layouts = apply_filters('vlog_modify_sidebar_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

/**
 * Get the list of available pagination types
 *
 * @param bool    $ihnerit Whether you want to include "inherit" option in the list
 * @param bool    $none    Whether you want to add "none" option ( to set layout to "off")
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_pagination_layouts' ) ):
	function vlog_get_pagination_layouts( $inherit = false, $none = false ) {

		$layouts = array();

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/inherit.png' );
		}

		if ( $none ) {
			$layouts['none'] = array( 'title' => esc_html__( 'None', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/none.png' );
		}

		$layouts['numeric'] = array( 'title' => esc_html__( 'Numeric pagination links', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/pag_numeric.png' );
		$layouts['prev-next'] = array( 'title' => esc_html__( 'Prev/Next page links', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/pag_prev_next.png' );
		$layouts['load-more'] = array( 'title' => esc_html__( 'Load more button', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/pag_load_more.png' );
		$layouts['infinite-scroll'] = array( 'title' => esc_html__( 'Infinite scroll', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/pag_infinite.png' );

		$layouts = apply_filters('vlog_modify_pagination_layouts', $layouts ); //Allow child themes or plugins to modify
		return $layouts;
	}
endif;

/**
 * Get the list of registered sidebars
 *
 * @param bool    $ihnerit Whether you want to include "inherit" option in the list
 * @return array Returns list of available sidebars
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_sidebars_list' ) ):
	function vlog_get_sidebars_list( $inherit = false ) {

		$sidebars = array();

		if ( $inherit ) {
			$sidebars['inherit'] = esc_html__( 'Inherit', 'vlog' );
		}

		$sidebars['none'] = esc_html__( 'None', 'vlog' );

		global $wp_registered_sidebars;

		if ( !empty( $wp_registered_sidebars ) ) {

			foreach ( $wp_registered_sidebars as $sidebar ) {
				$sidebars[$sidebar['id']] = $sidebar['name'];
			}

		}
		//Get sidebars from wp_options if global var is not loaded yet
		$fallback_sidebars = get_option( 'vlog_registered_sidebars' );
		if ( !empty( $fallback_sidebars ) ) {
			foreach ( $fallback_sidebars as $sidebar ) {
				if ( !array_key_exists( $sidebar['id'], $sidebars ) ) {
					$sidebars[$sidebar['id']] = $sidebar['name'];
				}
			}
		}

		//Check for theme additional sidebars
		$custom_sidebars = vlog_get_option( 'sidebars' );

		if ( $custom_sidebars ) {
			foreach ( $custom_sidebars as $k => $title) {
				if ( is_numeric($k) && !array_key_exists( 'vlog_sidebar_'.$k, $sidebars ) ) {
					$sidebars['vlog_sidebar_'.$k] = $title;
				}
			}
		}

		//Do not display footer sidebars for selection
		unset( $sidebars['vlog_footer_sidebar_1'] );
		unset( $sidebars['vlog_footer_sidebar_2'] );
		unset( $sidebars['vlog_footer_sidebar_3'] );
		unset( $sidebars['vlog_footer_sidebar_4'] );

		$sidebars = apply_filters('vlog_modify_sidebars_list', $sidebars ); //Allow child themes or plugins to modify
		return $sidebars;
	}
endif;



/**
 * Get module columns
 *
 * It gets the list of options to specify width of a module
 *
 * @return   array Available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_module_columns' ) ):
	function vlog_get_module_columns() {

		$options['12'] = array( 'title' => esc_html__( '1/1', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/col_12.png' );
		$options['6'] = array( 'title' => esc_html__( '1/2', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/col_6.png' );
		$options['4'] = array( 'title' => esc_html__( '1/3', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/col_4.png' );
		$options['8'] = array( 'title' => esc_html__( '2/3', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/col_8.png' );
		$options['3'] = array( 'title' => esc_html__( '1/4', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/col_3.png' );
		$options['9'] = array( 'title' => esc_html__( '3/4', 'vlog' ), 'img' => get_template_directory_uri() . '/assets/img/admin/col_9.png' );

		$options = apply_filters('vlog_modify_module_columns', $options ); //Allow child themes or plugins to modify
		return $options;

	}
endif;

/**
 * Get meta options
 *
 * @param   array $default Enable defaults i.e. array('date', 'comments')
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_meta_opts' ) ):
	function vlog_get_meta_opts( $default = array() ) {

		$options = array();

		$options['date'] = esc_html__( 'Date', 'vlog' );
		$options['views'] = esc_html__( 'Views', 'vlog' );
		$options['rtime'] = esc_html__( 'Duration', 'vlog' );

		if(!empty($default)){
			foreach($options as $key => $option){
				if(in_array( $key, $default)){
					$options[$key] = 1;
				} else {
					$options[$key] = 0;
				}
			}
		}

		$options = apply_filters('vlog_modify_meta_opts', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;



/**
 * Get action options
 *
 * @param   array $default Enable defaults i.e. array('date', 'comments')
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_action_opts' ) ):
	function vlog_get_action_opts(	$default = array() ) {

		$options = array();
		$options['watch-later'] = esc_html__( 'Watch Later', 'vlog' );
		$options['listen-later'] = esc_html__( 'Listen Later', 'vlog' );
		$options['cinema-mode'] = esc_html__( 'Cinema Mode', 'vlog' );
		if(!empty($default)){
			foreach($options as $key => $option){
				if(in_array( $key, $default)){
					$options[$key] = 1;
				} else {
					$options[$key] = 0;
				}
			}
		}

		$options = apply_filters('vlog_modify_action_opts', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;



/**
 * Get image ratio options
 *
 * @param   bool $original Wheter to include "original (not cropped)" ratio option
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_image_ratio_opts' ) ):
	function vlog_get_image_ratio_opts( $original = false ) {

		$options = array();

		if ( $original ) {
			$options['original'] = esc_html__( 'Original (ratio as uploaded - do not crop)', 'vlog' );
		}

		$options['16_9'] = esc_html__( '16:9', 'vlog' );
		$options['3_2'] = esc_html__( '3:2', 'vlog' );
		$options['4_3'] = esc_html__( '4:3', 'vlog' );
		$options['1_1'] = esc_html__( '1:1 (square)', 'vlog' );
		$options['custom'] = esc_html__( 'Your custom ratio', 'vlog' );

		$options = apply_filters('vlog_modify_ratio_opts', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;

/**
 * Get header top elements
 *
 * Get the list of available elements to display in slots of header top bar
 *
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'vlog_get_header_top_elements' ) ):
	function vlog_get_header_top_elements() {

		$options = array();

		$options['price-info'] = esc_html__( 'Price info', 'vlog' );
		$options['date'] = esc_html__( 'Date', 'vlog' );
		$options['0'] = esc_html__( 'None', 'vlog' );

		$options = apply_filters('vlog_modify_header_top_elements', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;

/**
 * Get special elements in navigation
 *
 * Get the list of available special elements in navigation to display in header options
 *
 * @return array List of available options
 * @since  1.6
 */

if ( !function_exists( 'vlog_get_header_special_elements' ) ):
	function vlog_get_header_special_elements( $default = array() ) {

		$options = array();

		$options['search-drop'] = esc_html__( 'Search button', 'vlog' );
		$options['search-form'] = esc_html__( 'Search form', 'vlog' );
		$options['watch-later'] = esc_html__( 'Watch later', 'vlog' );
		$options['login-form'] = esc_html__( 'Login form (icon/dropdown)', 'vlog' );
		$options['login-icon'] = esc_html__( 'Login icon', 'vlog' );

		if(!empty($default)){
			foreach($options as $key => $option){
				if(in_array( $key, $default)){
					$options[$key] = 1;
				} else {
					$options[$key] = 0;
				}
			}
		}

		$options = apply_filters('vlog_modify_header_special_elements', $options ); //Allow child themes or plugins to modify
		return $options;
	}
endif;


/**
 * Get Admin JS localized variables
 *
 * Function creates list of variables from theme to pass
 * them to global JS variable so we can use it in JS files
 *
 * @since  1.8
 *
 * @return array List of JS settings
 */
if ( !function_exists( 'vlog_get_admin_js_settings' ) ):
	function vlog_get_admin_js_settings() {

		$js_settings = array();
		$js_settings['ajax_url'] = admin_url( 'admin-ajax.php');
		$js_settings = apply_filters('vlog_modify_admin_js_settings', $js_settings ); //Allow child themes or plugins to modify
		return $js_settings;
	}
endif;

?>
