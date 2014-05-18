@if(Session::has('activated'))
	<div id="activated_modal" class="ui modal">
		<i class="close icon"></i>
		<div class="header">
			@if(Session::get('activated'))
				{{ trans('auth.activated.pass.header') }}
			@else
				{{ trans('auth.activated.fail.header') }}
			@endif
		</div>
		<div class="content">
			<p>
				@if(Session::get('activated'))
					{{ trans('auth.activated.pass.body') }}
				@else
					{{ trans('auth.activated.fail.body') }}
				@endif
			</p>
		</div>
	</div>
@endif