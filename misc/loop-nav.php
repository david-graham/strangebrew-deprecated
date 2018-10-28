<?php the_posts_pagination(
	array( 
		'prev_text' => esc_html_x( '&larr; Previous', 'posts navigation', 'hybrid-base' ), 
		'next_text' => esc_html_x( 'Next &rarr;',     'posts navigation', 'hybrid-base' )
	) 
); ?>