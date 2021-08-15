<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package joshwaymanV4
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-inner">
			<div class="site-info">
				<p class="site-title"><a href="http://joshwayman.local/" rel="home"><span>josh</span>wayman</a></p>
				<!--<span class="sep"> | </span>-->
				
			</div><!-- .site-info -->
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'secondary-menu',
					)
				);
			?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
