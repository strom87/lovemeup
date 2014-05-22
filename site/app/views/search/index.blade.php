@extends('layouts.site')

@section('content')

	@include('search.partial.basic')

	@include('search.partial.advanced')

@stop

@section('script')
	
	{{ HTML::script('js/site/search/search.js') }}

@stop