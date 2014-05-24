@extends('layouts.site')

@section('content')
	{{ Form::open(['url'=>'search/advanced']) }}
		
		@include('search.partial.basic')

		@include('search.partial.advanced')

	{{ Form::close() }}

@stop

@section('script')
	
	{{ HTML::script('js/site/search/search.js') }}

@stop