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
									<input type="checkbox" name="search_{{$id}}">
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
									<input type="checkbox" name="status_{{$id}}">
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
									<input type="checkbox" name="children_{{$id}}">
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
									<input type="checkbox" name="pet_{{$id}}">
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
									<input type="checkbox" name="alcohol_{{$id}}">
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
									<input type="checkbox" name="tobacco_{{$id}}">
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
									<input type="checkbox" name="eye_color_{{$id}}">
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
									<input type="checkbox" name="hair_color_{{$id}}">
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
									<input type="checkbox" name="physique_{{$id}}">
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
		<div class="four column doubling ui grid">
			@foreach($model->cities as $id => $value)
				<div class="column">
					<div class="field">
						<div class="ui checkbox">
							<input type="checkbox" name="city_{{$id}}" checked="checked">
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
									<input type="checkbox" name="education_{{$id}}">
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
									<input type="checkbox" name="work_{{$id}}">
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
									<input type="checkbox" name="works_statuses_{{$id}}">
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