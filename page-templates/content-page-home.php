<?php 
    $latest_projects = array(
        'post_type' => 'project', 
        'posts_per_page'    => '3'
    );

    $sliders = new WP_Query($latest_projects);

    if($sliders){
        ?>
            <section class="position-relative a-plus-home-banner">
                <div class="carousel w-100 h-100">
                    <?php 
                        while($sliders->have_posts()): $sliders->the_post();
                            ?>
                                <div class="carousel-cell h-100 w-100">
                                    <?php 
                                        the_post_thumbnail(
                                            'full',
                                            array(
                                                'alt' => the_title_attribute(
                                                    array(
                                                        'echo' => false,
                                                    )
                                                ),
                                                'class' => 'position-absolute w-100 h-100 theme-obj-fit'
                                            )
                                        );
                                    ?>
                                    <div class="d-flex h-100 align-items-center banner-slider position-relative higher-z-index">
                                        <div class="container higher-z-index">
                                            <div class="row">
                                                <div class="col-md-8 text-white offset-2">
                                                    <?php 
                                                        $industry = get_the_terms(get_the_id(), 'industry'); 

                                                        if($industry){
                                                            foreach($industry as $i){
                                                                echo "<span>".$i->name."</span>";
                                                            }
                                                        }
                                                    ?>
                                                    <h1><?php echo esc_html(get_the_title()); ?></h1>
                                                    <a class="theme-links d-flex align-items-center text-white" href="<?php echo get_the_permalink(); ?>">See Project <i class="bi bi-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        endwhile; 
                    ?>
                </div>
                <div class="carousel-tabs position-absolute">
                    <ul class="d-flex justify-content-between">
                        <?php
                            $i = 0;
                            while($sliders->have_posts()): $sliders->the_post();
                                $i++;
                                ?>
                                    <li>
                                        <div class="tab-title">
                                            <span>0<?php echo $i; ?>.</span>
                                            <h5><?php echo get_the_title(); ?></h5>
                                        </div>
                                    </li>
                                <?php
                            endwhile;
                        ?>
                    </ul>
                </div>
            </section>
        <?php

        wp_reset_postdata();
    }

    $about_the_firm = get_field('about_the_firm');

    if($about_the_firm){
        ?>
            <section class="position-relative theme-padding">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php 
                                echo $about_the_firm['tag_line'] ? '<span>'.$about_the_firm['tag_line'].'</span>' : null; 
                                echo $about_the_firm['heading'] ? '<h1>'.$about_the_firm['heading'].'</h1>' : null; 
                                echo $about_the_firm['paragraph'] ? '<p>'.$about_the_firm['paragraph'].'</p>' : null; 
                            ?>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
            </section>
        <?php
    }