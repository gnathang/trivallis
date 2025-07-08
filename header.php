<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <title><?php

            if (defined('WPSEO_VERSION')) {
                wp_title('');
            } else {

                global $page, $paged;

                wp_title('|', true, 'right');

                bloginfo('name');

                $site_description = get_bloginfo('description', 'display');
                if ($site_description && (is_home() || is_front_page()))
                    echo " | $site_description";

                if ($paged >= 2 || $page >= 2)
                    echo ' | ' . sprintf(__('Page %s', 'skeleton'), max($paged, $page));
            }

            $server_name = $_SERVER['SERVER_NAME'];

            if (str_contains($server_name, 'cym.')) {
                $what_am_i = 'cym';
            } else {
                $what_am_i = 'eng';
            }
            $what_am_i = trim($what_am_i);

            ?>
    </title>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0078CE" />
    <meta name="theme-color" content="#0078CE" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#0078CE" media="(prefers-color-scheme: dark)">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri() ?>/assets/js/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri() ?>/assets/js/slick/slick/slick-theme.css" />

    <?php wp_head(); ?>

    <?php
    $url = explode('/', $_SERVER['REQUEST_URI']);
    $dir = $url[1] ? $url[1] : 'home';
    ?>

    <?php if (get_field('field_analytics', 'option')) { ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field('field_analytics', 'option') ?>">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', '<?php the_field('field_analytics', 'option') ?>');

            gtag('config', 'AW-677088283'); // Google Conversion tag

            <?php if ($post->ID == 16034) { ?>
                gtag('event', 'conversion', {
                    'send_to': 'AW-677088283/8APtCNj979IBEJuY7sIC'
                });
            <?php } ?>
        </script>
    <?php } ?>

    <!-- Meta Pixel Code -->

    <script>
        ! function(f, b, e, v, n, t, s)

        {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?

                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };

            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';

            n.queue = [];
            t = b.createElement(e);
            t.async = !0;

            t.src = v;
            s = b.getElementsByTagName(e)[0];

            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',

            'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '2297355367295316');

        fbq('track', 'PageView');
    </script>

    <noscript><img height="1" width="1" style="display:none"
            src=https://www.facebook.com/tr?id=2297355367295316&ev=PageView&noscript=1 /></noscript>

    <!-- End Meta Pixel Code -->

    <!-- Google Tag Manager -->

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-KMVDCMXL');
    </script>

    <!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?> id="<?php echo $dir ?>">

    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-KMVDCMXL height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->

    <div class="overlay"></div>

    <div id="#top" class="header_top">
        <div class="container">
            <div class="header_top_wrap">

                <div class="language-switch-container">
                    <a href="https://cym.trivallis.co.uk" class="<?php if ($what_am_i == 'cym') {
                                                                        echo "active";
                                                                    } ?>">CYM</a><span>|</span><a
                        href="https://trivallis.co.uk" class="<?php if ($what_am_i == 'eng') {
                                                                    echo "active";
                                                                } ?>">ENG</a>
                </div>

                <div class="links-container">
                    <?php if (have_rows('top_menu', 'option')) : ?>

                        <?php while (have_rows('top_menu', 'option')) : the_row(); ?>

                            <?php $top_link = get_sub_field('link', 'option'); ?>

                            <?php if ($top_link) :
                                $top_link_url = $top_link['url'];
                                $top_link_title = $top_link['title'];
                                $top_link_target = $top_link['target'] ? $top_link['target'] : '_self';
                            ?>

                                <a class="" href="<?php echo esc_url($top_link['url']); ?>"
                                    target="<?php echo esc_attr($top_link_target); ?>"><?php echo esc_html($top_link_title); ?></a>

                            <?php endif; ?>
                    <?php endwhile;
                    endif; ?>

                </div>


                <!-- <a href="/report-a-repair">Work with us</a>
                <a href="/contact-us">Feedback</a>
                <a href="/contact-us">Contact us</a> -->
            </div>
        </div>
    </div>


    <header class="testing_sftp-gabriel-11-04">

        <div class="header_main">
            <div class="container">
                <div class="header_main_wrap">

                    <!-- nav -->
                    <?php get_template_part('nav'); ?>

                    <!-- icon group -->
                    <div class="header_icon_group">
                        <a href="/search">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/search-icon.svg'; ?>"
                                alt="search icon">
                        </a>
                        <a class="recite_me_launch" href="#reciteme">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/accessibility-icon.svg'; ?>"
                                alt="accessibility icon">
                        </a>
                        <a class="multisite_icon" href="/cym">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/cymraeg-icon.svg'; ?>"
                                alt="cymraeg icon">
                        </a>
                    </div>
                    <!-- logo -->
                    <a class="logo_wrap" href="/">
                        <img class="logo"
                            src="<?php echo get_template_directory_uri() . '/assets/images/svg/trivallis-logo.svg'; ?>"
                            alt="Trivallis Logo">
                    </a>

                    <!-- my trivallis/hamburger group-->

                    <?php $my_trivallis_link = get_field('my_trivallis_link', 'option'); ?>

                    <?php if (wp_is_mobile()) { ?>
                        <a class="my_trevallis_wrap" href="<?php echo $my_trivallis_link; ?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/png/my-trivallis.png'; ?>"
                                alt="search icon">
                        </a>
                    <?php } else { ?>

                        <a class="my_trevallis_wrap btn_my_triv_blue" href="<?php echo $my_trivallis_link; ?>">
                            <?php if ($what_am_i == 'cym') {
                                echo "Fy Trivallis i";
                            } else {
                                echo "My Trivallis";
                            } ?>
                        </a>

                    <?php } ?>
                    <div class="menu_icon">
                        <img class="menu_open_icon"
                            src="<?php echo get_template_directory_uri() . '/assets/images/svg/hamburger-icon.svg'; ?>"
                            alt="menu open icon">
                        <img class="menu_close_icon"
                            src="<?php echo get_template_directory_uri() . '/assets/images/svg/close-icon.svg'; ?>"
                            alt="menu close icon">
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main>