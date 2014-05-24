<h3>Sök alternativ</h3>
<div class="ui fluid accordion">
	<div class="title">
		<i class="dropdown icon"></i>
		Söker
	</div>
	<div class="content">
		<div class="four column doubling ui grid">
			<div class="column">
				<h5 class="ui header">Söker relationstyp</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->searches as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('search[]', $id, in_array($id, $model->search)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Är i relationstyp</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->statuses as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('status[]', $id, in_array($id, $model->status)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="title">
		<i class="dropdown icon"></i>
		Allmänt
	</div>
	<div class="content">
		<div class="four column doubling ui grid">
			<div class="column">
				<h5 class="ui header">Barn</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->childrens as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('children[]', $id, in_array($id, $model->children)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Djur</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->pets as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('pet[]', $id, in_array($id, $model->pet)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Dryckesvanor</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->alcohols as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('alcohol[]', $id, in_array($id, $model->alcohol)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Tobaksvanor</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->tobaccos as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('tobacco[]', $id, in_array($id, $model->tobacco)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="title">
		<i class="dropdown icon"></i>
		Utseende
	</div>
	<div class="content">
		<div class="four column doubling ui grid">
			<div class="column">
				<h5 class="ui header">Ögonfärg</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->eyeColors as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('eye_color[]', $id, in_array($id, $model->eyeColor)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Hårfärg</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->hairColors as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('hair_color[]', $id, in_array($id, $model->hairColor)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Kroppstyp</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->physiques as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('physique[]', $id, in_array($id, $model->physique)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="title">
		<i class="dropdown icon"></i>
		Städer
	</div>
	<div class="content">
		<h5 class="ui header">Bor i stad</h5>
		<div id="cities" class="four column doubling ui grid">
			@foreach($model->cities as $id => $value)
				<div class="column">
					<div class="field">
						<div class="ui checkbox">
							{{ Form::checkbox('city[]', $id, in_array($id, $model->city)) }}
							<label>{{ $value }}</label>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>
	<div class="title">
		<i class="dropdown icon"></i>
		Sysselsättning
	</div>
	<div class="content">
		<div class="four column doubling ui grid">
			<div class="column">
				<h5 class="ui header">Utbildning</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->educations as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('education[]', $id, in_array($id, $model->education)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Arbetar inom</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->works as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('work[]', $id, in_array($id, $model->work)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column">
				<h5 class="ui header">Arbetsstatus</h5>
				<div class="ui form">
					<div class="grouped inline fields">
						@foreach($model->workStatuses as $id => $value)
							<div class="field">
								<div class="ui checkbox">
									{{ Form::checkbox('work_status[]', $id, in_array($id, $model->workStatus)) }}
									<label>{{ $value }}</label>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="one column doubling ui grid">
	<div class="column">
		<a id="search" class="ui teal button">
			<i class="search icon"></i>
			Sök
		</a>
	</div>
</div>

<script id="cities_template" type="text/template">
	@{{#cities}}
		<div class="column">
			<div class="field">
				<div class="ui checkbox">
					<input type="checkbox" name="city[]" value="@{{id}}" />
					<label>@{{name}}</label>
				</div>
			</div>
		</div>
	@{{/cities}}
</script>