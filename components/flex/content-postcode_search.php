<?php 
	$server_name = $_SERVER['SERVER_NAME'];

	if (str_contains($server_name, 'cym.')) {
		$what_am_i = 'cym';
	} else {
		$what_am_i = 'eng';
	}
	$what_am_i = trim($what_am_i);
?>

<section class="search_cta" style="margin-top: 80px !important;">
    <div class="container">

        <div class="postcode_wrap alert_white">

            <div class="flex_wrap">
                <h3><?php if ($what_am_i == 'cym') {
                                echo "Eich Tîm Tai Cymunedol";
                            } else {
                                echo "Your Neighbourhood Team";
                            } ?></h3>
            </div>
            <div class="text_area">
                <p><?php if ($what_am_i == 'cym') {
                                echo "Eisiau dysgu mwy am eich tîm tai cymunedol? Teipiwch eich cod post i ddysgu mwy.";
                            } else {
                                echo "Want to learn more about your neighbourhood team? Enter your postcode to find out more.";
                            } ?></p>
            </div>
            <div class="text_area">
                <form name="loginBox" target="#here" method="post" id="postcodeForm">
					
                    <input name="search" type="search" id="postcodeInput" placeholder="<?php if ($what_am_i == 'cym') {
                                echo "Rhowch y cod post";
                            } else {
                                echo "Enter Postcode";
                            } ?>" />
                    <input type="submit" value="" id="searchButton" />
                </form>
            </div>
            <div id="results"></div>
        </div>

    </div>
</section>