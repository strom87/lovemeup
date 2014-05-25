function searchByName(query) {
	query = query.replace(/[^A-Za-z0-9]/g, '');
	if(query.length > 0) {
		window.location.href = help.url('search/by-name/'+query);
	}
}

function addMagnificPopup() {
	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});
}

$(document).on('ready', function() {
	$('#menu_search').on('keyup', function(e) {
		if(help.isEnterKey(e)) {
			searchByName(this.value);
		}
	});

	$('#menu_search_icon').on('click', function() {
		searchByName($('#menu_search').val());
	});
	
	$('.ui.tabular.menu .item').tab();

	$('#open_side_menu').on('click', function() {
		$('.sidemenu.sidebar').sidebar('toggle');
	});

	$('#close_side_menu').on('click', function() {
		$('.sidemenu.sidebar').sidebar('toggle');
	});
	
	addMagnificPopup();
});