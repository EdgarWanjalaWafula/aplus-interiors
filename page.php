<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A-plus_Interiors
 */

get_header();

global $post;

$post_slug = $post->post_name;
?>

	<main id="primary" class="site-main page-<?php echo $post_slug; ?>">

		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'page-templates/content', 'page-'.$post_slug );

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
