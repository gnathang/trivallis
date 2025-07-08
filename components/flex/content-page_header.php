<?php 

$title_top = get_sub_field('title_top');
$title_bottom = get_sub_field('title_bottom');
$intro_text = get_sub_field('intro_text');

?>

<section class="section_page_header">

    <!-- graphics -->
    <svg class="bg_graphic circle_teal" width="763" height="758" viewBox="0 0 763 758" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M763 379C763 588.316 592.197 758 381.5 758C170.803 758 0 588.316 0 379C0 169.684 170.803 0 381.5 0C592.197 0 763 169.684 763 379Z"
            fill="#8ECECA" />
    </svg>
    <svg class="bg_graphic circle_magenta" width="159" height="158" viewBox="0 0 159 158" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="79.5" cy="79" rx="79.5" ry="79" fill="#CC4270" />
    </svg>
    <svg class="bg_graphic circle_blue" width="547" height="555" viewBox="0 0 547 555" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="273.5" cy="277.5" rx="273.5" ry="277.5" fill="#0078CE" />
    </svg>



    <div class="container">
        <div class="header_title_wrap">
            <h1><?php echo $title_top; ?></h1>
            <h2><?php echo $title_bottom; ?></h2>
            <p><?php echo $intro_text; ?></p>
        </div>
        <div class="buttons_wrap">
            <?php if(have_rows('buttons')) : while(have_rows('buttons')) : the_row(); ?>
            <?php $link = get_sub_field('link'); ?>
            <?php $button_type = get_sub_field('button_type'); ?>

            <?php
                if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="<?php echo $button_type; ?>" href="<?php echo $link_url; ?>"
                aria-label="link to <?php echo $title; ?> page"><?php echo $link_title; ?></a>
            <?php endif; ?>

            <?php endwhile; endif; ?>
        </div>
        <div class="signposts_wrap">
            <?php if(have_rows('signposts')) : while(have_rows('signposts')) : the_row(); ?>
            <?php $link = get_sub_field('link'); ?>
            <?php $signpost_type = get_sub_field('signpost_type'); ?>
            <?php $signpost_title = get_sub_field('signpost_title'); ?>
            <?php $signpost_text_body = get_sub_field('signpost_text_body'); ?>

            <a class="signpost <?php echo $signpost_type; ?>" href="<?php echo $link; ?> aria-label="
                <?php echo $signpost_title; ?>">
                <h4><?php echo $signpost_title; ?></h4>
                <p><?php echo $signpost_text_body; ?></p>
            </a>

            <?php endwhile; endif; ?>
        </div>
    </div>
</section>