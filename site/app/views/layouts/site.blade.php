<!DOCTYPE html>
<html lang="sv">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="key, words">
	<meta name="description" content="desc">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href={{ asset('img/favicon.ico') }} >

	{{ HTML::style('css/semantic.min.css') }}
	{{ HTML::style('css/magnific-popup.css') }}
	{{ HTML::style('css/site/site.css') }}
</head>
<body>	
	<div class="ui inverted main menu">
		<a id="home" class="item" href="{{ url('/') }}">
			<i class="home icon"></i>
			{{ trans('menu.header') }}
		</a>
		<div class="right menu">
			<a class="item" href="{{ url('user-profile') }}">
				<i class="user icon"></i>
				{{ trans('menu.site.userprofile') }}
			</a>
			<a class="item">
				<i class="mail icon"></i>
				{{ trans('menu.site.messages') }}
			</a>
			<a class="item" href="{{ url('search') }}">
				<i class="filter icon"></i>
				{{ trans('menu.site.search') }}
			</a>
			<div class="item">
				<div class="ui icon input">
					<input type="text" id="menu_search" placeholder="{{ trans('menu.search') }}">
					<i id="menu_search_icon" class="pointer search icon" style="cursor: pointer"></i>
				</div>
			</div>
			<a class="item" href="{{ url('signout') }}">
				<i class="sign out icon"></i>
				{{ trans('menu.site.signout') }}
			</a>
		</div>
	</div>
	<div class="content-container">
		<div class="inner-content-container">
			@yield('content')
		</div>
	</div>

	{{ HTML::script('js/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/jquery.address.js') }}
	{{ HTML::script('js/semantic.min.js') }}
	{{ HTML::script('js/jquery.magnific-popup.min.js') }}
	{{ HTML::script('js/mustache.js') }}
	{{ HTML::script('js/help.js') }}
	{{ HTML::script('js/site/site.js') }}

	@yield('script')
	
</body>
</html>