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
	{{-- 	<tr id="1">
			<td>Bismillah Bakery</td>
			<td>
				<i class="fa fa-fw fa-mobile fa-2x"></i>
			</td>
			<td>3</td>
			<td>{{ date('d-m-Y') }}</td>
		</tr> --}}
		@if(!empty($systems) && count($systems) > 0)
		@foreach($systems as $s)
		<tr id="{{ $s->id }}">
			<td>{{ $s->name }}</td>
			<td>
				@if(!empty($s->Types()))
					@foreach($s->Types() as $t)
						<i class="fa fa-fw {{$t->icon}} fa-2x"></i>
					@endforeach
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
		window.location = "/systems/"+id;
	});
</script>
@endsection