<?php 
    $subtitle_sp = get_field('subtitle');
    $title_sp = get_field('title');

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

    $news_title = get_field('news_title', 'option');
    $news_text = get_field('news_text', 'option');
    $news_link = get_field('news_link', 'option');

?>

<section class="section_signposts">
    <div class="container">

        <div class="title_wrap">
            <?php if($subtitle_sp) { ?><h4 class="subtitle"><?php echo $subtitle_sp; ?></h4><?php } ?>
            <?php if($title_sp) { ?><h3 class="title"><?php echo $title_sp; ?></h3><?php } ?>
        </div>

        <div class="signposts_wrap">

            <?php if( get_field('signpost_type') == 'sp_repair' ) { ?>

            <a class="signpost sp_repair" href="<?php echo $rr_link; ?>" aria-label=" <?php echo $rr_title; ?>">
                <h3><?php echo $rr_title; ?></h3>
                <p><?php echo $rr_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_find_property' ) {  ?>

            <a class="signpost sp_find_property" href="<?php echo $fp_link; ?>" aria-label=" <?php echo $fp_title; ?>">
                <h3><?php echo $fp_title; ?></h3>
                <p><?php echo $fp_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_pay_rent' ) {  ?>

            <a class="signpost sp_pay_rent" href="<?php echo $pyr_link; ?>" aria-label=" <?php echo $pyr_title; ?>">
                <h3><?php echo $pyr_title; ?></h3>
                <p><?php echo $pyr_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_comm_properties' ) {  ?>

            <a class="signpost sp_comm_properties" href="<?php echo $cp_link; ?>"
                aria-label=" <?php echo $cp_title; ?>">
                <h3><?php echo $cp_title; ?></h3>
                <p><?php echo $cp_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_my_trivallis' ) {  ?>

            <a class="signpost sp_my_trivallis" href="<?php echo $mt_link; ?>" aria-label=" <?php echo $mt_title; ?>">
                <h3><?php echo $mt_title; ?></h3>
                <p><?php echo $mt_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_tenancy_agreement' ) {  ?>

            <a class="signpost sp_tenancy_agreement" href="<?php echo $ta_link; ?>" aria-label="
                <?php echo $ta_title; ?>">
                <h3><?php echo $ta_title; ?></h3>
                <p><?php echo $ta_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_tenant_services' ) {  ?>

            <a class="signpost sp_tenant_services" href="<?php echo $ts_link; ?>"
                aria-label=" <?php echo $ts_title; ?>">
                <h3><?php echo $ts_title; ?></h3>
                <p><?php echo $ts_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_contact_us' ) {  ?>

            <a class="signpost sp_contact_us" href="<?php echo $cu_link; ?>" aria-label=" <?php echo $cu_title; ?>">
                <h3><?php echo $cu_title; ?></h3>
                <p><?php echo $cu_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_advice_guidance' ) {  ?>

            <a class="signpost sp_advice_guidance" href="<?php echo $ag_link; ?>"
                aria-label=" <?php echo $ag_title; ?>">
                <h3><?php echo $ag_title; ?></h3>
                <p><?php echo $ag_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_get_involved' ) {  ?>

            <a class="signpost sp_get_involved" href="<?php echo $gi_link; ?>" aria-label=" <?php echo $gi_title; ?>">
                <h3><?php echo $gi_title; ?></h3>
                <p><?php echo $gi_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'sp_news' ) {  ?>

            <a class="signpost sp_news" href="<?php echo $news_link; ?>" aria-label=" <?php echo $news_title; ?>">
                <h3><?php echo $news_title; ?></h3>
                <p><?php echo $news_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type') == 'custom' ) {  ?>

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

            <?php if( get_field('signpost_type_two') == 'sp_repair' ) { ?>
            <a class="signpost sp_repair" href="<?php echo $rr_link; ?>" aria-label=" <?php echo $rr_title; ?>">
                <h3><?php echo $rr_title; ?></h3>
                <p><?php echo $rr_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_find_property' ) {  ?>

            <a class="signpost sp_find_property" href="<?php echo $fp_link; ?>" aria-label=" <?php echo $fp_title; ?>">
                <h3><?php echo $fp_title; ?></h3>
                <p><?php echo $fp_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_pay_rent' ) {  ?>

            <a class="signpost sp_pay_rent" href="<?php echo $pyr_link; ?>" aria-label=" <?php echo $pyr_title; ?>">
                <h3><?php echo $pyr_title; ?></h3>
                <p><?php echo $pyr_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_comm_properties' ) {  ?>

            <a class="signpost sp_comm_properties" href="<?php echo $cp_link; ?>"
                aria-label=" <?php echo $cp_title; ?>">
                <h3><?php echo $cp_title; ?></h3>
                <p><?php echo $cp_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_my_trivallis' ) {  ?>

            <a class="signpost sp_my_trivallis" href="<?php echo $mt_link; ?>" aria-label=" <?php echo $mt_title; ?>">
                <h3><?php echo $mt_title; ?></h3>
                <p><?php echo $mt_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_tenancy_agreement' ) {  ?>

            <a class="signpost sp_tenancy_agreement" href="<?php echo $ta_link; ?>" aria-label="
                <?php echo $ta_title; ?>">
                <h3><?php echo $ta_title; ?></h3>
                <p><?php echo $ta_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_tenant_services' ) {  ?>

            <a class="signpost sp_tenant_services" href="<?php echo $ts_link; ?>"
                aria-label=" <?php echo $ts_title; ?>">
                <h3><?php echo $ts_title; ?></h3>
                <p><?php echo $ts_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_contact_us' ) {  ?>

            <a class="signpost sp_contact_us" href="<?php echo $cu_link; ?>" aria-label=" <?php echo $cu_title; ?>">
                <h3><?php echo $cu_title; ?></h3>
                <p><?php echo $cu_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_advice_guidance' ) {  ?>

            <a class="signpost sp_advice_guidance" href="<?php echo $ag_link; ?>"
                aria-label=" <?php echo $ag_title; ?>">
                <h3><?php echo $ag_title; ?></h3>
                <p><?php echo $ag_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_get_involved' ) {  ?>

            <a class="signpost sp_get_involved" href="<?php echo $gi_link; ?>" aria-label=" <?php echo $gi_title; ?>">
                <h3><?php echo $gi_title; ?></h3>
                <p><?php echo $gi_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'sp_news' ) {  ?>

            <a class="signpost sp_news" href="<?php echo $news_link; ?>" aria-label=" <?php echo $news_title; ?>">
                <h3><?php echo $news_title; ?></h3>
                <p><?php echo $news_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_two') == 'custom' ) {  ?>

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



            <?php if( get_field('signpost_type_three') == 'sp_repair' ) { ?>
            <a class="signpost sp_repair" href="<?php echo $rr_link; ?>" aria-label=" <?php echo $rr_title; ?>">
                <h3><?php echo $rr_title; ?></h3>
                <p><?php echo $rr_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_find_property' ) {  ?>

            <a class="signpost sp_find_property" href="<?php echo $fp_link; ?>" aria-label=" <?php echo $fp_title; ?>">
                <h3><?php echo $fp_title; ?></h3>
                <p><?php echo $fp_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_pay_rent' ) {  ?>

            <a class="signpost sp_pay_rent" href="<?php echo $pyr_link; ?>" aria-label=" <?php echo $pyr_title; ?>">
                <h3><?php echo $pyr_title; ?></h3>
                <p><?php echo $pyr_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_comm_properties' ) {  ?>

            <a class="signpost sp_comm_properties" href="<?php echo $cp_link; ?>"
                aria-label=" <?php echo $cp_title; ?>">
                <h3><?php echo $cp_title; ?></h3>
                <p><?php echo $cp_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_my_trivallis' ) {  ?>

            <a class="signpost sp_my_trivallis" href="<?php echo $mt_link; ?>" aria-label=" <?php echo $mt_title; ?>">
                <h3><?php echo $mt_title; ?></h3>
                <p><?php echo $mt_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_tenancy_agreement' ) {  ?>

            <a class="signpost sp_tenancy_agreement" href="<?php echo $ta_link; ?>" aria-label="
                <?php echo $ta_title; ?>">
                <h3><?php echo $ta_title; ?></h3>
                <p><?php echo $ta_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_tenant_services' ) {  ?>

            <a class="signpost sp_tenant_services" href="<?php echo $ts_link; ?>"
                aria-label=" <?php echo $ts_title; ?>">
                <h3><?php echo $ts_title; ?></h3>
                <p><?php echo $ts_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_contact_us' ) {  ?>

            <a class="signpost sp_contact_us" href="<?php echo $cu_link; ?>" aria-label=" <?php echo $cu_title; ?>">
                <h3><?php echo $cu_title; ?></h3>
                <p><?php echo $cu_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_advice_guidance' ) {  ?>

            <a class="signpost sp_advice_guidance" href="<?php echo $ag_link; ?>"
                aria-label=" <?php echo $ag_title; ?>">
                <h3><?php echo $ag_title; ?></h3>
                <p><?php echo $ag_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_get_involved' ) {  ?>

            <a class="signpost sp_get_involved" href="<?php echo $gi_link; ?>" aria-label=" <?php echo $gi_title; ?>">
                <h3><?php echo $gi_title; ?></h3>
                <p><?php echo $gi_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'sp_news' ) {  ?>

            <a class="signpost sp_news" href="<?php echo $news_link; ?> aria-label=" <?php echo $news_title; ?>">
                <h3><?php echo $news_title; ?></h3>
                <p><?php echo $news_text; ?></p>
            </a>

            <?php } elseif( get_field('signpost_type_three') == 'custom' ) {  ?>

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