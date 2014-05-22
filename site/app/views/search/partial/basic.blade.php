<h3 class="ui header">{{ trans('search.header') }}</h3>

<div class="ui form">
	<div class="fields">
		<div class="four wide field">
			<div class="ui checkbox">
				<input type="checkbox" name="has_profile">
				<label>{{ trans('search.has_profile') }}</label>
			</div>
		</div>
	</div>
	<div class="fields">
		<div class="four wide field">
			<div class="ui checkbox">
				<input type="checkbox" name="search_my_age">
				<label>{{ str_replace(':age', $model->age, trans('search.search_my_age')) }}</label>
			</div>
		</div>
	</div>
	<div class="fields">
		<div class="two wide field">
			<label>{{ trans('search.minage') }}</label>
			<div class="ui fluid selection dropdown minage">
				<input type="hidden" name="minage" value="{{ $model->minage }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->ages as $id => $age)
						@if($id == $model->minage)
							<div class="item active" data-value="{{ $id }}">{{ $age }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $age }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="two wide field">
			<label>{{ trans('search.maxage') }}</label>
			<div class="ui fluid selection dropdown maxage">
				<input type="hidden" name="maxage" value="{{ $model->maxage }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->ages as $id => $age)
						@if($id == $model->maxage)
							<div class="item active" data-value="{{ $id }}">{{ $age }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $age }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="fields">
		<div class="four wide field">
			<label>{{ trans('search.states') }}</label>
			<div class="ui fluid selection dropdown">
				<input type="hidden" name="state" value="{{ $model->state }}">
				<div class="default text"></div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($model->states as $id => $state)
						@if($id == $model->state)
							<div class="item active" data-value="{{ $id }}">{{ $state }}</div>
						@else
							<div class="item" data-value="{{ $id }}">{{ $state }}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>