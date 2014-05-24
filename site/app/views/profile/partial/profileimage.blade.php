<div class="two column doubling ui grid">
	<div class="column">
		<h3 class="ui header">{{ $model->name }}</h3>
		<div>
			<a class="image-popup-no-margins" href="{{ $model->profileImage->large }}">
				<img class="rounded ui image" src="{{ $model->profileImage->small }}" />
			</a>
		</div>
	</div>
</div>
<div class="ui labeled icon menu">
	<a id="message" class="item">
		<i class="mail icon"></i>
		Skicka meddelande
	</a>
	<a id="flirt" class="item">
		<i class="heart icon"></i>
		Skicka en flört
	</a>
</div>