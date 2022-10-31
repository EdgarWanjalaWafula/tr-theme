<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Two_Rivers
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tworivers' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12 tr-logo">
					<!-- start logo -->
		                <?php if (get_theme_mod( 'tworivers_logo')) : ?>
		                    <a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_theme_mod('tworivers_logo')); ?>" alt="<?php bloginfo('name'); ?>"></a>
		                <?php else : ?>
		                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                <?php endif; ?>
		            <!-- end logo -->
		            </div>
		            <!-- start top menu -->
		            <div class="col-md-9 col-sm-9 col-xs-12 tr-top-menu">
		            	<?php tworivers_top_menu(); ?>
		            </div>
		            <!-- end top menu -->
	            </div> 
            </div> 
		</div><!-- .site-branding -->
		
		<div class="nav-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<?php 
							wp_nav_menu( array( 
							'theme_location' => 'primary', 
							'menu_id' => 'primary-menu',
							'container_class' => 'main-navigation',
							'container_id' => 'site-navigation',
							'container' => 'nav'
							) ); 
						?>
					</div>
				</div>
			</div>
		</div><!-- #site-navigation -->
				
	</header><!-- #masthead -->

	<div class="container">
	<div id="content" class="site-content">
