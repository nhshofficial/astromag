<?php
/**
 * Template Name: AstroMag Home
 */

get_header();
?>
	<?php if(is_active_sidebar( 'page-sidebar' )): ?>
	<div class="col-md-5-8 col-sm-1-1 col-xs-1-1"> <!-- center started -->
	<?php else: ?>
	<div class="col-md-7-8 col-sm-1-1 col-xs-1-1"> <!-- center started -->
	<?php endif; ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="main-starts px-10 py-30">
				<div class="col-md-1-1">
					<div class="astromag-blog-list pb-15">

					<?php if( get_theme_mod( 'show_home_post_section_one', true ) == true ): ?>
					<h3 class="home-category mb-20"><?php echo esc_html( get_theme_mod( 'section_one_title', 'Latest Posts' ) ); ?></h3>
						
					<div class="frow gutters">
						<?php 
							// WP Query for widget (1st post only)
							$postArgsFirstPost = array(
								'post__not_in' => get_option( 'sticky_posts' ),
								'post_status' => 'publish',
								'post_type' => 'post',
								'orderby' => esc_html( get_theme_mod('section_one_post_type') ), // rand, DESC
								'posts_per_page' => 1,
								'tax_query' => array (
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => get_theme_mod( 'section_one_post_category' )
									),
								)
							);

							// query var
							$get_posts_first = new WP_Query($postArgsFirstPost); 
							
							// Loop
							while($get_posts_first->have_posts()) : $get_posts_first->the_post();
							//Post ID
							$postIdFirst  = get_the_ID();
						?>
						<div class="col-md-6-9 col-sm-1-2 col-xs-1-1">
							<div class="single-post-home">
								<?php if(has_post_thumbnail( $postIdFirst )) : ?>
								
									<div class="post-image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url($postIdFirst,'astromag-blog') );  ?>);">
									
								<?php else: ?>

									<div class="post-image no-thumb">

								<?php endif; ?>
								<?php if(get_theme_mod( 'section_one_show_post_category', true ) == true): ?>
									<span><?php echo esc_html( get_the_category($postIdFirst)[0]->name ); ?></span>
								<?php endif; ?>
									</div>
								<div class="post-meta">
									<p class="post-date">
									<?php if(get_theme_mod( 'section_one_show_published_date', true ) == true): ?>
										<i class="fa-regular fa-clock"></i> <?php echo esc_html( get_the_modified_date( 'Y-m-d' ) ); ?>
									<?php endif; ?>
									</p>
									<p class="post-comment post-views">
										<?php if(get_theme_mod( 'section_one_show_post_view', true ) == true): ?>
											<span><i class="fa-regular fa-eye"></i> 
											<?php                             
												if ( get_post_meta( get_the_ID() , 'astromag_post_views_count', true) == '') { 
													echo esc_html( '0' ) ;                            
												} else { 
													echo esc_html(get_post_meta( get_the_ID() , 'astromag_post_views_count', true)); }
											?> 
											</span>
										<?php endif; ?>
										<?php if(get_theme_mod( 'section_one_show_post_comments', true ) == true): ?>
											<span><i class="fa-regular fa-comment-dots"></i> <?php echo esc_html( wp_count_comments($postIdFirst)->total_comments ); ?></span>
										<?php endif; ?>
									</p>
								</div>
								<h2 class="post-title"><?php echo esc_html( get_the_title( $postIdFirst ) ); ?></h2>
								<div class="read-more-home">
									<a href="<?php echo esc_url( get_the_permalink( $postIdFirst ) ); ?>">
										<span><?php echo esc_html( get_theme_mod( 'section_one_read_more_text', 'Read full article' ) ); ?></span>
										<span><i class="fa-solid fa-right-long"></i></span>
									</a>
								</div>
							</div>
						</div>


						<?php 
							endwhile; // loop ends
							wp_reset_postdata(); //reset post data first post

							/*------------ ends 1st post query ------------*/

							// WP Query for widget
							$postsToShow = esc_html( get_theme_mod( 'section_one_post_count', 5 ) );
							$postArgs = array(
								'post__not_in' => get_option( 'sticky_posts' ),
								'post_status' => 'publish',
								'post_type' => 'post',
								'orderby' => esc_html( get_theme_mod('section_one_post_type') ), // rand, DESC
								'offset' => 1, // offset
								'posts_per_page' =>  $postsToShow - 1, // post count - 1
								'tax_query' => array (
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => get_theme_mod( 'section_one_post_category' )
									),
								)
							);

							$get_posts = new WP_Query($postArgs);
							while($get_posts->have_posts()) : $get_posts->the_post();
							$postId  = get_the_ID();

						?>

						<div class="col-md-3-9 col-sm-1-2 col-xs-1-1">
							<div class="single-post-home">
								<?php if(has_post_thumbnail( $postId )) : ?>
								
									<div class="post-image" style="background-image: url(<?php echo esc_html( get_the_post_thumbnail_url($postId,'astromag-blog') );  ?>);">
								
								<?php else: ?>

									<div class="post-image no-thumb">

								<?php endif; ?>
									
								<?php if(get_theme_mod( 'section_one_show_post_category', true ) == true): ?>
									<span><?php echo esc_html( get_the_category($postId)[0]->name ); ?></span>
								<?php endif; ?>

								</div>
								<div class="post-meta">

									<p class="post-date">
									<?php if(get_theme_mod( 'section_one_show_published_date', true ) == true): ?>
										<i class="fa-regular fa-clock"></i> <?php echo esc_html( get_the_modified_date( 'Y-m-d' ) ); ?>
									<?php endif; ?>
									</p>

									<p class="post-comment post-views">
									<?php if(get_theme_mod( 'section_one_show_post_view', true ) == true): ?>
										<span><i class="fa-regular fa-eye"></i> 
										<?php                             
											if ( get_post_meta( get_the_ID() , 'astromag_post_views_count', true) == '') { 
												echo esc_html( '0' ) ;                            
											} else { 
												echo esc_html(get_post_meta( get_the_ID() , 'astromag_post_views_count', true)); }
										?> 
										</span>
									<?php endif; ?>
									<?php if(get_theme_mod( 'section_one_show_post_comments', true ) == true): ?>
										<span><i class="fa-regular fa-comment-dots"></i> <?php echo esc_html( wp_count_comments($postId)->total_comments ); ?></span>
									<?php endif; ?>
									</p>
								</div>
								<h2 class="post-title"><?php echo esc_html( get_the_title( $postId ) ); ?></h2>
								<div class="read-more-home">
									<a href="<?php echo esc_url( get_the_permalink( $postId ) ); ?>">
										<span><?php echo esc_html( get_theme_mod( 'section_one_read_more_text', 'Read full article' ) ); ?></span>
										<span><i class="fa-solid fa-right-long"></i></span>
									</a>
								</div>
							</div>
						</div>

						<?php

						endwhile;
						wp_reset_postdata();
						?>
					</div> <!-- end of row  -->
					<?php
						endif; // ends hide blog section 
					?>

					</div>
				</div> <!-- column section one ends-->

				<?php
				// astromag home widget support 
				if ( is_active_sidebar( 'astromag-home' )) : ?>
					<div class="col-md-1-1">
						<div class="frow gutters">
							<div class="pb-30">
								<?php dynamic_sidebar( 'astromag-home' ); ?>
							</div>
						</div>
					</div> <!-- column astromag home widget ends -->
				<?php endif; ?>


				<?php if( get_theme_mod( 'show_home_promotion_section', true ) == true ): ?>
				<section class="main-starts tutorial pb-30">
					<div class="frow">
						<div class="col-md-1-1">
							<div class="single-tutorial px-25 pt-25">
								<div class="frow centered">
									<div class="col-md-3-5 pb-25">
										<h2><?php echo esc_html( get_theme_mod( 'section_two_promotion_title', 'Develop a complete blog website yourself easily' ) ) ?></h2>
										<p><?php echo esc_textarea( get_theme_mod( 'section_two_promotion_desc', 'You can add sponsored promotions directly form this special promotion section easily. Hope it helps you a lot to grow.') ) ?></p>
									</div>
									<div class="col-md-2-5 pb-25">
										<img src="<?php echo esc_url( get_theme_mod( 'section_two_promotion_img', get_template_directory_uri().'/assets/images/prom_img.png' )); ?>" alt="<?php echo esc_html( get_theme_mod( 'section_two_promotion_title', 'Develop a complete blog website yourself easily' ) ) ?>">
									</div>
									<div class="col-md-1-1">
										<div class="post-meta-tutorial py-25">
											<div class="tutorial-glance">
												<?php if(get_theme_mod( 'section_two_video_hrs', true ) == true ): ?>
												<span><i class="fa-solid fa-video"></i> <?php echo esc_html( get_theme_mod('section_two_video_text', '20hrs video') ); ?></span>
												<?php endif; ?>

												<?php if(get_theme_mod( 'section_two_access_time', true ) == true ): ?>
												<span><i class="fa-regular fa-clock"></i> <?php echo esc_html( get_theme_mod('section_two_time_text', 'Lifetime access') ); ?></span>
												<?php endif; ?>

												<?php if(get_theme_mod( 'section_two_pricing', true ) == true ): ?>
												<span><i class="fa-solid fa-money-bill-1"></i> <?php echo esc_html( get_theme_mod('section_two_price_text', 'Price - Free') ); ?></span>
												<?php endif; ?>

											</div>
											<div class="tutorial-enroll">
												<a href="<?php echo esc_url( get_theme_mod( 'section_two_enroll_link', 'https://google.com' ) ); ?>"><?php echo esc_html( get_theme_mod( 'section_two_enroll_text', 'Enroll now' ) ); ?> <i class="fa-solid fa-right-long"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- col -->
					</div> <!-- frow -->
				</section> <!-- ends promotion section -->
				<?php endif; ?>

				<?php if( get_theme_mod( 'show_home_all_post_section', true ) == true ): 
					
					$postPerPage = esc_html(get_theme_mod('section_three_post_per_page', 6));
					if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					else { $paged = 1; }
					$args = array(
						'post__not_in' => get_option( 'sticky_posts' ),
						'post_status' => 'publish',
						'orderby'	=>	'DESC',
						'post_type' => 'post',
						'posts_per_page' => $postPerPage,
						'paged' => $paged
					);

					$get_all_posts = new WP_Query($args);
					
				?>
				<section class="main-starts">
					<div id="post-container" class="frow gutters">
						<?php 
							while($get_all_posts->have_posts()) : $get_all_posts->the_post(); 
							$postid = get_the_ID();

						?>
						<div id="single-post" class="col-md-1-<?php echo esc_attr(get_theme_mod( 'section_three_post_per_row', 3 )); ?> col-sm-1-2 col-xs-1-1">
							<div class="single-post-home astromag-all-post-list">
								<?php if(has_post_thumbnail( $postid )) : ?>
								
									<div class="post-image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url($postid,'astromag-blog') );  ?>);">
									
								<?php else: ?>

									<div class="post-image no-thumb">

								<?php endif; ?>
								<?php if(get_theme_mod( 'section_three_show_post_category', true ) == true): ?>
									<span><?php echo esc_html( get_the_category($postid)[0]->name ); ?></span>
								<?php endif; ?>
									</div>
								<div class="post-meta">
									<p class="post-date">
									<?php if(get_theme_mod( 'section_three_show_published_date', true ) == true): ?>
										<i class="fa-regular fa-clock"></i> <?php echo esc_html( get_the_modified_date( 'Y-m-d' ) ); ?>
									<?php endif; ?>
									</p>

									<p class="post-comment post-views">
										<?php if(get_theme_mod( 'section_three_show_post_view', true ) == true): ?>
											<span><i class="fa-regular fa-eye"></i> 
											<?php                             
												if ( get_post_meta( get_the_ID() , 'astromag_post_views_count', true) == '') { 
													echo esc_html( '0' ) ;                            
												} else { 
													echo esc_html(get_post_meta( get_the_ID() , 'astromag_post_views_count', true)); }
											?> 
											</span>
										<?php endif; ?>
										<?php if(get_theme_mod( 'section_three_show_post_comments', true ) == true): ?>
											<span><i class="fa-regular fa-comment-dots"></i> <?php echo esc_html( wp_count_comments($postid)->total_comments ); ?></span>
										<?php endif; ?>
									</p>
								</div>
								<h2 class="post-title"><?php echo esc_html( get_the_title( $postid ) ); ?></h2>
								<div class="read-more-home">
									<a href="<?php echo esc_url( get_the_permalink( $postid ) ); ?>">
										<span><?php echo esc_html( get_theme_mod( 'section_three_read_more_text', 'Read full article' ) ); ?></span>
										<span><i class="fa-solid fa-right-long"></i></span>
									</a>
								</div>
							</div>
						</div>
							<?php 
								endwhile; 
							?>

					</div>	<!-- frow gutters -->

					<div class="frow"> <!-- pagination row -->
						<?php
							// check if pagination enabled from theme option
							if( get_theme_mod( 'section_three_enable_pagination', 'enable' ) == 'enable' ):

							// check if infinite scroll enabled from theme option
							if( get_theme_mod( 'section_three_enable_inf_scroll', 'enable' ) == 'enable' ): ?>
							<script>
								jQuery(document).ready(function($){

									$("#post-container").infiniteScroll({
										
										path: ".astromag-page-nav .next",
										append: "#single-post",
										status: ".page-load-status",
										<?php if( get_theme_mod( 'section_three_scroll_behavior', 'scroll' ) == 'scroll' ): ?>
										scrollThreshold: 100,
										<?php endif; ?>
										<?php if( get_theme_mod( 'section_three_scroll_behavior', 'scroll' ) == 'button' ): ?>
										scrollThreshold: false,
										button: '#infinite-load-btn',
										<?php endif; ?>
										checkLastPage: true
										});
								});
							</script>
							<?php endif; // infinite scroll check ends ?>
						
						<div class="col-md-1-1 <?php echo esc_attr( get_theme_mod( 'section_three_pagination_visibility', 'visible-nav' ) ); ?>">
							<nav class="astromag-page-nav text-center">
							<?php if ($get_all_posts->max_num_pages > 1) : // custom pagination  
								
								$orig_query = $wp_query; // fix for pagination to work
								$wp_query = $get_all_posts;
								$big = 999999999;
								echo paginate_links(array(
									'base' => str_replace($big, '%#%', get_pagenum_link($big)),
									'format' => '?paged=%#%',
									'current' => max(1, get_query_var('paged')),
									'total' => $wp_query->max_num_pages,
									'prev_text' => 'Prev',  
									'next_text' => 'Next' 
								));                  
								$wp_query = $orig_query; // fix for pagination to work
								
								endif; // custom pagination end ?>
							</nav>
						</div>
						
						<?php if( get_theme_mod( 'section_three_scroll_behavior', 'scroll' ) == 'button' ): ?>
							<div class="col-md-1-1 text-center">
								<button id="infinite-load-btn"><?php echo esc_html( get_theme_mod( 'section_three_scroll_btn_text', 'Load more post' ) ); ?></button>
							</div>
						<?php endif; ?>

						<?php
						// check if infinite scroll enabled from theme option
							if( get_theme_mod( 'section_three_enable_inf_scroll', 'enable' ) == 'enable' ): 
						?>
						<div class="col-md-1-1">
							<div class="page-load-status hide-nav text-center">
								<p class="infinite-scroll-request"><?php echo esc_html( get_theme_mod( 'section_three_inf_scroll_loading_text', 'Loading...' ) ) ?></p>
								<p class="infinite-scroll-last"><?php echo esc_html( get_theme_mod( 'section_three_inf_scroll_end_text', 'You reached the last page' ) ) ?></p>
								<p class="infinite-scroll-error"><?php echo esc_html( get_theme_mod( 'section_three_inf_scroll_error_text', 'Could not load new post' ) ) ?></p>
							</div>
						</div>
						<?php 
						
							endif; // infinite scroll check ends
							endif; // pagination enable check ends

						wp_reset_postdata();
						?>
					</div> <!-- pagination row ends -->
				</section>
				<?php endif; ?>

			</section> <!-- main-starts -->

		</main> <!-- main -->
	</div> <!-- primary -->
</div> <!-- column center end -->

	<?php if(is_active_sidebar( 'page-sidebar' )): ?>
	<div class="col-md-2-8 col-sm-1-1 col-xs-1-1">
		<aside id="secondary" class="widget-area bg-right">
			<div class="frow">
				<?php dynamic_sidebar( 'page-sidebar' ); ?>
			</div>
		</aside><!-- #secondary -->
	</div>


<?php
endif;
get_footer();
