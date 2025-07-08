// postcode search for location pages
jQuery(document).ready(function ($) {
	$('#searchButton').click(function (e) {
		e.preventDefault();
		var postcode = $('#postcodeInput').val();

		$.ajax({
			type: 'POST',
			url: my_ajax_object.ajax_url, // Using the passed AJAX URL
			data: {
				action: 'search_postcode', // WordPress action
				postcode: postcode,
			},
			success: function (response) {
				$('#results').html(response);
			},
			error: function () {
				$('#results').html('An error occurred. Please try again.');
			},
		});
	});
});
