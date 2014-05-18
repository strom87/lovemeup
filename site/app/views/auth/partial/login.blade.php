{{ Form::open(['class'=>'ui form login']) }}
	<div class="field pading-header">
		<h2>{{ trans('auth.login.header') }}</h2>
	</div>
	<div class="field">
		<label>{{ trans('auth.login.name') }}</label>
		<div class="ui left labeled input">
			{{ Form::text('login_name', null, ['placeholder'=>trans('auth.login.name')]) }}
		</div>
	</div>
	<div class="field">
		<label>{{ trans('auth.login.password') }}</label>
		<div class="ui left labeled input">
			{{ Form::password('login_password', ['placeholder'=>trans('auth.login.password') ]) }}
			<div id="login_error" class="ui red message small none">
				<span></span>
			</div>
		</div>
	</div>
	<div class="field">
		<div id="login" class="ui green submit button">
			<i id="login_icon" class="icon sign in"></i>
			{{ trans('button.login') }}
		</div>
	</div>
	<div class="field pading-forgot">
		<span id="show_new_password" class="point">Glömt lösenordet?</span>
	</div>

{{ Form::close() }}