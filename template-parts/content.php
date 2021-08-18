<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package joshwaymanV4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-banner">
		<?php the_post_thumbnail('banner'); ?>
		<small class="image-attribution"><?php featuredImgAttribution(); ?></small>
	</div>
	
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


	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'joshwayman' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'joshwayman' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php joshwayman_entry_footer(); ?>

		<!-- Related Posts -->
		<h3>Related</h3>
		<ul class="related-posts">
		<?php
			$ids;
			$categories = get_the_category();
			foreach( $categories as $category ) {
				$id = $category->term_id;
				$ids = $ids .','. $id;
			} // End foreach 
			$ids = ltrim($ids, ',');
		?>
			<?php query_posts('posts_per_page=6&cat='.$ids); while(have_posts()) : the_post(); ?>
				<li><a href = "<?php the_permalink(); ?>" class = "list-group-item">
					<?php the_title(); ?>
				</a></li>
			<?php endwhile; wp_reset_query(); ?>
		<?php 
		?>
		</ul>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
