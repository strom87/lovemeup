
{{ Form::open(['class'=>'ui form segment login no-box-shadow']) }}
	<h2>Logga in</h2>
	<div class="field">
		<label>E-post / användarnamn</label>
		<div class="ui left labeled input">
			{{ Form::text('loginName', null, ['placeholder'=>'E-post / användarnamn']) }}
		</div>
	</div>
	<div class="field">
		<label>Lösenord</label>
		<div class="ui left labeled input">
			{{ Form::password('loginPassword', ['placeholder'=>'Lösenord']) }}
			<div id="loginError" class="ui red message small none">
				<span></span>
			</div>
		</div>
	</div>
	<div id="login" class="ui green submit button">
		<i id="loginIcon" class="icon sign in"></i>
		Logga in
	</div>

{{ Form::close() }}