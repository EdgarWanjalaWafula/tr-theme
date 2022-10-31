<?php
/**
 * The sidebar containing the event search area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Two_Rivers
 */

if ( ! is_active_sidebar( 'sidebar-8' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-8' ); ?>
</aside><!-- #secondary -->
