<?php
$row = get_row_index() - 0;

$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$image = get_sub_field('image');

$form = get_sub_field('form_select');
$contact = get_sub_field('contact_form_shortcode');
$job_alerts = get_sub_field('job_alerts_form_shortcode');
$feedback = get_sub_field('feedback_form_shortcode');



// end
?>



<section class="full_width section_form row-<?php echo $row; ?>">
    <div class="container">

        <div class="content <?php if($form == 'job_alerts') { ?> job_alerts_form<?php } ?>">

            <div class="image_wrap">
                <div class="image">
                    <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $image,
                            'lazyload' => false
                        );
                        
                    echo build_srcset('portrait', $bannerArgs); ?>
                </div>
            </div>

            <div class="last form_wrap <?php if($form == 'job_alerts_form') { ?> job_alerts_form<?php } ?>">
                <div class="text_area">
                    <?php if($subtitle) {?><h4 class="subtitle"><?php echo $subtitle; ?></h4><?php }?>
                    <?php if($title) {?><h3 class=""><?php echo $title; ?></h3><?php }?>
                </div>
                <div class="form">
                    <?php if ($form == 'job_alerts') {?>
                    <?php echo do_shortcode("$job_alerts"); ?>
                    <?php } elseif ($form == 'contact_form') { ?>
                    <?php echo do_shortcode("$contact"); ?>
                    <?php } elseif ($form == 'feedback_form') { ?>
                    <?php echo do_shortcode("$feedback"); ?>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>
</section>