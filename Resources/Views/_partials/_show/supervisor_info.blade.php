@if ( Module::exists('shisan') )


@if (count($supervising))


<div class="row">
<h2>
	<i class="fa fa-users fa-lg"></i>
	{{ Lang::choice('kotoba::hr.employee', 2) }}
	<hr>
</h2>
</div>


<div class="row">
<table id="table_rooms" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{ trans('kotoba::table.first_name') }}</th>
			<th>{{ trans('kotoba::table.middle_initial') }}</th>
			<th>{{ trans('kotoba::table.last_name') }}</th>
			<th>{{ trans('kotoba::table.email') }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($supervising as $supervised)
		<tr>
			<td>
				{{ $supervised->first_name }}
			</td>
			<td>
				{{ $supervised->middle_initial }}
			</td>
			<td>
				{{ $supervised->last_name }}
			</td>
			<td>
				{{ $supervised->email }}
			</td>
			<td>
				<a href="{{ URL::to('/admin/employees/' . $supervised->id ) }}" class="btn btn-info" >
					<span class="glyphicon glyphicon-search"></span>  {{ trans("kotoba::button.view") }}
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>

@else
	<div class="alert alert-info">
		{{ trans('kotoba::general.no_records') }}
	</div>
@endif


@endif
