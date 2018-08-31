@extends('layout')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h4>Create a new system</h4>
		@if(Session::has('msg'))
		<div class="alert alert-success mt-3">
			{{ Session::get("msg", '') }}
		</div>
		@endif


	</div>
</div>

<div class="card">

	<div class="card-body">
		
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="sysinfo-tab" data-toggle="tab" href="#sysinfo" role="tab" aria-controls="sysinfo" aria-selected="true">System Information</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="config-tab" data-toggle="tab" href="#config" role="tab" aria-controls="config" aria-selected="false">
					@if(empty($created_system))
					<i class="fa fa-lock"></i>&nbspConfiguration</a>
					@endif
				</li>
				<li class="nav-item">
					<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="data_models-tab" data-toggle="tab" href="#data_models" role="tab" aria-controls="data_models" aria-selected="false">
						@if(empty($created_system))
						<i class="fa fa-lock"></i>&nbspData Models</a>
						@endif
					</li>
					<li class="nav-item">
						<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="users_roles-tab" data-toggle="tab" href="#users_roles" role="tab" aria-controls="users_roles" aria-selected="false">
							@if(empty($created_system))
							<i class="fa fa-lock"></i>&nbspUsers & Roles</a>
							@endif
						</li>

					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="sysinfo" role="tabpanel" aria-labelledby="sysinfo-tab">
							<form action="/systems/new" method="post">
								{{ csrf_field() }}

								<div class="mt-3 mb-3">
									<div class="form-group">
										<h5>System Information</h5>
									</div>
									<div class="form-group">
										<label for="name">System Alias/Name</label>
										<input type="text" class="form-control" name="name" id="name" placeholder="e.g. 'Radioactive'" value={{ old('name') }}>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label for="description">System Description</label>
											<textarea class="form-control" name="description" id="description" rows="4">{{old('description')}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="system_type">Select System Type</label>
										<div class="d-flex mt-3 mb-3 mx-auto btn-group btn-group-toggle" data-toggle="buttons" style='width:200px;'>
											@if(isset($system_types) && count($system_types) > 0)
											<select value="" id="type" name="type_id">
												@foreach($system_types as $st)
												
												<option value="{{ $st->id }}">{{ $st->type }}</option>
												{{-- <label class="w-auto btn btn-secondary" id="{{$st->id}}" >
													<input type="radio" name="type_id" autocomplete="off"> 
													<i class="fa {{$st->icon}} fa-fw fa-2x"></i>
												</label> --}}
												@endforeach
											</select>
											@endif
										</div>
									</div>
								</div>
								<button class="btn btn-primary" type="submit">Create</button>
								<button class="btn btn-default">Clear</button>
							</form>
						</div>

						@if(!(empty($created_system)))
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
						@endif

					</div>

					@if ($errors->any())
					<div class="alert alert-danger {{$errors->type}} mt-3">
						<h4>Errors</h4>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
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