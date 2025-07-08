<?php

$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);

?>

<?php get_header(); ?>

<section class="page_header small">
    <div class="container">
        <div class="flex_between">
            <div class="text_area">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
                }
                ?>
                <h1><?php
                    printf(__('%s', 'boilerplate'), '' . single_cat_title('', false) . '');
                    ?></h1>
            </div>
            <div class="image_area cymag">

                <img src="https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg" title="po_100823_aberdare_022_53222486505_o" alt="Our News" class="wp-post-image size-square " srcset="https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w, https://triv001.dd-staging.co.uk/wp-content/uploads/2024/02/po_100823_aberdare_022_53222486505_o-scaled.jpg 2560w" sizes="100vw">


            </div>
        </div>
    </div>
</section>



<section class="section_posts_archive">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts_layout_wrapper">

                <?php while (have_posts()) : the_post(); ?>
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
                                    <p class="tag"><?php
                                                    printf(__('%s', 'boilerplate'), '' . single_cat_title('', false) . '');
                                                    ?></p>
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
            </div>
        <?php else : ?>
            <h2>No posts to display</h2>
        <?php endif; ?>

        <div class="clear"></div>

    </div>
    </div>
</section>

<div class="full_width">
    <div class="container blog_loop">

        <div class="navigation p-top-5">
            <div class="alignleft prev_butt">
                <h3><em><?php previous_posts_link('Previous Page'); ?></em></h3>
            </div>
            <div class="alignright next_butt">
                <h3><em><?php next_posts_link('Next Page', ''); ?></em></h3>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>