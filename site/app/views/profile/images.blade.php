@extends('layouts.site')

@section('content')

	@include('profile.partial.menu')

	@include('profile.partial.upload')

@stop

@section('script')
	
	{{ HTML::script('js/jquery.form.min.js') }}
	{{ HTML::script('js/site/profile/image.js') }}

@stop