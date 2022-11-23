<?php
/**
 * The template for displaying single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package A-plus_Interiors
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php 
									the_post_navigation(
										array(
											'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'a-plus-interiors' ) . '</span> <span class="nav-title">%title</span>',
											'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'a-plus-interiors' ) . '</span> <span class="nav-title">%title</span>',
										)
									);
								?>
							</div>
						</div>
					</div>
				<?php 

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
