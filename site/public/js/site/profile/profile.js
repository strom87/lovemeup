$(document).on('ready', function() {
	$('#message').on('click', function() {
		$('#message_modal').modal('show');
	});

	$('#flirt').on('click', function() {
		$('#flirt_modal').modal('show');
	});
});