<?php


// don't load directly
if ( !defined( 'ABSPATH' ) ) die( '-1' );

class IcontabShortcode {

	function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'vcit_add_scripts_to_frontend' ) );

		add_action( 'init', array( $this, 'add_tabs_shortcode' ) );

		add_action ('wp_head', array( $this, 'add_style' )  );

	}

	/**
	 * Add css and js to the page.
	 *
	 * @author Aman Saini
	 * @since  1.0
	 * @return [type] [description]
	 */
	public function vcit_add_scripts_to_frontend() {

		wp_enqueue_style( 'vcittabscss', VC_ICON_TABS_URL.'/css/vcit-frontend.css' );
		wp_enqueue_style( 'vcittabstyle', VC_ICON_TABS_URL.'/css/tabs-style.css' );

		wp_enqueue_style( 'font-awesome', VC_ICON_TABS_URL.'/css/font-awsome.css' );

		wp_enqueue_script( 'vcittabsjs', VC_ICON_TABS_URL.'/js/cbpFWTabs.js' );

	}

	/**
	 * Hook shortcodes
	 *
	 * @author Aman Saini
	 * @since  1.0
	 */
	public function add_tabs_shortcode() {

		add_shortcode( 'vc_icon_tabs', array( $this, 'vc_icon_tabs_shortcode' ) );

		add_shortcode( 'vc_icon_tab', array( $this, 'vc_icon_tab_shortcode' ) );

	}

	/**
	 * Add css style to the head of the page
	 *
	 * @author Aman Saini
	 * @since  1.0
	 */
	public function add_style(){

	global $post;

	$settings = get_post_meta($post->ID,'tab_settings',true);


	if( !empty ($settings) ){
	echo '<style>';
		 foreach ($settings as $key => $setting) { ?>

			#tabs-<?php echo $key ?> nav {
			text-align:<?php echo $setting['tabs_position'] ?>;
			}
			#tabs-<?php echo $key ?> li {
			border-color:<?php echo $setting['border_color'] ?>;
			border-width: <?php echo $setting['border_width'] ?>px;
			-webkit-border-radius:  <?php echo $setting['border_radius'] ?>px <?php echo $setting['border_radius'] ?>px 0px 0px;
			 -moz-border-radius:  <?php echo $setting['border_radius'] ?>px <?php echo $setting['border_radius'] ?>px 0px 0px;
			 border-radius:  <?php echo $setting['border_radius'] ?>px <?php echo $setting['border_radius'] ?>px 0px 0px;

			}

			#tabs-<?php echo $key ?> nav li.tab-current:before, #tabs-<?php echo $key ?> nav li.tab-current:after{
			background-color:<?php echo $setting['border_color'] ?>;
			height: <?php echo $setting['border_width'] ?>px;
			}

			#tabs-<?php echo $key ?> li a {
			background-color:<?php echo $setting['background_color'] ?>;
			color:<?php echo $setting['font_color'] ?>;
			-webkit-border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			 -moz-border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			 border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			}


			#tabs-<?php echo $key ?> li.tab-current {
			box-shadow:inset 0 0px <?php echo $setting['border_color'] ?>;
			}

			#tabs-<?php echo $key ?> li.tab-current a {
			background-color:<?php echo $setting['active_tab_color'] ?> !important;
			color:<?php echo $setting['active_tab_font_color'] ?> !important;
			-webkit-border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			 -moz-border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			 border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;

			}

			#tabs-<?php echo $key ?> li a:hover {
			background-color:<?php echo $setting['hover_color'] ?>;
			color:<?php echo $setting['font_hover_color'] ?>;
			-webkit-border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			 -moz-border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			 border-radius:  <?php echo ($setting['border_radius']-$setting['border_width']) ?>px <?php echo ($setting['border_radius']-$setting['border_width']) ?>px 0px 0px;
			}


		<?php  }

	echo '</style>';
 }


	}

	/**
	 * Shortcode code to display tabs
	 *
	 * @author Aman Saini
	 * @since  1.0
	 * @param  $atts
	 * @param  $content
	 * @return shortcode html
	 */
	public function vc_icon_tabs_shortcode( $atts , $content='' ) {

		$output = $title = $interval = $el_class = '';
		extract( shortcode_atts( array(
		        	'tab_contid' =>'',
					'background_color'=>'#fff',
					'font_color'=>'#768e9d',
					'font_hover_color'=>'#768e9d',
					'border_width'=>'1',
					'border_color'=>'#47a3da',
					'border_radius'=>'',
					'hover_color'=>'',
					'active_tab_color'=>'',


					'el_class' => ''
				), $atts ) );

		global $post;
	/*	print_r(get_post_meta($post->ID,'tab_settings'));*/

		$cl = " " . str_replace( ".", "", $el_class );

		$el_class = $cl;

		$element = 'tabcontent';

		// Extract tab titles
		preg_match_all( '/vc_icon_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		/**
		 * vc_icon_tabs
		 *
		 */
		if ( isset( $matches[1] ) ) {
			$tab_titles = $matches[1];
		}

		$tabs_nav = '';
		$tabs_nav .= '
		<div id="tabs-'.$tab_contid.'" class="icontabs">
    	<nav>
    	<input class="tabs_id" type="hidden" value="'.$tab_contid.'" >
        <ul>';
		foreach ( $tab_titles as $tab ) {
			$tab_atts = shortcode_parse_atts( $tab[0] );

			if( empty($tab_atts['icon']) ){
				$tab_atts['icon']= '';
			}

			if( !empty($tab_atts['tab_back_color']) ){

				$style='background-color:'.$tab_atts['tab_back_color'];
			}else{
				$style='';
			}


			if ( isset( $tab_atts['title'] ) ) {
				$tabs_nav .= '<li> <a style="'.$style.'" class="" href="#tab-' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : sanitize_title( $tab_atts['title'] ) ) . '"><i class="'. $tab_atts['icon'].'"></i><span>' . $tab_atts['title'] . '</span></a></li>';
			}
		}
		$tabs_nav .= '</ul>
    	</nav>' . "\n";

    	if( empty($css_class) ){
				$css_class= '';
			}

		$output .= "\n\t" . '<div class=" tabcontents ' .$el_class .' '. $css_class . '" >';
		$output .= "\n\t\t" . '<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
		$output .= "\n\t\t\t" . $tabs_nav;
		$output .= ' <div class="tabcontent">';
		$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
		$output .= ' </div>';
		$output .= "\n\t\t" . '</div> ' ;
		$output .= "\n\t" . '</div> <script type="text/javascript">
			(function($){
			$("document").ready(function(){
			    new CBPFWTabs( document.getElementById( "tabs-'.$tab_contid.'" ) );

						})
			})(jQuery);

		</script>

		</div>' ;

		return $output;
	}


	function vc_icon_tab_shortcode( $atts , $content='' ) {
		extract( shortcode_atts( array(
					'tab_id' => '',
				), $atts ) );

		$output = '';

		if(!empty($tab_id)){
			$output .= '<section class="tabsection" id="tab-'.$tab_id.'">';
			$output .= do_shortcode($content);
			$output .= '</section>';
		}

	return $output;

	}

}

new IcontabShortcode();
