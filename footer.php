<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package astromag
 */

 if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>

		</div> <!-- frow -->
	</div> <!-- container-fluid --> 
	
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer">
		<div class="frow-container">
			<div class="frow">
				<div class="col-md-1-1">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'astromag' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'astromag' ), 'WordPress' );
							?>
						</a>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
