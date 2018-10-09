<?php

# Filter the except length to 40 words.
add_filter( 'excerpt_length', 'hybrid_base_custom_excerpt_length', 999 );


/**
 * Filter the except length to 40 words.
 */
function hybrid_base_custom_excerpt_length( $length ) {
    return 40;
}

?>
