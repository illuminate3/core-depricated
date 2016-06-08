@extends($theme_front)


{{-- Web site Title --}}
@section('title')
{{ trans('kotoba::hr.staff') }}&nbsp;{{ trans('kotoba::hr.directory') }} :: @parent
@stop

@section('styles')
	<link href="{{ asset('assets/vendors/DataTables-1.10.7/plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('scripts')
	<script src="{{ asset('assets/vendors/DataTables-1.10.7/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/DataTables-1.10.7/plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
@stop

@section('inline-scripts')
$(document).ready(function() {
oTable =
	$('#table').DataTable({
		'pageLength': 25,
		"processing": true,
		"serverSide": true,
		"ajax": "{{ URL::to('/api/directory') }}",
		"columns": [
			{
				data: 'id',
				name: 'id',
				searchable: false,
				visible: false
			},
			{
				data: 'first_name',
				name: 'first_name',
				orderable: true,
				searchable: true
			},
			{
				data: 'last_name',
				name: 'last_name',
				orderable: true,
				searchable: true
			},
			{
				data: 'email_1',
				name: 'email_1',
				orderable: true,
				searchable: true
			},
			{
				data: 'name',
				name: 'name',
				orderable: true,
				searchable: true
			},
			{
				data: 'actions',
				name: 'actions',
				orderable: false,
				searchable: false
			}
		]
	});
});
@stop


{{-- Content --}}
@section('content')


<div class="row">
<h1>
	<p class="pull-right">
{{--
	<a href="/employees/create" class="btn btn-primary" title="{{ trans('kotoba::button.new') }}">
		<i class="fa fa-plus fa-fw"></i>
		{{ trans('kotoba::button.new') }}
	</a>
--}}
	</p>
	<i class="fa fa-angle-double-right fa-lg"></i>
		{{ trans('kotoba::hr.staff') }}&nbsp;{{ trans('kotoba::hr.directory') }}
	<hr>
</h1>
</div>

<div class="row">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th></th>
			<th>{{ trans('kotoba::table.first_name') }}</th>
			<th>{{ trans('kotoba::table.last_name') }}</th>
			<th>{{ trans('kotoba::table.email') }}</th>
			<th>{{ trans('kotoba::table.site') }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>
	<tbody></tbody>
</table>
</div>

@stop
