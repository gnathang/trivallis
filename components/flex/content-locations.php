<?php 

$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$intro_text = get_sub_field('intro_text');

?>

<section class="section_location_slider slider location_slider">
    <div class="location_slide slide_one">
        <div class="text_wrap">
            <h4 class="subtitle"><?php echo $subtitle; ?></h4>
            <h3><?php echo $title; ?></h3>
            <p><?php echo $intro_text; ?></p>
        </div>
    </div>
    <?php if(have_rows('locations')) : while(have_rows('locations')) : the_row(); ?>
    <?php $location_name = get_sub_field('location_name'); ?>
    <?php $location_image = get_sub_field('location_image'); ?>
    <?php $location_page_link = get_sub_field('location_page_link'); ?>
    <div class="location_slide">
        <div class="slide_bg" style="background-image: url('<?php echo $location_image; ?>');">
            <a class="link_wrap" href="<?php echo $location_page_link; ?>"
                aria-label="link to <?php echo $location_name; ?> neighbourhood page">
                <h4><?php echo $location_name; ?></h4>
                <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/slide-next-arrow.svg'; ?>"
                    alt="slide next arrow">
            </a>
        </div>
    </div>
    <?php endwhile; endif; ?>
</section>