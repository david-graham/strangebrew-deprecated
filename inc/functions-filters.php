<?php

# Filter the theme layout.
add_filter( 'theme_mod_theme_layout', 'hybrid_base_mod_theme_layout', 15 );

# Filter the body class
add_filter( 'body_class', 'hybrid_base_sticky_header_class' );

# Filter menu classes.
add_filter( 'nav_menu_css_class', 'hybrid_base_active_item_classes', 10, 2 );

# Filter the except length to 40 words.
add_filter( 'excerpt_length', 'hybrid_base_custom_excerpt_length', 999 );

# Filter post classes
add_filter( 'post_class', 'hybrid_base_post_class' );

/**
 * Apply different layouts based on the content type
 */
function hybrid_base_mod_theme_layout( $layout ) {
 
	if ( is_singular( 'post' ) ) {
       	$layout = '1c-narrow';
    } else {
		$layout = '1c-wide';
	}
 
	return $layout;
}

/**
 * Filter the body class to set sticky header
 */
function hybrid_base_sticky_header_class($classes) {

	if ( get_theme_mod( 'sticky_header') === "1" ) {
		$classes[] = 'sticky-header';
	}

	return $classes;
}


/**
 * Apply css class to parent menu item & custom post type archive
 */
function hybrid_base_active_item_classes($classes = array(), $menu_item = false) {
    
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

    // Checking if post ID exist...
    if (isset( $id )){
	    $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item' : '';
    }

    return $classes;
}

/**
 * Filter the except length to 40 words.
 */
function hybrid_base_custom_excerpt_length( $length ) {

    return 40;
}

/**
 * Adds custom post classes.
 */
function hybrid_base_post_class( $classes ) {

	if ( is_singular() )
		return $classes;

	if ( function_exists( 'ccp_is_project_sticky' ) && ccp_is_project_sticky() && ! in_array( 'sticky', $classes ) ) {
		$classes[] = 'sticky';
	}

	return $classes;
}

?>
