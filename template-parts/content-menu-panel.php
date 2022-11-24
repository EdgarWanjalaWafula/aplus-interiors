<?php 

    if(has_nav_menu('menu-1')): 
        ?>
            <section class="scroll-menu-panel h-100 d-flex align-items-center">
                <div class="scroll-menu-item-imgs">
                    <?php
                        $pages = get_pages(); 

                        if($pages): 
                            foreach($pages as $page): 
                                // var_dump($page); 
                                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'large' );
                                ?>
                                    <img id="<?php echo $page->ID; ?>" data-img-id="<?php echo $page->ID; ?>" src="<?php echo $menu_item_img = $img[0] ? $img[0] : wp_get_attachment_image_url('86', 'full'); ?>" alt="<?php echo $page->post_title; ?>">
                                <?php
                            endforeach;
                        endif;
                    ?>
                </div>
                <i class="flaticon-delete close-menu"></i>
                <div class="scroll-menu w-100">
                    <?php 
                        $menu_name = "menu-1";
                        $menu_locations = get_nav_menu_locations();
                        $menu = wp_get_nav_menu_object($menu_locations[$menu_name]);    
                        $menu_items = wp_get_nav_menu_items( $menu->term_id ); 
                        

                        if($menu_items): 
                            ?>
                                <nav class="scroll-menu-nav w-100">
                                    <ul>
                                        <?php 
                                            $a = 0; 
                                            foreach($menu_items as $accordion_item): 
                                                // var_dump($accordion_item);
                                                $menu_item_accordion_link = $accordion_item->url;
                                                $menu_item_accordion_title = $accordion_item->title;
                                                
                                                if($accordion_item->menu_item_parent == 0): 
                                                    $a++;
                                                    $parent_menu_id = $accordion_item->ID;
                                                    ?>
                                                        <li data-menu-slug="<?php echo $accordion_item->object_id; ?>" class="menu-item menu-parent <?php echo $object_type = $accordion_item->object == 'page' ? 'menu-page-link' : ''; ?> position-relative">
                                                            <a class="d-flex align-items-center" href="<?php echo $menu_item_accordion_link; ?>">
                                                                <span>0<?php echo $a; ?></span>
                                                                <?php echo esc_html($menu_item_accordion_title); ?>
                                                            </a>
                                                    <?php
                                                endif;

                                                if($parent_menu_id == $accordion_item->menu_item_parent): 
                                                    ?>  
                                                        <i class="flaticon-add"></i>
                                                        <ul class="accordion-sub-menu">
                                                            <li data-menu-slug="<?php echo $accordion_item->object_id; ?>" class="child-menu-item">
                                                                <a href="<?php echo $menu_item_accordion_link; ?>"><?php echo $menu_item_accordion_title; ?></a>
                                                            </li>
                                                        </ul>
                                                    <?php
                                                endif; 
                                            endforeach; 
                                        ?>      
                                        </li>
                                    </ul>
                                </nav>
                                <div class="scroll-menu-footer">
                                    <div class="small">
                                        &copy; Laverge
                                    </div>
                                </div>
                            <?php
                        endif; 
                    ?>
                </div>
            </section>
        <?php 
    endif; 