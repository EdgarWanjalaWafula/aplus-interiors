<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A-plus_Interiors
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header higher-z-index w-100 <?php echo is_front_page() ? 'position-absolute front-pg' : 'position-relative inner-pg'; ?>">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-2 col-md-3">
					<div class="site-branding">
						<?php
							the_custom_logo();
						?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-lg-5 col-md-6">
					<nav id="site-navigation" class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' 	=> 'menu-1',
									'menu_id'        	=> 'primary-menu',
									'menu_class' 		=> 'd-flex justify-content-between menu-1',
								)
							);
						?>
					</nav><!-- #site-navigation -->
				</div>
				<div class="col offset-2">
					<nav id="site-navigation" class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' 	=> 'menu-2',
									'menu_id'        	=> 'primary-menu-2',
									'menu_class' 		=> 'd-flex justify-content-end menu-2',
								)
							);
						?>
					</nav><!-- #site-navigation -->
				</div>
				<div class="col">
					<div class="menu-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php // get_template_part('template-parts/content', 'menu-panel'); ?>
