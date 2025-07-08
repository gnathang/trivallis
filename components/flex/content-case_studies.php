<?php


$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
    $submitText = 'Cyflwyno';
    $allItems = 'Pob categori';
} else {
    $what_am_i = 'eng';
    $submitText = 'Submit';
    $allItems = 'All categories';
}
$what_am_i = trim($what_am_i);


$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$intro_text = get_sub_field('intro_text');
$link = get_sub_field('link');
$recent_or_selected = get_sub_field('recent_or_selected');

?>

<section class="section_case_studies">

    <svg class="bg_graphic circle_mid_purple" width="728" height="728" viewBox="0 0 728 728" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="364" cy="364" r="364" fill="#DBC4E1" />
    </svg>

    <svg class="bg_graphic circle_purple" width="514" height="514" viewBox="0 0 514 514" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="257" cy="257" r="257" fill="#9A5CAD" />
    </svg>


    <div class="container">
        <div class="case_studies">
            <div class="slide_wrap">
                <div class="slide_grid">

                    <div class="heading_wrap">
                        <div class="heading_wrap_inner">
                            <h4 class="subtitle"><?php echo $subtitle; ?></h4>
                            <h2><?php echo $title; ?></h2>
                            <p><?php echo $intro_text; ?></p>
                            <?php
                            $link = get_sub_field('link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                                <a class="btn_purple" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ($recent_or_selected) { ?>

                        <div class="case_studies_wrap">
                            <?php if (have_rows('featured_stories')) : while (have_rows('featured_stories')) : the_row(); ?>
                                    <?php $post_object = get_sub_field('featured_story'); ?>
                                    <?php if ($post_object) : ?>
                                        <?php // override $post 
                                        $post = $post_object;
                                        setup_postdata($post);
                                        ?>


                                        <div class="case_study_post">
                                            <div class="image_wrap">
                                                <?php echo get_the_post_thumbnail($post_id, 'newsimage', array('class' => '')); ?>
                                                <svg class="mask_desktop" viewBox="0 0 32 445" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 445C11.3681 371.664 17.2671 296.521 17.2671 220C17.2671 145.217 11.633 71.7499 0.766171 0L31.2671 0V445H0Z" fill="#E2F0FB" />
                                                </svg>
                                                <svg class="mask_white_small" viewBox="0 0 45 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 126H44.4501V0H23.0816C27.3624 13.1334 29.6766 27.1551 29.6766 41.7173C29.6766 73.6262 18.565 102.94 0 126Z" fill="white" />
                                                </svg>
                                            </div>
                                            <div class="news_box">
                                                <div class="text_wrap">
                                                    <p class="tag"><?php if ($what_am_i == 'cym') {
                                                                        echo "Straeon tenantiaid";
                                                                    } else {
                                                                        echo "Tenant Stories";
                                                                    } ?></p>
                                                    <p class="post_date subtitle"><?php echo get_the_date('d/m/Y'); ?></p>
                                                    <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    <!-- <p class="the_excerpt"><?php the_excerpt(); ?></p> -->
                                                    <div>
                                                        <a class="btn_blue" href="<?php the_permalink(); ?>" class="btn_blue">Read
                                                            Post</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                            <?php endwhile;
                            endif; ?>
                        </div>


                    <?php } else { ?>
                        <?php $args = array(
                            'post_type' => 'tenant-story',
                            'posts_per_page' => '2',
                            'order' => 'DSC',
                        );
                        $case_studies = new WP_Query($args);
                        ?>
                        <div class="case_studies_wrap">
                            <?php if ($case_studies->have_posts()) : while ($case_studies->have_posts()) : $case_studies->the_post(); ?>

                                    <div class="case_study_post">
                                        <div class="image_wrap">
                                            <?php echo get_the_post_thumbnail($post_id, 'newsimage', array('class' => '')); ?>
                                            <svg class="mask_desktop" viewBox="0 0 32 445" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 445C11.3681 371.664 17.2671 296.521 17.2671 220C17.2671 145.217 11.633 71.7499 0.766171 0L31.2671 0V445H0Z" fill="#E2F0FB" />
                                            </svg>
                                            <svg class="mask_white_small" viewBox="0 0 45 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 126H44.4501V0H23.0816C27.3624 13.1334 29.6766 27.1551 29.6766 41.7173C29.6766 73.6262 18.565 102.94 0 126Z" fill="white" />
                                            </svg>
                                        </div>
                                        <div class="news_box">
                                            <div class="text_wrap">
                                                <p class="tag"><?php if ($what_am_i == 'cym') {
                                                                    echo "Straeon tenantiaid";
                                                                } else {
                                                                    echo "Tenant Stories";
                                                                } ?></p>
                                                <p class="post_date subtitle"><?php echo get_the_date('d/m/Y'); ?></p>
                                                <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <!-- <p class="the_excerpt"><?php the_excerpt(); ?></p> -->
                                                <div>
                                                    <a class="btn_blue" href="<?php the_permalink(); ?>" class="btn_blue">Read
                                                        Post</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php wp_reset_postdata(); ?>
                            <?php endwhile;
                            endif; ?>
                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</section>