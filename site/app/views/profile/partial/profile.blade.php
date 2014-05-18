<h3>{{ $model->user->name }}</h3>
<div>
	<a class="image-popup-no-margins" href="{{ $model->profileImage->large }}">
		<img class="rounded ui image" src="{{ $model->profileImage->small }}" />
	</a>
</div>

<div class="three column doubling ui grid">
	<div class="column">
		<div class="field">
			<label>{{ trans('profile.profile.birth_year') }}</label>
			<div class="ui fluid selection dropdown states">
				<input type="hidden" name="birth_year" value="{{ $model->user->birth_year }}">
				<div class="default text">{{ $model->user->birth_year }}</div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->years as $id => $year)
						@if($id == $model->user->birth_year)
							<div class="item active" data-value="{{ $id }}">{{ $year }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $year }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>