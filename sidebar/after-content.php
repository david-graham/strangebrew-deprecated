<?php if ( is_active_sidebar( 'after-content' ) ) : // If the sidebar has widgets. ?>

	<aside <?php hybrid_attr( 'sidebar', 'after-content' ); ?>>
	
		<div class="wrap">

			<?php dynamic_sidebar( 'after-content' ); // Displays the after-content sidebar. ?>

		</div>
			
	</aside><!-- #sidebar-after-content -->

<?php endif; // End widgets check. ?>