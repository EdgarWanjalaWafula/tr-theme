<?php
/**
 * The sidebar containing the footer widget 3 area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Two_Rivers
 */

if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</aside><!-- #secondary -->
