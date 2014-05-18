function before() {
	if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		var elem = $('#photos');

		if(!elem.val())
		{
			$("#output").html("Are you kidding me?");
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
				$("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
		}

		// Allowed file size is less than 10 MB (10485760)
		if(fsize > 10485760) {
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
			return false
		}
				
		$("#output").html("");  
	}
	else
	{
		// Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

function success(data) {
	console.log(data);
}

function progress(event, position, total, percent) {
	console.log(percent);
	progressBar(percent);
}

function bytesToSize(bytes) {
	var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	if (bytes == 0) return '0 Bytes';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

function displayError(e) {
	console.log(e);
}

function progressBar(percent) {
	$('.ui.teal.progress').find('.bar').css('width', percent + '%');
}

$(document).on('ready', function() {
	var options = { 
		target: '#output',
		beforeSubmit: before,
		success: success,
		uploadProgress: progress,
		resetForm: true,
		error: displayError
	}; 

	$('#uploadForm').submit(function() {
		progressBar(0);
		$(this).ajaxSubmit(options);
		return false;
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
			var $button = $('<button type="button" class="file-upload-button">Select a File</button>');
			// Hack for IE
			var $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select a File</label>');

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