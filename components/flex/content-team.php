<?php $title = get_sub_field('title'); ?>

<section class="section_team">
    <div class="container">

        <div class="intro_text_wrap">
            <?php if($title) { ?><h3><?php echo $title; ?></h3><?php } ?>
        </div>

        <div class="team_grid">
            <?php if(have_rows('team_members')) : while(have_rows('team_members')) : the_row(); ?>
            <?php $post_object = get_sub_field('team_member'); ?>
            <?php if ($post_object) : ?>
            <?php // override $post
                $post = $post_object;
                setup_postdata($post); ?>
            <?php
                foreach((get_the_category()) as $category) {
                    $postcat= $category->cat_ID;
                    $catname =$category->cat_name;
                }
            ?>

            <?php 
                $member_name = get_the_title();
                $member_role = get_field('member_role');
                $member_image = get_field('member_image');
                $member_image_zoomout = get_field('member_image_zoomout');
                $member_bio = get_field('member_bio');
            ?>

            <div class="team_member_wrap">
                <div class="image_wrap <?php if($member_image_zoomout) { ?> zoomout<?php } ?>">
                    <?php 
                        $bannerOne = array(
                            'class' => '',
                            'id' => $member_image,
                            'lazyload' => false
                        );

                        // Get the URL and dimensions of the full-size image
                        $image_data = wp_get_attachment_image_src($member_image, 'full');
                        $image_url = $image_data[0];
                        $image_width = $image_data[1];
                        $image_height = $image_data[2];

                        // Output the image with original dimensions in srcset
                        echo '<img src="' . $image_url . '" srcset="' . $image_url . ' ' . $image_width . 'w, ' . $image_url . ' ' . $image_height . 'h" alt="">'; 
                    ?>

                </div>
                <div class="text_wrap">
                    <h4><?php the_title(); ?></h4>
                    <?php if($member_role) { ?><p><?php echo $member_role; ?></p><?php } ?>
                    <p class="member_bio"><?php echo $member_bio; ?></p>
                </div>
            </div>

            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <!-- original placement for the modals -->


    </div>
</section>