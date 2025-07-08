<?php

$title_top = get_field('title_top');
$title_bottom = get_field('title_bottom');
$intro_text = get_field('intro_text');

$header_text = get_field('header_text');
$header_image = get_field('header_image');
$circle_colour = get_field('circle_colour');

$search_cta = get_field('search_cta');
$search_cta_title = get_field('search_cta_title');
$search_cta_text = get_field('search_cta_text');
$search_cta_button = get_field('search_cta_button');

$add_postcode_search = get_field('add_postcode_search');

$rr_title = get_field('rr_title', 'option');
$rr_text = get_field('rr_text', 'option');
$rr_link = get_field('rr_link', 'option');

$fp_title = get_field('fp_title', 'option');
$fp_text = get_field('fp_text', 'option');
$fp_link = get_field('fp_link', 'option');

$pyr_title = get_field('pyr_title', 'option');
$pyr_text = get_field('pyr_text', 'option');
$pyr_link = get_field('pyr_link', 'option');

$cp_title = get_field('cp_title', 'option');
$cp_text = get_field('cp_text', 'option');
$cp_link = get_field('cp_link', 'option');

$mt_title = get_field('mt_title', 'option');
$mt_text = get_field('mt_text', 'option');
$mt_link = get_field('mt_link', 'option');

$ta_title = get_field('ta_title', 'option');
$ta_text = get_field('ta_text', 'option');
$ta_link = get_field('ta_link', 'option');

$ts_title = get_field('ts_title', 'option');
$ts_text = get_field('ts_text', 'option');
$ts_link = get_field('ts_link', 'option');

$cu_title = get_field('cu_title', 'option');
$cu_text = get_field('cu_text', 'option');
$cu_link = get_field('cu_link', 'option');

$ag_title = get_field('ag_title', 'option');
$ag_text = get_field('ag_text', 'option');
$ag_link = get_field('ag_link', 'option');

$gi_title = get_field('gi_title', 'option');
$gi_text = get_field('gi_text', 'option');
$gi_link = get_field('gi_link', 'option');

$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);


?>

<?php if (get_field('header_style') == 'small') { ?>

    <section class="page_header small">
        <div class="container">
            <div class="flex_between">
                <div class="text_area">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
                    }
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <?php if ($header_text) { ?><p><?php echo $header_text; ?></p><?php } ?>
                </div>
                <div class="image_area <?php echo $circle_colour; ?>">

                    <?php $headimage = array(
                        'class' => '',
                        'id' => $header_image,
                        'lazyload' => false
                    );

                    echo build_srcset('square', $headimage); ?>


                </div>
            </div>
        </div>
    </section>

