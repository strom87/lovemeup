function loginUser() {
	loader('login', true);

	var input = help.getInput({
		name: 'loginName',
		password: 'loginPassword'
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
		partnerGender: 'partnerGender',
		birthYear: 'birthYear',
		length: 'length',
		state: 'state',
		city: 'city',
		relationshipStatus: 'relationshipStatus',
		relationshipSearch: 'relationshipSearch',
		acceptedRules: 'acceptedRules'
	}, 'name');

	input.acceptedRules = $('[name="acceptedRules"]').is(':checked');

	$.post('api/auth/make-user', input).done(function(data) {
		if(data.pass) {
			modals('success');
		} else {
			registerErrors(data);
		}
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

	var input = help.getInput({ email: 'newPasswordEmail' }, 'name');

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
		$('#newPasswordMessage').slideDown('fast');
	} else {
		$('#newPasswordMessage').slideUp('fast');
	}
}

function loginError(message) {
	$('#loginError').slideDown('fast').find('span').html(message);
}

function registerErrors(data) {
	var text = ['email', 'name', 'password'];
	var drop = ['state', 'city', 'gender', 'partnerGender', 'birthYear', 'length', 'relationshipStatus', 'relationshipSearch', 'acceptedRules'];

	for(var x in text) {
		if(data[text[x]] != undefined) {
			$('#'+text[x]+'Error').slideDown('fast').find('span').html(data[text[x]][0]).parent().parent().parent().addClass('error');
		}
		else
			$('#'+text[x]+'Error').slideUp('fast').parent().parent().removeClass('error');
	}

	for(var x in drop) {
		if(data[drop[x]] != undefined)
			$('[name="'+drop[x]+'"]').parent().parent().addClass('error');
		else
			$('[name="'+drop[x]+'"]').parent().parent().removeClass('error');
	}
}

function successModalExists() {
	if($('#activatedModal').length) {
		modals('activated');
	}
}

function loader(type, show) {
	if(type == 'login') {
		if(show) {
			$('#loginIcon').removeClass('sign in').addClass('loading');
		} else {
			$('#loginIcon').removeClass('loading').addClass('sign in');
		}
	} else if(type == 'register') {
		if(show) {
			$('#registerIcon').removeClass('add').addClass('loading');
		} else {
			$('#registerIcon').removeClass('loading').addClass('add');
		}
	} else if(type == 'password') {
		if(show) {
			$('#newPasswordIcon').removeClass('add').addClass('loading');
		} else {
			$('#newPasswordIcon').removeClass('loading').addClass('add');
		}
	} 
}

function modals(type) {
	switch(type) {
		case 'rules':
			$('#rulesModal').modal('show');
			break;
		case 'success':
			$('#successModal').modal('show');
			break;
		case 'activated':
			$('#activatedModal').modal('show');
			break;
		case 'password':
			$('#passwordModal').modal('show');
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

	$('#readRules').on('click', function() {
		modals('rules');
	});

	$('#showNewPassword').on('click', function() {
		modals('password');
	});

	$('#register').on('click', registerUser);

	$('#login').on('click', loginUser);

	$('#newPassword').on('click', newPassword);

	$('.login').on('keypress', function(e) {
		if(help.isEnterKey(e)) {
			loginUser();
		}
	});

	successModalExists();
});