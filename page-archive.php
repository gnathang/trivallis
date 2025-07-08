<?php /* Template Name: News/Case study Archive Page */ ?>

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

?>

<?php get_header(); ?>

<?php get_template_part('selectheader'); ?>

<?php $select_post_type = get_field('select_post_type'); ?>
<?php $intro_text = get_field('intro_text'); ?>
<?php $feat_news_subtitle = get_field('featured_news_subtitle'); ?>

<?php $hide_featured_posts = get_field('hide_featured_posts'); ?>
<?php $recent_or_selected = get_field('recent_or_selected'); ?>

<?php if (!$hide_featured_posts) { ?>
    <section class="section_featured_posts">

        <div class="intro_text container">
            <?php if ($intro_text) { ?><h4><?php echo $intro_text; ?></h4> <?php } ?>
        </div>

        <div class="container">
            <h4 class="subtitle"><?php echo $feat_news_subtitle; ?></h4>
        </div>


        <div class="featured_posts slider featured_news_slider">
            <?php if ($recent_or_selected) { ?>

                <?php if (have_rows('featured_posts')) : while (have_rows('featured_posts')) : the_row(); ?>
                        <?php $post_object = get_sub_field('featured_post'); ?>
                        <?php if ($post_object) : ?>
                            <?php // override $post 
                            $post = $post_object;
                            setup_postdata($post); ?>

                            <?php
                            foreach ((get_the_category()) as $category) {
                                $postcat = $category->cat_ID;
                                $catname = $category->cat_name;
                            }
                            ?>

                            <div class="news_post">
                                <div class="image_wrap">
                                    <?php echo get_the_post_thumbnail($post_id, 'newsimage', array('class' => '')); ?>
                                    <svg class="mask_desktop" viewBox="0 0 32 445" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 445C11.3681 371.664 17.2671 296.521 17.2671 220C17.2671 145.217 11.633 71.7499 0.766171 0L31.2671 0V445H0Z" fill="#E2F0FB" />
                                    </svg>
                                    <svg class="mask_mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 389 96" fill="none">
                                        <path d="M0.5 42V95.5616H388.5V0.17627C314.826 39.4041 231.178 61.5616 142.5 61.5616C93.3401 61.5616 45.726 54.7522 0.5 42Z" fill="#E2F0FB" />
                                    </svg>
                                    <svg class="mask_white_small" viewBox="0 0 45 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 126H44.4501V0H23.0816C27.3624 13.1334 29.6766 27.1551 29.6766 41.7173C29.6766 73.6262 18.565 102.94 0 126Z" fill="white" />
                                    </svg>
                                </div>
                                <div class="news_box">
                                    <div class="text_wrap">

                                        <?php if ($category) { ?><p class="tag"><?php echo $catname; ?></p><?php } ?>

                                        <p class="post_date subtitle"><?php echo get_the_date('d/m/Y'); ?></p>
                                        <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <div>
                                            <a class="btn_blue" href="<?php the_permalink(); ?>" class="btn_blue"><?php if ($what_am_i == 'cym') {
                                                                                                                        echo "Darllen y postiad";
                                                                                                                    } else {
                                                                                                                        echo "Read Post";
                                                                                                                    } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                <?php endwhile;
                endif; ?>

            <?php } else { ?>
                <!-- most recent posts -->
                <?php
                $recent_args = array(
                    'post_type' => $select_post_type,
                    // 'cat' => $qry_filter,
                    'posts_per_page' => 6,
                    'order' => 'DESC',
                );
                ?>

                <?php $recent_posts = new WP_Query($recent_args); ?>

                <?php if ($recent_posts->have_posts()) : while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>

                        <div class="news_post">
                            <div class="image_wrap">
                                <?php echo get_the_post_thumbnail($post_id, 'newsimage', array('class' => '')); ?>
                                <svg class="mask_desktop" viewBox="0 0 32 445" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 445C11.3681 371.664 17.2671 296.521 17.2671 220C17.2671 145.217 11.633 71.7499 0.766171 0L31.2671 0V445H0Z" fill="#E2F0FB" />
                                </svg>
                                <svg class="mask_mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 389 96" fill="none">
                                    <path d="M0.5 42V95.5616H388.5V0.17627C314.826 39.4041 231.178 61.5616 142.5 61.5616C93.3401 61.5616 45.726 54.7522 0.5 42Z" fill="#E2F0FB" />
                                </svg>
                                <svg class="mask_white_small" viewBox="0 0 45 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 126H44.4501V0H23.0816C27.3624 13.1334 29.6766 27.1551 29.6766 41.7173C29.6766 73.6262 18.565 102.94 0 126Z" fill="white" />
                                </svg>
                            </div>
                            <div class="news_box">
                                <div class="text_wrap">

                                    <?php if ($select_post_type == 'post') { ?>
                                        <?php if ($category) { ?><p class="tag"><?php echo $catname; ?></p><?php } ?>
                                    <?php } else { ?>
                                        <p class="tag"><?php if ($what_am_i == 'cym') {
                                                            echo "Straeon tenantiaid";
                                                        } else {
                                                            echo "Tenant Stories";
                                                        } ?></p>
                                    <?php } ?>

                                    <p class="post_date subtitle"><?php echo get_the_date('d/m/Y'); ?></p>
                                    <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <div>
                                        <a class="btn_blue" href="<?php the_permalink(); ?>" class="btn_blue"><?php if ($what_am_i == 'cym') {
                                                                                                                    echo "Darllen y postiad";
                                                                                                                } else {
                                                                                                                    echo "Read Post";
                                                                                                                } ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        wp_reset_postdata();
                    endwhile;
                endif;
                ?>
            <?php } ?>
        </div>

    </section>

<?php } ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'paged' => $paged,
    'post_type' => $select_post_type,
    // 'cat' => $qry_filter,
    'posts_per_page' => 4,
    'order' => 'DESC',
);
?>

