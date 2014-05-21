@extends('layouts.site')

@section('content')
	
	@include('userprofile.partial.menu')

	@include('userprofile.partial.details')

@stop

@section('script')
	
	{{ HTML::script('js/site/userprofile/details.js') }}

@stop