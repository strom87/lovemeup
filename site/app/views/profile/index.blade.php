@extends('layouts.site')

@section('content')

	@include('profile.partial.profileimage')

	<div class="ui top attached tabular menu">
		<a class="active item" data-tab="tabone">
			Bilder
		</a>
		<a class="item" data-tab="tabtwo">
			Information
		</a>
	</div>
	<div class="ui bottom attached segment">
		<div class="ui active tab" data-tab="tabone">
			@include('profile.partial.tabone')
		</div>
		<div class="ui tab" data-tab="tabtwo">
			@include('profile.partial.tabtwo')
		</div>
	</div>

	@include('profile.partial.message')
	@include('profile.partial.flirts')

@stop

@section('script')
	
	{{ HTML::script('js/site/profile/profile.js') }}

@stop