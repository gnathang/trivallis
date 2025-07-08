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

<?php

$summary = get_field('summary');
$add_testimonial = get_field('add_testimonial');
$testimonial_content = get_field('testimonial_content');
$add_another_image = get_field('add_another_image');
$second_image = get_field('second_image');
$add_second_content_block = get_field('add_second_content_block');
$second_content_block = get_field('second_content_block');

?>

<?php if (get_field('select_layout') == "flex_post") { ?>

    <section class="full-width section_single_post">
        <?php if (have_posts()) : the_post(); ?>

            <div class="full_width post_header">
                <div class="container">
                    <div class="title_wrap">
                        <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
                        }
                        ?>
                        <p>ksjdnfdsfkajsnfkd tenant strory</p>
                        <h1 class="post_title"><?php the_title(); ?></h1>
                        <?php if ($summary) { ?><p><?php echo $summary; ?></p> <?php } ?>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="feat_image">
                    <p>ksjdnfdsfkajsnfkd tenant strory</p>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                </div>

                <?php /*
        <div class="one_fourth left">

            <?php 

                    $author = get_field('author');

                    $name = get_author_name( $author->ID );

                    $thumbnail = get_avatar_url( $author->ID );
                    $author_profile_image = get_avatar(get_the_author_meta('ID'), 96);


                  $author_first_name = get_the_author_meta('first_name');
                    ?>
        <?php echo $author_profile_image; ?>
        Written by <?php echo $author_first_name; ?>

        <h5 class="date"><?php the_date("d.m.y") ?></h5>

        <?php $category = get_the_category();?>
        <ul class="f-pink cats"><?php
                        if ( $category ) :
                            foreach ( $category as $cat ) : ?>
            <li><a
                    href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
            </li>
            <?php endforeach; ?>

            <?php endif; ?>
        </ul>
    </div>
    */ ?>

                <div class="two_thirds content_wrap">
                    <?php the_content(); ?>
                </div>

                <?php if ($add_another_image) { ?>

                    <div class="feat_image">
                        <?php
                        $bannerOne = array(
                            'class' => '',
                            'id' => $second_image,
                            'lazyload' => false
                        );

                        // Get the URL and dimensions of the full-size image
                        $image_data = wp_get_attachment_image_src($second_image, 'full');
                        $image_url = $image_data[0];
                        $image_width = $image_data[1];
                        $image_height = $image_data[2];

                        // Output the image with original dimensions in srcset
                        echo '<img src="' . $image_url . '" srcset="' . $image_url . ' ' . $image_width . 'w, ' . $image_url . ' ' . $image_height . 'h" alt="">';
                        ?>

                    </div>


                <?php } ?>

            </div> <!-- close container-->

            <?php if ($add_testimonial) { ?>
                <div class="testimonial_wrap">
                    <div class="container">
                        <svg class="bg_graphic circle_mid_blue" width="687" height="703" viewBox="0 0 687 703" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="343.014" cy="351.5" rx="343.014" ry="351.5" fill="#52A3DE" />
                        </svg>

                        <svg class="bg_graphic circle_pale_blue" width="421" height="432" viewBox="0 0 421 432" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="210.5" cy="216" rx="210.5" ry="216" fill="#A3CEED" />
                        </svg>

                        <svg class="bg_graphic circle_pale_blue_two" width="421" height="432" viewBox="0 0 421 432" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="210.5" cy="216" rx="210.5" ry="216" fill="#A3CEED" />
                        </svg>
                        <svg class="quote_marks" width="152" height="109" viewBox="0 0 152 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1390_22051)">
                                <path d="M65.964 77.434C65.964 58.792 54.014 48.276 39.196 48.276C34.5162 48.1786 29.8954 49.3338 25.812 51.622C25.812 36.322 39.196 23.898 57.838 20.074V-0.00195312C24.378 4.77805 0 32.498 0 67.398C0 93.21 15.3 108.984 34.416 108.984C53.532 108.984 65.964 95.598 65.964 77.434ZM151.526 77.434C151.526 58.792 139.098 48.276 124.28 48.276C119.022 48.276 114.72 49.232 111.374 51.144C111.374 36.326 124.758 23.898 143.4 20.074V-0.00195312C109.94 4.77805 85.084 32.498 85.084 67.398C85.084 93.21 100.384 108.984 119.978 108.984C138.62 108.984 151.526 95.598 151.526 77.434Z" fill="#E2F0FB" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1390_22051">
                                    <rect width="151.526" height="108.982" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="two_thirds content_wrap">
                        <?php if (wp_is_mobile()) { ?><div class="container"><?php } ?>
                            <?php echo $testimonial_content; ?>
                            <?php if (wp_is_mobile()) { ?></div><?php } ?>
                    </div>
                </div>
            <?php } ?>

            <?php if ($add_second_content_block) { ?>
                <div class="container">
                    <div class="two_thirds content_wrap">
                        <?php echo $second_content_block; ?>
                    </div>
                </div>
            <?php } ?>

        <?php endif; ?>


    </section>


<?php } ?>

<?php if (get_field('select_layout') == "simple_post") { ?>

    <section class="full-width section_single_post">
        <?php if (have_posts()) : the_post(); ?>

            <div class="full_width post_header">
                <div class="container">
                    <div class="title_wrap">
                        <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
                        }
                        ?>
                        <h1 class="post_title"><?php the_title(); ?></h1>
                        <?php if ($summary) { ?><p><?php echo $summary; ?></p> <?php } ?>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="feat_image">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                </div>

                <div class="two_thirds content_wrap">
                    <?php the_content(); ?>
                </div>

            <?php endif; ?>

    </section>


<?php } ?>



<div class="full-width related_posts">

    <div class="container">

        <div class="related_posts_bar">
            <h4><?php if ($what_am_i == 'cym') {
                    echo "Tudalennau cysylltiedig";
                } else {
                    echo "Related Posts";
                } ?></h4>
        </div>

        <div class="posts_layout_wrapper slider related_posts_slider">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'paged' => $paged,
                'post_type' => 'post',
                // 'cat' => $qry_filter,
                'posts_per_page' => 6,
                'order' => 'DESC',
                'post__not_in' => array($post->ID),
            );
            ?>

            <?php $query = new WP_Query($args); ?>

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
                                <?php if ($category) { ?><p class="tag"><?php echo $catname; ?></p><?php } ?>
                                <p class="post_date subtitle"><?php echo get_the_date('d/m/Y'); ?></p>
                                <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <!-- <p><?php  // the_excerpt(); 
                                        ?></p> -->
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

</div>






<?php get_footer(); ?>