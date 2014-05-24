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
				<a class="ui teal button">
					<i class="mail icon"></i>
					{{ trans('button.send') }}	
				</a>
			</div>
		</div>
	</div>
</div>