<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package astromag
 */

get_header();
?>

	<div class="col-md-5-8 col-sm-1-1 col-xs-1-1"> <!-- center started -->

	<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
				<div id="content" class="astromag-page-title-area search-title">
					<div class="frow-container-fluid">
						<div class="frow">
							<div class="col-md-1-1">
								<h1>
									<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'astromag' ), '<span>' . get_search_query() . '</span>' );
								?>
								</h1>
								<?php 
								if(function_exists('bcn_display')){
									bcn_display();
								} 
							?>
							</div>
						</div>
					</div>
				</div>

				<section class="main-starts px-10 py-20">
					<div class="frow">
						<div class="col-md-1-1">
							<div class="astromag-blog-list">
								<?php if ( have_posts() ) : ?>

									<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/**
										 * Run the loop for the search to output the results.
										 * If you want to overload this in a child theme then include a file
										 * called content-search.php and that will be used instead.
										 */
										get_template_part( 'template-parts/content', 'search' );

									endwhile;

									the_posts_pagination(
										array(
											'mid_size' => 2, 
											'prev_text' => '' . __('Prev', 'astromag'), 
											'next_text' => __('Next', 'astromag') . ''
										)
									); // pagination nav

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif;
								?>
							</div>
						</div>

					</div>
				</section>

			</main> <!-- main -->
		</div> <!-- primary -->
	</div> <!-- center ends -->

		

	<div class="col-md-2-8 col-sm-1-1 col-xs-1-1">
		<?php 
			get_sidebar();
		?>
	</div>

<?php
get_footer();