<?php } elseif (get_field('header_style') == 'searchpage') { ?>

    <section class="page_header small search">
        <!-- graphics -->
        <svg class="bg_graphic circle_teal" width="763" height="758" viewBox="0 0 763 758" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M763 379C763 588.316 592.197 758 381.5 758C170.803 758 0 588.316 0 379C0 169.684 170.803 0 381.5 0C592.197 0 763 169.684 763 379Z" fill="#8ECECA" />
        </svg>
        <svg class="bg_graphic circle_magenta" width="159" height="158" viewBox="0 0 159 158" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="79.5" cy="79" rx="79.5" ry="79" fill="#CC4270" />
        </svg>
        <svg class="bg_graphic circle_blue" width="547" height="555" viewBox="0 0 547 555" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="273.5" cy="277.5" rx="273.5" ry="277.5" fill="#0078CE" />
        </svg>

        <div class="container">
            <div class="flex_center">
                <div class="text_area text_center">
                    <h1><?php the_title(); ?></h1>
                    <?php if ($header_text) { ?><p><?php echo $header_text; ?></p><?php } ?>
                </div>
            </div>
            <div class="flex_center search_wrap">
                <?php get_search_form(); ?>
                <div class="get_in_touch_wrap">
                    <p><?php if ($what_am_i == 'cym') {
                            echo "Methu dod o hyd i beth rydych chi’n chwilio amdano?";
                        } else {
                            echo "Can't find what you are looking for? Get in
                touch.";
                        } ?></p>
                    <a class="btn_lightblue" href="/contact-us/" aria-label="contact us link"><?php if ($what_am_i == 'cym') {
                                                                                                    echo "Cysylltwch â ni 
                ";
                                                                                                } else {
                                                                                                    echo "Contact us";
                                                                                                } ?></a>
                </div>
            </div>
        </div>
    </section>

<?php } elseif (get_field('header_style') == 'large') {  ?>

    <section class="page_header large">
        <div class="container">
            <div class="flex_between">
                <div class="text_area">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
                    }
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <?php if ($header_text) { ?><p><?php echo $header_text; ?></p><?php } ?>
                </div>
                <div class="image_area <?php echo $circle_colour; ?>">

                    <?php $headimage = array(
                        'class' => '',
                        'id' => $header_image,
                        'lazyload' => false
                    );

                    echo build_srcset('square', $headimage); ?>

                </div>
            </div>
        </div>
        <img class="page_header_mask" src="<?php echo get_template_directory_uri() . '/assets/images/svg/landing-page-mask-banner.svg'; ?>" alt="page header mask">

    </section>

    <?php if ($search_cta) { ?>
        <section class="search_cta">
            <div class="container">
                <div class="search_wrap flex_between">
                    <div class="flex_wrap">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 23C5.14912 23 0 17.8509 0 11.5C0 5.14841 5.14912 0 11.5 0C17.8516 0 23 5.14841 23 11.5C23 17.8509 17.8516 23 11.5 23ZM11.5 2.15625C6.33938 2.15625 2.15625 6.33938 2.15625 11.5C2.15625 16.6599 6.33938 20.8438 11.5 20.8438C16.6606 20.8438 20.8438 16.6599 20.8438 11.5C20.8438 6.33938 16.6606 2.15625 11.5 2.15625ZM11.5007 13.6598C10.677 13.6598 10.0546 13.23 10.0546 12.535V6.16688C10.0546 5.47256 10.677 5.04275 11.5007 5.04275C12.3043 5.04275 12.9468 5.4891 12.9468 6.16688V12.535C12.9468 13.2135 12.3043 13.6598 11.5007 13.6598ZM11.5007 15.0938C12.2921 15.0938 12.9353 15.7378 12.9353 16.5291C12.9353 17.3204 12.2921 17.9637 11.5007 17.9637C10.7094 17.9637 10.0654 17.3204 10.0654 16.5291C10.0654 15.7378 10.7094 15.0938 11.5007 15.0938Z" fill="#0078CE" />
                        </svg>
                        <h3><?php echo $search_cta_title; ?></h3>
                    </div>
                    <div class="text_area">
                        <?php echo $search_cta_text; ?>
                    </div>
                    <div class="button_area">
                        <?php
                        $link = get_field('search_cta_button');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="btn_blue" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php } elseif ($add_postcode_search) { ?>

        <section class="search_cta">
            <div class="container">

                <div class="postcode_wrap alert_white">

                    <div class="flex_wrap">
                        <h3><?php if ($what_am_i == 'cym') {
                                echo "Eich Tîm Cymdogaeth";
                            } else {
                                echo "Your Neighbourhood Team";
                            } ?></h3>
                    </div>
                    <div class="text_area">
                        <p><?php if ($what_am_i == 'cym') {
                                echo "Eisiau dysgu rhagor am eich tîm cymdogaeth? Teipiwch eich cod post i ddysgu rhagor.";
                            } else {
                                echo "Want to learn more about your neighbourhood team? Enter your postcode to find out more.";
                            } ?></p>
                    </div>
                    <div class="text_area">
                        <form name="loginBox" target="#here" method="post" id="postcodeForm">
                            <input name="search" type="search" id="postcodeInput" placeholder="<?php if ($what_am_i == 'cym') {
                                echo "Rhowch y cod post";
                            } else {
                                echo "Enter Postcode";
                            } ?>" />
                            <input type="submit" value="" id="searchButton" />
                        </form>
                    </div>
                    <div id="results"></div>
                </div>

            </div>
        </section>
    <?php } ?>


