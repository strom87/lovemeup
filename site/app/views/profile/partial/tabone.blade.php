<div class="ui">
	
	<div class="one column doubling ui grid">
		<div class="column">
			<h4 class="ui header">Beskrivning</h4>
			@foreach($model->description as $text)
					{{{ $text }}}<br />
			@endforeach
		</div>
	</div>
	<div class="ui horizontal icon divider">
		<i class="circular photo icon"></i>
	</div>
	<div class="four column doubling ui grid">

		@foreach($model->images as $image)	
			<div class="column">
				<div class="ui segment profile-images">
					<a class="image-popup-no-margins" href="{{ $image->large }}">
						<img class="rounded ui image" src="{{ $image->medium }}" />
					</a>
					<p>
						@foreach(explode("\n", $image->description) as $text)
							{{{ $text }}}<br />
						@endforeach
					</p>
				</div>
			</div>
		@endforeach

	</div>
</div>