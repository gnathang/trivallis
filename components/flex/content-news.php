<?php

$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);

?>

<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$link = get_sub_field('link');
$newsselect = get_sub_field('recent_or_selected_news');

// end

?>



<section class="full_width section_news row-<?php echo $row; ?>">

    <div class="container">
        <div class="title_wrap">
            <?php if ($subtitle) { ?><h4 class="subtitle"><?php echo $subtitle; ?></h4><?php } ?>
            <?php if ($title) { ?><h2 class=""><?php echo $title; ?></h2><?php } ?>
            <?php if ($link) { ?>
                <a class="btn_blue" href="<?php echo $link['url'] ?>" class="button" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link['title']; ?>
                    <?php echo get_template_part('images/arrow.svg') ?>
                </a>
            <?php } ?>
        </div>
    </div>

    <?php if (!wp_is_mobile()) { ?>
        <div class="container">
        <?php } ?>

        <div class="news_wrap <?php if (wp_is_mobile() || wp_is_tablet()) { ?> slider regular<?php } ?>">

            <?php if ($newsselect) { ?>

                <?php $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '4',
                    'order' => 'DSC',
                );
                $loop = new WP_Query($args);
                ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

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
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                    ?>
                <?php endwhile; ?>
            <?php } else { ?>

                <?php if (have_rows('selected_news_posts')) : ?>
                    <?php while (have_rows('selected_news_posts')) : the_row(); ?>
                        <?php $post_object = get_sub_field('news_post'); ?>
                        <?php if ($post_object) : ?>
                            <?php // override $post
                            $post = $post_object;
                            setup_postdata($post);
                            ?>
                            <?php
                            $categories = get_the_category($post->ID);
                            foreach ($categories as $category) {
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
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                            ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php } ?>
        </div>
        <?php if (!wp_is_mobile()) { ?>
        </div>
    <?php } ?>

</section>