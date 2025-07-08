<?php 
$row = get_row_index() - 0;

$image = get_sub_field('image');
?>


<section class="section_image row-<?php echo $row; ?>">
    <div class="container">
        <div class="image_wrapper">
            <?php 
            $bannerOne = array(
                'class' => '',
                'id' => $image,
                'lazyload' => false
            );

            // Get the URL and dimensions of the full-size image
            $image_data = wp_get_attachment_image_src($image, 'full');
            $image_url = $image_data[0];
            $image_width = $image_data[1];
            $image_height = $image_data[2];

            // Output the image with original dimensions in srcset
            echo '<img src="' . $image_url . '" srcset="' . $image_url . ' ' . $image_width . 'w, ' . $image_url . ' ' . $image_height . 'h" alt="">'; 
            ?>

        </div>
    </div>
    </div>
</section>