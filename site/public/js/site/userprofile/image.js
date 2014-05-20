var messages = {};

function saveImage(image_id, input) {
	showButtonLoad('save', image_id, true);
	$.post(help.url('api/user-profile/edit-image/'+image_id), input).done(function(data) {
		showButtonLoad('save', data.id, false);
	}).fail(function(e) {
		console.log(e);
	})
}

function deleteImage(image_id) {
	showButtonLoad('delete', image_id, true);
	$.post(help.url('api/user-profile/delete-image/'+image_id)).done(function(id) {
		showButtonLoad('delete', image_id, false);
		$('#'+id).parent().parent().remove();
	}).fail(function(e) {
		console.log(e);
	});
}

function before() {
	uploadLoading(true);
	var output = $('#output');

	if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		var elem = $('#photos');

		if(!elem.val())
		{
			output.html(messages.no_image);
			uploadLoading(false);
			return false
		}
		
		var fsize = elem[0].files[0].size; // get file size
		var ftype = elem[0].files[0].type; // get file type
		
		switch(ftype) {
            case 'image/png': 
			case 'image/gif': 
			case 'image/jpeg': 
			case 'image/pjpeg':
			case 'image/png':
				break;
			default:
				output.html(messages.image_wrong_type);
				uploadLoading(false);
				return false
		}

		// Allowed file size is less than 10 MB (10485760)
		if(fsize > 10485760) {
			output.html(messages.image_to_large);
			uploadLoading(false);
			return false
		}
				
		output.html('');  
	}
	else
	{
		// Output error to older unsupported browsers that doesn't support HTML5 File API
		output.html(messages.none_supported_browser);
		uploadLoading(false);
		return false;
	}
}

function success(data) {
	$('#output').html(data.message);

	var template = $('#image-template').html();
	var rendered = Mustache.render(template, data.model);
	$('.three.column.doubling.ui.grid').append(rendered);

	$('.ui.toggle.checkbox').checkbox();

	uploadLoading(false);
}

function displayError(e) {
	console.log(e);
}

function uploadLoading(show) {
	if(show)	
		$('#upload_loading').removeClass('none');
	else
		$('#upload_loading').addClass('none');
}

function showButtonLoad(type, id, show) {
	if(type == 'save') {
		if(show)
			$('#image_save_'+id).find('i').removeClass('edit').addClass('loading');
		else
			$('#image_save_'+id).find('i').removeClass('loading').addClass('edit');
	} else if(type == 'delete') {
		if(show)
			$('#image_delete_'+id).find('i').removeClass('trash').addClass('loading');
		else
			$('#image_delete_'+id).find('i').removeClass('loading').addClass('trash');
	}
}

$(document).on('ready', function() {
	var options = { 
		beforeSubmit: before,
		success: success,
		resetForm: true,
		error: displayError
	}; 

	$('#upload_form').on('submit', function() {
		$(this).ajaxSubmit(options);
		return false;
	});

	$('body').on('click', '[id^="image_save"]', function() {
		var image_id = $(this).parent().parent().prop('id');
		
		var input = help.getInput({ 
			description: 'description_'+image_id,
			is_profile: 'is_profile_'+image_id,
			is_hidden: 'is_hidden_'+image_id 
		}, 'name')

		input.is_profile = $('[name="is_profile_'+image_id+'"]').is(':checked');
		input.is_hidden = $('[name="is_hidden_'+image_id+'"]').is(':checked');

		saveImage(image_id, input);
	});

	$('body').on('click', '[id^="image_delete"]', function() {
		var image_id = $(this).parent().parent().prop('id');
		deleteImage(image_id);
	});

	messages = {
		no_image: $('#no_image_text').val(),
		image_to_large: $('#image_to_large_text').val(),
		image_wrong_type: $('#image_wrong_type_text').val(),
		none_supported_browser: $('#none_supported_browser').val(),
	};

	$('.ui.toggle.checkbox').checkbox()

	$('body').on('click', '.ui.toggle.checkbox', function() {
		var current = $(this)[0];

		if($(this).hasClass('profile')) {
			$('.checkbox').each(function() {
				if(current != $(this)[0] && $(this).hasClass('profile'))
					$(this).checkbox('disable');
			});
		}
	});
});

;(function($) {

	// Browser supports HTML5 multiple file?
	var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined';
	var isIE = /msie/i.test( navigator.userAgent );

	$.fn.customFile = function() {
		return this.each(function() {
			var $file = $(this).addClass('custom-file-upload-hidden'); // the original file input
			var $wrap = $('<div class="file-upload-wrapper">');
			var $input = $('<input type="text" class="file-upload-input" />');
			// Button that will be used in non-IE browsers
			var $button = $('<button type="button" class="file-upload-button">'+$('#choose_file_text').val()+'</button>');
			// Hack for IE
			var $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">'+$('#choose_file_text').val()+'</label>');

			// Hide by shifting to the left so we, can still trigger events
			$file.css({ position: 'absolute', left: '-9999px' });

			$wrap.insertAfter($file).append($file, $input, (isIE ? $label : $button));

			// Prevent focus
			$file.attr('tabIndex', -1);
			$button.attr('tabIndex', -1);

			$button.on('click', function() {
				$file.focus().click(); // Open dialog
			});

			$file.change(function() {

			var files = [], fileArr, filename;
				// If multiple is supported then extractm, all filenames from the file array
				if(multipleSupport) {
					fileArr = $file[0].files;
					for(var i = 0, len = fileArr.length; i < len; i++) {
						files.push(fileArr[i].name);
					}
					filename = files.join(', ');

					
				} else { // If not supported then just take the value, and remove the path to just show the filename
					filename = $file.val().split('\\').pop();
				}

				$input.val(filename) // Set the value
					.attr('title', filename) // Show filename in title tootlip
					.focus(); // Regain focus
			});

			$input.on({
				blur: function() { $file.trigger('blur'); },
				keydown: function(e) {
					if(e.which === 13) { // Enter
						if(!isIE) { 
							$file.trigger('click'); 
						}
					} else if (e.which === 8 || e.which === 46) { // Backspace & Del
						// On some browsers the value is read-only, with this trick we remove the old input and add
						// a clean clone with all the original events attached
						$file.replaceWith($file = $file.clone(true));
						$file.trigger('change');
						$input.val('');
					} else if(e.which === 9) { // TAB
						return;
					} else { // All other keys
						return false;
					}
				}
			});
		});
	};

	// Old browser fallback
	if(!multipleSupport) {
		$(document).on('change', 'input.customfile', function() {
			var $this = $(this);
			// Create a unique ID so we
			// can attach the label to the input
			var uniqId = 'customfile_'+ (new Date()).getTime();
			var $wrap = $this.parent();

			// Filter empty input
			var $inputs = $wrap.siblings().find('.file-upload-input').filter(function(){ 
				return !this.value 
			});

			var $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

			// 1ms timeout so it runs after all other events
			// that modify the value have triggered
			setTimeout(function() {
				// Add a new input
				if($this.val()) {
					// Check for empty fields to prevent
					// creating new inputs when changing files
					if(!$inputs.length) {
						$wrap.after($file);
						$file.customFile();
					}
				} else { // Remove and reorganize inputs
					$inputs.parent().remove();
					// Move the input so it's always last on the list
					$wrap.appendTo($wrap.parent());
					$wrap.find('input').focus();
				}
			}, 1);
		});
	}

})(jQuery);

$('input[type=file]').customFile();