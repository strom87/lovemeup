<div class="ui segment">
	@foreach($model->messages as $message)

		<div class="ui tiny header">
			{{{ $message->name }}}
			 - 
			{{ preg_replace('/:\d{2}$/', '', $message->created_at) }}
		 </div>

		@foreach(explode("\n", $message->text) as $text)
			{{{ $text }}}<br />
		@endforeach
	
	@endforeach
</div>