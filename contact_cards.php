<?php 

 $address = get_field('text', 'option');
 $tel = get_field('tel', 'option');
 $email = get_field('email', 'option');
 $linkedin = get_field('linkedin', 'option');
 $instagram = get_field('instagram', 'option');
 $twitter = get_field('twitter', 'option');

?>


<section class="section_contact_cards">

    <div class="container">
        <?php if(have_rows('contact_cards')) : ?>
        <div class="grid">
            <?php while(have_rows('contact_cards')) : the_row(); ?>
            <?php $card_title = get_sub_field('card_title'); ?>
            <?php $image = get_sub_field('image'); ?>
            <?php $add_email = get_sub_field('add_email'); ?>
            <?php $add_phone = get_sub_field('add_phone'); ?>
            <?php $add_other_email = get_sub_field('add_other_email'); ?>
            <?php $add_other_phone = get_sub_field('add_other_phone'); ?>
            <?php $add_web_address = get_sub_field('add_web_address'); ?>

            <div class="grid_cell">
                <div class="image_wrap">
                    <?php $bannerArgs = array(
                            'class' => '' ,
                            'id' => $image,
                            'lazyload' => false
                        );
                        
                    echo build_srcset('banner', $bannerArgs); ?>
                </div>
                <div class="text_wrap">
                    <h3><?php echo $card_title?></h3>

                    <?php if($add_email) { ?>
                    <div class="wrap">
                        <p>Email:&nbsp;</p>
                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </div>
                    <?php } ?>

                    <?php if($add_phone) { ?>
                    <div class="wrap">
                        <p>Phone:&nbsp;</p>
                        <a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a>
                    </div>
                    <?php } ?>

                    <?php if($add_other_email) { ?>
                    <div class="wrap">
                        <p>Email:&nbsp;</p>
                        <a href="<?php echo $add_other_email; ?>"><?php echo $add_other_email; ?></a>
                    </div>
                    <?php } ?>

                    <?php if($add_other_phone) { ?>
                    <div class="wrap">
                        <p>Phone:&nbsp;</p>
                        <a href="tel:<?php echo $add_other_phone; ?>"></a>
                    </div>
                    <?php } ?>

                    <?php if($add_web_address) { ?>
                    <div class="wrap">
                        <p>Visit:&nbsp;</p>
                        <a href="<?php echo $add_web_address['url'] ?>"
                            target="<?php echo $add_web_address['target'] ? $add_web_address['target'] : '_self'; ?>">
                            <?php echo $add_web_address['title']; ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <?php endwhile; ?>
        </div>
        <?php endif; ?>

    </div>
</section>