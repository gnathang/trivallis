/**
 * Main JS
 *
 * @summary   The Main JS for WP Theme, refer to
 *            the webpack config for other files
 */

/* slider stuff */

$(document).on('ready', function () {
	$('.vertical-center-4').slick({
		dots: true,
		vertical: true,
		centerMode: true,
		slidesToShow: 4,
		slidesToScroll: 2,
	});
	$('.vertical-center-3').slick({
		dots: true,
		vertical: true,
		centerMode: true,
		slidesToShow: 3,
		slidesToScroll: 3,
	});
	$('.vertical-center-2').slick({
		dots: true,
		vertical: true,
		centerMode: true,
		slidesToShow: 2,
		slidesToScroll: 2,
	});
	$('.vertical-center').slick({
		dots: true,
		vertical: true,
		centerMode: true,
		arrows: true,
		//    loop: true,
		//    infinite: true,
		dots: true,
		//    autoplay: true,
		//    autoplaySpeed: 3500,
		dotsClass: 'custom_paging',
		customPaging: function (slider, i) {
			console.log(slider);
			return i + 1 + '/' + slider.slideCount;
		},
	});
	$('.vertical').slick({
		dots: true,
		vertical: true,
		slidesToShow: 3,
		slidesToScroll: 3,
	});

	$('.single_slide').slick({
		dots: true,
		infinite: true,
		arrows: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});

	$('.regular').slick({
		dots: false,
		infinite: true,
		arrows: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		centerMode: true, // Enable center mode
		centerPadding: '30px', // Adjust the amount of padding
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: false,
					arrows: true,
				},
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
				},
			},
		],
	});

	$('.related_posts_slider').slick({
		dots: true,
		infinite: true,
		arrows: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		// centerMode: true, // Enable center mode
		// centerPadding: '30px', // Adjust the amount of padding
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false,
					arrows: true,
				},
			},
		],
	});

	$('.featured_news_slider').slick({
		infinite: true,
		arrows: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		variableWidth: true,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true, // Enable center mode
					centerPadding: '30px', // Adjust the amount of padding
					variableWidth: false,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true, // Enable center mode
					centerPadding: '30px', // Adjust the amount of padding
					variableWidth: false,
				},
			},
		],
	});

	$('.location_slider').slick({
		// dots: false,
		infinite: true,
		arrows: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					arrows: true,
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					// dots: false,
					arrows: true,
				},
			},
		],
	});

	$('.center').slick({
		dots: true,
		infinite: true,
		centerMode: true,
		slidesToShow: 1,
		slidesToScroll: 1,
	});
	$('.variable').slick({
		dots: true,
		infinite: true,
		variableWidth: true,
	});
	$('.lazy').slick({
		lazyLoad: 'ondemand', // ondemand progressive anticipated
		infinite: true,
	});
});

