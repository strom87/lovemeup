function saveProfile(input) {
	$.post(help.url('api/user-profile/edit-profile'), input).done(function(data) {
		loading(false);
	}).fail(function(e) {
		console.log(e);
		loading(false);
	});
}

function getCities(id) {
	$('.ui.dropdown.cities').dropdown('destroy');

	$.get(help.url('api/user-profile/cities/'+id)).done(function(data) {
		var first = true;
		var elem = $('#cities');
		var template = '<div class="item" data-value="{id}">{name}</div>';
		var menu = elem.find('.menu');
		
		menu.children().remove();

		for(var x in data) {
			if(first) {
				first = false;
				elem.find('.default.text').html(data[x]);
				elem.find('[name="city"]').val(x);
			}
			menu.append(template.replace('{id}', x).replace('{name}', data[x]));
		}

		$('.ui.dropdown.cities').dropdown();
	}).fail(function(e) {
		console.log(e)
	});
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

function loading(show) {
	if(show) {
		$('#save').find('i').removeClass('save').addClass('loading');
	} else {
		$('#save').find('i').removeClass('loading').addClass('save');
	}
}

$(document).on('ready', function() {
	$('.ui.dropdown').dropdown();

	$('.ui.dropdown.states').dropdown({
		onChange: function(value) {
			getCities(value);
		}
	});

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

	$('#save').on('click', function() {
		loading(true);
		var input = help.getInput({
			state: 'state',
			city: 'city',
			minage: 'minage',
			maxage: 'maxage',
			birth_year: 'birth_year',
			length: 'length',
			gender: 'gender',
			partner_gender: 'partner_gender',
			relationship_status: 'relationship_status',
			relationship_search: 'relationship_search',
			description: 'description'
		}, 'name');
		input.description = $('#description').val();

		if(input.minage > input.maxage) {
			input.minage = input.maxage;
		}

		saveProfile(input);
	});
});