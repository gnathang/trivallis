<?php
/**
 * Flex Template : Banner
**/

$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');

// icons
$handshake_icon = get_template_directory_uri() . '/assets/images/png/trustworthy-icon.png';
$progressive_icon = get_template_directory_uri() . '/assets/images/png/progressive-icon.png';
$inclusive_icon = get_template_directory_uri() . '/assets/images/png/inclusivity-icon.png';
$hand_heart_icon = get_template_directory_uri() . '/assets/images/png/kind-icon.png';
// end
?>




<section class="section_accordion row-<?php echo $row; ?>">
    <div class="container">

        <div class="text_wrap">
            <?php if($title) {?><h3 class=""><?php echo $title; ?></h3><?php } ?>
            <?php if($subtitle) {?><p class=""><?php echo $subtitle; ?></p><?php } ?>
        </div>

        <?php
            if(have_rows('accordion_rows')) {
                while(have_rows('accordion_rows')) {
                    the_row();

                    $title = get_sub_field('title');
                    $intro_text = get_sub_field('intro_text');
                    $icon = get_sub_field('icon');
        ?>

        <!-- keep this open by default on mobile viewports -->
        <?php /* if(wp_is_mobile()) { ?> active <?php } */ ?>

        <div class="accordion_wrap">

            <?php if($icon == 'handshake_icon') { ?>
            <img class="accord_icon_desktop" src="<?php echo $handshake_icon; ?>" alt="handshake icon">
            <?php } elseif($icon == 'progressive_icon') { ?>
            <img class="accord_icon_desktop" src="<?php echo $progressive_icon; ?>" alt="progressive icon">
            <?php } elseif($icon == 'inclusive_icon') { ?>
            <img class="accord_icon_desktop" src="<?php echo $inclusive_icon; ?>" alt="inclusive icon">
            <?php } elseif($icon == 'hand_heart_icon') { ?>
            <img class="accord_icon_desktop" src="<?php echo $hand_heart_icon; ?>" alt="hand and heart icon">
            <?php } ?>

            <div class="accord_butt">
                <?php if($icon == 'handshake_icon') { ?>
                <img class="accord_icon_mob" src="<?php echo $handshake_icon; ?>" alt="handshake icon">
                <?php } elseif($icon == 'green_tick_icon') { ?>
                <img class="accord_icon_mob" src="<?php echo $green_tick_icon; ?>" alt="green tick icon">
                <?php } elseif($icon == 'speech_bubbles_icon') { ?>
                <img class="accord_icon_mob" src="<?php echo $speech_bubbles_icon; ?>" alt="speech bubbles icon">
                <?php } elseif($icon == 'hand_heart_icon') { ?>
                <img class="accord_icon_mob" src="<?php echo $hand_heart_icon; ?>" alt="hand heart icon">
                <?php } ?>
                <h3><?php echo $title; ?></h3>
                <?php if($intro_text) { ?><p><?php echo $intro_text?></p><?php } ?>
            </div>

            <div class="text_open">
                <?php if(have_rows('text_blocks')) : while(have_rows('text_blocks')) : the_row(); ?>
                <?php $block_title = get_sub_field('block_title'); ?>
                <?php $block_content = get_sub_field('block_content'); ?>
                <div class="content_block">
                    <h4><?php echo $block_title; ?></h4>
                    <p><?php echo $block_content; ?></p>
                </div>
                <?php endwhile;  endif; ?>
            </div>

        </div>

        <?php
                wp_reset_postdata();
            }
        }  ?>

    </div>


</section>