function sendMessage() {
	loading(true);
	var input = help.getInput({
		id: 'profile_id',
		message: 'message_text'
	}, 'name');

	$.post(help.url('api/profile/send-message'), input).done(function(data) {
		if(data.pass) {
			$('#message_modal').modal('hide');
			$('.page.dimmer:first').dimmer('toggle');
			$('[name="message_text"]').val('');
		}

		loading(false);
	}).fail(function(e) {
		loading(false);
		console.log(e);
	});
}

function loading(show) {
	if(show) {
		$('#send_message_icon').removeClass('mail').addClass('loading');
	} else {
		$('#send_message_icon').removeClass('loading').addClass('mail');
	}
}

$(document).on('ready', function() {
	$('#message').on('click', function() {
		$('#message_modal').modal('show');
	});

	$('#flirt').on('click', function() {
		$('#flirt_modal').modal('show');
	});

	$('#send_message').on('click', function() {
		if($('[name="message_text"]').val().length > 0) {
			sendMessage();
		}
	});
});