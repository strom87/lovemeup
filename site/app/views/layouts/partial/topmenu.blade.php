<div class="ui inverted main menu">
	<div class="large-menu">
		<a id="home" class="item" href="{{ url('/') }}">
			<i class="teal home icon"></i>
			{{ trans('menu.header') }}
		</a>
	</div>
	<div class="medium-menu">
		<a id="open_side_menu" class="item">
			<i class="list layout icon"></i>
			{{ trans('menu.open') }}
		</a>
		<a id="home" class="item" href="{{ url('/') }}">
			{{ trans('menu.header') }}
		</a>
	</div>
	<div class="right menu large-menu">
		<a class="item" href="{{ url('user-profile') }}">
			<i class="teal user icon"></i>
			{{ trans('menu.site.userprofile') }}
		</a>
		<a class="item" href="{{ url('messages') }}">
			<i class="teal mail icon"></i>
			{{ trans('menu.site.messages') }}
		</a>
		<a class="item" href="{{ url('search') }}">
			<i class="teal filter icon"></i>
			{{ trans('menu.site.search') }}
		</a>
		<div class="item">
			<div class="ui icon input">
				<input type="text" id="menu_search" placeholder="{{ trans('menu.search') }}">
				<i id="menu_search_icon" class="pointer search icon" style="cursor: pointer"></i>
			</div>
		</div>
		<a class="item" href="{{ url('signout') }}">
			<i class="teal sign out icon"></i>
			{{ trans('menu.site.signout') }}
		</a>
	</div>
</div>