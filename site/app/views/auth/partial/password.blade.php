<div id="passwordModal" class="ui modal">
	<i class="close icon"></i>
	<div class="header">
		{{ trans('auth.password.header') }}
	</div>
	<div class="content">
		<p>
			{{ trans('auth.password.body') }}
		</p>
		<div class="ui form">
			<div class="field">
				<label>{{ trans('auth.password.email') }}</label>
				<div class="ui left labeled input">
					{{ Form::text('newPasswordEmail', null, ['placeholder'=>trans('auth.password.email')]) }}
				</div>
			</div>
			<div class="field">
				<div id="newPassword" class="ui blue submit button">
					<i id="newPasswordIcon" class="icon add"></i>
					{{ trans('button.send') }}
				</div>
				<div id="newPasswordMessage" class="ui green message none">
					<span>{{ trans('auth.password.message') }}</span>
				</div>
			</div>
		</div>
	</div>
</div>