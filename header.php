<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package joshwaymanV4
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'joshwayman' ); ?></a>

	<?php if ( !is_front_page() && !is_home() ) : ?>
	<header id="masthead" class="site-header">
		<div class="nav-wrapper">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span>josh</span>wayman</a></p>
					
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'joshwayman' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php endif; ?>

	<?php if ( is_front_page() && is_home() ) : 

	$joshwayman_description = get_bloginfo( 'description', 'display' );
	if ( $joshwayman_description || is_customize_preview() ) :
		$img_tall = wp_get_attachment_image_url(272, 'tall');
		$img_square = wp_get_attachment_image_url(271, 'square');
		?>
	<section id="hero" class="site-hero">
		<div class="col-1/2">
			<h1>
				<span>Josh</span>
				<span>Wayman</span>
			</h1>
			<p class="site-description"><?php echo $joshwayman_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'joshwayman' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>
		</div>
		<div class="col-1/2">
			<div class="site-hero-image-wrapper">
				<img src="<?= $img_tall ?>" class="img-tall" alt="Josh Wayman">
				<img src="<?= $img_square ?>" class="img-square" alt="Josh Wayman">
			</div>
		</div>

	</section>
	<?php endif; 
			endif; ?>
