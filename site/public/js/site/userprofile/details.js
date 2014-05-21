function save(input) {
	$.post(help.url('api/user-profile/edit-details'), input).done(function(data) {
		loader(false); 
	}).fail(function(e) {
		loader(false);
		console.log(e);
	});
}

function loader(show) {
	if(show) {
		$('#save_icon').removeClass('save').addClass('loading');
	} else {
		$('#save_icon').removeClass('loading').addClass('save');
	}
}

$(document).on('ready', function() {
	$('.ui.dropdown').dropdown();

	$('#save').on('click', function() {
		loader(true);
		var input = help.getInput({
			eye_color: 'eye_color',
			hair_color: 'hair_color',
			physique: 'physique',
			education: 'education',
			work: 'work',
			work_status: 'work_status',
			children: 'children',
			pet: 'pet',
			alcohol: 'alcohol',
			tobacco: 'tobacco'
		}, 'name');

		save(input);
	});
});