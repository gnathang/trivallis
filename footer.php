</main>

<?php

$address = get_field('text', 'option');
$tel = get_field('tel', 'option');
$email = get_field('email', 'option');
$linkedin = get_field('linkedin', 'option');
$facebook = get_field('facebook', 'option');
$instagram = get_field('instagram', 'option');
$tiktok = get_field('tiktok', 'option');
$twitter = get_field('twitter', 'option');
$youtube = get_field('youtube', 'option');
$my_trivallis_link = get_field('my_trivallis_link', 'option');

$server_name = $_SERVER['SERVER_NAME'];

if (str_contains($server_name, 'cym.')) {
    $what_am_i = 'cym';
} else {
    $what_am_i = 'eng';
}
$what_am_i = trim($what_am_i);

?>

<?php // get_template_part('footer_nav'); 
?>

<footer>

    <div class="footer_top_banner">
        <div class="top_banner_inner container">
            <div class="checkboxes_wrap">
                <span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/tick-white.svg'; ?>" alt="">
                    <p><?php if ($what_am_i == 'cym') {
                            echo "Gwirio balans eich rhent";
                        } else {
                            echo "Check rent balance";
                        } ?></p>
                </span>
                <span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/tick-white.svg'; ?>" alt="">
                    <p><?php if ($what_am_i == 'cym') {
                            echo "Dilyn trywydd gwaith trwsio";
                        } else {
                            echo "Track repairs";
                        } ?></p>
                </span>
                <span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/tick-white.svg'; ?>" alt="">
                    <p><?php if ($what_am_i == 'cym') {
                            echo "Diweddaru eich manylion";
                        } else {
                            echo "Update your details";
                        } ?></p>
                </span>
                <span>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/tick-white.svg'; ?>" alt="">
                    <p><?php if ($what_am_i == 'cym') {
                            echo "Gofyn cwestiwn";
                        } else {
                            echo "Ask a question";
                        } ?></p>
                </span>
            </div>
            <div class="cta_wrap">
                <p><?php if ($what_am_i == 'cym') {
                        echo "Rheoli eich tenantiaeth Trivallis heddiw ar:";
                    } else {
                        echo "Manage your Trivallis tenancy today at:";
                    } ?></p>
                <a class="btn_my_triv_white" href="<?php echo $my_trivallis_link; ?>"><?php if ($what_am_i == 'cym') {
                                                                                            echo "Fy Trivallis i";
                                                                                        } else {
                                                                                            echo "My Trivallis";
                                                                                        } ?></a>
            </div>
        </div>
    </div>

    <div class="footer_main">
        <div class="container">
            <div class="footer_main_inner">
                <div class="logo_wrap">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/trivallis-logo.svg'; ?>"
                        alt="site logo">
                </div>

                <div class="back_to_top_wrap_top">
                    <p onclick="scrollToTop()">Back to top</p>
                    <div onclick="scrollToTop()">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/up-arrow-blue.svg'; ?>"
                            alt="back to top arrow">
                    </div>
                </div>

                <div class="socials_wrap">
                    <p class="btn_simple"><?php if ($what_am_i == 'cym') {
                                                echo "Dilynwch ni ar y cyfryngau cymdeithasol";
                                            } else {
                                                echo "Follow us on socials";
                                            } ?></p>
                    <div class="icons_wrap">
                        <a href="<?php echo $facebook; ?>"><img class="social_icon"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/facebook-icon.svg'; ?>"
                                alt="social link">
                        </a>
                        <a href="<?php echo $linkedin; ?>"><img class="social_icon"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/linkedin-icon.svg'; ?>"
                                alt="social link">
                        </a>
                        <a href="<?php echo $twitter; ?>"><img class="social_icon"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/x-icon.svg'; ?>"
                                alt="social link">
                        </a>
                        <a href="<?php echo $youtube; ?>"><img class="social_icon"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/youtube-icon.svg'; ?>"
                                alt="social link">
                        </a>
                        <a href="<?php echo $instagram; ?>"><img class="social_icon"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/instagram-icon.svg'; ?>"
                                alt="social link">
                        </a>
                        <a href="<?php echo $tiktok; ?>"><img class="social_icon"
                                src="<?php echo get_template_directory_uri() . '/assets/images/svg/tiktok-icon.svg'; ?>"
                                alt="social link">
                        </a>
                    </div>
                </div>

                <div class="contact_wrap">
                    <a class="btn_simple" href="/contact-us" aria-label="contact us link"><?php if ($what_am_i == 'cym') {
                                                                                                echo "Cysylltu â ni";
                                                                                            } else {
                                                                                                echo "Contact Us";
                                                                                            } ?></a>
                    <p><?php if ($what_am_i == 'cym') {
                            echo "Cyfeiriad Cofrestredig";
                        } else {
                            echo "Registered Address";
                        } ?></p>
                    <p class="address"><?php echo $address; ?></p>
                </div>

                <?php get_template_part('footer_nav'); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer_bottom">
            <div class="partners_wrap">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/welsh-gov-logo-landscape.svg'; ?>"
                    alt="welsh gov logo">
            </div>
            <div class="back_to_top_wrap_bottom">
                <div class="wrap_inner">
                    <p onclick="scrollToTop()"><?php if ($what_am_i == 'cym') {
                                                    echo "Yn ôl i'r Brig";
                                                } else {
                                                    echo "Back to top";
                                                } ?></a>
                    <p onclick="scrollToTop()">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/up-arrow-blue.svg'; ?>"
                            alt="back to top arrow">
                        </a>
                </div>
            </div>
            <div class="legal_wrap">
                <p class="trivallis_copyright">&copy;<?php bloginfo('name'); ?> <?php echo date("Y"); ?></p>
                <a class="website_by_dd" href="https://designdough.co.uk" target="_blank">Website by designdough</a>
                <div class="policies">
                    <a href="/privacy-policy"><?php if ($what_am_i == 'cym') {
                                                    echo "Polisi Preifatrwydd";
                                                } else {
                                                    echo "Privacy Policy";
                                                } ?></a>
                    <a href="/social-media-policy"><?php if ($what_am_i == 'cym') {
                                                        echo "Polisi Cyfryngau Cymdeithasol";
                                                    } else {
                                                        echo "Social Media Policy";
                                                    } ?></a>
                    <a href="/welsh-language-policy"><?php if ($what_am_i == 'cym') {
                                                            echo "Polisi Iaith Gymraeg";
                                                        } else {
                                                            echo "Welsh Language Policy";
                                                        } ?></a>
                    <a href="/accessibility"><?php if ($what_am_i == 'cym') {
                                                    echo "Hygyrchedd";
                                                } else {
                                                    echo "Accessibility";
                                                } ?></a>
                    <a href="/complaints-process"><?php if ($what_am_i == 'cym') {
                                                        echo "Proses Gwyno";
                                                    } else {
                                                        echo "Complaints Process";
                                                    } ?></a>
                </div>
            </div>

        </div>
    </div>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/froogaloop.js" type="text/javascript"
    charset="utf-8"></script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/slick.js" type="text/javascript"
    charset="utf-8"></script>

<script src="<?php get_site_url(); ?>/wp-content/themes/designdough/assets/js/script.js" type="text/javascript"
    charset="utf-8"></script>

<?php wp_footer(); ?>

</body>

</html>