<div class="ui secondary pointing menu">
	<a href="{{ url('user-profile') }}" class="item">
		<i class="user icon"></i> 
		{{ trans('menu.userprofile.profile') }}
	</a>
	<a href="{{ url('user-profile/details') }}" class="item">
		<i class="book icon"></i> 
		{{ trans('menu.userprofile.details') }}
	</a>
	<a href="{{ url('user-profile/images') }}" class="item">
		<i class="photo icon"></i> 
		{{ trans('menu.userprofile.images') }}
	</a>
</div>
