<?php

add_theme_support( 'post-thumbnails' );

add_post_type_support( 'page', 'excerpt' );


function wpb_custom_new_menu() {

	register_nav_menus(array(
		'main'=> __('Main Menu'),
		'footer'=> __('Footer Menu'),
	));
}
add_action( 'init', 'wpb_custom_new_menu' );


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

  }

	/* Actions and Filters */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', function( $classes ) {
	    return array_merge( $classes, array( 'class-name' ) );
	} );

	/* Scripts */

	function starkers_script_enqueuer() {

		// Include the lazyload script
       //wp_enqueue_script('lazyload', get_theme_file_uri('/assets/js/lazyload.11.0.5.min.js'), array('jquery'), '11.0.5', true);

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}


function addnew_query_vars($vars)
{
	$vars[] = 'designdough-portfolio'; // c is the name of variable you want to add
//	$vars[] = 'c'; // c is the name of variable you want to add
	return $vars;
}
add_filter( 'query_vars', 'addnew_query_vars', 10, 1 );

function addnew_query_vars_blogs($vars)
{
	$vars[] = 'designdough-blogs'; // c is the name of variable you want to add
//	$vars[] = 'c'; // c is the name of variable you want to add
	return $vars;
}
add_filter( 'query_vars', 'addnew_query_vars_blogs', 10, 1 );
/* include functions */

// add svg support
function add_file_types_to_uploads($file_types) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

function my_theme_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('my-ajax-script', get_template_directory_uri() . '/assets/js/postcode.js', array('jquery'), null, true);
    // Pass AJAX URL to script
    wp_localize_script('my-ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

add_action('wp_ajax_search_postcode', 'search_postcode_callback');
add_action('wp_ajax_nopriv_search_postcode', 'search_postcode_callback'); // For non-logged in users

function search_postcode_callback() {
    global $wpdb; // This allows you to access the WordPress database
    $postcode = $_POST['postcode'];

    // PRODUCTION
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'tr002_usr';
    $DATABASE_PASS = 'an3#26uJ3';
    $DATABASE_NAME = 'tr002_db';
    // Try and connect using the info above.
    $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    $normalizedPostcode = strtoupper(str_replace(' ', '', $postcode));

    $escapedPostcode = mysqli_real_escape_string($conn, $normalizedPostcode);
    $sql = "SELECT * FROM imported_data WHERE UPPER(REPLACE(PostCode, ' ', '')) = '$escapedPostcode' LIMIT 1";
    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check for errors (optional but recommended)
    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    } else {
        if(mysqli_num_rows($result) > 0) {
            $arr = [];
            while($thing = mysqli_fetch_array($result)) {
                $email = $thing['PrimaryEmailNeighbourhoodManagerSchemeCoordinatorUser'];
                $phone = $thing['MobilePhoneNeighbourhoodManagerSchemeCoordinatorUser'];
                ?>
                <div class="text_area">
                    <h4 class="blue">Your Community Housing Officer</h4>
                    <h3><?php echo $thing['NeighbourhoodManagerSchemeCoordinator']; ?></h3>

                </div>
                <div class="text_area">
                    <p>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
                        Phone: <a href="tel:+44<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                </div>
                <div class="text_area">
					<h4 class="blue">Drop-in Surgery</h4>
					<p><?php echo $thing['DropinTimes']; ?></p>
                </div>
				<div class="text_area">
					<h4 class="blue">Estate Inspection Dates</h4>
					<p>
						<?php /*
                            $date_arr = explode(",", $thing['EstateInspections']); 
                            foreach($date_arr as $da) {
                                $noWhitespaceString = preg_replace('/\s+/', '', $da);
                                $date = DateTime::createFromFormat('d/m/Y', $noWhitespaceString);
                                if ($date) {
                                    // Format the month and year
                                    $formattedDate = $date->format('jS F Y');
                                    echo $formattedDate . '<br>';
                                } 					
                            }				
						*/ ?>
                        <?php 
                            $estateInspections = trim($thing['EstateInspections']);
                            
                            // Check if it is a single date or a comma-separated list of dates
                            if (strpos($estateInspections, ',') !== false) {
                                // It's a list of dates, process each one
                                $date_arr = explode(",", $estateInspections);
                                foreach ($date_arr as $da) {
                                    $noWhitespaceString = preg_replace('/\s+/', '', $da);
                                    $date = DateTime::createFromFormat('d/m/Y', $noWhitespaceString);
                                    if ($date) {
                                        // Format the month and year
                                        $formattedDate = $date->format('jS F Y');
                                        echo $formattedDate . '<br>';
                                    }
                                }
                            } else {
                                // Single value, check if it's a valid date or just a string
                                $noWhitespaceString = preg_replace('/\s+/', '', $estateInspections);
                                $date = DateTime::createFromFormat('d/m/Y', $noWhitespaceString);
                                if ($date) {
                                    // Format the single date
                                    echo $date->format('jS F Y');
                                } else {
                                    // Just a string, display as is
                                    echo htmlspecialchars($estateInspections);
                                }
                            }
                        ?>
					</p>
                </div>
                <?php
            }
        } else {
            echo 'No results found for that postcode';
        }
    }

    // Your query and processing logic here
    // Remember to use $wpdb->prepare for secure queries

    // Always end an AJAX function with die() or wp_die() in WordPress
    wp_die();
}


require get_parent_theme_file_path('/inc/admincss.php');

// require get_parent_theme_file_path('/inc/comments.php');

require get_parent_theme_file_path('/inc/contactform.php');

require get_parent_theme_file_path('/inc/responsiveimages.php');

require get_parent_theme_file_path('/inc/siteoptions.php');

require get_parent_theme_file_path('/inc/customposttypes.php');

// require get_parent_theme_file_path('/inc/disableadminbar.php');

require get_parent_theme_file_path('/inc/posttonews.php');

require get_parent_theme_file_path('/inc/excerpt-length.php');


// function to check if the user is on a tablet
function wp_is_tablet() {
    // Check if the user agent matches typical tablet patterns
    if ( preg_match( '/iPad/i', $_SERVER['HTTP_USER_AGENT'] ) || // iPad
         preg_match( '/Android/i', $_SERVER['HTTP_USER_AGENT'] ) && // Android tablets
         preg_match( '/mobile/i', $_SERVER['HTTP_USER_AGENT'] ) === false ) { // But not mobile browsers on Android
        return true;
    }

    return false;
}

// automatically add a tag of 'News' to our news categories, so that it the breadcrumbs say 'home > our news > [news artcle]
function add_tag_to_news_articles($post_ID) {
    // Check if the post is a news article
    if (get_post_type($post_ID) === 'post') { // Replace 'news_article' with your actual custom post type slug
        // Check if the post doesn't have the 'name' tag already
        if (!has_term('News', 'post_tag', $post_ID)) {
            // Add the 'name' tag to the post
            wp_set_post_tags($post_ID, 'News', true);
        }
    }
}
add_action('publish_post', 'add_tag_to_news_articles');