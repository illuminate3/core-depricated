@if ( Module::exists('jinji') )


<div class="row">
<h2>
	<i class="fa fa-newspaper-o fa-lg"></i>
	{{ trans('kotoba::hr.employment_information') }}
	<hr>
</h2>
</div>


<div class="row">

<div class="col-sm-6">

<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.staff', 1) }}&nbsp;{{ Lang::choice('kotoba::general.id', 1) }}
			</td>
			<td class="col-sm-10">
				{{ $employee->staff_id }}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ trans('kotoba::account.state') }}&nbsp;{{ Lang::choice('kotoba::general.id', 1) }}
			</td>
			<td class="col-sm-10">
				{{ $employee->state_id }}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.employee_type', 1) }}
			</td>
			<td class="col-sm-10">
				{{ $employee->present()->employeeTypeName($employee->employee_type_id, $locale_id) }}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.department', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $employee->present()->departmentName($employee->department_id, $locale_id) }}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.job_title', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $employee->present()->jobTitleName($employee->job_title_id, $locale_id) }}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.site', 2) }}
			</td>
			<td class="col-sm-10">
				{!! $employee->present()->sites($employee->site_id) !!}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ trans('kotoba::hr.supervisor') }}
			</td>
			<td class="col-sm-10">
				{{ $employee->present()->getSupervisior($employee->supervisor_id) }}
			</td>
		</tr>
	</tbody>
</table>

</div>
<div class="col-sm-6">

<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.grade', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $employee->present()->grades($employee->grade_id) }}
			</td>
		</tr>
		<tr>
			<td class="col-sm-2">
				{{ Lang::choice('kotoba::hr.subject', 2) }}
			</td>
			<td class="col-sm-10">
				{!! $employee->present()->subjects($employee->subject_id) !!}
			</td>
		</tr>
	</tbody>
</table>

</div>

</div><!-- ./ row -->


@endif
