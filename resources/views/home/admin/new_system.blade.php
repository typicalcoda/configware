@extends('layout')
@section('content')

<div class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="model_name" placeholder="" value="">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="name">Min</label>
							<input type="number" class="form-control" name="name" id="model_name" placeholder="" value="">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="name">Max</label>
							<input type="number" class="form-control" name="name" id="model_name" placeholder="" value="">
						</div>
					</div>
					<div class="col-md-3">
						<div>
							<label for="name">Validation Type</label>
						</div>
						<select class="custom-select">
							<option>Email</option>
							<option>IP Address</option>
							<option>Cake Product</option>
							<option>Telephone Number (USA)</option>
							Telephone Number (UK)
						</select>
					</div>
					<div class="col-md-2">
						<div>
							<label for="name">Required?</label>
						</div>
						<label class="switch">
							<input type="checkbox">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr>
						<h5>Field Permissions</h5>
						<div class="field_permissions mt-4">

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4>@if(empty($created_system))Create a new system @else Edit system @endif</h4>
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
					<i class="fa fa-lock"></i>&nbsp 
					@endif
				Configuration</a>

			</li>
			<li class="nav-item">
				<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="data_models-tab" data-toggle="tab" href="#data_models" role="tab" aria-controls="data_models" aria-selected="false">
					@if(empty($created_system))
					<i class="fa fa-lock"></i>&nbsp
					@endif
				Data Models</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="users_roles-tab" data-toggle="tab" href="#users_roles" role="tab" aria-controls="users_roles" aria-selected="false">
					@if(empty($created_system))
					<i class="fa fa-lock"></i>&nbsp
					@endif
				Users & Roles</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="users_roles-tab" data-toggle="tab" href="#users_roles" role="tab" aria-controls="users_roles" aria-selected="false">
					@if(empty($created_system))
					<i class="fa fa-lock"></i>&nbsp
					@endif
				Validation Rules</a>
			</li>

			<li class="nav-item">
				<a class="nav-link {{ empty($created_system) ? "disabled" : ""}}" id="users_roles-tab" data-toggle="tab" href="#users_roles" role="tab" aria-controls="users_roles" aria-selected="false">
					@if(empty($created_system))
					<i class="fa fa-lock"></i>&nbsp
					@endif
				Records</a>
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
							<input type="text" class="form-control" name="name" id="name" placeholder="e.g. 'Radioactive'" value={{ empty($created_system) ? old('name') : $created_system->name }}>
						</div>
						<div class="form-group">
							<div class="form-group">
								<label for="description">System Description</label>
								<textarea class="form-control" name="description" id="description" rows="4">{{empty($created_system) ? old('description') : $created_system->description}}</textarea>
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
								<button class="btn {{ empty($created_system) ? 'btn-primary' : 'btn-info' }}" type="submit">{{ empty($created_system) ? 'Create' : 'Save' }}</button>
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
									@if(!empty($created_system->config()->models) && count($created_system->config()->models) > 0)
									@foreach($created_system->config()->models as $m)
									
									<button class="btn btn-info sysmodel" id="{{$m['name']}}">{{ ucfirst($m['pluralName']) }}</button>		
									
									@endforeach
									@endif
								</div>
								<div id="selected_model">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" name="name" id="model_name" placeholder="" value="">
									</div>
									<div class="form-group">
										<label for="name">Plural Name</label>
										<input type="text" class="form-control" name="name" id="model_plural_name" placeholder="" value="">
									</div>
									<div class="form-group">
										<label for="name">Icon: </label>
										<i id="model-icon" class=""></i>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<h5>Model fields</h5>
										</div>
										<div class="col-md-6 text-right">
											<button class="btn btn-info mb-2"><i class="fa fa-plus"></i>&nbspAdd Field</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>Name</th>
														<th>Nullable</th>
														<th>Min Length</th>
														<th>Max Length</th>
														<th>Validation Type</th>
													</tr>
												</thead>

												<tbody id="model_fields">
												</tbody>
											</table>
										</div>
									</div>

									<div class="row mt-2">
										<div class="col-md-12">
											<h5>Model Permissions</h5>
											<hr>
											<div class="model_permissions">

											</div>
										</div>
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
			@if(!empty($created_system) && $created_system->config_id != "0")
			<script type="text/javascript">
				var	config = <?php echo json_encode($created_system->config()) ?>;
				var	models = <?php echo json_encode($created_system->config()->models) ?>;
				var model = {};
				var currentField = {};

				$(document).ready(function(){
					$("#selected_model").hide();
				})

				$("body").on('click', '.sysmodel', function(e){
					var selectedModelId = e.target.id;
					updateSelectedModel(selectedModelId);
				});

				$("body").on('click', '.model_field', function(e){
					var selectedFieldId = e.target.parentElement.id;
					updateSelectedField(selectedFieldId);
					updateFieldPermissions(selectedFieldId);
				})

				function updateModelPermissions(){
					var content = "";
					for(var i = 0; i < config.roles.length; i++){
						var current_content = `
						<div class="row mt-2">
						<div class="col-md-6">
						<input class="form-control field-roles" id="${config.roles[i].roleName}" type="text" placeholder="${config.roles[i].roleName}" readonly>
						</div>

						<div class="col-md-6">
						<select class="custom-select">
						<option>Read</option>
						<option>Update</option>
						</select>
						</div>
						`;
						content += current_content;
					}

					$(".model_permissions").html(content);
				}

				function updateFieldPermissions(fieldId){
					var content = "";
					for(var i = 0; i < config.roles.length; i++){
						var current_content = `
						<div class="row mt-2">
						<div class="col-md-6">
						<input class="form-control field-roles" id="${config.roles[i].roleName}" type="text" placeholder="${config.roles[i].roleName}" readonly>
						</div>

						<div class="col-md-6">
						<select class="custom-select">
						<option>Read</option>
						<option>Update</option>
						</select>
						</div>
						</div>
						`;
						content += current_content;
					}

					$(".field_permissions").html(content);
				}

				function updateSelectedField(fieldId){
					currentField = model.fields.find(function(x,y){ return x.name == fieldId });
					showFieldEditor();
				}

				function showFieldEditor(){
					$(".modal-title").text("Editing '" + currentField.name + "'");
					$('.modal').modal();
				}

				function updateSelectedModel(modelId){
					model = models.find(function(x,y){ return x.name == modelId });
					$("#selected_model #model-icon").removeClass("").addClass(model.icon).addClass("fa-fw").addClass("fa-2x");

					$("#selected_model #model_name").val( ucfirst(model.name) );
					$("#selected_model #model_plural_name").val( ucfirst(model.pluralName) );

					var content = "";
					for(var i=0;i<model.fields.length;i++){
						content += 
						`<tr class="model_field" id="${model.fields[i].name}">
						<td>${ ucfirst(model.fields[i].name) }</td>
						<td>${model.fields[i].nullable}</td>
						<td>${model.fields[i].minLen}</td>
						<td>${model.fields[i].maxLen}</td>
						<td>${model.fields[i].validationTypeId}</td>
						</tr>`;
					}
					$("#model_fields").html(content);

					$("#selected_model").show();
				}

				function ucfirst(str){
					return str.replace(/^\w/, c => c.toUpperCase());
				}

			</script>
			@endif
			@endsection