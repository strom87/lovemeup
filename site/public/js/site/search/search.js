function getCities(id) {
	$.get(help.url('api/search/cities/'+id)).done(function(data) {
		var template = $('#cities_template').html();
		var rendered = Mustache.render(template, data);
		$('#cities').empty().html(rendered);
		$('.ui.checkbox').checkbox();
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

$(document).on('ready', function() {
	$('.ui.checkbox').checkbox();
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

	$('.ui.dropdown.states').dropdown({
		onChange: function(value) {
			getCities(value);
		}
	});

	$('#search').on('click', function() {
		$('form').submit();
	});

});