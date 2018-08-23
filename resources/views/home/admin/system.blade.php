@extends('layout')
@section('content')

<div class="row">
	<div class="col-md-6">
		<h4>'{{$system->name}}'</h4>
	</div>
	<div class="col-md-6 text-right">
		<button class="btn btn-info mb-2"><i class="fa fa-plus"></i> New System</button>
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Client</th>
			<th>Date created</th>
		</tr>
	</thead>

	<tbody>
	{{-- 	<tr id="1">
			<td>Bismillah Bakery</td>
			<td>
				<i class="fa fa-fw fa-mobile fa-2x"></i>
			</td>
			<td>3</td>
			<td>{{ date('d-m-Y') }}</td>
		</tr> --}}
		@if(!empty($system))
		<tr>
			<td></td>
			<td>{{$system->created_at}}</td>
		</tr>
		@endif
	</tbody>
</table>

@endsection

@section('scripts')

@endsection