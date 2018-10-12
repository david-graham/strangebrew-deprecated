<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

			<?php hybrid_base_featured_image();	?>

			<header class="entry-header">
				<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>
				<?php the_excerpt(); ?>
				<?php wp_link_pages(); ?>
			</div><!-- .entry-summary -->

			<div class="entry-meta">
				<?php hybrid_post_terms( array( 'taxonomy' => 'portfolio_category' ) ); ?>
				<?php hybrid_post_terms( array( 'taxonomy' => 'portfolio_tag' ) ); ?>

				<?php
					$meta = '';
					$meta .= ccp_get_project_client(     array( 'wrap' => '<li %s><span class="project-key">' . __( 'Client',    'strange-brew' ) . '</span> %s</li>' ) );
					$meta .= ccp_get_project_location(   array( 'wrap' => '<li %s><span class="project-key">' . __( 'Location',  'strange-brew' ) . '</span> %s</li>' ) );
					$meta .= ccp_get_project_start_date( array( 'wrap' => '<li %s><span class="project-key">' . __( 'Started',   'strange-brew' ) . '</span> %s</li>' ) );
					$meta .= ccp_get_project_end_date(   array( 'wrap' => '<li %s><span class="project-key">' . __( 'Completed', 'strange-brew' ) . '</span> %s</li>' ) );
				?>

				<?php if ( $meta ) : ?>
					<ul class="project-meta"><?php echo $meta; ?></ul>
				<?php endif; ?>

				<?php ccp_project_link( array( 'text' => __( 'View Project Site', 'strange-brew' ), 'before' => '<div class="project-link-wrap">', 'after' => '</div>' ) ); ?>
			</div>

			<div <?php hybrid_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div><!-- .entry-content -->

	<?php else : // If not viewing a single post. ?>
			
		<?php hybrid_base_featured_image();	?>

		<div class="entry-wrap">

			<header class="entry-header">
				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->					
			
			<?php if ( ccp_is_project_sticky() && !is_paged() ) : // If post is stickied and it's the first page of the blog. ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
			
		</div><!-- .entry-wrap -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->