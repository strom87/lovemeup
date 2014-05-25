<div id="message_modal" class="ui modal">
	<i class="close icon"></i>
	<div class="header">
		Skicka meddelande
	</div>
	<div class="content">
		<div class="ui form">
			<div class="field">
				<label>Meddelande text</label>
				{{ Form::textarea('message_text') }}
			</div>
			<div class="field">
				<div id="send_message" class="ui teal button">
					<i id="send_message_icon" class="mail icon"></i>
					{{ trans('button.send') }}	
				</div>
			</div>
		</div>
		{{ Form::hidden('profile_id', $model->id) }}
	</div>
</div>

<div class="ui page dimmer">
	<div class="content">
		<div class="center">
			<h2 class="ui inverted icon header">
				<i class="icon circular inverted emphasized teal mail"></i>
				Meddelandet skickat!
			</h2>
		</div>
	</div>
</div>