<?php get_header(); ?>

<?php
// Get the current URL
$current_url = $_SERVER['REQUEST_URI'];

// Check if the current URL contains '?s'
if (strpos($current_url, '?s') !== false) {
    // Add class to the page header
    $search_active = true;
} else {
    $search_active = false;
}


$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);

?>

<!-- add search active class if the user has searched something -->

<section class="page_header small search <?php if ($search_active == true) { ?> search_active<?php } ?>">
    <div class="container">
        <div class="flex_between">
            <div class="text_area">
                <?php
                $queried_object = get_queried_object();
                $category = $queried_object->slug;
                $cat_name = $queried_object->name;
                $s = get_search_query();
                ?>
                <h1><?php if ($what_am_i == 'cym') {
                        echo "Canlyniadau chwilio: " . $s;
                    } else {
                        echo "Search results for: " . $s;
                    } ?></h1>

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
                                <path
                                    d="M0 445C11.3681 371.664 17.2671 296.521 17.2671 220C17.2671 145.217 11.633 71.7499 0.766171 0L31.2671 0V445H0Z"
                                    fill="#E2F0FB" />
                            </svg>
                            <svg class="mask_white_small" viewBox="0 0 45 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 126H44.4501V0H23.0816C27.3624 13.1334 29.6766 27.1551 29.6766 41.7173C29.6766 73.6262 18.565 102.94 0 126Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="news_box">
                            <div class="text_wrap">

                                <?php $post_type = get_post_type(); ?>

                                <p class="tag">
                                    <?php
                                    if ($post_type == 'post') {
                                        echo 'News';
                                    } elseif ($post_type == 'tenant-story') {
                                        echo 'Tenant Story';
                                    } elseif ($post_type == 'page') {
                                        echo 'Page';
                                    } else {
                                        echo $post_type;
                                    }
                                    ?>
                                </p>



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
            <h2><?php if ($what_am_i == 'cym') {
                    echo "Mae'n ddrwg gennym, nid oes canlyniadau";
                } else {
                    echo "Sorry, no results";
                } ?></h2>
        <?php endif; ?>

        <div class="clear"></div>

        <?php get_search_form(); ?>

        <h3><?php if ($what_am_i == 'cym') {
                echo "Methu dod o hyd i beth rydych chi’n chwilio amdano?";
            } else {
                echo "Can't find what you are looking for? Get in
                touch.";
            } ?></h3>
        <a class="btn_lightblue" href="/contact-us/"><?php if ($what_am_i == 'cym') {
                                                            echo "Cysylltwch â ni 
                ";
                                                        } else {
                                                            echo "Contact us";
                                                        } ?></a>

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
<?php get_template_part('signposts'); ?>


<?php get_footer(); ?>