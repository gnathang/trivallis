<?php 
/**
 * Template Name: Flex Page
*/
?>

<?php get_header(); ?>

<?php get_template_part('selectheader'); ?>

<?php
    // Get the current page URL
    $current_url = $_SERVER['REQUEST_URI'];
    // Check if the current page URL contains the word "contact"
    if (strpos($current_url, 'contact') !== false) {
        get_template_part('contact_cards');
    }
?>

<?php $pass_masterPost = get_post();
if ( post_password_required(  $pass_masterPost->ID ) ) { ?>
<div class="full_width">
    <div class="container">

        <?php echo get_the_password_form(); 
		    echo '<p>THIS POST IS PASSWORD PROTECTED: PLEASE ENTER IT!</p>'; ?>

    </div>
</div>
<?php } else { ?>

<?php if ( get_the_content() ) { ?>
<div class="full_width">
    <div class="container">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
</div>
<?php } else { ?>

<?php get_template_part('components/flex/content'); ?>

<?php } ?>

<?php } ?>

<?php get_template_part('signposts'); ?>

<?php get_footer(); ?>