@if ( Module::exists('kenshu') )


@if (count($seminars))


<div class="row">
<h2>
		<i class="fa fa-lightbulb-o fa-lg"></i>
		{{ Lang::choice('kotoba::hr.seminar', 2) }}
	<hr>
</h2>
</div>



<h3>
	{{ Lang::choice('kotoba::hr.seminar', 2) }}
</h3>

<div class="row">
<table id="table_seminars" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{ Lang::choice('kotoba::table.title', 1) }}</th>
			<th>{{ Lang::choice('kotoba::table.date', 1) }}</th>
			<th>{{ Lang::choice('kotoba::table.hour', 2) }}</th>
			<th>{{ trans("kotoba::table.attended") }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($seminars as $seminar)
		<tr>
			<td>
			{{ $seminar->title }}
			</td>
			<td>
			{{ $seminar->date }}
			</td>
			<td>
			{{ $seminar->hours }}
			</td>
			<td>
				@if ( $seminar->attended == 1 )
					<span class="glyphicon glyphicon-ok text-success"></span>
				@else
					<span class="glyphicon glyphicon-remove text-danger"></span>
				@endif
			</td>
			<td>
				<a href="{{ URL::to('/workshops/' . $seminar->id ) }}" class="btn btn-info" >
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
