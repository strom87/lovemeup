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

<div class="ui red vertical demo right sidebar menu">
  <a class="item">
    <i class="home icon"></i>
    Home
  </a>
  <a class="active item">
    <i class="heart icon"></i>
    Current Section
  </a>
  <a class="item">
    <i class="facebook icon"></i>
    Like us on Facebook
  </a>
  <div class="item">
    <b>More</b>
    <div class="menu">
      <a class="item">About</a>
      <a class="item">Contact Us</a>
    </div>
  </div>
</div>

<div id="message_sidebar" class="ui red button">
asdasd
</div>