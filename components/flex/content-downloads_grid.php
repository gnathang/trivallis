<?php
    $intro_text = get_sub_field('intro_text');
?>

<section class="section_downloads">
    <div class="container">

        <?php if($intro_text) { ?> <div class="intro_text"><?php echo $intro_text; ?></div> <?php } ?>

        <?php if(have_rows('downloads_grid')) : ?>
        <div class="downloads_grid">
            <?php while(have_rows('downloads_grid')) : the_row(); ?>
            <?php $title = get_sub_field('download_title'); ?>
            <?php $file = get_sub_field('download_file'); ?>
            <?php $summary = get_sub_field('download_summary'); ?>
            <a download class="download_grid_cell" href="<?php echo $file; ?>"
                aria-label="download <?php echo $title; ?>">
                <div class="text_wrap">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $summary; ?></p>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

    </div>
</section>