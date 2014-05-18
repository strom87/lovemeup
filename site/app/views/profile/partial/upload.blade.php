<form id="uploadForm" action="{{ url('api/profile/images-upload') }}" method="post" enctype="multipart/form-data">
	<input name="photos[]" id="photos" type="file" multiple />
	<input type="submit" id="uploadSubmit" class="ui black button" value="Ladda upp" />
</form>
<div class="ui teal progress">
  <div class="bar"></div>
</div>

<div id="output"></div>