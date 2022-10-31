<?php
/**
 * The sidebar containing the footer widget 2 area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Two_Rivers
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</aside><!-- #secondary -->
