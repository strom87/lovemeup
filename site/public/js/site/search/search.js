function getUserSearch() {
	var data = help.getInput({
		minage: 'minage',
		maxage: 'maxage',
		state: 'state',
	}, 'name');

	return data;
}

function getUserRelation() {
	var data = help.getCheckbox({
		has_profile: 'has_profile',
		search_my_age: 'search_my_age'
	}, 'name');

	return data;
}

function ageValidation(type, age) {
	var minage = $('[name="minage"]');
	var maxage = $('[name="maxage"]');
	
	if(type == 'minage' && age > maxage.val()) {
		return { 
			pass: false,
			value: maxage.val()
		};
	} else if(type == 'maxage' && age < minage.val()) {
		return { 
			pass: false,
			value: minage.val()
		};
	}

	return { pass: true };
}

$(document).on('ready', function() {
	$('.ui.checkbox').checkbox()
	$('.ui.dropdown').dropdown();
	$('.ui.accordion').accordion();

	$('.ui.dropdown.minage').dropdown({
		onChange: function(value) {
			var data = ageValidation('minage', value);
			if (!data.pass) {
				$('.ui.dropdown.minage').dropdown('set value', data.value).dropdown('set text', data.value);
			}
		}
	});

	$('.ui.dropdown.maxage').dropdown({
		onChange: function(value) {
			var data = ageValidation('maxage', value);
			if (!data.pass) {
				$('.ui.dropdown.maxage').dropdown('set value', data.value).dropdown('set text', data.value);
			}
		},
	});

	$('#search').on('click', function() {
		console.log(getUserRelation());
	});

});