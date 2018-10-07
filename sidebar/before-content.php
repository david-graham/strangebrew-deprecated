<?php if ( is_active_sidebar( 'before-content' ) ) : // If the sidebar has widgets. ?>

	<aside <?php hybrid_attr( 'sidebar', 'before-content' ); ?>>
	
		<div class="wrap">

			<?php dynamic_sidebar( 'before-content' ); // Displays the before-content sidebar. ?>

		</div>
			
	</aside><!-- #sidebar-before-content -->

<?php endif; // End widgets check. ?>