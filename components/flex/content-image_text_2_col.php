<?php
$row = get_row_index() - 0;

$title = get_sub_field('title');
$subtitle = get_sub_field('sub_title');
$content = get_sub_field('text_area');
$link = get_sub_field('link');
$image = get_sub_field('image');
$reverse = get_sub_field('reverse_image_and_text');
$make_image_square = get_sub_field('make_image_square');

// end
?>



<section class="full_width image-text-col row-<?php echo $row; ?>">
    <div class="container">

        <div class="wrap_<?php if ($reverse){?>image_right<?php } else { ?>image_left<?php } ?> ">
            <div class="content">
                <?php if($make_image_square) { ?>
                <div class="one_half image">
                    <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $image,
                            'lazyload' => false
                        );
                        
                    echo build_srcset('square', $bannerArgs); ?>
                </div>
                <?php } else { ?>
                <div class="one_half image">
                    <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $image,
                            'lazyload' => false
                        );
                        
                    echo build_srcset('banner', $bannerArgs); ?>
                </div>
                <?php } ?>

                <div class="one_half text">
                    <?php if($subtitle) {?><h4 class="subtitle"><?php echo $subtitle; ?></h4><?php }?>
                    <?php if($title) {?><h3 class=""><?php echo $title; ?></h3><?php }?>
                    <?php if($content) {?><p><?php echo $content; ?><?php }?></p>
                    <?php if($link) {?><a href="<?php echo $link['url'] ?>" class="btn_blue"
                        target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link['title']; ?></a><?php } ?>
                </div>
            </div>
        </div>

    </div>
</section>