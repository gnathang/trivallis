<?php if( have_rows('footer_menu', 'option') ): ?>

<?php while( have_rows('footer_menu', 'option') ): the_row(); ?>
<?php $mainlink = get_sub_field('menu_top_level_link', 'option'); ?>
<?php if( $mainlink ): 
                $mainlink_url = $mainlink['url'];
                $mainlink_title = $mainlink['title'];
                $mainlink_target = $mainlink['target'] ? $mainlink['target'] : '_self';
            ?>

<li id="nav_<?php echo get_row_index(); ?>"
    class="footer_nav_top_level <?php if (have_rows('dropdown', 'option')) { ?>footer_dropdown<?php } ?>"><a
        class="btn_simple" href="<?php echo esc_url( $mainlink_url ); ?>"
        target="<?php echo esc_attr( $mainlink_target ); ?>"><?php echo esc_html( $mainlink_title ); ?></a>
    <?php if (have_rows('dropdown_menu_items', 'option')): ?>
    <ul class="drop_list">

        <?php while( have_rows('dropdown_menu_items', 'option') ): the_row(); ?>
        <?php $sub_menu_link = get_sub_field('sub_menu_link', 'option');
                                            if( $sub_menu_link ): 
                                                $sub_menu_link_url = $sub_menu_link['url'];
                                                $sub_menu_link_title = $sub_menu_link['title'];
                                                $sub_menu_link_target = $sub_menu_link['target'] ? $sub_menu_link['target'] : '_self';
                                        ?>
        <li>
            <a class="btn_arrow" href="<?php echo esc_url( $sub_menu_link_url ); ?>"
                target="<?php echo esc_attr( $sub_menu_link_target ); ?>"><?php echo esc_html( $sub_menu_link_title ); ?></a>
        </li>

        <?php endif; ?>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</li>

<?php endif; ?>
<?php endwhile; ?>

<?php endif; ?>