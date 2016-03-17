{{--
@if ($site['employees'] != NULL)

<h3>
	{{ trans('kotoba::general.staff') }}
</h3>

<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{ trans('kotoba::table.name') }}</th>
			<th>{{ trans('kotoba::table.email') }}</th>
			<th>{{ trans('kotoba::table.job_title') }}</th>
			<th>{{ trans('kotoba::table.subject') }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($site['employees'] as $employee)
			<tr>
				<td>
					{{ $employee->present()->employeeFirstName($employee->user_id) }}
					{{ $employee->present()->employeeMiddleInitial($employee->user_id) }}
					{{ $employee->present()->employeeLastName($employee->user_id) }}
				</td>
				<td>
					{{ $employee->user->email }}
				</td>
				<td>
					{{ $employee->present()->jobtitle($employee->job_title_id) }}
				</td>
				<td>
					{{ $employee->subject->name }}
				</td>
				<td width="25%">
					<a href="{{ URL::to('employees/' . $employee->user_id) }}" class="btn btn-info btn-sm" >
						<span class="glyphicon glyphicon-search"></span>  {{ trans("kotoba::button.view") }}
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@else
	<div class="alert alert-info">
		{{ trans('kotoba::general.no_records') }}
	</div>
@endif
--}}
