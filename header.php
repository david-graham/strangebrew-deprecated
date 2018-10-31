<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<div class="skip-link">
		<a href="#content" class="screen-reader-text"><?php _e( 'Skip to content', 'strange-brew' ); ?></a>
	</div><!-- .skip-link -->

	<header <?php hybrid_attr( 'header' ); ?>>

			<div class="wrap">

				<div <?php hybrid_attr( 'branding' ); ?>>
					<span <?php hybrid_attr( 'site-title' ); ?>><a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php hybrid_base_header_icon(); ?><?php bloginfo( 'name' ); ?></a></span>
				</div><!-- #branding -->

				<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

			</div><!-- .wrap -->

	</header><!-- #header -->

	<div id="below-site-header">
