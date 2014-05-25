<div class="ui vertical messagemenu right sidebar menu">
	
	@foreach ($model->users as $user)
		<a id="user_{{ $user->id }}" class="item">
			<img class="ui avatar image" src="{{ $user->profileimage->small }}">
			<i class="circle green icon"></i>
			{{{ $user->name }}}
		</a>
	@endforeach
	
</div>

<div id="message_sidebar" class="ui red button">
	asdasd
</div>