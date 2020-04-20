<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package refresh-blog
 */

get_header();
$hide_home_content = apply_filters( 'refresh_blog_filter_hide_home_content', false );
if ( ! $hide_home_content ) : ?>
	<div class="inner-content-wrapper page-section">
		<div class="wrapper">
			<div id="primary" class="content-area <?php // echo esc_attr( $sidebar_disabled_class ); ?>">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main> <!-- #main -->
			</div><!-- #primary -->
			<?php
			get_sidebar();
			?>
		</div>
	</div><!-- .container -->
	<?php
endif;
get_footer();

