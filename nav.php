<?php

$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);

// Function to detect if the screen width is below 1200px
function is_below_1200px()
{
?>
    <script type="text/javascript">
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if (screenWidth < 1200) {
            document.cookie = "is_below_1200px=true; path=/";
        } else {
            document.cookie = "is_below_1200px=false; path=/";
        }
    </script>
<?php
}
// Call the function to set the cookie based on screen width
is_below_1200px();

// Check if the cookie is set to true or if it's a mobile device
if ((isset($_COOKIE['is_below_1200px']) && $_COOKIE['is_below_1200px'] === 'true') || wp_is_mobile()) {

?>


    <div class="mobile_nav">
        <ul class="top_level_ul">
            <?php if (have_rows('menu', 'option')): ?>
                <?php while (have_rows('menu', 'option')): the_row(); ?>
                    <?php $mainlink = get_sub_field('menu_top_level_link', 'option'); ?>
                    <?php if ($mainlink):
                        $mainlink_url = $mainlink['url'];
                        $mainlink_title = $mainlink['title'];
                        $mainlink_target = $mainlink['target'] ? $mainlink['target'] : '_self';
                    ?>

                        <?php $dropdown = get_sub_field('dropdown', 'option'); ?>

                        <li id="nav_<?php echo get_row_index(); ?>"
                            class="<?php if ($dropdown) { ?>next_level<?php } else { ?><?php } ?>">
                            <div class="mob_menu_button" href="<?php echo esc_url($mainlink_url); ?>"
                                target="<?php echo esc_attr($mainlink_target); ?>"><?php echo esc_html($mainlink_title); ?></div>
                            <?php if ($dropdown) { ?>
                                <ul class="level_area">
                                    <li class="container">
                                        <div class="white_wrap">
                                            <div class="back_mob">Back</div>
                                            <div class="menu_title">
                                                <div class="flex_wrap">
                                                    <?php $dd_title = get_sub_field('dropdown_title', 'option'); ?>
                                                    <?php if ($dd_title) { ?>
                                                        <h3><?php echo $dd_title; ?></h3>
                                                    <?php } ?>
                                                </div>
                                                <a class="btn_simple" href="<?php echo esc_url($mainlink_url); ?>"
                                                    target="<?php echo esc_attr($mainlink_target); ?>"><?php if ($what_am_i == 'cym') {
                                                                                                            echo "Gweld y cyfan";
                                                                                                        } else {
                                                                                                            echo "View All";
                                                                                                        } ?></a>
                                            </div>
                                            <ul class="level_two">
                                                <?php if (have_rows('dropdown_menu_items', 'option')): ?>
                                                    <?php while (have_rows('dropdown_menu_items', 'option')): the_row(); ?>
                                                        <?php $link_or_cta = get_sub_field('link_or_cta', 'option'); ?>

                                                        <?php if ($link_or_cta) { ?>

                                                            <?php $cta_menu_link = get_sub_field('cta_menu_link', 'option');
                                                            $cta_menu_title = get_sub_field('cta_menu_title', 'option');
                                                            $cta_menu_item_icon = get_sub_field('cta_menu_item_icon', 'option');
                                                            $cta_menu_item_text = get_sub_field('cta_menu_item_text', 'option');
                                                            ?>

                                                            <li class="menu_cta">
                                                                <div class="level_two_btn">
                                                                    <h3 class="flex_wrap icon icon-<?php echo $cta_menu_item_icon; ?>">
                                                                        <?php echo $cta_menu_title ?></h3>
                                                                    <?php
                                                                    if (wp_is_mobile()) { ?>
                                                                        <p><?php echo $cta_menu_item_text; ?></p>

                                                                    <?php }
                                                                    ?>
                                                                </div>

                                                                <?php if (have_rows('sub_menu_item', 'option')): ?>
                                                                    <ul class="level_three">
                                                                        <div class="back_three">Back</div>
                                                                        <div class="level_three_title_wrap">
                                                                            <a href="<?php echo $cta_menu_link; ?>"
                                                                                target="<?php echo esc_attr($cta_menu_link); ?>">
                                                                                <h3 class="flex_wrap icon icon-<?php echo $cta_menu_item_icon; ?>">
                                                                                    <?php echo $cta_menu_title ?>
                                                                                </h3>
                                                                            </a>
                                                                            <a class="btn_simple" href="<?php echo $cta_menu_link; ?>"
                                                                                aria-label="link to <?php echo $cta_menu_title; ?>">
                                                                                <?php if ($what_am_i == 'cym') {
                                                                                    echo "Gweld y cyfan";
                                                                                } else {
                                                                                    echo "See all";
                                                                                } ?></a>
                                                                        </div>

                                                                        <?php while (have_rows('sub_menu_item', 'option')): the_row(); ?>
                                                                            <?php $sub_menu_item_link = get_sub_field('sub_menu_item_link', 'option');
                                                                            if ($sub_menu_item_link):
                                                                                $sub_menu_item_link_url = $sub_menu_item_link['url'];
                                                                                $sub_menu_item_link_title = $sub_menu_item_link['title'];
                                                                                $sub_menu_item_link_target = $sub_menu_item_link['target'] ? $sub_menu_item_link['target'] : '_self';
                                                                            ?>
                                                                                <li><a class="btn_simple" href="<?php echo esc_url($sub_menu_item_link_url); ?>"
                                                                                        target="<?php echo esc_attr($sub_menu_item_link_target); ?>"><?php echo esc_html($sub_menu_item_link_title); ?></a>
                                                                                </li>

                                                                            <?php endif; ?>
                                                                        <?php endwhile; ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </li>

                                                        <?php } else { ?>

                                                            <?php $sub_menu_link = get_sub_field('sub_menu_link', 'option');
                                                            $sub_menu_item_text = get_sub_field('sub_menu_item_text', 'option');
                                                            if ($sub_menu_link):
                                                                $sub_menu_link_url = $sub_menu_link['url'];
                                                                $sub_menu_link_title = $sub_menu_link['title'];
                                                                $sub_menu_link_target = $sub_menu_link['target'] ? $sub_menu_link['target'] : '_self';
                                                            ?>
                                                                <li class="menu_link">
                                                                    <a class="btn_arrow" href="<?php echo esc_url($sub_menu_link_url); ?>"
                                                                        target="<?php echo esc_attr($sub_menu_link_target); ?>"><?php echo esc_html($sub_menu_link_title); ?></a>
                                                                    <p><?php echo $sub_menu_item_text; ?>
                                                                        <?php if (have_rows('sub_menu_item', 'option')): ?>
                                                                    <ul class="level_two">
                                                                        <?php while (have_rows('sub_menu_item', 'option')): the_row(); ?>
                                                                            <?php $submenuitem = get_sub_field('sub_menu_item_link', 'option');
                                                                                if ($submenuitem):
                                                                                    $submenuitem_url = $submenuitem['url'];
                                                                                    $submenuitem_title = $submenuitem['title'];
                                                                                    $submenuitem_target = $submenuitem['target'] ? $submenuitem['target'] : '_self';
                                                                            ?>
                                                                                <li><a class="btn_arrow" href="<?php echo esc_url($submenuitem_url); ?>"
                                                                                        target="<?php echo esc_attr($submenuitem_target); ?>"><?php echo esc_html($submenuitem_title); ?></a>
                                                                                </li>

                                                                            <?php endif; ?>
                                                                        <?php endwhile; ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php } ?>

                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- <div class="bottom_cta_wrap">
                    <p class="bold">Looking to manage your tenancy?</p>
                    <a class="btn_my_triv_white" href="#" aria-label="My Trivallis Login">Log in to My Trivallis</a>
                    <div>
                        <a class="" href="#">Work with us</a>
                        <a class="" href="#">Feedback</a>
                    </div>
                </div> -->
                                </ul>
                            <?php } else { ?>
                            <?php } ?>
                        </li>

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>

    <?php $my_trivallis_link = get_field('my_trivallis_link', 'option'); ?>

    <div class="bottom_cta_wrap">
        <p class="bold">Looking to manage your tenancy?</p>
        <a class="btn_my_triv_white" href="<?php echo $my_trivallis_link; ?>" aria-label="My Trivallis Login">Log in to My
            Trivallis</a>
        <div>
            <a class="" href="/work-with-us" aria-label="link to work with us">Work with us</a>
            <a class="" href="/feedback" aria-label="link to feedback">Feedback</a>
        </div>
    </div>

<?php } else { ?>

    <div class="main_nav">
        <div class="desktop_nav">
            <ul>
                <?php if (have_rows('menu', 'option')): ?>
                    <?php while (have_rows('menu', 'option')): the_row(); ?>
                        <?php $mainlink = get_sub_field('menu_top_level_link', 'option'); ?>
                        <?php if ($mainlink):
                            $mainlink_url = $mainlink['url'];
                            $mainlink_title = $mainlink['title'];
                            $mainlink_target = $mainlink['target'] ? $mainlink['target'] : '_self';
                        ?>

                            <?php $dropdown = get_sub_field('dropdown', 'option'); ?>

                            <li id="nav_<?php echo get_row_index(); ?>"
                                class="<?php if ($dropdown) { ?>dropdown<?php } else { ?><?php } ?>">
                                <a class="top_level_a_tag" href="<?php echo esc_url($mainlink_url); ?>"
                                    target="<?php echo esc_attr($mainlink_target); ?>"><?php echo esc_html($mainlink_title); ?></a>
                                <?php if ($dropdown) { ?>
                                    <ul class="dropdown_area">
                                        <li class="container">
                                            <div class="white_wrap">
                                                <div class="menu_title">
                                                    <div class="flex_wrap">
                                                        <?php $dd_title = get_sub_field('dropdown_title', 'option'); ?>
                                                        <?php $dd_text = get_sub_field('dropdown_text', 'option'); ?>
                                                        <?php if ($dd_title) { ?>
                                                            <h3><?php echo $dd_title; ?></h3>
                                                            <p><?php echo $dd_text; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <a class="view_all btn_blue" href="<?php echo esc_url($mainlink_url); ?>"
                                                        target="<?php echo esc_attr($mainlink_target); ?>"><?php if ($what_am_i == 'cym') {
                                                                                                                echo "Gweld y cyfan";
                                                                                                            } else {
                                                                                                                echo "View All";
                                                                                                            } ?></a>
                                                </div>
                                                <ul class="drop_list">
                                                    <?php if (have_rows('dropdown_menu_items', 'option')): ?>
                                                        <?php while (have_rows('dropdown_menu_items', 'option')): the_row(); ?>
                                                            <?php $link_or_cta = get_sub_field('link_or_cta', 'option'); ?>

                                                            <?php if ($link_or_cta) { ?>


                                                                <?php
                                                                $cta_menu_title = get_sub_field('cta_menu_title', 'option');
                                                                $cta_menu_link = get_sub_field('cta_menu_link', 'option');
                                                                $cta_menu_item_icon = get_sub_field('cta_menu_item_icon', 'option');
                                                                $cta_menu_item_text = get_sub_field('cta_menu_item_text', 'option');

                                                                // Check if the $cta_menu_link is not empty
                                                                if ($cta_menu_link) {
                                                                    // link configs
                                                                    $cta_menu_link_url = $cta_menu_link['url'];
                                                                    $cta_menu_link_title = $cta_menu_link['title'];
                                                                    $cta_menu_link_target = $cta_menu_link['target'] ? $cta_menu_link['target'] : '_self';
                                                                }
                                                                ?>

                                                                <li class="menu_cta">
                                                                    <a href="<?php echo $cta_menu_link; ?>"
                                                                        target="<?php echo esc_attr($cta_menu_link); ?>">
                                                                        <h3 class="flex_wrap icon icon-<?php echo $cta_menu_item_icon; ?>">
                                                                            <?php echo $cta_menu_title ?>

                                                                        </h3>
                                                                    </a>

                                                                    <?php if ($cta_menu_item_text) { ?>
                                                                        <p><?php echo $cta_menu_item_text; ?></p>
                                                                    <?php } ?>

                                                                    <?php if (have_rows('sub_menu_item', 'option')): ?>
                                                                        <ul class=" drop_drop_list">
                                                                            <?php while (have_rows('sub_menu_item', 'option')): the_row(); ?>
                                                                                <?php $sub_menu_item_link = get_sub_field('sub_menu_item_link', 'option');

                                                                                if ($sub_menu_item_link):
                                                                                    $sub_menu_item_link_url = $sub_menu_item_link['url'];
                                                                                    $sub_menu_item_link_title = $sub_menu_item_link['title'];
                                                                                    $sub_menu_item_link_target = $sub_menu_item_link['target'] ? $sub_menu_item_link['target'] : '_self';
                                                                                ?>
                                                                                    <li>
                                                                                        <a class="btn_simple btn_simple_split_words"
                                                                                            href="<?php echo esc_url($sub_menu_item_link_url); ?>"
                                                                                            target="<?php echo esc_attr($sub_menu_item_link_target); ?>"><?php echo esc_html($sub_menu_item_link_title); ?>
                                                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path
                                                                                                    d="M0.868873 16.6386C0.244034 17.2635 0.244034 18.2766 0.868873 18.9014C1.49371 19.5262 2.50678 19.5262 3.13162 18.9014L0.868873 16.6386ZM19.6002 1.77002C19.6002 0.886364 18.8839 0.17002 18.0002 0.17002H3.60024C2.71659 0.17002 2.00024 0.886364 2.00024 1.77002C2.00024 2.65368 2.71659 3.37002 3.60024 3.37002H16.4002V16.17C16.4002 17.0537 17.1166 17.77 18.0002 17.77C18.8839 17.77 19.6002 17.0537 19.6002 16.17V1.77002ZM3.13162 18.9014L19.1316 2.90139L16.8689 0.638649L0.868873 16.6386L3.13162 18.9014Z"
                                                                                                    fill="#0078CE" />
                                                                                            </svg>
                                                                                        </a>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endwhile; ?>
                                                                        </ul>
                                                                        <a class="btn_blue" href="<?php echo $cta_menu_link; ?>"
                                                                            aria-label="link to <?php echo $cta_menu_title; ?>"><?php if ($what_am_i == 'cym') {
                                                                                                                                    echo "Gweld y cyfan";
                                                                                                                                } else {
                                                                                                                                    echo "See all";
                                                                                                                                } ?></a>
                                                                    <?php endif; ?>
                                                                </li>

                                                            <?php } else { ?>

                                                                <?php $sub_menu_link = get_sub_field('sub_menu_link', 'option');
                                                                $sub_menu_item_text = get_sub_field('sub_menu_item_text', 'option');
                                                                if ($sub_menu_link):
                                                                    $sub_menu_link_url = $sub_menu_link['url'];
                                                                    $sub_menu_link_title = $sub_menu_link['title'];
                                                                    $sub_menu_link_target = $sub_menu_link['target'] ? $sub_menu_link['target'] : '_self';
                                                                ?>
                                                                    <li class="menu_link">
                                                                        <a class="btn_arrow" href="<?php echo esc_url($sub_menu_link_url); ?>"
                                                                            target="<?php echo esc_attr($sub_menu_link_target); ?>"><?php echo esc_html($sub_menu_link_title); ?></a>
                                                                        <p><?php echo $sub_menu_item_text; ?>
                                                                            <?php if (have_rows('sub_menu_item', 'option')): ?>
                                                                        <ul class="drop_drop_item">
                                                                            <?php while (have_rows('sub_menu_item', 'option')): the_row(); ?>
                                                                                <?php $submenuitem = get_sub_field('sub_menu_item_link', 'option');
                                                                                    if ($submenuitem):
                                                                                        $submenuitem_url = $submenuitem['url'];
                                                                                        $submenuitem_title = $submenuitem['title'];
                                                                                        $submenuitem_target = $submenuitem['target'] ? $submenuitem['target'] : '_self';
                                                                                ?>
                                                                                    <li><a class="btn_arrow" href="<?php echo esc_url($submenuitem_url); ?>"
                                                                                            target="<?php echo esc_attr($submenuitem_target); ?>"><?php echo esc_html($submenuitem_title); ?></a>
                                                                                    </li>

                                                                                <?php endif; ?>
                                                                            <?php endwhile; ?>
                                                                        </ul>
                                                                    <?php endif; ?>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php } ?>

                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                <?php } else { ?>
                                <?php } ?>
                            </li>

                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php }
?>