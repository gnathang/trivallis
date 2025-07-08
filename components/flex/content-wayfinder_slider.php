<section class="section_wayfinder_slider">

    <svg class="bg_graphic circle_mid_blue" width="687" height="703" viewBox="0 0 687 703" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="343.014" cy="351.5" rx="343.014" ry="351.5" fill="#52A3DE" />
    </svg>

    <svg class="bg_graphic circle_pale_blue" width="421" height="432" viewBox="0 0 421 432" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="210.5" cy="216" rx="210.5" ry="216" fill="#A3CEED" />
    </svg>

    <div class="container">
        <div class="wayfinder_slider slider single_slide">
            <?php if(have_rows('page_slides')) : while(have_rows('page_slides')) : the_row(); ?>
            <?php $post_object = get_sub_field('page'); ?>
            <?php if( $post_object ): ?>
            <?php $post = $post_object; ?>
            <div class="slide_wrap">
                <div class="slide_grid">
                    <div class="text_wrap">
                        <div class="text_wrap_inner">
                            <p class="subtitle"><?php echo get_the_title($post); ?></p>
                            <h2><?php echo get_the_title($post); ?></h2>
                            <p><?php // echo get_the_excerpt($post); ?></p>
                            <a href="<?php echo get_permalink($post); ?>"
                                aria-label="link to <?php echo get_the_title($post); ?> page">
                            </a>
                        </div>
                    </div>
                    <div class="image_wrap">
                        <?php echo get_the_post_thumbnail($post); ?>
                    </div>
                </div>
            </div>

            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>