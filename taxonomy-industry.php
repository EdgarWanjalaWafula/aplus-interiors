<?php
/**
 * The template for displaying industries in a taxonomy. 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aplus
 */

get_header();

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$tax_shortcode = basename($url); 

$terms = get_term_by('name', $tax_shortcode, 'industry');
?>

    <main data-barba="container" data-barba-namespace="<?php echo $tax_shortcode; ?>" id="primary" class="site-main">
	    <?php 

        $data = array(
            'post_type'         =>  'project', 
            'posts_per_page'    => -1, 
            'industry'        => $tax_shortcode, 
            'orderby'           =>  'date', 
            'order'             =>  'asc'
        );
    
        $teams = new WP_QUERY($data); 
    
        if($teams): 
            ?>
                <section class="theme-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="industry-heading"><?php echo esc_html($terms->name); ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <?php 
                                while($teams->have_posts()): $teams->the_post();
                                    get_template_part('template-parts/content', 'component-industry-card');
                                endwhile;
                            ?>
                        </div>
                    </div>
                </section>
            <?php 
            wp_reset_postdata(); 
        endif; 
        ?>
	</main><!-- #main -->
<?php
get_footer();
