<a href="<?php echo the_permalink(); ?>" class="col-lg-6 col-md-6">
    <div class="term-card position-relative">
        <?php 
            the_post_thumbnail(
                'full',
                array(
                    'alt' => the_title_attribute(
                        array(
                            'echo' => false,
                        )
                    ),
                    'class' => 'theme-obj-fit'
                )
            );
        ?>
        <div class="term-card-body text-white w-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h3><?php echo esc_html(get_the_title()); ?></h3> 
                    <p class="m-0">
                        <?php 
                            echo wp_trim_words(get_the_content(), '10', '');
                        ?>
                    </p>
                </div>
                <span class="theme-links d-block text-right" href="<?php echo esc_attr(get_the_permalink()); ?>">See project <i class="bi bi-plus"></i></span>
            </div>
        </div>
    </div>
</a>