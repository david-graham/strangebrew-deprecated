<article class="page">

	<?php if ( is_page() ) : // If viewing a single page. ?>
		
		<?php $hide_header = get_post_meta( get_the_id(), 'strangebrew_hide_entry_header', $single ); ?>
			
		<?php if ( ! $hide_header ) :	?>
			<header class="entry-header">
				<h1 class="headline" itemprop="headline"><?php single_post_title(); ?></h1>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<?php get_the_image( 
			array( 
				'size'         => 'featured', 
				'order'        => array( 'featured' ), 
				'link_to_post' => is_singular() ? false : true, 
				'before'       => '<div class="featured-media">', 
				'after'        => '</div>' 
			) 
		); ?>

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->
		
	<?php else : // If not viewing a single page. ?>

		<?php get_the_image(); ?>

		<header class="entry-header">
			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; // End single page check. ?>

</article><!-- .entry -->