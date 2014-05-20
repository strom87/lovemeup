<h3 class="ui header">{{ $model->name }}</h3>
<div>
	<a class="image-popup-no-margins" href="{{ $model->profileImage->large }}">
		<img class="rounded ui image" src="{{ $model->profileImage->small }}" />
	</a>
</div>

<div class="ui segment">
	<div class="five column doubling ui grid">
		<div class="column">
			<div class="ui list">
				<div class="item">
					<div class="header">Ålder</div>
					{{ $model->age }}
				</div>
				<div class="item">
					<div class="header">Kön</div>
					{{ $model->gender }}
				</div>
				<div class="item">
					<div class="header">Län</div>
					{{ $model->state }}
				</div>
				<div class="item">
					<div class="header">Stad</div>
					{{ $model->city }}
				</div>
			</div>
		</div>
		<div class="column">
			<div class="ui list">
				<div class="item">
					<div class="header">Partner kön</div>
					{{ $model->partnerGender }}
				</div>
				<div class="item">
					<div class="header">Relationsstatus</div>
					{{ $model->status }}
				</div>
				<div class="item">
					<div class="header">Söker relation</div>
					{{ $model->search }}
				</div>
				<div class="item">
					<div class="header">Mellan</div>
					{{ $model->minage }} - {{ $model->maxage }} år
				</div>
			</div>
		</div>
		<div class="column">
			<div class="ui list">
				<div class="item">
					<div class="header">Barn</div>
					{{ $model->children }}
				</div>
				<div class="item">
					<div class="header">Djur</div>
					{{ $model->pet }}
				</div>
				<div class="item">
					<div class="header">Dryckesvanor</div>
					{{ $model->alcohol }}
				</div>
				<div class="item">
					<div class="header">Tobaksvanor</div>
					{{ $model->tobacco }}
				</div>
			</div>
		</div>
		<div class="column">
			<div class="ui list">
				<div class="item">
					<div class="header">Ögonfärg</div>
					{{ $model->eyeColor }}
				</div>
				<div class="item">
					<div class="header">Hårfärg</div>
					{{ $model->hairColor }}
				</div>
				<div class="item">
					<div class="header">Kroppsbyggnad</div>
					{{ $model->physique }}
				</div>
				<div class="item">
					<div class="header">Längd</div>
					{{ $model->length }}
				</div>
			</div>
		</div>
		<div class="column">
			<div class="ui list">
				<div class="item">
					<div class="header">Arbetar med</div>
					{{ $model->work }}
				</div>
				<div class="item">
					<div class="header">Arbetsstatus</div>
					{{ $model->workStatus }}
				</div>
				<div class="item">
					<div class="header">Utbildning</div>
					{{ $model->education }}
				</div>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	<div class="one column doubling ui grid">
		<div class="column">
			<h4 class="ui header">Beskrivning</h4>
			@foreach($model->description as $text)
					{{{ $text }}}<br />
			@endforeach
		</div>
	</div>
</div>