<article class="page">

	<?php if ( is_page() ) : // If viewing a single page. ?>
		
		<?php $hide_header = get_post_meta( get_the_id(), 'strangebrew_hide_entry_header', $single ); ?>
			
		<?php if ( ! $hide_header ) :	?>
			<header class="entry-header">
				<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<?php hybrid_base_featured_image();	?>

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->
		
	<?php else : // If not viewing a single page. ?>

		<?php hybrid_base_featured_image();	?>

		<header class="entry-header">
			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; // End single page check. ?>

</article><!-- .entry -->