<?php

    $project_meta = get_field('project_details');
    $project_images = get_field('project_images');

    if(has_post_thumbnail()):
        ?>
            <section class="position-relative d-flex align-items-center project-banner parralax-window" data-parallax="scroll" data-image-src="<?php echo get_the_post_thumbnail_url(); ?>">
                <div class="container position-relative higher-z-index">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="project-title bg- text-white">
                               <h1><?php echo get_the_title(); ?></h1> 
                               <?php 
                                    $industry = get_the_terms(get_the_id(), 'industry'); 

                                    if($industry){
                                        foreach($industry as $i){
                                            echo "<span>Found in: <a class='theme-color' href='".get_term_link($i->term_id)."'>".$i->name."</a></span>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    endif;

    if(get_the_content() || $project_meta){
        ?>
            <section class="project-content theme-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8">
                            <div class="project-description">
                                <h4 ><?php echo esc_html__('Description', 'A-plus_Interiors'); ?></h4>
                                <?php echo get_the_content(); ?>
                            </div>
                        </div> 
                        <div class="col-lg-5 col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <?php 
                                            // var_dump($project_meta);
                                            if($project_meta){
                                                foreach($project_meta as $key=>$meta){
                                                    ?>
                                                        <tr>
                                                            <td scope="row"><?php echo $meta['heading']; ?></td>
                                                            <td><?php echo $meta['content']; ?></td>
                                                        </tr>
                                                    <?php
                                                }
                                            } else {
                                                // 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }

    if($project_images){
        ?>
            <section class="position-relative project-images">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel w-100">
                                <?php 
                                    $featured_img = array(
                                        'ID' => get_post_thumbnail_id(), 
                                        'id'    => get_post_thumbnail_id(),
                                    ); // show featured image to carousel 

                                    array_push($project_images, $featured_img);

                                    foreach($project_images as $image){
                                        echo '<div class="carousel-cell h-100 w-100">';
                                        a_plus_image($image, 'project-image', 'w-100 theme-obj-fit');
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }