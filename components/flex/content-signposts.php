<?php 
    $subtitle = get_sub_field('subtitle');
    $title = get_sub_field('title');
?>


<!-- *** this flex is now obsolete *** -->
<section class="section_signposts">
    <div class="container">

        <div class="title_wrap">
            <h5 class="subtitle"><?php echo $subtitle; ?></h5>
            <h3 class="title"><?php echo $title; ?></h3>
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