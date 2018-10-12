		<footer <?php hybrid_attr( 'footer' ); ?>>

			<div class="wrap">

				<?php hybrid_get_menu( 'social' ); // Loads the menu/social.php template. ?>

				<p class="credit">
					<?php printf(
						// Translators: 1 is current year and 2 is site name/link,
						esc_html__( 'Copyright &#169; %1$s %2$s.', 'strange-brew' ), date_i18n( 'Y' ), hybrid_get_site_link()
					); ?>
					<br />
					<?php printf(
						// Translators: 1 is WordPress name/link and 2 is theme name/link. */
						esc_html__( 'Powered by %1$s and %2$s.', 'strange-brew' ), hybrid_get_wp_link(), hybrid_get_theme_link()
					); ?>
				</p><!-- .credit -->

				<?php hybrid_get_menu( 'footer' ); // Loads the menu/footer.php template. ?>

			</div><!-- .wrap -->

		</footer><!-- #footer -->

	</div><!-- #below-site-header -->
		
	<?php wp_footer(); // WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>

</body>
</html>