<?php $colour_theme = get_sub_field('colour_theme'); ?>

<!-- pink bg #FAE9FF
green #D6EDEC
yellow #FCE3AD
blue #52A3DE
 -->

<section class="section_text_image_slider <?php echo $colour_theme; ?>">

    <svg class="bg_graphic circle_mid_blue" width="687" height="703" viewBox="0 0 687 703" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="343.014" cy="351.5" rx="343.014" ry="351.5"
            fill="<?php if ($colour_theme == 'bg_green') { ?> #618C89<?php } elseif ($colour_theme == 'bg_pink') { ?> #DBC4E1<?php } elseif ($colour_theme == 'bg_yellow') { ?> #A77912<?php } else { ?> #52A3DE<?php } ?>" />
    </svg>

    <svg class="bg_graphic circle_pale_blue" width="421" height="432" viewBox="0 0 421 432" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="210.5" cy="216" rx="210.5" ry="216"
            fill="<?php if ($colour_theme == 'bg_green') { ?> #B2DEDB<?php } elseif ($colour_theme == 'bg_pink') { ?> #9A5CAD<?php } elseif ($colour_theme == 'bg_yellow') { ?> #F9CB63<?php } else { ?> #A3CEED<?php } ?>" />
    </svg>


    <div class="container">
        <div class="wayfinder_slider slider single_slide">
            <?php if(have_rows('page_slides')) : while(have_rows('page_slides')) : the_row(); ?>

            <?php $subtitle = get_sub_field('subtitle'); ?>
            <?php $title = get_sub_field('title'); ?>
            <?php $make_title_smaller = get_sub_field('make_title_smaller'); ?>
            <?php $body_text = get_sub_field('body_text'); ?>
            <?php $image = get_sub_field('image'); ?>
            <?php $link = get_sub_field('link'); ?>
            <?php $reverse_text_image = get_sub_field('reverse_text_image'); ?>

            <div class="slide_wrap">
                <div class="slide_grid">
                    <div class="text_wrap <?php if ($reverse_text_image) { ?> reverse_text_image<?php } ?>">
                        <div class="text_wrap_inner">
                            <h4 class="subtitle"><?php echo $subtitle; ?></h4>
                            <?php if($make_title_smaller) { ?>
                            <h3><?php echo $title; ?></h3>
                            <?php } else { ?>
                            <h2><?php echo $title; ?></h2>
                            <?php } ?>
                            <p><?php echo $body_text; ?></p>

                            <?php
                            if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn" href="<?php echo $link_url; ?>"
                                aria-label="link to <?php echo $title; ?> page"><?php echo $link_title; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="image_wrap">
                        <img src="<?php echo $image; ?>" alt="page image">
                    </div>
                </div>
            </div>

            <?php wp_reset_postdata(); ?>
            <?php endwhile; endif;?>
        </div>
    </div>
</section>