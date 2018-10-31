<?php
/**
 * Handles the theme's theme customizer functionality.
 */

/* Theme Customizer setup. */
add_action( 'customize_register', 'hybrid_base_customize_register' );

/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 */
function hybrid_base_customize_register( $wp_customize ) {

	/* Load the Font Awesome definitions. */
    require_once( trailingslashit( get_template_directory() ) . 'inc/functions-icons.php' );
    
	/* Load JavaScript files. */
    add_action( 'customize_preview_init', 'hybrid_base_enqueue_customizer_scripts' );
    
	/* Load CSS files. */
    add_action( 'customize_controls_print_styles', 'hybrid_base_customize_controls_print_styles' );
    
	/* Adds the header icon setting. */
	$wp_customize->add_setting(
		'header_icon',
		array(
			'type'                 => 'theme_mod',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'esc_attr',
			'sanitize_js_callback' => 'esc_attr',
			'transport'            => 'postMessage',
		)
    );
    
	/* Adds the header icon control. */
	$wp_customize->add_control(
		'strangebrew-header-icon',
		array(
			'label'    => __( 'Header Icon', 'strange-brew' ),
			'section'  => 'title_tagline',
			'settings' => 'header_icon',
			'type'     => 'select',
			'choices'  => hybrid_base_get_header_icon_choices()
		)
    );
    
	/* Adds the sticky header setting. */
	$wp_customize->add_setting(
		'sticky_header',
		array(
			'type'                 => 'theme_mod',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'esc_attr',
			'sanitize_js_callback' => 'esc_attr',
			'transport'            => 'postMessage',
		)
    );
    
	/* Adds the sticky header control. */
	$wp_customize->add_control(
		'strangebrew-sticky-header',
		array(
			'label'    => __( 'Sticky Header', 'strange-brew' ),
			'section'  => 'title_tagline',
			'settings' => 'sticky_header',
			'type'     => 'checkbox'
		)
	);
}

/**
 * Returns an array of header icons for use with the 'header_icon' theme option.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */

function hybrid_base_get_header_icon_choices() {

    $icons = array( '' => '' );
    
	foreach ( hybrid_base_get_font_icons() as $class => $code )
		$icons[ $class ] = "&#x{$code};";
    
    return $icons;
}

/**
 * Loads theme customizer JavaScript.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function hybrid_base_enqueue_customizer_scripts() {
    
	wp_enqueue_script( 'strangebrew-customize-js', trailingslashit( get_template_directory_uri() ) . "js/customize.js", array( 'jquery' ), null, true );
}
/**
 * Loads theme customizer CSS.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function hybrid_base_customize_controls_print_styles() {
    
    wp_enqueue_style( 'strangebrew-customize-css', trailingslashit( get_template_directory_uri() ) . "css/customize.css" );
	wp_enqueue_style( 'font-awesome', trailingslashit( get_template_directory_uri() ) . "css/font-awesome.min.css" );
}