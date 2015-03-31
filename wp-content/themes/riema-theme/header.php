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
<link href='http://fonts.googleapis.com/css?family=Raleway:800' rel='stylesheet' type='text/css'>
<script type="text/javascript">
window.onload = function() {
  new dgCidadesEstados({
    estado: document.getElementById('estado-imovel'),
    cidade: document.getElementById('cidade-imovel')
  });
}

jQuery(document).ready(function() {
    jQuery('.datepicker').datepicker({
	minDate: 0,
        dateFormat : 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	    nextText: 'Próximo',
	    prevText: 'Anterior'
    });

    
	
	jQuery('#form-reservation-submit').click( function() { 
		var FlatName = jQuery("#form-reservation-flat").val();
	    var FlatCheckin = jQuery("#form-reservation-checkin").val();
	    var FlatCheckout = jQuery("#form-reservation-checkout").val();
		location.href = "http://www.engenhosistemas.com.br/riema/?xcodadministradora=RIEMA&xcodhot=" + FlatName + "&xDe=" + FlatCheckin + "&xAte=" + FlatCheckout;
		return false;
	} );

	// Create the dropdown base
	jQuery("<select />").appendTo(".menu-bar-container");
	
	// Create default option "Go to..."
	jQuery("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Selecione a área desejada..."
	}).appendTo(".menu-bar-container select");
	
	// Populate dropdown with menu items
	jQuery(".menu-bar-container a").each(function() {
	 var el = jQuery(this);
	 jQuery("<option />", {
	     "value"   : el.attr("href"),
	     "text"    : el.text()
	 }).appendTo(".menu-bar-container select");
	});
	
	jQuery(".menu-bar-container select").change(function() {
	  window.location = jQuery(this).find("option:selected").val();
	});
});
</script>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="top-bar">
			<div class="top-bar-container">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-top' ) ); ?>
			</div>
		</div>
		<div class="menu-bar">
			<div class="menu-bar-container">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-primary' ) ); ?>
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