<section class="section_location_slider">
    <div class="location_slide slide_one">
        <h5>Your neighbourhood</h5>
        <h3>Learn more about your neighbourhood</h3>
        <p>Lorem ipsum dolor sit amet consectetur. Viverra tempor molestie fames lectus ultrices aliquet volutpa.</p>
    </div>
    <?php if(have_rows('locations')) : while(have_rows('locations')) : the_row(); ?>
    <?php $location_name = get_sub_field('location_name'); ?>
    <?php $location_image = get_sub_field('location_image'); ?>
    <div class="location_slide">
        <div class="link_wrap" style="background-image: url('<?php echo $location_image?>');">
            <h4><?php echo $location_name; ?></h4>
            <img src="<?php echo get_template_directory_uri() . 'assets/images/svg/slide-next-arrow.svg'; ?>"
                alt="slide next arrow">
        </div>
    </div>
    <?php endwhile: endif; ?>
</section>