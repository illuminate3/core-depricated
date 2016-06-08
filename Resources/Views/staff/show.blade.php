@extends($theme_front)


{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::account.profile', 2) }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')

<div class="row">
<h1>
	<p class="pull-right">
	<a href="/directory" class="btn btn-primary" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	</p>
	<i class="fa fa-user fa-lg"></i>
	@if ( !empty($profile->prefix ) )
		{{{ $profile->prefix }}}&nbsp;
	@endif
	@if ( !empty($profile->first_name ) )
		{{{ $profile->first_name }}}
	@endif
	@if ( !empty($profile->middle_initial ) )
		&nbsp;{{{ $profile->middle_initial }}}
	@endif
	@if ( !empty($profile->last_name ) )
		&nbsp;{{{ $profile->last_name }}}
	@endif
	@if ( !empty($profile->suffix ) )
		&nbsp;{{{ $profile->suffix }}}
	@endif
	<hr>
</h1>
</div>


<div class="row">
<div class="panel panel-default">

	<div class="panel-heading">
		<h3 class="panel-title">
			{{ trans('kotoba::general.information') }}:
		</h3>
	</div><!-- ./panel-heading -->
	<div class="panel-body">

	<div class="row">
	<div class="col-sm-12">

		<div class="col-sm-6">

			<dl class="dl-horizontal">
				<dt>
					{{ trans('kotoba::account.email') }}:
				</dt>
				<dd>
					@if ( !empty($profile->email_1 ) )
						<a href="mailto:{{{ $profile->email_1 }}}">{{{ $profile->email_1 }}}</a>
					@endif
				</dd>
			</dl>

			<dl class="dl-horizontal">
				<dt>
					{{ Lang::choice('kotoba::hr.location', 1) }}:
				</dt>
				<dd>
					{{ $employee_data->present()->siteName($employee_data->site_id) }}
				</dd>
			</dl>

		</div>
		<div class="col-sm-6">

			<dl class="dl-horizontal">
				<dt>
					{{ Lang::choice('kotoba::hr.job_title', 1) }}:
				</dt>
				<dd>
					{{ $employee_data->present()->jobTitleName($employee_data->job_title_id, $locale_id) }}
				</dd>
			</dl>

			@if ( !empty($employee_data->secondary_job_title_id ) )
			<dl class="dl-horizontal">
				<dt>
					{{ trans('kotoba::general.secondary') }}&nbsp;{{ Lang::choice('kotoba::hr.job_title', 1) }}:
				</dt>
				<dd>
					{{ $employee_data->present()->jobTitleName($employee_data->secondary_job_title_id, $locale_id) }}
				</dd>
			</dl>
			@endif

			<dl class="dl-horizontal">
				<dt>
					{{ Lang::choice('kotoba::hr.department', 1) }}:
				</dt>
				<dd>
					{{ $employee_data->present()->departmentName($employee_data->department_id, $locale_id) }}
				</dd>
			</dl>

{{--
			<dl class="dl-horizontal">
				<dt>
					{{ Lang::choice('kotoba::hr.employee_type', 1) }}:
				</dt>
				<dd>
					{{ $employee_data->present()->employeeTypeName($employee_data->employee_type_id, $locale_id) }}
				</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>
					{{ trans('kotoba::hr.supervisor') }}:
				</dt>
				<dd>
					{{ $employee_data->present()->supervisorName($employee_data->supervisor_id, $locale_id) }}
				</dd>
			</dl>
--}}

		</div>

	</div><!-- ./col-8 -->

{{--
	<div class="col-sm-4">

		@if ( !empty($profile->user->avatar ) )
			<img
				src="{{ asset($profile->user->avatar) }}"
				alt="{{ $profile->email_1 }}"
				class="img-thumbnail profile"
			/>
		@else
			<img
				src="{{ asset('/assets/images/usr.png') }}"
				class="img-thumbnail profile"
			/>
		@endif

	</div>
--}}
	</div><!-- ./row -->

	</div><!-- ./panel-body -->
{{--
	<div class="panel-body">

	<dl class="dl-horizontal">
		<dt>
			{{ trans('kotoba::general.introduction') }}:
		</dt>
		<dd>
			@if ( !empty($profile->notes ) )
				{{{ $profile->notes }}}
			@endif
		</dd>
	</dl>

	</div><!-- ./panel-body -->
--}}
</div><!-- ./panel -->
</div> <!-- ./ row -->


@stop
