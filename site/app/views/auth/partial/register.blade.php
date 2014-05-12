{{ Form::open(['id'=>'registerForm', 'class'=>'ui form segment']) }}
	<h2>Registrera</h2>
	<div class="two column stackable ui grid">
		<div class="column">
			<div class="ui">
				<div class="field">
					<label>E-post</label>
					<div class="ui left labeled input">
						{{ Form::text('email', null, ['placeholder'=>'E-post']) }}
						<div id="emailError" class="ui red message none">
							<span></span>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Användarnamn</label>
					<div class="ui left labeled input">
						{{ Form::text('name', null, ['placeholder'=>'Användarnamn']) }}
						<div id="nameError" class="ui red message none">
							<span></span>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Lösenord</label>
					<div class="ui left labeled input">
						{{ Form::password('password', ['placeholder'=>'Lösenord']) }}
						<div id="passwordError" class="ui red message none">
							<span></span>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Repetera lösenord</label>
					<div class="ui left labeled input">
						{{ Form::password('password_confirmation', ['placeholder'=>'Repetera lösenord']) }}
					</div>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="ui">
				<div class="two fields">
					<div class="field">
						<label>Födelse år</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="birthYear">
							<div class="default text">Välj år</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->years as $id => $year)
									<div class="item" data-value="{{ $id }}">{{ $year }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>Längd (cm)</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="length">
							<div class="default text">Välj längd</div>
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
						<label>Ditt kön</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="gender">
							<div class="default text">Välj kön</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->genders as $id => $gender)
									<div class="item" data-value="{{ $id }}">{{ $gender }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>Söker kön</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="partnerGender">
							<div class="default text">Välj söker kön</div>
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
						<label>Relationsstatus</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="relationshipStatus">
							<div class="default text">Välj relationsstatus</div>
							<i class="dropdown icon"></i>
							<div class="menu">
								@foreach($model->statuses as $id => $status)
									<div class="item" data-value="{{ $id }}">{{ $status }}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>Söker relation</label>
						<div class="ui fluid selection dropdown">
							<input type="hidden" name="relationshipSearch">
							<div class="default text">Välj söker relation</div>
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
			<input type="checkbox" name="acceptedRules" id="acceptedRules">
			<label>Jag godkänner reglerna</label>
		</div>
		<span id="readRules" class="rules">Läs regler</span>
	</div>
	<div id="register" class="ui teal submit button">
		<i id="registerIcon" class="icon add"></i>
		Registrera
	</div>
{{ Form::close() }}