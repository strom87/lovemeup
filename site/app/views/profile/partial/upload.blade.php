<form id="upload_form" action="{{ url('api/profile/images-upload') }}" method="post" enctype="multipart/form-data">

	<input type="hidden" id="choose_file_text" value="{{ trans('button.choose_images') }}" />
	<input type="hidden" id="no_image_text" value="{{ trans('profile.images.no_image') }}" />
	<input type="hidden" id="image_to_large_text" value="{{ trans('profile.images.image_to_large') }}" />
	<input type="hidden" id="image_wrong_type_text" value="{{ trans('profile.images.image_wrong_type') }}" />

	<input name="photos[]" id="photos" type="file" multiple />
	
	<input type="submit" id="upload_submit" class="ui teal button" value="{{ trans('button.upload') }}" />
	<span id="upload_loading" class="none">
		<i class="icon large loading"></i>
	</span>

</form>

<div id="output" class="output"></div>