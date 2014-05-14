
{{ Form::open(['class'=>'ui form login no-box-shadow']) }}
	<div class="field pading-bot-top">
		<h2>{{ trans('auth.login.header') }}</h2>
	</div>
	<div class="field">
		<label>{{ trans('auth.login.name') }}</label>
		<div class="ui left labeled input">
			{{ Form::text('loginName', null, ['placeholder'=>trans('auth.login.name')]) }}
		</div>
	</div>
	<div class="field">
		<label>{{ trans('auth.login.password') }}</label>
		<div class="ui left labeled input">
			{{ Form::password('loginPassword', ['placeholder'=>trans('auth.login.password') ]) }}
			<div id="loginError" class="ui red message small none">
				<span></span>
			</div>
		</div>
	</div>
	<div class="field">
		<div id="login" class="ui green submit button">
			<i id="loginIcon" class="icon sign in"></i>
			{{ trans('button.login') }}
		</div>
	</div>
	<div class="field pading-bot-top">
		<span id="showNewPassword" class="point">Glömt lösenordet?</span>
	</div>

{{ Form::close() }}