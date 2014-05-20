@extends('layouts.site')

@section('content')

	@include('userprofile.partial.menu')

	@include('userprofile.partial.upload')

	@include('userprofile.partial.imagelist')

@stop

@section('script')
	
	{{ HTML::script('js/jquery.form.min.js') }}
	{{ HTML::script('js/site/userprofile/image.js') }}

@stop