<?php $query = new WP_Query($args); ?>

<section class="section_posts_archive">
    <div class="container">

        <?php if ($select_post_type == 'post') { ?>
            <?php echo do_shortcode("[searchandfilter fields='search,category' all_items_labels='All Categories, {$allItems}' submit_label='{$submitText}']"); ?>
        <?php } ?>

        <div class="posts_layout_wrapper">

            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                    <?php foreach ((get_the_category()) as $category) {
                        $postcat = $category->cat_ID;
                        $catname = $category->cat_name;
                    }
                    ?>

                    <div class="news_post">
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
                                <?php if ($select_post_type == 'post') { ?>
                                    <?php if ($category) { ?><p class="tag"><?php echo $catname; ?></p><?php } ?>
                                <?php } else { ?>
                                    <p class="tag"><?php if ($what_am_i == 'cym') {
                                                        echo "Straeon tenantiaid";
                                                    } else {
                                                        echo "Tenant Stories";
                                                    } ?></p>
                                <?php } ?>
                                <p class="post_date subtitle"><?php echo get_the_date('d/m/Y'); ?></p>
                                <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p><?php the_excerpt(); ?></p>
                                <div>
                                    <a class="btn_blue" href="<?php the_permalink(); ?>" class="btn_blue"><?php if ($what_am_i == 'cym') {
                                                                                                                echo "Darllen y postiad";
                                                                                                            } else {
                                                                                                                echo "Read Post";
                                                                                                            } ?></a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>
            <?php
                wp_reset_postdata();
            else : {
                    echo '
                <div class="no_posts_to_show">
                <h1>Uh oh! Nothing matches here.</h1>
                </div>
                ';
                }
            endif;
            ?>
        </div>
    </div>

    <!-- pagination -->
    <div class="container">
        <?php // get_template_part('components/includes/pagination_bar');
        ?>
        <?php
        echo '<div class="archive_pagination">';
        echo paginate_links(array(
            'total' => $query->max_num_pages,
            'mid_size' => 999,
            'prev_next' => true,
            'prev_text' => __('<img class="prev_arrow" src="' . get_template_directory_uri() . '/assets/images/svg/slide-prev-arrow-blue.svg" alt="prev-arrow">', 'textdomain'),
            'next_text' => __('<img class="next_arrow" src="' . get_template_directory_uri() . '/assets/images/svg/slide-next-arrow-blue.svg" alt="next-arrow">', 'textdomain'),
            'type' => 'plain',
        ));
        echo '</div>';
        wp_reset_postdata();
        ?>
    </div>

</section>

<?php if ($select_post_type == 'tenant-story') { ?>

    <?php
    $cta_subtitle = get_field('cta_subtitle');
    $cta_title = get_field('cta_title');
    $cta_link = get_field('cta_link');
    $cta_image = get_field('cta_image');
    $cta_content = get_field('cta_content');
    ?>

    <section class="section_text_image_slider tenant_stories <?php echo $colour_theme; ?>">

        <svg class="bg_graphic circle_mid_blue" width="687" height="703" viewBox="0 0 687 703" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="343.014" cy="351.5" rx="343.014" ry="351.5" fill="#DBC4E1" />
        </svg>

        <svg class="bg_graphic circle_pale_blue" width="421" height="432" viewBox="0 0 421 432" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="210.5" cy="216" rx="210.5" ry="216" fill="#9A5CAD" />
        </svg>


        <div class="container">
            <div class="wayfinder_slider">

                <div class="slide_wrap">
                    <div class="slide_grid">
                        <div class="text_wrap <?php if ($reverse_text_image) { ?> reverse_text_image<?php } ?>">
                            <div class="text_wrap_inner">
                                <h4 class="subtitle"><?php echo $cta_subtitle; ?></h4>
                                <h3><?php echo $cta_title; ?></h3>
                                <p><?php echo $cta_content; ?></p>

                                <?php
                                if ($cta_link) :
                                    $link_url = $cta_link['url'];
                                    $link_title = $cta_link['title'];
                                    $link_target = $cta_link['target'] ? $link['target'] : '_self';
                                ?>
                                    <a class="btn_purple" href="<?php echo $link_url; ?>" aria-label="link to <?php echo $title; ?> page"><?php echo $link_title; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="image_wrap">
                            <img src="<?php echo $cta_image; ?>" alt="page image">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php } ?>

<?php get_template_part('signposts'); ?>

<?php get_footer(); ?>