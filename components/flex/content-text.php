<?php $content = get_sub_field('content'); ?>
<?php $colour_theme = get_sub_field('colour_theme'); ?>

<section class="section_text <?php echo $colour_theme; ?>">
    <div class="container">

        <div class="text_wrap">
            <?php echo $content; ?>
        </div>

        <?php if(have_rows('buttons')) : ?>
        <div class="buttons_wrap">
            <?php  while(have_rows('buttons')) : the_row(); ?>
            <?php $link = get_sub_field('link'); ?>
            <?php $button_type = get_sub_field('button_type'); ?>

            <?php
                if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn <?php echo $button_type; ?>" href="<?php echo $link_url; ?>"
                aria-label="link to <?php echo $title; ?> page"><?php echo $link_title; ?></a>
            <?php endif; ?>

            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>