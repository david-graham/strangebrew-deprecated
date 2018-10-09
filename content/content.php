<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

			<header class="entry-header">

				<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
				
				<p class="entry-byline">
					<time class="entry-published"><?php echo get_the_date(); ?></time>
				</p><!-- .entry-byline -->
				
			</header><!-- .entry-header -->
		
			<div class="entry-wrap">
			
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
		
			</div><!-- .entry-wrap -->

				<footer class="entry-footer">
					<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'strange-brew' ) ) ); ?>
					<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( '%s', 'strange-brew' ) ) ); ?>
				</footer><!-- .entry-footer -->

	<?php else : // If not viewing a single post. ?>

		<div class="featured-media">
			
			<?php $default = "<img src='" . get_stylesheet_directory_uri() . "/images/default.jpg'>"; ?>
			 
			<?php 
				$thumbnail = get_the_image( 
					array( 
						'echo'		   => false,
						'size'         => 'post-thumbnail', 
						'order'        => array( 'featured' ), 
						'link_to_post' => is_singular() ? false : true
					) 
				); 
			?>
			
			<?php 
				if ( ! empty ( $thumbnail ) ) { 
					echo $thumbnail;
				} else {
					echo $default; 
				}
			?>

		</div><!-- .featured-media -->

		<div class="entry-wrap">

			<header class="entry-header">
				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
				<?php if ( is_sticky() ) : ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>
				<div class="entry-byline">
					<time class="entry-published"><?php echo get_the_date(); ?></time>
				</div><!-- .entry-byline -->
			</header><!-- .entry-header -->	
		
		</div><!-- .entry-wrap -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->