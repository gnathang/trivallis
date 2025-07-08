<?php
/* Custom Fields */

/**
 * Google Maps API
 */
function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyASxy3VJBPOD2sE3Sc8XmTm7cssWPPm72o');
}

add_action('acf/init', 'my_acf_init');

$menu_slug = sanitize_title(get_bloginfo('name')) . '-settings';

/**
 * Social Media.
 */
$social = array(
    'Facebook' => array(
        'icon' => 'facebook-f',
        'url' => 'https://facebook.com/',
    ),
    'Instagram' => array(
        'icon' => 'instagram',
        'url' => 'https://instagram.com/',
    ),
    'LinkedIn' => array(
        'icon' => 'linkedin-in',
        'url' => 'https://linkedin.com/company/',
    ),
    'Pinterest' => array(
        'icon' => 'pinterest-p',
        'url' => 'https://pinterest.com/',
    ),
    'Twitter' => array(
        'icon' => 'twitter',
        'url' => 'https://twitter.com/',
    ),
    'YouTube' => array(
        'icon' => 'youtube',
        'url' => 'https://www.youtube.com/channel/',
    ),
    'TikTok' => array(
        'icon' => 'tiktok',
        'url' => 'https://www.tiktok.com/',
    )
);

function designdough_acf_init()
{
    global $menu_slug;
    global $social;

    $args = array(
        'page_title' => get_bloginfo('name') . ' Settings',
        'menu_title' => get_bloginfo('name'),
        'menu_slug' => $menu_slug,
        'position' => -1,
        'icon_url' => false,
    );

  acf_add_options_page($args);

    /**
     * Social media group.
     */
    acf_add_local_field_group(array (
        'key' => 'group_social',
        'title' => 'Social Media',
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => $menu_slug,
                ),
            ),
        ),
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'hide_on_screen' => '',
    ));

    foreach ($social as $key => $val) {
        acf_add_local_field(
            array(
                'key' => 'field_' . sanitize_title($key),
                'label' => '<i class="fab fa-' . $val['icon'] . '" style="width:auto;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> ' . $key,
                'placeholder' => $key . ' username',
                'name' => sanitize_title($key),
                'type' => 'text',
                'parent' => 'group_social',
                'prepend' => $val['url'],
            )
        );
    }

    acf_add_local_field(
        array(
            'key' => 'field_instagram_token',
            'label' => '<i class="fab fa-instagram" style="width:auto;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> Instagram Token',
            'placeholder' => 'Instagram Token',
            'name' => sanitize_title('Instagram Token'),
            'type' => 'text',
            'parent' => 'group_social',
        )
    );

    /**
     * Contact details group.
     */
    acf_add_local_field_group(array (
        'key' => 'group_contact',
        'title' => 'Contact Details',
        'fields' => array (
            array (
                'key' => 'field_text',
                'label' => '<i class="fas fa-phone" style="width:20px;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> Address Text',
                'placeholder' => 'Enter your address',
                'name' => 'text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'field_hours',
                'label' => '<i class="fas fa-phone" style="width:20px;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> Openning Hours',
                'placeholder' => 'Your openning hours',
                'name' => 'hours',
                'type' => 'textarea',
            ),
            array (
                'key' => 'field_email',
                'label' => '<i class="far fa-envelope" style="width:20px;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> Email Address',
                'placeholder' => 'Enter your email address',
                'name' => 'email',
                'type' => 'email',
            ),
            array (
                'key' => 'field_tel',
                'label' => '<i class="fas fa-phone" style="width:20px;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> Telephone Number',
                'placeholder' => 'Enter your telephone number',
                'name' => 'tel',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => $menu_slug,
                ),
            ),
        ),
        'menu_order' => 2,
        'label_placement' => 'left',
    ));


    /**
     * Call to Action.
     */
    acf_add_local_field_group(array (
        'key' => 'group_cta',
        'title' => 'Automated Call to Action',
        'fields' => array (
            array (
                'key' => 'rr_title',
                'label' => 'Report a Repair Title',
                'placeholder' => 'Report a Repair Title',
                'name' => 'rr_title',
                'type' => 'text',
            ),
            array (
                'key' => 'rr_text',
                'label' => 'Report a Repair Text',
                'placeholder' => 'Report a Repair Text',
                'name' => 'rr_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'rr_link',
                'label' => 'Report a Repair Link',
                'placeholder' => 'Report a Repair Page Link',
                'name' => 'rr_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'fp_title',
                'label' => 'Find a Property Title',
                'placeholder' => 'Find a Property Title',
                'name' => 'fp_title',
                'type' => 'text',
            ),
            array (
                'key' => 'fp_text',
                'label' => 'Find a Property Text',
                'placeholder' => 'Find a Property Text',
                'name' => 'fp_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'fp_link',
                'label' => 'Find a Property Page Link',
                'placeholder' => 'Find a Property Page Link',
                'name' => 'fp_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'pyr_title',
                'label' => 'Pay your Rent Title',
                'placeholder' => 'Pay your Rent Title',
                'name' => 'pyr_title',
                'type' => 'text',
            ),
            array (
                'key' => 'pyr_text',
                'label' => 'Pay your Rent Text',
                'placeholder' => 'Pay your Rent Text',
                'name' => 'pyr_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'pyr_link',
                'label' => 'Pay your Rent Page Link',
                'placeholder' => 'Pay your Rent Page Link',
                'name' => 'pyr_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'cp_title',
                'label' => 'Commercial Properties Title',
                'placeholder' => 'Commercial Properties Title',
                'name' => 'cp_title',
                'type' => 'text',
            ),
            array (
                'key' => 'cp_text',
                'label' => 'Commercial Properties Text',
                'placeholder' => 'Commercial Properties Text',
                'name' => 'cp_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'cp_link',
                'label' => 'Commercial Properties Page Link',
                'placeholder' => 'Commercial Properties Page Link',
                'name' => 'cp_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'mt_title',
                'label' => 'My Trivallis Title',
                'placeholder' => 'My Trivallis Title',
                'name' => 'mt_title',
                'type' => 'text',
            ),
            array (
                'key' => 'mt_text',
                'label' => 'My Trivallis Text',
                'placeholder' => 'My Trivallis Text',
                'name' => 'mt_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'mt_link',
                'label' => 'My Trivallis Page Link',
                'placeholder' => 'My Trivallis Page Link',
                'name' => 'mt_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'ta_title',
                'label' => 'Tenancy Agreement Title',
                'placeholder' => 'Tenancy Agreement Title',
                'name' => 'ta_title',
                'type' => 'text',
            ),
            array (
                'key' => 'ta_text',
                'label' => 'Tenancy Agreement Text',
                'placeholder' => 'Tenancy Agreement Text',
                'name' => 'ta_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'ta_link',
                'label' => 'Tenancy Agreement Page Link',
                'placeholder' => 'Tenancy Agreement Page Link',
                'name' => 'ta_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'ts_title',
                'label' => 'Tenant Services Title',
                'placeholder' => 'Tenant Services Title',
                'name' => 'ts_title',
                'type' => 'text',
            ),
            array (
                'key' => 'ts_text',
                'label' => 'Tenant Services Text',
                'placeholder' => 'Tenant Services Text',
                'name' => 'ts_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'ts_link',
                'label' => 'Tenant Services Page Link',
                'placeholder' => 'Tenant Services Page Link',
                'name' => 'ts_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'cu_title',
                'label' => 'Contact Us Title',
                'placeholder' => 'Contact UsTitle',
                'name' => 'cu_title',
                'type' => 'text',
            ),
            array (
                'key' => 'cu_text',
                'label' => 'Contact Us Text',
                'placeholder' => 'Contact Us Text',
                'name' => 'cu_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'cu_link',
                'label' => 'Contact Us Page Link',
                'placeholder' => 'Contact Us Page Link',
                'name' => 'cu_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'ag_title',
                'label' => 'Advice & Guidance Title',
                'placeholder' => 'Advice & Guidance Title',
                'name' => 'ag_title',
                'type' => 'text',
            ),
            array (
                'key' => 'ag_text',
                'label' => 'Advice & Guidance Text',
                'placeholder' => 'Advice & Guidance Text',
                'name' => 'ag_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'ag_link',
                'label' => 'Advice & Guidance Page Link',
                'placeholder' => 'Advice & Guidance Page Link',
                'name' => 'ag_link',
                'type' => 'page_link',
            ),
            
            array (
                'key' => 'gi_title',
                'label' => 'Get Involved Title',
                'placeholder' => 'Get Invovled Title',
                'name' => 'gi_title',
                'type' => 'text',
            ),
            array (
                'key' => 'gi_text',
                'label' => 'Get Involved Text',
                'placeholder' => 'Get Involved Text',
                'name' => 'gi_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'gi_link',
                'label' => 'Get Involved Link',
                'placeholder' => 'Get Involved Link',
                'name' => 'gi_link',
                'type' => 'page_link',
            ),
            array (
                'key' => 'news_title',
                'label' => 'News Title',
                'placeholder' => 'News Title',
                'name' => 'news_title',
                'type' => 'text',
            ),
            array (
                'key' => 'news_text',
                'label' => 'News Text',
                'placeholder' => 'News Text',
                'name' => 'news_text',
                'type' => 'textarea',
            ),
            array (
                'key' => 'news_link',
                'label' => 'News Link',
                'placeholder' => 'News Link',
                'name' => 'news_link',
                'type' => 'page_link',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => $menu_slug,
                ),
            ),
        ),
        'menu_order' => 1,
        'label_placement' => 'left',
    ));

    /**
     * Analytics group.
     
    acf_add_local_field_group(array (
        'key' => 'group_analytics',
        'title' => 'Analytics',
        'fields' => array (
            array (
                'key' => 'field_analytics',
                'label' => '<i class="fas fa-chart-bar" style="width:20px;height:16px;display:inline-block;vertical-align:bottom;margin-right:.5em;"></i> Analytics',
                'placeholder' => 'Enter your Google Analytics tracking code (UA-)',
                'name' => 'analytics',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => $menu_slug,
                ),
            ),
        ),
        'menu_order' => 0,
        'label_placement' => 'left',
    ));     */
}

add_action('acf/init', 'designdough_acf_init');