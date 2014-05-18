{{ Form::open(['id'=>'register_form', 'class'=>'ui form segment']) }}
	<h2>{{ trans('auth.register.header') }}</h2>
	<div class="two column stackable ui grid">
		<div class="column">
			<div class="ui">
				<div class="field">
					<label>{{ trans('auth.register.email') }}</label>
					<div class="ui left labeled input">
						{{ Form::text('email', null, ['placeholder'=>trans('auth.register.email')]) }}
						<div id="email_error" class="ui red message none">
							<span></span>
						</div>
					</div>
				</div>
				<div class="field">
					<label>{{ trans('auth.register.name') }}</label>
					<div class="ui left labeled input">
						{{ Form::text('name', null, ['placeholder'=>trans('auth.register.name')]) }}
						<div id="name_error" class="ui red message none">
							<span></span>
						</div>
					</div>
				</div>
				<div class="field">
					<label>{{ trans('auth.register.password') }}</label>
					<div class="ui left labeled input">
						{{ Form::password('password', ['placeholder'=>trans('auth.register.password')]) }}
						<div id="password_error" class="ui red message none">
							<span></span>
						</div>
					</div>
				</div>
				<div class="field">
					<label>{{ trans('auth.register.confirmation_password') }}</label>
					<div class="ui left labeled input">
						{{ Form::password('password_confirmation', ['placeholder'=>trans('auth.register.confirmation_password')]) }}
					</div>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="ui">
				<div class="two fields">
					<div class="field">
						<label>{{ trans('auth.register.state') }}</label>
						<div class="ui fluid selection dropdown states">
							<input type="hidden" name="state">
							<div class="default text">{{ trans('auth.register.state_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->states as $id => $state)
									<div class="item" data-value="{{ $id }}">{{ $state }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>{{ trans('auth.register.city') }}</label>
						<div id="cities" class="ui fluid selection dropdown cities">
							<input type="hidden" name="city">
							<div class="default text">{{ trans('auth.register.city_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->cities as $id => $city)
									<div class="item" data-value="{{ $id }}">{{ $city }}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>{{ trans('auth.register.birth_year') }}</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="birth_year">
							<div class="default text">{{ trans('auth.register.birth_year_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->years as $id => $year)
									<div class="item" data-value="{{ $id }}">{{ $year }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>{{ trans('auth.register.length') }}</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="length">
							<div class="default text">{{ trans('auth.register.length_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->lengths as $id => $length)
									<div class="item" data-value="{{ $id }}">{{ $length }}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>{{ trans('auth.register.gender') }}</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="gender">
							<div class="default text">{{ trans('auth.register.gender_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->genders as $id => $gender)
									<div class="item" data-value="{{ $id }}">{{ $gender }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>{{ trans('auth.register.partner_gender') }}</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="partner_gender">
							<div class="default text">{{ trans('auth.register.partner_gender_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->genders as $id => $gender)
									<div class="item" data-value="{{ $id }}">{{ $gender }}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="two fields">
					<div class="field">
						<label>{{ trans('auth.register.relationship_status') }}</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="relationship_status">
							<div class="default text">{{ trans('auth.register.relationship_status_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->statuses as $id => $status)
									<div class="item" data-value="{{ $id }}">{{ $status }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>{{ trans('auth.register.relationship_search') }}</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="relationship_search">
							<div class="default text">{{ trans('auth.register.relationship_search_pick') }}</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->searches as $id => $search)
									<div class="item" data-value="{{ $id }}">{{ $search }}</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="inline field">
		<div class="ui checkbox">
			<input type="checkbox" name="accepted_rules" id="accepted_rules">
			<label>{{ trans('auth.register.accepted_rules') }}</label>
		</div>
		<span id="read_rules" class="point">{{ trans('auth.register.read_rules') }}</span>
	</div>
	<div id="register" class="ui teal submit button">
		<i id="register_icon" class="icon add"></i>
		{{ trans('button.register') }}
	</div>
{{ Form::close() }}