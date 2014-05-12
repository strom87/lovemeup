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
	}).fail(function() {
		loader('login', false);
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
	});
}

function loginError(message) {
	$('#loginError').slideDown('fast').find('span').html(message);
}

function registerErrors(data) {
	var text = ['email', 'name', 'password'];
	var drop = ['gender', 'partnerGender', 'birthYear', 'length', 'relationshipStatus', 'relationshipSearch', 'acceptedRules'];

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
	}
}

$(document).on('ready', function() {
	$('.ui.dropdown').dropdown();
	$('.ui.checkbox').checkbox();

	$('#readRules').on('click', function() {
		modals('rules');
	});

	$('#register').on('click', registerUser);

	$('#login').on('click', loginUser);

	$('.login').on('keypress', function() {
		if(help.isEnterKey) {
			loginUser();
		}
	});
});