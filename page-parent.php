<?php

$show_anchor_links = get_field('show_anchor_links');
$downloads_title = get_field('downloads_title');


$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);


?>

<?php get_header(); ?>

<?php get_template_part('selectheader'); ?>

<section class="main_parent">
    <div class="container">
        <div class="flex_wrap">
            <div class="side_nav">
                <h3>Advice & Guidance</h3>
            </div>
            <div class="main_content">
                <div class="anchor_wrap">
                    <?php if (have_rows('content_block')) { ?>
                        <?php if ($show_anchor_links) { ?>
                            <h4 class="anchor_title"><?php if ($what_am_i == 'cym') {
                                                            echo "Neidiwch i";
                                                        } else {
                                                            echo "Jump to";
                                                        } ?>
                            </h4>
                        <?php } ?>
                        <?php while (have_rows('content_block')) {
                            the_row();

                            $content_selection = get_sub_field('content_selection');

                            $text_title_anchor = get_sub_field('text_title_anchor');
                            $title = get_sub_field('title');
                            $anchortitle = get_sub_field('title');
                            $anchortitle = strtolower($anchortitle);
                            $anchortitle = preg_replace('/\s+/', '', $anchortitle);

                            $related_title_anchor = get_sub_field('related_title_anchor');
                            $related_title = get_sub_field('related_title');
                            $relatedanchortitle = get_sub_field('related_title');
                            $relatedanchortitle = strtolower($relatedanchortitle);
                            $relatedanchortitle = preg_replace('/\s+/', '', $relatedanchortitle);


                            $numbers_title_anchor = get_sub_field('numbers_title_anchor');
                            $number_blocks_title = get_sub_field('number_blocks_title');

                            $numberanchortitle = get_sub_field('number_blocks_title');
                            $numberanchortitle = strtolower($numberanchortitle);
                            $numberanchortitle = preg_replace('/\s+/', '', $numberanchortitle);


                        ?>

                            <?php if (get_sub_field('content_selection') == 'text') { ?>

                                <?php if ($text_title_anchor) { ?>
                                    <a class="btn_blue" href="#title_<?php echo $anchortitle; ?>"><?php echo $title; ?></a>
                                <?php } ?>

                            <?php } elseif (get_sub_field('content_selection') == 'related') {  ?>

                                <?php if ($related_title_anchor) { ?>
                                    <a class="btn_blue" href="#title_<?php echo $relatedanchortitle; ?>"><?php echo $related_title; ?></a>
                                <?php } ?>

                            <?php } elseif (get_sub_field('content_selection') == 'numberedblocks') {  ?>

                                <?php if ($numbers_title_anchor) { ?>
                                    <a class="btn_blue" href="#title_<?php echo $numberanchortitle; ?>"><?php echo $number_blocks_title; ?></a>
                                <?php } ?>

                            <?php } else {  ?>

                            <?php } ?>



                    <?php wp_reset_postdata();
                        }
                    }  ?>

                </div>

                <!-- -->

                <?php if (have_rows('content_block')) {
                    while (have_rows('content_block')) {
                        the_row();

                        $content_selection = get_sub_field('content_selection');

                        $alert_colour = get_sub_field('alert_colour');
                        $alert_title = get_sub_field('alert_title');
                        $alert_text = get_sub_field('alert_text');
                        $alert_buttons = get_sub_field('alert_buttons');

                        $image = get_sub_field('image');

                        $title = get_sub_field('title');
                        $subtitle = get_sub_field('subtitle');
                        $main_text = get_sub_field('main_text');

                        $anchortitle = get_sub_field('title');
                        $anchortitle = strtolower($anchortitle);
                        $anchortitle = preg_replace('/\s+/', '', $anchortitle);

                        $related_title = get_sub_field('related_title');

                        $small_text = get_sub_field('small_text');
                        $large_text = get_sub_field('large_text');
                        $cta_image = get_sub_field('cta_image');
                        $cta_buttons = get_sub_field('cta_buttons');

                        $number_blocks_title = get_sub_field('number_blocks_title');

                        $numberanchortitle = get_sub_field('number_blocks_title');
                        $numberanchortitle = strtolower($numberanchortitle);
                        $numberanchortitle = preg_replace('/\s+/', '', $numberanchortitle);


                ?>


                        <?php if (get_sub_field('content_selection') == 'text') { ?>
                            <div class="parent_text_wrap">

                                <?php if ($title) { ?>
                                    <h3 id="title_<?php echo $anchortitle; ?>"><?php echo $title; ?></h3>
                                <?php } ?>

                                <?php if ($subtitle) { ?>
                                    <h4><?php echo $subtitle; ?></h4>
                                <?php } ?>

                                <?php if ($main_text) { ?>
                                    <?php echo $main_text; ?>
                                <?php } ?>

                            </div>

                        <?php } elseif (get_sub_field('content_selection') == 'image') {  ?>

                            <?php $bannerArgs = array(
                                'class' => 'content_image',
                                'id' => $image,
                                'lazyload' => false
                            );

                            echo build_srcset('banner', $bannerArgs); ?>


                        <?php } elseif (get_sub_field('content_selection') == 'alert') {  ?>
                            <div class="alert_wrap alert_<?php echo $alert_colour; ?>">
                                <div class="flex_wrap">
                                    <h3>
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 23C5.14912 23 0 17.8509 0 11.5C0 5.14841 5.14912 0 11.5 0C17.8516 0 23 5.14841 23 11.5C23 17.8509 17.8516 23 11.5 23ZM11.5 2.15625C6.33938 2.15625 2.15625 6.33938 2.15625 11.5C2.15625 16.6599 6.33938 20.8438 11.5 20.8438C16.6606 20.8438 20.8438 16.6599 20.8438 11.5C20.8438 6.33938 16.6606 2.15625 11.5 2.15625ZM11.5007 13.6598C10.677 13.6598 10.0546 13.23 10.0546 12.535V6.16688C10.0546 5.47256 10.677 5.04275 11.5007 5.04275C12.3043 5.04275 12.9468 5.4891 12.9468 6.16688V12.535C12.9468 13.2135 12.3043 13.6598 11.5007 13.6598ZM11.5007 15.0938C12.2921 15.0938 12.9353 15.7378 12.9353 16.5291C12.9353 17.3204 12.2921 17.9637 11.5007 17.9637C10.7094 17.9637 10.0654 17.3204 10.0654 16.5291C10.0654 15.7378 10.7094 15.0938 11.5007 15.0938Z" fill="#CC4270" />
                                        </svg>
                                        <?php if ($alert_title) { ?><?php echo $alert_title; ?><?php } ?>
                                    </h3>
                                </div>
                                <?php if ($alert_text) { ?>
                                    <div class="text_area">
                                        <p><?php echo $alert_text; ?></p>
                                    </div>
                                <?php } ?>
                                <div class="flex_wrap">
                                    <?php if (have_rows('alert_buttons')) {
                                        while (have_rows('alert_buttons')) {
                                            the_row();
                                    ?>
                                            <?php
                                            $alert_button = get_sub_field('alert_button');
                                            if ($alert_button) :
                                                $alert_button_url = $alert_button['url'];
                                                $alert_button_title = $alert_button['title'];
                                                $alert_button_target = $alert_button['target'] ? $alert_button['target'] : '_self';
                                            ?>
                                                <a class="btn_default" href="<?php echo esc_url($alert_button_url); ?>" target="<?php echo esc_attr($alert_button_target); ?>"><?php echo esc_html($alert_button_title); ?></a>
                                            <?php endif; ?>

                                    <?php wp_reset_postdata();
                                        }
                                    }  ?>
                                </div>
                            </div>


                        <?php } elseif (get_sub_field('content_selection') == 'related') {  ?>

                            <div class="parent_related_wrap">

                                <?php if ($related_title) { ?>
                                    <h3 id="title_<?php echo $title; ?>"><?php echo $related_title; ?></h3>
                                <?php } ?>

                                <?php if (have_rows('related_items')) { ?>
                                    <div class="related_block">
                                        <?php while (have_rows('related_items')) {
                                            the_row();
                                        ?>
                                            <?php
                                            $related_title = get_sub_field('related_title');
                                            $related_text = get_sub_field('related_text');
                                            $related_link = get_sub_field('related_link'); ?>
                                            <div class="related_item">
                                                <?php if ($related_title) { ?>
                                                    <h3><?php echo $related_title; ?></h3>
                                                <?php } ?>

                                                <?php if ($related_text) { ?>
                                                    <p><?php echo $related_text; ?></p>
                                                <?php } ?>

                                                <?php if ($related_link) :
                                                    $related_link_url = $related_link_button['url'];
                                                    $related_link_button_title = $related_link_button['title'];
                                                    $related_link_button_target = $related_link_button['target'] ? $related_link_button['target'] : '_self';
                                                ?>
                                                    <a class="btn_default" href="<?php echo esc_url($related_link_button_url); ?>" target="<?php echo esc_attr($related_link_button_target); ?>"><?php echo esc_html($related_link_button_title); ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <?php wp_reset_postdata(); ?>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            </div>


                        <?php } elseif (get_sub_field('content_selection') == 'imagecta') {  ?>
                            <div class="parent_image_cta">
                                <div class="cta_text_area">
                                    <?php if ($small_text) { ?>
                                        <h5><?php echo $small_text; ?></h5>
                                    <?php } ?>

                                    <?php if ($large_text) { ?>
                                        <h3><?php echo $large_text; ?></h3>
                                    <?php } ?>
                                    <div class="button_wrap">
                                        <?php if (have_rows('cta_buttons')) {
                                            while (have_rows('cta_buttons')) {
                                                the_row();
                                        ?>
                                                <?php
                                                $cta_button = get_sub_field('cta_button');
                                                if ($cta_button) :
                                                    $cta_button_url = $cta_button['url'];
                                                    $cta_button_title = $cta_button['title'];
                                                    $cta_button_target = $cta_button['target'] ? $cta_button['target'] : '_self';
                                                ?>
                                                    <a class="btn_default" href="<?php echo esc_url($cta_button_url); ?>" target="<?php echo esc_attr($cta_button_target); ?>"><?php echo esc_html($cta_button_title); ?></a>
                                                <?php endif; ?>

                                        <?php wp_reset_postdata();
                                            }
                                        }  ?>
                                    </div>
                                </div>
                                <div class="cta_image_area">
                                    <?php $bannerCTA = array(
                                        'class' => 'content_image',
                                        'id' => $cta_image,
                                        'lazyload' => false
                                    );

                                    echo build_srcset('', $bannerCTA); ?>
                                </div>
                            </div>
                        <?php } elseif (get_sub_field('content_selection') == 'numberedblocks') {  ?>

                            <div class="parent_number_wrap">

                                <?php if ($number_blocks_title) { ?>
                                    <h3 id="anchor_<?php echo $numberanchortitle; ?>"><?php echo $number_blocks_title; ?></h3>
                                <?php } ?>

                                <div class="button_wrap">
                                    <?php if (have_rows('number_blocks')) {
                                        while (have_rows('number_blocks')) {
                                            the_row();
                                    ?>
                                            <?php
                                            $number_title = get_sub_field('number_title');
                                            $number_text = get_sub_field('number_text');
                                            $row = get_row_index() - 0;
                                            ?>
                                            <div class="row_wrap">
                                                <?php if ($number_title) { ?>
                                                    <h3><?php echo $row; ?>. <?php echo $number_title; ?></h3>
                                                <?php } ?>
                                                <?php if ($number_text) { ?>
                                                    <p><?php echo $number_text; ?></p>
                                                <?php } ?>
                                            </div>
                                    <?php wp_reset_postdata();
                                        }
                                    }  ?>
                                </div>


                            </div>


                        <?php } elseif (get_sub_field('content_selection') == 'divider') {  ?>

                            <div class="divider"></div>

                        <?php } else {  ?>

                        <?php } ?>



                <?php wp_reset_postdata();
                    }
                }  ?>
            </div>
        </div>
    </div>
</section>

<section class="blue_more">
    <div class="container">
        <div class="main_content">

            <div class="downloads_wrap">
                <div class="flex_wrap">
                    <h3 class="flex_wrap">
                        <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="47" height="47" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_1151_33745" transform="scale(0.01)" />
                                </pattern>
                                <image id="image0_1151_33745" width="100" height="100" xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>
                        <?php echo $downloads_title; ?>
                    </h3>
                </div>
                <div class="flex_wrap">
                    <?php if (have_rows('downloads_repeater')) {
                        while (have_rows('downloads_repeater')) {
                            the_row();
                    ?>
                            <?php
                            $download_name = get_sub_field('download_name');
                            $download_file = get_sub_field('download_file');
                            $row = get_row_index() - 0;
                            ?>
                            <a href="<?php echo $download_file; ?>" download title="<?php echo $download_name; ?>" class="btn_simple">
                                <?php echo $download_name; ?>
                            </a>
                    <?php wp_reset_postdata();
                        }
                    }  ?>

                </div>

            </div>

            <div class="related_wrap">
                <h5><?php if ($what_am_i == 'cym') {
                        echo "Tudalennau cysylltiedig";
                    } else {
                        echo "Related pages";
                    } ?></h5>
                <div class="flex_wrap">
                    <?php if (have_rows('related_pages')) { ?>
                        <div class="related_item">
                            <?php while (have_rows('related_pages')) {
                                the_row();
                            ?>
                                <?php
                                $post_object = get_sub_field('page_link');
                                $parent_post_id = wp_get_post_parent_id($post_object->ID); // Get the parent post ID
                                $parent_post = get_post($parent_post_id); // Get the parent post object
                                $parent_title = $parent_post ? $parent_post->post_title : ''; // Get the parent post title

                                ?>
                                <?php if ($post_object) : ?>
                                    <?php // override $post
                                    $post = $post_object;
                                    setup_postdata($post);
                                    ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <div class="row_wrap">
                                            <h4 class="tag"><?php echo $parent_title; ?></h4>
                                            <div class="page_link">

                                                <h3><?php the_title(); ?></h3>
                                            </div>
                                        </div>
                                    </a>
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                                    ?>
                                <?php endif; ?>


                                <?php /*
                        $small_title = get_sub_field('small_title');
                        $page_link = get_sub_field('page_link');
                        $row = get_row_index() - 0;
                        ?>
                        <div class="row_wrap">
                            <p><?php echo $small_title; ?></p>
                            <div class="page_link">

                                <?php
                                $featured_post = get_sub_field('page_link');
                                if( $featured_post ): ?>
                                <?php print_r($page_link); ?>
                                <h3><?php echo esc_html( $featured_post->post_title ); ?></h3>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php wp_reset_postdata();  */  ?>

                            <?php } ?>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
</section>


<?php get_template_part('signposts'); ?>

<?php get_footer(); ?>