$(document).ready(function () {
	$('.one-time').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true,
	});

	// menu functions

	$('.menu_icon').click(function () {
		$('.mobile_nav').toggleClass('active');
		$('.bottom_cta_wrap').toggleClass('active');
		$('.header_main').toggleClass('active');
		$('.mobile_nav').removeClass('level_two_active');
		$('.next_level').removeClass('active');
		$('.level_area').removeClass('level_three_active');
		$('.menu_cta').removeClass('active');
		$(this).toggleClass('active');
	});

	$('.dropdown').each(function () {
		// $('.header_main').toggleClass('active');

		$(this).hover(function () {
			$('.overlay').toggleClass('active');
			// todo: we need to change this so that when it moves horizontally to another <li>, the animation resets
			$(this).find('.white_wrap').toggleClass('active');
		});
	});

	$('.mob_menu_button').click(function () {
		$(this).parent().addClass('active');
		$('.mobile_nav').addClass('level_two_active');
	});

	$('.back_mob').click(function () {
		$('.next_level').removeClass('active');
		$('.mobile_nav').removeClass('level_two_active');
	});

	$('.level_two_btn').click(function () {
		$(this).parent().addClass('active');
		$('.level_area').addClass('level_three_active');
	});

	$('.back_three').click(function () {
		$('.menu_cta').removeClass('active');
		$('.level_area').removeClass('level_three_active');
	});

	/* fade in scroll */

	$(window).scroll(function () {
		inViewport();
	});

	$(window).resize(function () {
		inViewport();
	});

	function inViewport() {
		$('.fade-in').each(function () {
			var divPos = $(this).offset().top,
				topOfWindow = $(window).scrollTop();

			if (divPos < topOfWindow + window.innerHeight * 0.7) {
				$(this).addClass('visible');
			}
		});
	}

	$('a[href*="#"]:not([href="#"])').click(function () {
		var target = $(this.hash);
		$('html,body')
			.stop()
			.animate(
				{
					scrollTop: target.offset().top - 120,
				},
				'linear'
			);
	});
	if (location.hash) {
		var id = $(location.hash);
	}
	$(window).on('load', function () {
		if (location.hash) {
			$('html,body').animate({ scrollTop: id.offset().top - 120 }, 'linear');
		}
	});

	$('#play-button').click(function () {
		$('.video-container').addClass('active');
		$('#play-button').hide();
		$('#pause-button').show();
	});

	$('#pause-button').click(function () {
		$('.video-container').removeClass('active');
		$('#pause-button').hide();
		$('#play-button').show();
	});

	$('.accordion_wrap').click(function () {
		$(this).toggleClass('active');
	});

	function waitForElement(id, callback) {
		var poops = setInterval(function () {
			if (document.getElementById(id)) {
				clearInterval(poops);
				callback();
			}
		}, 100);
	}

	waitForElement('projectplayer', function () {
		var iframe = document.getElementById('projectplayer');

		// $f == Froogaloop
		var player = $f(iframe);

		// bind events
		var playButton = document.getElementById('play-button');
		playButton.addEventListener('click', function () {
			player.api('play');
		});

		var pauseButton = document.getElementById('pause-button');
		pauseButton.addEventListener('click', function () {
			player.api('pause');
		});
	});

	$(window).scroll(function () {
		var scrollTop = 200;
		if ($(window).scrollTop() >= scrollTop) {
			$('.top_arrow').addClass('fadein');
		}
		if ($(window).scrollTop() < scrollTop) {
			$('.top_arrow ').removeClass('fadein');
		}
	});
});

// make the arro anchor to the end of the last word
function splitWordsInElements(className) {
	// Get all elements with the specified class name
	var elements = document.getElementsByClassName(className);

	// Loop through each element
	Array.from(elements).forEach(function (element) {
		// Get the text content of the element
		var text = element.textContent.trim();

		// Split the text into words
		var words = text.split(/\s+/);

		// Generate HTML with each word wrapped in a span tag
		var html = words
			.map(function (word) {
				return '<span class="word">' + word + '&nbsp' + '</span>';
			})
			.join('');

		// Set the innerHTML of the element to the generated HTML
		element.innerHTML = html;
	});
}

// Call the function with the class name
function addClassesAndSplitWords() {
	var childrenLists = document.querySelectorAll('ul.children');
	childrenLists.forEach(function (list) {
		var links = list.querySelectorAll('a');
		links.forEach(function (link) {
			link.classList.add('btn_simple', 'btn_simple_split_words');
			var words = link.textContent.trim().split(/\s+/); // Split text into words
			link.innerHTML = ''; // Clear existing content
			words.forEach(function (word, index) {
				var span = document.createElement('span');
				span.textContent = word;
				span.classList.add('word'); // Add class to span
				link.appendChild(span);
				if (index < words.length - 1) {
					link.appendChild(document.createTextNode('\u00A0')); // Add non-breaking space between words
				}
			});
		});
	});
}

// Call the function when the document is ready
document.addEventListener('DOMContentLoaded', function () {
	addClassesAndSplitWords();
	splitWordsInElements('btn_simple_split_words');
});

// scroll smoothly to the top
function scrollToTop() {
	// Scroll smoothly to the top of the page
	window.scrollTo({
		top: 0,
		behavior: 'smooth',
	});
}
