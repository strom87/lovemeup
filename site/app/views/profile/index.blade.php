@extends('layouts.site')

@section('content')

	@include('profile.partial.menu')

	@include('profile.partial.profile')

@stop

@section('script')
	
	{{ HTML::script('js/site/profile/profile.js') }}

@stop