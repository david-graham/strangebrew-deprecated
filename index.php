<?php get_header(); // Loads the header.php template. ?>

<div class="wrap">

	<?php hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php if ( hybrid_is_plural() ) : // If viewing a multi-post page ?>

			<?php locate_template( array( 'misc/archive-header.php' ), true ); // Loads the misc/archive-header.php template. ?>

		<?php endif; // End check for multi-post page. ?>

		<?php if ( have_posts() ) : // Checks if any posts were found. ?>

			<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

				<?php the_post(); // Loads the post data. ?>

				<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>

				<?php if ( is_singular( 'post' ) ) : // If viewing a single post. ?>

					<?php comments_template( '', true ); // Loads the comments.php template. ?>

				<?php endif; // End check for single post. ?>

			<?php endwhile; // End found posts loop. ?>

			<?php locate_template( array( 'misc/loop-nav.php' ), true ); // Loads the misc/loop-nav.php template. ?>

		<?php else : // If no posts were found. ?>

			<?php locate_template( array( 'content/error.php' ), true ); // Loads the content/error.php template. ?>

		<?php endif; // End check for posts. ?>

	</main><!-- #content -->
	
</div><!-- .wrap -->

<?php get_footer(); // Loads the footer.php template. ?>