@extends('layouts.site')

@section('content')

	@if($model->hasMessages)

		@include('message.partial.message')
		@include('message.partial.sidebar')

	@else
		<h1 class="ui header">Inga meddelanden</h1>
	@endif

@stop

@section('script')
	
	{{ HTML::script('js/site/message/messages.js') }}

@stop