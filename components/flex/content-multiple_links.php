<?php 

// icons for the manual populating method
$people_icon = get_template_directory_uri() . '/assets/images/png/me.png';
$living_room_icon = get_template_directory_uri() . '/assets/images/png/home.png';
$house_icon = get_template_directory_uri() . '/assets/images/png/neighbourhood.png';
$money_schedule_icon = get_template_directory_uri() . '/assets/images/png/money.png';
$hand_heart_icon = get_template_directory_uri() . '/assets/images/png/wellbeing.png';

$manual_or_automatic_pop = get_sub_field('manual_or_auto_pop');
?>

<section class="section_multiple_links row-<?php echo $row; ?>">
    <div class="container">

        <?php if(!$manual_or_automatic_pop) { ?>
        <?php 
            // Determine parent of current page
            if ($post->post_parent) {
                $ancestors = get_post_ancestors($post->ID);
                $parent = $ancestors[count($ancestors) - 1];
            } else {
                $parent = $post->ID;
            }

            $children = get_pages(array(
                'child_of' => $parent,
                'parent' => $parent,
                'sort_column' => 'menu_order', // order by page order - managed in WP backend
                'sort_order' => 'ASC'
            ));

            if ($children) {
        ?>

        <?php 
            // Loop through each child page
            foreach ($children as $child) {
                // Get ACF fields for the child page
                $page_icon = get_field('page_icon', $child->ID);
                $header_text = get_field('header_text', $child->ID);
                // Output the child page name and its children
                ?>
        <div class="link_group_wrap">
            <div class="link_group_title_wrap">
                <img src="<?php echo $page_icon; ?>" alt="page icon for <?php echo $child->post_title; ?>">
                <h3><?php echo $child->post_title; ?></h3>
                <?php if ($header_text): ?>
                <p><?php echo $header_text; ?></p>
                <?php endif; ?>
            </div>
            <?php if ($page_header): ?>
            <h4><?php echo $page_header; ?></h4>
            <?php endif; ?>
            <div class="link_list">
                <?php 
                                // Retrieve the children of the child page
                                $grandchildren = get_pages(array(
                                    'child_of' => $child->ID,
                                    'sort_column' => 'menu_order', // order by page order - managed in WP backend
                                    'sort_order' => 'ASC'
                                ));
                                // Loop through each child page of the child page
                                foreach ($grandchildren as $grandchild) {
                                    ?>
                <div class="child-page">
                    <a class="btn_simple" href="<?php echo get_permalink($grandchild->ID); ?>"
                        aria-label="link to <?php echo $grandchild->post_title; ?> page"><?php echo $grandchild->post_title; ?></a>

                    <!-- Add other content as needed -->
                </div>
                <?php
                                }
                            ?>
            </div>
        </div>
        <?php
            }
        ?>

        <?php } ?>
        <?php } else { ?>

        <?php if(have_rows('link_group')) : while(have_rows('link_group')) : the_row(); ?>
        <?php $link_group_icon = get_sub_field('link_group_icon'); ?>
        <?php $link_group_title = get_sub_field('link_group_title'); ?>
        <?php $link_group_subtitle = get_sub_field('link_group_subtitle'); ?>
        <div class="link_group_wrap">

            <div class="link_group_title_wrap">
                <?php if ($link_group_icon == 'people_icon') : ?>
                <img src="<?php echo $people_icon; ?>" alt="icon">
                <?php elseif ($link_group_icon == 'living_room_icon') : ?>
                <img src="<?php echo $living_room_icon; ?>" alt="icon">
                <?php elseif ($link_group_icon == 'house_icon') : ?>
                <img src="<?php echo $house_icon; ?>" alt="icon">
                <?php elseif ($link_group_icon == 'money_calendar_icon') : ?>
                <img src="<?php echo $money_schedule_icon; ?>" alt="icon">
                <?php elseif ($link_group_icon == 'hand_heart_icon') : ?>
                <img src="<?php echo $hand_heart_icon; ?>" alt="icon">
                <?php endif; ?>

                <h3><?php echo $link_group_title; ?></h3>
                <?php if($link_group_subtitle) { ?><p><?php echo $link_group_subtitle; ?></p><?php } ?>
            </div>

            <?php if(have_rows('link_list')) : ?>
            <div class="link_list">
                <?php while(have_rows('link_list')) : the_row(); ?>
                <?php $link = get_sub_field('links'); ?>

                <?php if($link) { ?>
                <a href="<?php echo $link['url'] ?>" class="btn_simple"
                    target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link['title']; ?></a>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <!-- end link_list-->
        </div>
        <?php endwhile; endif; ?>
        <!-- end link_group-->
        <?php } ?>
        <!-- end manual or auto populate-->

    </div>
</section>