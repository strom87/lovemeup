function loginUser() {
	loader('login', true);

	var input = help.getInput({
		name: 'login_name',
		password: 'login_password'
	}, 'name');

	$.post('api/auth/login', input).done(function(data) {
		if(data.pass) {
			window.location.href = '/home';
		}
		loginError(data);
		loader('login', false);
	}).fail(function(e) {
		loader('login', false);
		console.log(e);
	})
}

function registerUser() {
	loader('register', true);

	var input = help.getInput({ 
		email: 'email',
		name: 'name',
		password: 'password',
		password_confirmation: 'password_confirmation',
		gender: 'gender',
		partner_gender: 'partner_gender',
		birth_year: 'birth_year',
		length: 'length',
		state: 'state',
		city: 'city',
		relationship_status: 'relationship_status',
		relationship_search: 'relationship_search',
		accepted_rules: 'accepted_rules'
	}, 'name');

	input.accepted_rules = $('[name="accepted_rules"]').is(':checked');

	$.post('api/auth/make-user', input).done(function(data) {
		if(data.pass) {
			modals('success');
		} 
		
		registerErrors(data);

		loader('register', false);
	}).fail(function(e) {
		loader('register', false);
		console.log(e);
	});
}

function getCities(id) {
	$('.ui.dropdown.cities').dropdown('destroy');

	$.post('api/auth/get-cities/'+id).done(function(data) {
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

function newPassword() {
	loader('password', true);
	newPasswordMessage(false);

	var input = help.getInput({ email: 'new_password_email' }, 'name');

	$.post('api/auth/new-password', input).done(function() {
		loader('password', false);
		newPasswordMessage(true);
	}).fail(function(e) {
		loader('password', false);
		console.log(e);
	});
}

function newPasswordMessage(show) {
	if(show) {
		$('#new_password_message').slideDown('fast');
	} else {
		$('#new_password_message').slideUp('fast');
	}
}

function loginError(message) {
	$('#login_error').slideDown('fast').find('span').html(message);
}

function registerErrors(data) {
	var text = ['email', 'name', 'password'];
	var drop = ['state', 'city', 'gender', 'partner_gender', 'birth_year', 'length', 'relationship_status', 'relationship_search', 'accepted_rules'];

	for(var x in text) {
		if(data[text[x]] != undefined) {
			$('#'+text[x]+'_error').slideDown('fast').find('span').html(data[text[x]][0]).parent().parent().parent().addClass('error');
		}
		else
			$('#'+text[x]+'_error').slideUp('fast').parent().parent().removeClass('error');
	}

	for(var x in drop) {
		if(data[drop[x]] != undefined)
			$('[name="'+drop[x]+'"]').parent().parent().addClass('error');
		else
			$('[name="'+drop[x]+'"]').parent().parent().removeClass('error');
	}
}

function successModalExists() {
	if($('#activated_modal').length) {
		modals('activated');
	}
}

function loader(type, show) {
	if(type == 'login') {
		if(show) {
			$('#login_icon').removeClass('sign in').addClass('loading');
		} else {
			$('#login_icon').removeClass('loading').addClass('sign in');
		}
	} else if(type == 'register') {
		if(show) {
			$('#register_icon').removeClass('add').addClass('loading');
		} else {
			$('#register_icon').removeClass('loading').addClass('add');
		}
	} else if(type == 'password') {
		if(show) {
			$('#new_password_icon').removeClass('add').addClass('loading');
		} else {
			$('#new_password_icon').removeClass('loading').addClass('add');
		}
	} 
}

function modals(type) {
	switch(type) {
		case 'rules':
			$('#rules_modal').modal('show');
			break;
		case 'success':
			$('#success_modal').modal('show');
			break;
		case 'activated':
			$('#activated_modal').modal('show');
			break;
		case 'password':
			$('#password_modal').modal('show');
			break;
	}
}

$(document).on('ready', function() {
	$('.ui.checkbox').checkbox();
	$('.ui.dropdown').dropdown();

	$('.ui.dropdown.states').dropdown({
		onChange: function(value) {
			getCities(value)
		}
	});

	$('#read_rules').on('click', function() {
		modals('rules');
	});

	$('#show_new_password').on('click', function() {
		modals('password');
	});

	$('#register').on('click', registerUser);

	$('#login').on('click', loginUser);

	$('#new_password').on('click', newPassword);

	$('.login').on('keyup', function(e) {
		if(help.isEnterKey(e)) {
			loginUser();
		}
	});

	successModalExists();
});