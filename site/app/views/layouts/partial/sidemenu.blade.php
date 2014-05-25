<div class="ui vertical sidemenu sidebar menu">
	<a id="close_side_menu" class="item">
		<i class="close icon"></i>
			{{ trans('menu.close') }}
		</a>
	<div class="item">
		<div class="ui icon input">
			<input type="text" id="menu_search" placeholder="{{ trans('menu.search') }}">
			<i id="menu_search_icon" class="pointer search icon" style="cursor: pointer"></i>
		</div>
	</div>
	<a class="item" href="{{ url('user-profile') }}">
		<i class="user icon"></i>
		{{ trans('menu.site.userprofile') }}
	</a>
	<a class="item" href="{{ url('messages') }}">
		<i class="mail icon"></i>
		{{ trans('menu.site.messages') }}
	</a>
	<a class="item" href="{{ url('search') }}">
		<i class="filter icon"></i>
		{{ trans('menu.site.search') }}
	</a>
	<a class="item" href="{{ url('signout') }}">
		<i class="sign out icon"></i>
		{{ trans('menu.site.signout') }}
	</a>
</div>