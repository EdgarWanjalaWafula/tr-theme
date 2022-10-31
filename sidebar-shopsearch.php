<?php
/**
 * The sidebar containing the shop search area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Two_Rivers
 */

if ( ! is_active_sidebar( 'sidebar-6' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-6' ); ?>
</aside><!-- #secondary -->
