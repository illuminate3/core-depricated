@extends($theme_front)


{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::hr.employee', 2) }} :: @parent
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
	$('#table_seminars').dataTable({
		'pageLength': 25
	});
	$('#table_assets').dataTable({
		'pageLength': 25
	});
	$('#table_rooms').dataTable({
		'pageLength': 25
	});
});
@stop


{{-- Content --}}
@section('content')

<div class="container-fluid padding-left-xl padding-right-xl">

<div class="row">
<h1>
	<p class="pull-right">
	<a href="/admin/employees" class="btn btn-default" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	</p>
	<i class="fa fa-user fa-lg"></i>
	@if ( !empty($profile->prefix ) )
		{{ $profile->prefix }}&nbsp;
	@endif
	@if ( !empty($profile->first_name ) )
		{{ $profile->first_name }}
	@endif
	@if ( !empty($profile->middle_initial ) )
		&nbsp;{{ $profile->middle_initial }}
	@endif
	@if ( !empty($profile->last_name ) )
		&nbsp;{{ $profile->last_name }}
	@endif
	@if ( !empty($profile->suffix ) )
		&nbsp;{{ $profile->suffix }}
	@endif
	&nbsp;:&nbsp;
	{{ $user->email }}
	<hr>
</h1>
</div>


<div class="row">

<ul class="nav nav-pills nav-stacked col-sm-2">
	<li role="presentation">
		<a href="#user_info" aria-controls="user_info" role="tab" data-toggle="tab">
		<i class="fa fa-user fa-lg"></i>
		{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ trans('kotoba::general.information') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#work_info" aria-controls="work_info" role="tab" data-toggle="tab">
		<i class="fa fa-newspaper-o fa-lg"></i>
		{{ trans('kotoba::hr.employment_information') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#status" aria-controls="status" role="tab" data-toggle="tab">
		<i class="fa fa-heart fa-fw"></i>
		{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ Lang::choice('kotoba::general.status', 1) }}
		</a>
	</li>
	<li role="presentation" class="active">
		<a href="#contract" aria-controls="contract" role="tab" data-toggle="tab">
		<i class="fa fa-paste fa-lg"></i>
		{{ trans('kotoba::hr.contract_information') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#seminars" aria-controls="assets" role="tab" data-toggle="tab">
		<i class="fa fa-lightbulb-o fa-lg"></i>
		{{ Lang::choice('kotoba::hr.seminar', 2) }}
		</a>
	</li>
	<li role="presentation">
		<a href="#assets" aria-controls="assets" role="tab" data-toggle="tab">
		<i class="fa fa-cubes fa-lg"></i>
		{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ Lang::choice('kotoba::shop.asset', 2) }}
		</a>
	</li>
	<li role="presentation">
		<a href="#rooms" aria-controls="rooms" role="tab" data-toggle="tab">
		<i class="fa fa-building-o fa-lg"></i>
		{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ Lang::choice('kotoba::hr.room', 2) }}
		</a>
	</li>
	@if ($employee->isSupervisior == 1)
		<li role="presentation">
			<a href="#supervisior" aria-controls="supervisior" role="tab" data-toggle="tab">
			<i class="fa fa-users fa-lg"></i>
			{{ Lang::choice('kotoba::hr.employee', 2) }}
			</a>
		</li>
	@endif
</ul>

	<div class="tab-content col-sm-10">

	<div role="tabpanel" class="tab-pane" id="user_info">
	<div class="tab-content padding-md">
		@include('core::_partials._show.user_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ user_info panel -->

	<div role="tabpanel" class="tab-pane" id="work_info">
	<div class="tab-content padding-md">
		@include('core::_partials._show.employment_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ employment_info panel -->

	<div role="tabpanel" class="tab-pane" id="status">
	<div class="tab-content padding-md">
		@include('core::_partials._show.kagi_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ kagi_info panel -->

	<div role="tabpanel" class="tab-pane active" id="contract">
	<div class="tab-content padding-md">
		@include('core::_partials._show.contract_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ contract_info panel -->

	<div role="tabpanel" class="tab-pane" id="seminars">
	<div class="tab-content padding-md">
		@include('core::_partials._show.seminars')
	</div><!-- ./ tab-content -->
	</div><!-- ./ seminars panel -->

	<div role="tabpanel" class="tab-pane" id="assets">
	<div class="tab-content padding-md">
		@include('core::_partials._show.asset_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ asset_info panel -->

	<div role="tabpanel" class="tab-pane" id="rooms">
	<div class="tab-content padding-md">
		@include('core::_partials._show.room_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ room_info panel -->

	<div role="tabpanel" class="tab-pane" id="supervisior">
	<div class="tab-content padding-md">
		@include('core::_partials._show.supervisor_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ room_info panel -->

	</div>

</div><!-- /tabs -->

</div><!-- ./container -->


@stop
