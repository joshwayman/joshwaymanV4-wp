<?php
/**
 * Template part for displaying a summary card of the content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package joshwaymanV4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_url( get_permalink() ) ?>" class="img-wrapper">
		<?php the_post_thumbnail( 'square-small' ); ?>
	</a>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				joshwayman_posted_on();
				joshwayman_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


</article><!-- #post-<?php the_ID(); ?> -->
