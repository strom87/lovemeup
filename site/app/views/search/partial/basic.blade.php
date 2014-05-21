<h3 class="ui header">Sök</h3>
<div class="three column doubling ui grid">
	<div class="column">
		<div class="ui form">
			<div class="fields">

				<div class="four wide field">
					<label>{{ trans('userprofile.details.eye_color') }}</label>
					<div class="ui fluid selection dropdown">
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
				<div class="four wide field">
					<label>{{ trans('userprofile.details.eye_color') }}</label>
					<div class="ui fluid selection dropdown">
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
		</div>
	</div>
</div>