@extends('layouts.site')

@section('content')

	@include('search.partial.basic')

@stop

@section('script')
	
	{{ HTML::script('js/site/search/search.js') }}

@stop