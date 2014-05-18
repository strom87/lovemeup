@extends('layouts.auth')

@section('content')
	
	<div class="login-area">
		<div class="content-container">
			<div class="inner-content-container">
				@include('auth.partial.logo')
				<div class="two column stackable ui grid">
					<div class="column">
						@include('auth.partial.login')
					</div>
					<div class="column">
						@include('auth.partial.message')
					</div>
				</div>
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