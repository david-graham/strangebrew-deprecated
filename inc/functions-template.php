<?php 

/**
 * Outputs the featured image.
 */
function hybrid_base_featured_image( $args = array() ) {

	echo hybrid_base_get_featured_image( $args );
}

/**
 * Returns the featured image.  This is just a wrapper for the `get_the_image()` function
 * with our custom defaults for this theme setup.
 */
function hybrid_base_get_featured_image( $args = array() ) {

	$size = 'post-thumbnail';

	if ( is_singular() )
		$size = 'featured';

	if ( is_singular( 'portfolio_project' ) )
		$size = 'portfolio-featured';

	$defaults = array(
		'size'         => $size,
		'order'        => array( 'featured' ),
		'before'       => '<div class="featured-media">',
		'after'        => '</div>',
		'echo'         => false
    );
    
    $image = get_the_image( wp_parse_args( $args, $defaults ) );
    
	return $image ? $image : hybrid_base_get_featured_fallback();
}


/**
 * Returns a FontAwesome icon fallback.  Used when there is no featured image.
 */

function hybrid_base_get_featured_fallback() {

	if ( is_singular() )
		return;

    $svg = sprintf(
		'<div class="featured-media"><a href="%s">
			<?xml version="1.0"?>
			<svg class="svg-featured" width="%s" height="%s" viewBox="0 0 950 534">
				<rect class="svg-shape" x="400" y="192.5" width="150" height="150" transform="rotate(45 475 267.5)" />
				<text class="svg-icon" x="475" y="267.5" text-anchor="middle" alignment-baseline="central" dominant-baseline="central">%s</text>
			</svg>
		</a></div>',
		esc_url( get_permalink() ),
		'454px',
		'264px',
		hybrid_base_get_featured_icon()
	);

	return apply_filters( 'hybrid_base_get_featured_fallback', $svg );
}

/**
 * Returns the featured FontAwesome fallback icon.
 */
function hybrid_base_get_featured_icon() {

	$options   = hybrid_base_map_featured_icons();
	$icon      = $options['standard'];
    $type      = get_post_type();
    
    $icon_keys = array( $type );
    
	if ( post_type_supports( $type, 'post-formats' ) ) {

        $format = get_post_format() ? : 'standard';
        
		$icon_keys[] = "{$type}-{$format}";
		$icon_keys[] = $format;
    }
    
	foreach ( $icon_keys as $i ) {

		if ( isset( $options[ $i ] ) ) {

			$icon = $options[ $i ];
			break;
		}
	}
	return apply_filters( 'hybrid_base_featured_icon', hybrid_base_get_font_icon_text( $icon ) );
}

/**
 * Maps post the post format or type to a specific font icon class.
 */
function hybrid_base_map_featured_icons() {

	$icons = array(

		// Post type.
		'attachment'        => 'fa-picture-o',
		'download'          => 'fa-download',
		'page'              => 'fa-file-text-o',
        'portfolio_project' => 'fa-picture-o',
        
		// Post format.
		'aside'             => 'fa-paperclip',
		'audio'             => 'fa-volume-up',
		'chat'              => 'fa-comments',
		'gallery'           => 'fa-picture-o',
		'image'             => 'fa-camera-retro',
		'link'              => 'fa-link',
		'quote'             => 'fa-quote-right',
		'standard'          => 'fa-pencil',
		'status'            => 'fa-map-marker',
		'video'             => 'fa-play-circle'
    );
    
	// Developers, array key can be `{$type}-{$format}`, `{$format}`, or `{$type}`.
	return apply_filters( 'hybrid_base_map_featured_icons', $icons );
}


/**
 * Outputs the header icon.
 */
function hybrid_base_header_icon() {

	$icon = get_theme_mod( 'header_icon' );

	if ( empty( $icon ) )
		return;
	
	echo hybrid_base_get_font_icon_html( $icon );	
}

?>