@if ( Module::exists('shisan') )


@if (count($employee->assets))


<div class="row">
<h2>
	<i class="fa fa-cubes fa-lg"></i>
	{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ Lang::choice('kotoba::shop.asset', 2) }}
	<hr>
</h2>
</div>


<div class="row">
<table id="table_assets" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{ Lang::choice('kotoba::table.item', 1) }}</th>
			<th>{{ Lang::choice('kotoba::table.room', 1) }}</th>
			<th>{{ trans("kotoba::table.asset_tag") }}</th>
			<th>{{ Lang::choice('kotoba::table.user', 1) }}</th>
			<th>{{ trans("kotoba::table.status") }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($employee->assets as $asset)
		<tr>
			<td>{{ $asset->present()->itemName($asset->item_id) }}</td>
			<td>{{ $asset->present()->roomName($asset->room_id) }}</td>
			<td>{{ $asset->asset_tag }}</td>
			<td>
				{{ $asset->present()->employeeName($asset->user_id) }}
			</td>
			<td>
				{{ $asset->present()->techStatus($asset->tech_status_id, $locale_id) }}
			</td>
			<td>
				<a href="{{ URL::to('/admin/asset/' . $asset->id ) }}" class="btn btn-info" >
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
