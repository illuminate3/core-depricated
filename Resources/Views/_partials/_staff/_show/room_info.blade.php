@if ( Module::exists('shisan') )


@if (count($employee->rooms))


<div class="row">
<h2>
	<i class="fa fa-building-o fa-lg"></i>
	{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ Lang::choice('kotoba::hr.room', 2) }}
	<hr>
</h2>
</div>



<h3>
	{{ Lang::choice('kotoba::hr.room', 2) }}
</h3>

<div class="row">
<table id="table_rooms" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{ trans('kotoba::table.name') }}</th>
			<th>{{ trans('kotoba::table.description') }}</th>
			<th>{{ trans('kotoba::table.barcode') }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($employee->rooms as $room)
		<tr>
			<td>
				{{ $room->name }}
			</td>
			<td>
				{{ $room->description }}
			</td>
			<td>
				{{ $room->barcode }}
			</td>
			<td>
				<a href="{{ URL::to('/admin/rooms/' . $room->id ) }}" class="btn btn-info" >
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
