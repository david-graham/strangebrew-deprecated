<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav id="menu-primary" class="menu">

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu-items',
				'fallback_cb'     => '',
				'depth'			  => 4,
				'items_wrap'      => '<h3 class="menu-toggle" title="Primary Navigation"><button class="menu-button"><i class="fa fa-navicon"></i> <span class="label screen-reader-text">Menu</span></button></h3><ul id="%s" class="%s">%s</ul>'
			)
		); ?>

	</nav><!-- #menu-primary -->

<?php endif; // End check for menu. ?>