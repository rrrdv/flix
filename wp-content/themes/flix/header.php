<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
$price_info = vlog_get_option('price_info_switch');
$hidePriceInfo = apply_filters('hidePriceInfo', true);
if ($hidePriceInfo) {
	$price_info = 0;
}
wp_head();
?>
</head>

<body <?php body_class(); ?>>

	<?php if( vlog_get_option( 'content_layout' ) == 'boxed' ): ?>
		<div class="vlog-body-box">
	<?php endif; ?>

	<?php if ($price_info) { ?>
		<?php get_template_part('template-parts/header/topbar'); ?>
	<?php } ?>

	<?php $shadow_class = vlog_get_option('header_shadow') ? 'vlog-header-shadow' : ''; ?>

	<header id="header" class="vlog-site-header <?php echo esc_attr( $shadow_class ); ?> hidden-xs hidden-sm">

		<?php get_template_part( 'template-parts/header/layout-' . vlog_get_option('header_layout') ); ?>

	</header>

	<?php if ( vlog_get_option( 'header_sticky' ) ): ?>
		<?php get_template_part( 'template-parts/header/sticky' ); ?>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/header/responsive' ); ?>

	<div id="content" class="vlog-site-content">
