<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astromag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="frow-container-fluid">
		<div class="frow centered gutters">
			<div class="col-md-2-7">
				<?php
					// thumbnail for blog page
					if(has_post_thumbnail() ) : ?>
						<div class="astromag-featured-content">
							<?php the_post_thumbnail( 'astromag-blog-page' ); ?>
						</div>
				<?php else: ?>
					<div class="astromag-featured-content">
						<img src="<?php echo esc_url( get_template_directory_uri().'/assets/images/no-thumbnail.jpg' ); ?>" alt="<?php the_title(); ?>" width="400" height="400">
					</div>
				<?php endif; /*----- thumb for blog page -----*/ ?>
			</div>
			<div class="col-md-5-7">
				<div class="entry-content ulol p-15">
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta text-right">
						<?php astromag_posted_comment_new(); ?>
						<?php astromag_posted_on(); ?>
				</div><!-- .entry-meta -->
					<?php endif; ?>
					<?php 
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); // title
						endif;
					?>
				</div> <!-- entry content -->
			</div> <!-- col 5-7 -->
		</div> <!-- frow -->
	</div> <!-- container -->
</article><!-- article ends -->
