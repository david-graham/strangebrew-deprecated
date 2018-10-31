/**
 * Handles the customizer live preview settings.
 */

jQuery( document ).ready( function() {

	/*
	 * Handles the header icon. 
	 */
	wp.customize( 'header_icon', function( value ) {

		value.bind( function( new_icon, old_icon ) {

            if ( jQuery( '#site-title i').length === 0 ) {
                jQuery( '#site-title a' ).prepend( '<i class="fa">' );
            }

			if ( '' !== old_icon ) {
				jQuery( '#site-title .fa' ).removeClass( old_icon );
            }

			if ( '' !== new_icon ) {
				jQuery( '#site-title .fa' ).addClass( new_icon );
			} else {
                jQuery( '#site-title i').remove();
            }

		} ); // value.bind

    } ); // wp.customize
    
    /*
	 * Handles the sticky header.
	 */
	wp.customize( 'sticky_header', function( value ) {

		value.bind( function( to ) {

			if ( false === to ) {
				jQuery( 'body' ).removeClass( 'sticky-header' );
			}

			if ( true === to ) {
				jQuery( 'body' ).addClass( 'sticky-header' );
			}

		} ); // value.bind

	} ); // wp.customize

} ); // jQuery( document ).ready