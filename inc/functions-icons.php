<?php

# Enqueue FontAwesome styles.
add_action( 'wp_enqueue_scripts', 'fontawesome_enqueue_styles', 5 );

# Add FontAwesome icon input field to widgets.
add_filter( 'widget_form_callback', 'fontawesome_widget_icon', 10, 2 );

# Save submitted icon code on update.
add_filter( 'widget_update_callback', 'fontawesome_widget_update', 10, 2 );

# Display the chosen icon beside the widget title.
add_filter( 'dynamic_sidebar_params', 'fontawesome_dynamic_sidebar_params' );

/**
 * Enqueue FontAwesome styles.
 */
function fontawesome_enqueue_styles() {
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome' );
}

/**
 * Add FontAwesome icon input field to widgets.
 */
function fontawesome_widget_icon( $instance, $widget ) {

	if ( !isset( $instance['fa_icon'] ) ) {
		$instance['fa_icon'] = null;
	}

	$row = "<p>\n";
	$row .= "\t<label for='widget-{$widget->id_base}-{$widget->number}-fa_icon'>FontAwesome Icon (e.g. <strong>fa-envelope</strong>):</label>\n";
	$row .= "\t<input type='text' name='widget-{$widget->id_base}[{$widget->number}][fa_icon]' id='widget-{$widget->id_base}-{$widget->number}-fa_icon' class='widefat' value='{$instance['fa_icon']}'/>\n";
	$row .= "</p>\n";

	echo $row;
	
	return $instance;
	
}

/**
 * Save submitted icon code on update.
 */
function fontawesome_widget_update( $instance, $new_instance ) {

	$instance['fa_icon'] = $new_instance['fa_icon'];
	return $instance;
	
}

/**
 * Display the chosen icon beside the widget title.
 */
function fontawesome_dynamic_sidebar_params( $params ) {

	global $wp_registered_widgets;
	
	$widget_id	= $params[0]['widget_id'];
	$widget_obj	= $wp_registered_widgets[$widget_id];
	$widget_opt	= get_option($widget_obj['callback'][0]->option_name);
	$widget_num	= $widget_obj['params'][0]['number'];

	if ( isset($widget_opt[$widget_num]['fa_icon']) && !empty($widget_opt[$widget_num]['fa_icon']) ) {
	
		$params[0]['before_title'] = preg_replace( '/">/', '"><i class="fa fa-fw ' . $widget_opt[$widget_num]['fa_icon'] . '"></i>', $params[0]['before_title'], 1 );
		
	}

	return $params;
	
}

?>