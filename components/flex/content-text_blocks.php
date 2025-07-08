<?php 

    $intro_text = get_sub_field('intro_text');
    $text_block_type = get_sub_field('text_block_type');

?>

<section class="section_text_blocks">
    <div class="container">

        <div class="intro_text_block">
            <?php echo $intro_text; ?>
        </div>

        <?php if(have_rows('text_blocks')) : ?>

        <div class="text_block_wrap <?php echo $text_block_type; ?>">
            <?php while(have_rows('text_blocks')) : the_row(); ?>
            <?php $block_title = get_sub_field('block_title'); ?>
            <?php $text_body = get_sub_field('text_body'); ?>
            <?php $add_numbers = get_sub_field('add_numbers'); ?>

            <div class="text_block <?php if($add_numbers) { echo get_row_index(); } ?>">
                <div class="title_wrap">
                    <?php if($add_numbers) { ?>
                    <h3><?php echo get_row_index(); ?>.</h3>
                    <?php } elseif($logo) { ?><img src="<?php echo $logo; ?>" alt="text box logo"><?php } ?>
                    <h3><?php echo $block_title; ?></h3>
                </div>
                <div>
                    <p><?php echo $text_body; ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

    </div>
</section>