<?php } elseif (get_field('header_style') == 'homepage') {  ?>


    <section class="section_page_header">

        <!-- graphics -->
        <svg class="bg_graphic circle_teal" width="763" height="758" viewBox="0 0 763 758" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M763 379C763 588.316 592.197 758 381.5 758C170.803 758 0 588.316 0 379C0 169.684 170.803 0 381.5 0C592.197 0 763 169.684 763 379Z" fill="#8ECECA" />
        </svg>
        <svg class="bg_graphic circle_magenta" width="159" height="158" viewBox="0 0 159 158" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="79.5" cy="79" rx="79.5" ry="79" fill="#CC4270" />
        </svg>
        <svg class="bg_graphic circle_blue" width="547" height="555" viewBox="0 0 547 555" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="273.5" cy="277.5" rx="273.5" ry="277.5" fill="#0078CE" />
        </svg>

        <div class="container">
            <div class="header_title_wrap">
                <h1><?php echo $title_top; ?></h1>
                <h2><?php echo $title_bottom; ?></h2>
                <p><?php echo $intro_text; ?></p>
            </div>
            <div class="buttons_wrap">
                <?php if (have_rows('buttons')) : while (have_rows('buttons')) : the_row(); ?>
                        <?php $link = get_sub_field('link'); ?>
                        <?php $button_type = get_sub_field('button_type'); ?>

                        <?php
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="<?php echo $button_type; ?>" href="<?php echo $link_url; ?>" aria-label="link to <?php echo $title; ?> page"><?php echo $link_title; ?></a>
                        <?php endif; ?>

                <?php endwhile;
                endif; ?>
            </div>


            <div class="signposts_wrap">

                <?php if (get_field('signpost_type_home') == 'sp_repair') { ?>

                    <a class="signpost sp_repair" href="<?php echo $rr_link; ?>" aria-label=" <?php echo $rr_title; ?>">
                        <h3><?php echo $rr_title; ?></h3>
                        <p><?php echo $rr_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_find_property') {  ?>

                    <a class="signpost sp_find_property" href="<?php echo $fp_link; ?>" aria-label=" <?php echo $fp_title; ?>">
                        <h3><?php echo $fp_title; ?></h3>
                        <p><?php echo $fp_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_pay_rent') {  ?>

                    <a class="signpost sp_pay_rent" href="<?php echo $pyr_link; ?>" aria-label=" <?php echo $pyr_title; ?>">
                        <h3><?php echo $pyr_title; ?></h3>
                        <p><?php echo $pyr_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_comm_properties') {  ?>

                    <a class="signpost sp_comm_properties" href="<?php echo $cp_link; ?>" aria-label=" <?php echo $cp_title; ?>">
                        <h3><?php echo $cp_title; ?></h3>
                        <p><?php echo $cp_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_my_trivallis') {  ?>

                    <a class="signpost sp_my_trivallis" href="<?php echo $mt_link; ?>" aria-label=" <?php echo $mt_title; ?>">
                        <h3><?php echo $mt_title; ?></h3>
                        <p><?php echo $mt_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_tenancy_agreement') {  ?>

                    <a class="signpost sp_tenancy_agreement" href="<?php echo $ta_link; ?>" aria-label="
                <?php echo $ta_title; ?>">
                        <h3><?php echo $ta_title; ?></h3>
                        <p><?php echo $ta_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_tenant_services') {  ?>

                    <a class="signpost sp_tenant_services" href="<?php echo $ts_link; ?>" aria-label=" <?php echo $ts_title; ?>">
                        <h3><?php echo $ts_title; ?></h3>
                        <p><?php echo $ts_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_contact_us') {  ?>

                    <a class="signpost sp_contact_us" href="<?php echo $cu_link; ?>" aria-label=" <?php echo $cu_title; ?>">
                        <h3><?php echo $cu_title; ?></h3>
                        <p><?php echo $cu_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_advice_guidance') {  ?>

                    <a class="signpost sp_advice_guidance" href="<?php echo $ag_link; ?>" aria-label=" <?php echo $ag_title; ?>">
                        <h3><?php echo $ag_title; ?></h3>
                        <p><?php echo $ag_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'sp_get_involved') {  ?>

                    <a class="signpost sp_get_involved" href="<?php echo $gi_link; ?>" aria-label=" <?php echo $gi_title; ?>">
                        <h3><?php echo $gi_title; ?></h3>
                        <p><?php echo $gi_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_home') == 'custom') {  ?>

                    <?php $link = get_field('link'); ?>
                    <?php $background_colour = get_field('background_colour'); ?>
                    <?php $signpost_title = get_field('signpost_title'); ?>
                    <?php $signpost_text_body = get_field('signpost_text_body'); ?>

                    <a class="signpost <?php echo $background_colour; ?>" href="<?php echo $link; ?>" aria-label="
                <?php echo $signpost_title; ?>">
                        <h3><?php echo $signpost_title; ?></h3>
                        <p><?php echo $signpost_text_body; ?></p>
                    </a>


                <?php } else {  ?>

                <?php } ?>

                <?php if (get_field('signpost_type_two_home') == 'sp_repair') { ?>
                    <a class="signpost sp_repair" href="<?php echo $rr_link; ?>" aria-label=" <?php echo $rr_title; ?>">
                        <h3><?php echo $rr_title; ?></h3>
                        <p><?php echo $rr_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_find_property') {  ?>

                    <a class="signpost sp_find_property" href="<?php echo $fp_link; ?>" aria-label=" <?php echo $fp_title; ?>">
                        <h3><?php echo $fp_title; ?></h3>
                        <p><?php echo $fp_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_pay_rent') {  ?>

                    <a class="signpost sp_pay_rent" href="<?php echo $pyr_link; ?>" aria-label=" <?php echo $pyr_title; ?>">
                        <h3><?php echo $pyr_title; ?></h3>
                        <p><?php echo $pyr_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_comm_properties') {  ?>

                    <a class="signpost sp_comm_properties" href="<?php echo $cp_link; ?>" aria-label=" <?php echo $cp_title; ?>">
                        <h3><?php echo $cp_title; ?></h3>
                        <p><?php echo $cp_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_my_trivallis') {  ?>

                    <a class="signpost sp_my_trivallis" href="<?php echo $mt_link; ?>" aria-label=" <?php echo $mt_title; ?>">
                        <h3><?php echo $mt_title; ?></h3>
                        <p><?php echo $mt_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_tenancy_agreement') {  ?>

                    <a class="signpost sp_tenancy_agreement" href="<?php echo $ta_link; ?>" aria-label="
                <?php echo $ta_title; ?>">
                        <h3><?php echo $ta_title; ?></h3>
                        <p><?php echo $ta_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_tenant_services') {  ?>

                    <a class="signpost sp_tenant_services" href="<?php echo $ts_link; ?>" aria-label=" <?php echo $ts_title; ?>">
                        <h3><?php echo $ts_title; ?></h3>
                        <p><?php echo $ts_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_contact_us') {  ?>

                    <a class="signpost sp_contact_us" href="<?php echo $cu_link; ?>" aria-label=" <?php echo $cu_title; ?>">
                        <h3><?php echo $cu_title; ?></h3>
                        <p><?php echo $cu_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_advice_guidance') {  ?>

                    <a class="signpost sp_advice_guidance" href="<?php echo $ag_link; ?>" aria-label=" <?php echo $ag_title; ?>">
                        <h3><?php echo $ag_title; ?></h3>
                        <p><?php echo $ag_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'sp_get_involved') {  ?>

                    <a class="signpost sp_get_involved" href="<?php echo $gi_link; ?>" aria-label=" <?php echo $gi_title; ?>">
                        <h3><?php echo $gi_title; ?></h3>
                        <p><?php echo $gi_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_two_home') == 'custom') {  ?>

                    <?php $link_two = get_field('link_two'); ?>
                    <?php $background_colour_two = get_field('background_colour_two'); ?>
                    <?php $signpost_title_two = get_field('signpost_title_two'); ?>
                    <?php $signpost_text_body_two = get_field('signpost_text_body_two'); ?>

                    <a class="signpost <?php echo $background_colour_two; ?>" href="<?php echo $link_two; ?>" aria-label="
                <?php echo $signpost_title_two; ?>">
                        <h3><?php echo $signpost_title_two; ?></h3>
                        <p><?php echo $signpost_text_body_two; ?></p>
                    </a>


                <?php } else {  ?>

                <?php } ?>



                <?php if (get_field('signpost_type_three_home') == 'sp_repair') { ?>
                    <a class="signpost sp_repair" href="<?php echo $rr_link; ?>" aria-label=" <?php echo $rr_title; ?>">
                        <h3><?php echo $rr_title; ?></h3>
                        <p><?php echo $rr_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_find_property') {  ?>

                    <a class="signpost sp_find_property" href="<?php echo $fp_link; ?>" aria-label=" <?php echo $fp_title; ?>">
                        <h3><?php echo $fp_title; ?></h3>
                        <p><?php echo $fp_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_pay_rent') {  ?>

                    <a class="signpost sp_pay_rent" href="<?php echo $pyr_link; ?>" aria-label=" <?php echo $pyr_title; ?>">
                        <h3><?php echo $pyr_title; ?></h3>
                        <p><?php echo $pyr_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_comm_properties') {  ?>

                    <a class="signpost sp_comm_properties" href="<?php echo $cp_link; ?>" aria-label=" <?php echo $cp_title; ?>">
                        <h3><?php echo $cp_title; ?></h3>
                        <p><?php echo $cp_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_my_trivallis') {  ?>

                    <a class="signpost sp_my_trivallis" href="<?php echo $mt_link; ?>" aria-label=" <?php echo $mt_title; ?>">
                        <h3><?php echo $mt_title; ?></h3>
                        <p><?php echo $mt_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_tenancy_agreement') {  ?>

                    <a class="signpost sp_tenancy_agreement" href="<?php echo $ta_link; ?>" aria-label="
                <?php echo $ta_title; ?>">
                        <h3><?php echo $ta_title; ?></h3>
                        <p><?php echo $ta_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_tenant_services') {  ?>

                    <a class="signpost sp_tenant_services" href="<?php echo $ts_link; ?>" aria-label=" <?php echo $ts_title; ?>">
                        <h3><?php echo $ts_title; ?></h3>
                        <p><?php echo $ts_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_contact_us') {  ?>

                    <a class="signpost sp_contact_us" href="<?php echo $cu_link; ?>" aria-label=" <?php echo $cu_title; ?>">
                        <h3><?php echo $cu_title; ?></h3>
                        <p><?php echo $cu_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_advice_guidance') {  ?>

                    <a class="signpost sp_advcie_guidance" href="<?php echo $ag_link; ?>" aria-label=" <?php echo $ag_title; ?>">
                        <h3><?php echo $ag_title; ?></h3>
                        <p><?php echo $ag_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'sp_get_involved') {  ?>

                    <a class="signpost sp_get_involved" href="<?php echo $gi_link; ?>" aria-label=" <?php echo $gi_title; ?>">
                        <h3><?php echo $gi_title; ?></h3>
                        <p><?php echo $gi_text; ?></p>
                    </a>

                <?php } elseif (get_field('signpost_type_three_home') == 'custom') {  ?>

                    <?php $link_three = get_field('link_three'); ?>
                    <?php $background_colour_three = get_field('background_colour_three'); ?>
                    <?php $signpost_title_three = get_field('signpost_title_three'); ?>
                    <?php $signpost_text_body_three = get_field('signpost_text_body_three'); ?>

                    <a class="signpost <?php echo $background_colour_three; ?>" href="<?php echo $link_three; ?>" aria-label="
                <?php echo $signpost_title_three; ?>">
                        <h3><?php echo $signpost_title_three; ?></h3>
                        <p><?php echo $signpost_text_body_three; ?></p>
                    </a>


                <?php } else {  ?>

                <?php } ?>

            </div>


        </div>
    </section>

<?php } else {  ?>

<?php } ?>