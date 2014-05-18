<div id="rules_modal" class="ui modal">
	<i class="close icon"></i>
	<div class="header">
		{{ trans('auth.rules.header') }}
	</div>
	<div class="content">
		<h3>{{ trans('auth.rules.main.header') }}</h3>
		<div class="ui bulleted list">
			@foreach(trans('auth.rules.main.rules') as $rule)
				<div class="item">{{ $rule }}</div>
			@endforeach
		</div>

		<h3>{{ trans('auth.rules.illegal.header') }}</h3>
		<div class="ui bulleted list">
			@foreach(trans('auth.rules.illegal.rules') as $rule)
				<div class="item">{{ $rule }}</div>
			@endforeach
		</div>
	</div>
</div>