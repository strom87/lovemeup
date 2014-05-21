<div class="four column stackable ui grid">
@foreach($model->users as $user)
	<div class="column">
		<div class="ui segment">
			<div class="search-link">
				<a href="{{ url('profile/user/'.$user->name) }}">{{{ $user->name }}}</a>
			</div>
			<div class="search-image">
				<a class="image-popup-no-margins" href="{{ $user->image->large }}">
					<img src="{{ $user->image->small }}" class="rounded ui image" />
				</a>
			</div>
			<table>
				<tbody>
					<tr>
						<td>Ålder:</td>
						<td>{{ $user->age }}</td>
					</tr>
					<tr>
						<td>Län:</td>
						<td>{{ $user->state }}</td>
					</tr>
					<tr>
						<td>Stad:</td>
						<td>{{ $user->city }}</td>
					</tr>
				</tbody>
			</table>	
		</div>
	</div>
@endforeach
</div>