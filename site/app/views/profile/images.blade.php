@extends('layouts.site')

@section('content')

	@include('profile.partial.menu')

	@include('profile.partial.upload')

	@include('profile.partial.imagelist')

@stop

@section('script')
	
	{{ HTML::script('js/jquery.form.min.js') }}
	{{ HTML::script('js/site/profile/image.js') }}

@stop