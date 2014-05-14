<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ trans('mail.welcome.header') }}</h2>
		<p>
			{{ trans('mail.welcome.body') }}
		</p>
		<a href="{{ $link }}">{{ trans('mail.welcome.link') }}</a>
	</body>
</html>
