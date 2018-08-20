@extends('layout')
@section('content')

<h4>Systems</h4>
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
		<tr id="1">
			<td>Bismillah Bakery</td>
			<td>
				<i class="fa fa-fw fa-mobile fa-2x"></i>
			</td>
			<td>3</td>
			<td>{{ date('d-m-Y') }}</td>
		</tr>
		<tr id="2">
			<td>Hajj Travels</td>
			<td>
				<i class="fa fa-fw fa-desktop fa-2x"></i>
			</td>
			<td>18</td>
			<td>{{ date('d-m-Y') }}</td>
		</tr>
	</tbody>
</table>

@endsection

@section('scripts')
<script type="text/javascript">
	$("table tbody tr").click(function(e){
		var id = $(e.target).parent().attr('id');
		window.location = "/systems/"+id;
	});
</script>
@endsection