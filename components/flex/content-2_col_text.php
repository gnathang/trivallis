<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$colcheck = get_sub_field('column_check');
$colcount = get_sub_field('col_count');
$coltext = get_sub_field('col_text_area');
$collink = get_sub_field('col_link');
$leftcol = get_sub_field('left_column');
$leftlink = get_sub_field('left_col_link');
$rightcol = get_sub_field('right_column');
$rightlink = get_sub_field('right_col_link');



// end
?>



<section class="full_width two-text-col row-<?php echo $row; ?>">

    <div class="container">

        <?php if($title) {?><h2 class=""><?php echo $title; ?></h2><?php }?>
        <?php if($subtitle) {?><h4 class=""><?php echo $subtitle; ?></h4><?php }?>


        <?php if ($colcheck){?>

        <div class="one_half left">

            <?php if($leftcol) {?><?php echo $leftcol; ?><?php }?>
            <?php if($leftlink) {?><a href="<?php echo $leftlink['url'] ?>" class="btn_default"
                target="<?php echo $leftlink['target'] ? $leftlink['target'] : '_self'; ?>"><?php echo $leftlink['title']; ?></a><?php }?>

        </div>

        <div class="one_half left last">

            <?php if($rightcol) {?><?php echo $rightcol; ?><?php }?>
            <?php if($rightlink) {?><a href="<?php echo $rightlink['url'] ?>" class="btn_default"
                target="<?php echo $rightlink['target'] ? $rightlink['target'] : '_self'; ?>"><?php echo $rightlink['title']; ?></a><?php }?>

        </div>

        <div class="clear"></div>

        <?php } else { ?>

        <div class="auto_content <?php echo $colcount; ?>">

            <?php if($coltext) {?><?php echo $coltext; ?><?php }?>

        </div>

        <?php if($collink) {?><a href="<?php echo $collink['url'] ?>" class="btn_default"
            target="<?php echo $collink['target'] ? $collink['target'] : '_self'; ?>"><?php echo $collink['title']; ?></a><?php }?>


        <?php } ?>

    </div>
</section>