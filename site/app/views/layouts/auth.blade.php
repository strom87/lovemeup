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
	{{ HTML::style('css/auth/auth.css') }}
</head>
<body>	
	
	@yield('content')

	{{ HTML::script('js/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/semantic.min.js') }}
	{{ HTML::script('js/help.js') }}
	{{ HTML::script('js/auth/auth-script.js') }}
</body>
</html>