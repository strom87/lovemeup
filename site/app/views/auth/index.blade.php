@extends('layouts.auth')

@section('content')
	
	<div class="login-area">
		<div class="content-container">
			<div class="inner-content-container">
				@include('auth.partial.login')
			</div>
		</div>
	</div>
	<div class="separator"></div>
	<div class="content-container">
		<div class="inner-content-container">
			@include('auth.partial.register')
		</div>
	</div>

	@include('auth.partial.rules')
	@include('auth.partial.success')
	@include('auth.partial.activated')
	@include('auth.partial.password')
	
@stop