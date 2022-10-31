<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Two_Rivers
 */

?>

	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row footer-widgets">
			<div class="col-md-3 col-sm-4 gutters-bottom">
				<?php get_sidebar( 'footerwidget1' ); ?>
			</div><!-- end footer widget 1 -->
			<div class="col-md-6 col-sm-4 gutters-bottom">
				<?php get_sidebar( 'footerwidget2' ); ?>
			</div><!-- end of footer widget 2 -->
			<div class="col-md-3 col-sm-4 gutters-bottom">
				<?php get_sidebar( 'footerwidget3' ); ?>
			</div><!-- end of footer widget 3 -->
		</div>
		
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="site-info text-center">
					&copy; Copyright <script>document.write(new Date().getFullYear());</script>. All Rights Reserved
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Built by %2$s.', 'tworivers' ), 'tworivers', '<a href="https://legibra.com/" target="_blank" rel="designer" alt="Website Design & Development by Legibra" title="Website Design & Development by Legibra">Legibra</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div> <!-- end of container -->

<!-- scroll to top -->
<a href="javascript:void(0)" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top -->

</body>
</html>
