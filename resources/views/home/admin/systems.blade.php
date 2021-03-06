@extends('layout')
@section('content')

<div class="row">
	<div class="col-md-6">
		<h4>Systems</h4>
	</div>
	<div class="col-md-6 text-right">
		<a href="/systems/new">
			<button class="btn btn-info mb-2"><i class="fa fa-plus"></i> New System</button>
		</a>
		<form action="systems/delete_all" method="POST"  style='display: inline;'>
			{{csrf_field()}}
		<button class="btn btn-danger mb-2"><i class="fa fa-trash"></i> Delete All</button>
		</form>
		
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Users</th>
			<th>Date created</th>
		</tr>
	</thead>

	<tbody>
		@if(!empty($systems) && count($systems) > 0)
		@foreach($systems as $s)
		<tr id="{{ $s->id }}">
			<td>{{ $s->name }}</td>
			<td>
				@if(!empty($s->type()))
				<i class="fa fa-fw {{$s->type()->icon}} fa-2x"></i>
				@endif
			</td>
			<td>0</td>
			<td>{{ $s->created_at }}</td>
		</tr>
		@endforeach
		@endif
	</tbody>
</table>

@endsection

@section('scripts')
<script type="text/javascript">
	$("table tbody tr").click(function(e){
		var id = $(e.target).parent().attr('id');
		window.location = "/systems/edit/"+id;
	});
</script>
@endsection