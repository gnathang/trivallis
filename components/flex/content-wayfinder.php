<?php
// $colour_theme = get_sub_field('colour_theme');
$intro_text = get_sub_field('intro_text');
$related_pages = get_sub_field('related_pages');

$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);


?>

<section class="section_wayfinder">

    <div class="container">
        <?php if ($related_pages) { ?>
            <h4 class="subtitle"><?php if ($what_am_i == 'cym') {
                                        echo "Tudalennau cysylltiedig";
                                    } else {
                                        echo "Related pages";
                                    } ?></h4>
        <?php } else { ?>
            <?php if ($intro_text) { ?> <div class="intro_text"><?php echo $intro_text; ?></div> <?php } ?>
        <?php } ?>


        <?php if (have_rows('wayfinder_grid')) : ?>
            <div class="wayfinder_grid">
                <?php while (have_rows('wayfinder_grid')) : the_row(); ?>
                    <?php $post_object = get_sub_field('page_link'); ?>
                    <?php if ($post_object) : ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata($post);
                        ?>
                        <a class="wayfinder_grid_cell" href="<?php the_permalink(); ?>" aria-label="link to <?php the_title(); ?> page">
                            <div class="image_wrap">
                                <?php echo get_the_post_thumbnail($post->ID, 'pageimage', array('class' => '')); ?>
                            </div>
                            <div class="text_wrap">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_field('header_text', $post->ID); ?></p>
                            </div>
                        </a>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                        ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>