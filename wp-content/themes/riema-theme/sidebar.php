<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Riema Theme
 */

if ( ! is_active_sidebar( 'sidebar-general' ) ) {
	return;
}
?>
	<?php dynamic_sidebar( 'sidebar-general' ); ?>