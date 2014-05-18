<div class="three column doubling ui grid">
	@foreach($images as $image)
		<div class="column">
			<div class="ui segment">
				<div class="profile-image-list">
					<a class="image-popup-no-margins" href="{{ asset($image->paths->large) }}">
						<img src="{{ asset($image->paths->medium) }}" class="rounded ui image" />
					</a>
				</div>
				<div id="{{ $image->id }}" class="ui form">
					<div class="field">
						<div class="ui toggle checkbox">
							{{ Form::checkbox('is_hidden_'.$image->id, 'is_hidden', $image->is_hidden) }}
							<label>Dölj bild</label>
						</div>
					</div>
					<div class="field">
						<div class="ui toggle checkbox profile">
							{{ Form::checkbox('is_profile_'.$image->id, 'is_profile', $image->is_profile) }}
							<label>Sätt som profil bild</label>
						</div>
					</div>
					<div class="field">
						<label>Beskrivning</label>
						{{ Form::textarea('description_'.$image->id, $image->description) }}
					</div>
					<div class="inline field">
						<a id="image_save_{{ $image->id }}" class="ui green button">
							<i class="icon edit"></i>
							{{ trans('button.save') }}
						</a>
						<a id="image_delete_{{ $image->id }}" class="ui red button">
							<i class="icon trash"></i>
							{{ trans('button.delete') }}
						</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>

<script id="image-template" type="text/template">
	@{{#images}}
		<div class="column">
			<div class="ui segment">
				<div class="profile-image-list">
					<a class="image-popup-no-margins" href="@{{path.large}}">
						<img src="@{{path.medium}}" class="rounded ui image" />
					</a>
				</div>
				<div id="@{{id}}" class="ui form">
					<div class="field">
						<div class="ui toggle checkbox">
							<input type="checkbox" name="is_hidden_@{{id}}" value="is_hidden" />
							<label>Dölj bild</label>
						</div>
					</div>
					<div class="field">
						<div class="ui toggle checkbox profile">
							<input type="checkbox" name="is_profile_@{{id}}" value="is_profile" />
							<label>Sätt som profil bild</label>
						</div>
					</div>
					<div class="field">
						<label>Beskrivning</label>
						<textarea name="description_@{{id}}"></textarea>
					</div>
					<div class="inline field">
						<a id="image_save_@{{id}}" class="ui green button">
							<i class="icon edit"></i>
							{{ trans('button.save') }}
						</a>
						<a id="image_delete_@{{id}}" class="ui red button">
							<i class="icon trash"></i>
							{{ trans('button.delete') }}
						</a>
					</div>
				</div>
			</div>
		</div>
	@{{/images}}
</script>