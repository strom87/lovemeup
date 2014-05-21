<h3 class="ui header">{{ $model->name }}</h3>
<div class="profile-image">
	<a class="image-popup-no-margins" href="{{ $model->profileImage->large }}">
		<img class="rounded ui image" src="{{ $model->profileImage->small }}" />
	</a>
</div>