<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'subsidiary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'social' ); ?>>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'social',
				'container'       => '',
				'menu_id'         => 'menu-social-items',
				'menu_class'      => 'menu-items',
				'link_before'	  => '<span>',
				'link_after'	  => '</span>',
				'fallback_cb'     => '',
				'depth'			  => 1,
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
			)
		); ?>

	</nav><!-- #menu-social -->

<?php endif; // End check for menu. ?>