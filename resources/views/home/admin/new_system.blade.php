@extends('layout')
@section('content')

<div class="row">
	<div class="col-md-6 mb-4">
		<h4>Create a new system</h4>
	</div>
</div>

<div class="card">

	<div class="card-body">

		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="sysinfo-tab" data-toggle="tab" href="#sysinfo" role="tab" aria-controls="sysinfo" aria-selected="true">System Information</a>
			</li>
			<li class="nav-item disabled">
				<a class="nav-link disabled" id="config-tab" data-toggle="tab" href="#config" role="tab" aria-controls="config" aria-selected="false">
					<i class="fa fa-lock"></i>&nbspConfiguration</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" id="data_models-tab" data-toggle="tab" href="#data_models" role="tab" aria-controls="data_models" aria-selected="false">
					<i class="fa fa-lock"></i>&nbspData Models</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" id="users_roles-tab" data-toggle="tab" href="#users_roles" role="tab" aria-controls="users_roles" aria-selected="false">
				<i class="fa fa-lock"></i>&nbspUsers & Roles</a>
			</li>

		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="sysinfo" role="tabpanel" aria-labelledby="sysinfo-tab">
				<div class="mt-3 mb-3">
					<div class="form-group">
						<h5>System Information</h5>
					</div>
					<div class="form-group">
						<label for="system_name">System Alias/Name</label>
						<input type="text" class="form-control" name="system_name" id="system_name" placeholder="e.g. 'Radioactive'">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="system_description">System Description</label>
							<textarea class="form-control" name="system_description" id="system_description" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="system_type">Select System Type</label>
						<div class="d-flex mt-3 mb-3 mx-auto btn-group btn-group-toggle" data-toggle="buttons" style='width:200px;'>
							@if(isset($system_types) && count($system_types) > 0)
							@foreach($system_types as $st)
							<label class="w-auto btn btn-secondary active">
								<input type="radio" name="options" id="{{$st->id}}" autocomplete="off" checked> 
								<i class="fa {{$st->icon}} fa-fw fa-2x"></i>
							</label>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="config" role="tabpanel" aria-labelledby="config-tab">
				
				<div class="mt-3 mb-3">
					<div class="form-group">
						<h5>Configuration Profile</h5>
					</div>

					<div class="form-group">
						<div class="form-group">
							<label for="theme">Theme</label>
							<select class="form-control" id="theme">
								<option>Blue Sky</option>
								<option>Yellow Spider</option>
								<option>Ocean Blue</option>
								<option>Material</option>
								<option>Vintage Wood</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="data_models" role="tabpanel" aria-labelledby="data_models-tab">

				<div class="mt-3 mb-3">
					<div class="form-group">
						<h5>Data Models</h5>
					</div>

					<div class="form-group">
						<div class="form-group">
							<label for="theme">Theme</label>
							<select class="form-control" id="theme">
								<option>Blue Sky</option>
								<option>Yellow Spider</option>
								<option>Ocean Blue</option>
								<option>Material</option>
								<option>Vintage Wood</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="users_roles" role="tabpanel" aria-labelledby="users_roles-tab">
				
				<div class="mt-3 mb-3">
					<div class="form-group">
						<h5>Users & Roles</h5>
					</div>

					<div class="form-group">
						<div class="form-group">
							<label for="theme">Theme</label>
							<select class="form-control" id="theme">
								<option>Blue Sky</option>
								<option>Yellow Spider</option>
								<option>Ocean Blue</option>
								<option>Material</option>
								<option>Vintage Wood</option>
							</select>
						</div>
					</div>
				</div>
			</div>

		</div>

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>

	<div class="card-footer">
		<button class="btn btn-primary">Create</button>
		<button class="btn btn-default">Clear</button>
	</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
	$("table tbody tr").click(function(e){
		var id = $(e.target).parent().attr('id');
		window.location = "/systems/"+id;
	});
</script>
@endsection