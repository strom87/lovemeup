<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ trans('mail.password.header') }}</h2>
		<p>
			{{ trans('mail.password.body') }}
		</p>
		<p>
			{{ trans('mail.password.new') }}
			{{ $password }}
		</p>
	</body>
</html>
