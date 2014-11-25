<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Riema Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="top-bar">
			<div class="top-bar-container">
				<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
			</div>
		</div>
		<div class="logo-bar">
			<div class="logo-bar-content"></div>
			<div class="logo-bar-border"></div>
		</div>
		<div class="logo-bar-container">
			<a class="logo" title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">