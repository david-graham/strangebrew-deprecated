<?php

# Register custom image sizes.
add_action( 'init', 'hybrid_base_register_image_sizes', 5 );

# Register custom menus.
add_action( 'init', 'hybrid_base_register_menus', 11 );

# Register custom layouts.
add_action('hybrid_register_layouts', 'hybrid_base_register_layouts');

# Register sidebars.
add_action( 'widgets_init', 'hybrid_base_register_sidebars', 5 );

# Add custom scripts.
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_scripts', 5 );

# Add custom styles.
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_styles', 20 );

/**
 * Registers custom image sizes for the theme. 
 */
function hybrid_base_register_image_sizes() {

	set_post_thumbnail_size( 454, 264, array( 'center', 'top') );
	add_image_size( 'featured', 1000, 480, array( 'center', 'top') );
}

/**
 * Registers nav menu locations.
 */
function hybrid_base_register_menus() {
	register_nav_menu( 'primary',    _x( 'Primary',    'Primary', 'strange-brew' ) );
	register_nav_menu( 'subsidiary', _x( 'Subsidiary', 'Subsidiary', 'strange-brew' ) );
}

/**
 * Registers layouts.
 */
function hybrid_base_register_layouts() {
	hybrid_register_layout('1c-wide', array('label' => esc_html__('1 Column Wide', 'strange-brew'), 'image' => '%s/images/layouts/1c-wide.png'));
	hybrid_register_layout('1c-narrow', array('label' => esc_html__('1 Column Narrow', 'strange-brew'), 'image' => '%s/images/layouts/1c-narrow.png'));
    hybrid_register_layout('pagebuilder', array('label' => esc_html__('Page Builder', 'strange-brew'), 'image' => '%s/images/layouts/blank.png'));
}

/**
 * Registers sidebars.
 */
function hybrid_base_register_sidebars() {}

/**
 * Load scripts for the front end.
 */
function hybrid_base_enqueue_scripts() {

	// Enqueue Theme JS
	wp_register_script( 'strangebrew', hybrid_locate_theme_file( '/js/strangebrew.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'strangebrew' );	
}

/**
 * Load stylesheets for the front end.
 */
function hybrid_base_enqueue_styles() {

	// Load normalize base style.
	wp_enqueue_style( 'hybrid-one-five' );

	// Load gallery style if 'cleaner-gallery' is active.
	if ( current_theme_supports( 'cleaner-gallery' ) )
		wp_enqueue_style( 'hybrid-gallery' );

	// Load parent theme stylesheet if child theme is active.
	if ( is_child_theme() )
		wp_enqueue_style( 'hybrid-parent' );

	// Load active theme stylesheet.
	wp_enqueue_style( 'hybrid-style' );
}

/**
 * Apply different layouts based on the content type
 */
add_filter( 'theme_mod_theme_layout', 'hybrid_base_mod_theme_layout', 15 );

function hybrid_base_mod_theme_layout( $layout ) {
 
	if ( is_singular( 'post' ) ) {
       	$layout = '1c-narrow';
    } else {
		$layout = '1c-wide';
	}
 
	return $layout;
}

/**
 * Apply css class to parent menu item & custom post type archive
 */
add_filter( 'nav_menu_css_class', 'hybrid_base_active_item_classes', 10, 2 );

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