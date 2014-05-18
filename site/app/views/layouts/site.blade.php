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
	{{ HTML::style('css/site/site.css') }}
</head>
<body>	
	<div class="ui inverted menu">
		<a class="item" href="{{ url('home') }}">
			<i class="home icon"></i>
			LoveMeUp
		</a>
		<div class="right menu">
			<a class="item" href="{{ url('profile') }}">
				<i class="user icon"></i>
				{{ trans('menu.site.profile') }}
			</a>
			<a class="item">
				<i class="mail icon"></i>
				{{ trans('menu.site.messages') }}
			</a>
		</div>
	</div>
	<div class="content-container">
		<div class="inner-content-container">
			@yield('content')
		</div>
	</div>

	{{ HTML::script('js/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/semantic.min.js') }}
	{{ HTML::script('js/help.js') }}

	@yield('script')
	
</body>
</html>