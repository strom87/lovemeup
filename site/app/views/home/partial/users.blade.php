<div class="five column doubling ui grid">
@foreach($model->users as $user)
	<div class="column">
		<div class="ui segment">
			<div>
				<h3>{{{ $user->name }}}</h3>
			</div>
			<div>
				<a class="image-popup-no-margins" href="{{ $user->image->large }}">
					<img src="{{ $user->image->small }}" class="rounded ui image" />
				</a>
			</div>
			<div>
				<p>
					<b>Län</b><br />
					{{ $user->state }}
				</p>
				<p>
					<b>Ålder</b><br />
					{{ $user->age }}
				</p>
			</div>
		</div>
	</div>


@endforeach
</div>