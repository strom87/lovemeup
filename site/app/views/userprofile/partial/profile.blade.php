<h3>{{ $model->user->name }}</h3>
<div>
	<a class="image-popup-no-margins" href="{{ $model->profileImage->large }}">
		<img class="rounded ui image" src="{{ $model->profileImage->small }}" />
	</a>
</div>

<div class="three column doubling ui grid">
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.state') }}</label>
			<div class="ui fluid selection dropdown states">
				<input type="hidden" name="state" value="{{ $model->user->state_id }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->states as $id => $state)
						@if($id == $model->user->state_id)
							<div class="item active" data-value="{{ $id }}">{{ $state }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $state }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.city') }}</label>
			<div id="cities" class="ui fluid selection dropdown cities">
				<input type="hidden" name="city" value="{{ $model->user->city_id }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->cities as $id => $city)
						@if($id == $model->user->city_id)
							<div class="item active" data-value="{{ $id }}">{{ $city }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $city }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.birth_year') }}</label>
			<div class="ui fluid selection dropdown">
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
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.length') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="length" value="{{ $model->user->length }}">
				<div class="default text">{{ $model->user->length }}</div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->lengths as $id => $length)
						@if($id == $model->user->length)
							<div class="item active" data-value="{{ $id }}">{{ $length }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $length }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.gender') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="gender" value="{{ $model->user->gender_id }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->genders as $id => $gender)
						@if($id == $model->user->gender_id)
							<div class="item active" data-value="{{ $id }}">{{ $gender }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $gender }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.partner_gender') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="partner_gender" value="{{ $model->user->userRelation->gender_id }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->genders as $id => $gender)
						@if($id == $model->user->userRelation->gender_id)
							<div class="item active" data-value="{{ $id }}">{{ $gender }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $gender }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.relationship_status') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="relationship_status" value="{{ $model->user->userRelation->relationship_status_id }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->statuses as $id => $status)
						@if($id == $model->user->userRelation->relationship_status_id)
							<div class="item active" data-value="{{ $id }}">{{ $status }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $status }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.relationship_search') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="relationship_search" value="{{ $model->user->userRelation->relationship_search_id }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->searches as $id => $search)
						@if($id == $model->user->userRelation->relationship_search_id)
							<div class="item active" data-value="{{ $id }}">{{ $search }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $search }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.minage') }}</label>
			<div id="minage_id" class="ui fluid selection dropdown minage">
				<input type="hidden" name="minage" value="{{ $model->user->userRelation->minage }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->ages as $id => $age)
						@if($id == $model->user->userRelation->minage)
							<div class="item active" data-value="{{ $id }}">{{ $age }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $age }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.profile.maxage') }}</label>
			<div id="maxage_id" class="ui fluid selection dropdown maxage">
				<input type="hidden" name="maxage" value="{{ $model->user->userRelation->maxage }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->ages as $id => $age)
						@if($id == $model->user->userRelation->maxage)
							<div class="item active" data-value="{{ $id }}">{{ $age }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $age }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="one column doubling ui grid">
	<div class="column">
		<div class="field">
			<div class="ui form">
				{{ Form::label('description', trans('userprofile.profile.description')) }}
				{{ Form::textarea('description', $model->user->description, ['id'=>'description']) }}
			</div>
		</div>
	</div>
	<div class="column">
		<a id="save" class="ui green button">
			<i class="icon save"></i>
			{{ trans('button.save') }}
		</a>
	</div>
</div>