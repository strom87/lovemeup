<h4 class="ui header">{{ trans('userprofile.details.header_1') }}</h4>
<div class="three column doubling ui grid">
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.eye_color') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="eye_color" value="{{ $model->eyeColor }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->eyeColors as $id => $eyeColor)
						@if($id == $model->eyeColor)
							<div class="item active" data-value="{{ $id }}">{{ $eyeColor }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $eyeColor }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.hair_color') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="hair_color" value="{{ $model->hairColor }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->hairColors as $id => $hairColor)
						@if($id == $model->hairColor)
							<div class="item active" data-value="{{ $id }}">{{ $hairColor }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $hairColor }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.physique') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="physique" value="{{ $model->physique }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->physiques as $id => $physique)
						@if($id == $model->physique)
							<div class="item active" data-value="{{ $id }}">{{ $physique }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $physique }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<h4 class="ui header">{{ trans('userprofile.details.header_2') }}</h4>
<div class="three column doubling ui grid">
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.education') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="education" value="{{ $model->education }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->educations as $id => $education)
						@if($id == $model->education)
							<div class="item active" data-value="{{ $id }}">{{ $education }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $education }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.work') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="work" value="{{ $model->work }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->works as $id => $work)
						@if($id == $model->work)
							<div class="item active" data-value="{{ $id }}">{{ $work }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $work }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.work_status') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="work_status" value="{{ $model->workStatus }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->workStatuses as $id => $workStatus)
						@if($id == $model->workStatus)
							<div class="item active" data-value="{{ $id }}">{{ $workStatus }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $workStatus }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<h4 class="ui header">{{ trans('userprofile.details.header_3') }}</h4>
<div class="three column doubling ui grid">
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.children') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="children" value="{{ $model->children }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->childrens as $id => $children)
						@if($id == $model->children)
							<div class="item active" data-value="{{ $id }}">{{ $children }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $children }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.pet') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="pet" value="{{ $model->pet }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->pets as $id => $pet)
						@if($id == $model->pet)
							<div class="item active" data-value="{{ $id }}">{{ $pet }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $pet }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.alcohol') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="alcohol" value="{{ $model->alcohol }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->alcohols as $id => $alcohol)
						@if($id == $model->alcohol)
							<div class="item active" data-value="{{ $id }}">{{ $alcohol }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $alcohol }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label>{{ trans('userprofile.details.tobacco') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="tobacco" value="{{ $model->tobacco }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->alcohols as $id => $tobacco)
						@if($id == $model->tobacco)
							<div class="item active" data-value="{{ $id }}">{{ $tobacco }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $tobacco }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<a id="save" class="ui green button">
	<i id="save_icon" class="save icon"></i>
	{{ trans('button.save') }}
</a>