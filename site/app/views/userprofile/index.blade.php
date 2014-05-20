@extends('layouts.site')

@section('content')

	@include('userprofile.partial.menu')

	@include('userprofile.partial.profile')

@stop

@section('script')
	
	{{ HTML::script('js/site/userprofile/profile.js') }}

@stop