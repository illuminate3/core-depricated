@extends($theme_back)

{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::account.site', 2) }} :: @parent
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
	<a href="/admin/sites" class="btn btn-default" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	@if ( Auth::user() )
		@if ( (Auth::user()->can('manage_admin')) || (Auth::user()->can('manage_core')) )
			<a href="/admin/sites/{{ $site->id }}/edit" class="btn btn-success" title="{{ trans('kotoba::button.edit') }}">
				<i class="fa fa-pencil fa-fw"></i>
				{{ trans('kotoba::button.edit') }}
			</a>
		@endif
	@endif
	</p>
	<i class="fa fa-university fa-lg"></i>
	{{ $site->name }}
	<hr>
</h1>
</div>


<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" role="tablist">
	<li role="presentation" class="active">
		<a href="#site_info" aria-controls="site_info" role="tab" data-toggle="tab">
		<i class="fa fa-building-o fa-lg"></i>
		{{ Lang::choice('kotoba::cms.site', 1) }}&nbsp;{{ trans('kotoba::general.information') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#employee_info" aria-controls="employee_info" role="tab" data-toggle="tab">
		<i class="fa fa-user fa-lg"></i>
		{{ Lang::choice('kotoba::hr.employee', 2) }}
		</a>
	</li>
	<li role="presentation">
		<a href="#assets" aria-controls="assets" role="tab" data-toggle="tab">
		<i class="fa fa-cubes fa-lg"></i>
		{{ Lang::choice('kotoba::shop.asset', 2) }}
		</a>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content padding">

	<div role="tabpanel" class="tab-pane active" id="site_info">
	<div class="tab-content padding-md">
		@include('core::_partials._show.site_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ user_info panel -->

	<div role="tabpanel" class="tab-pane" id="employee_info">
	<div class="tab-content padding-md">
		@include('core::_partials._show.employee_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ work_info panel -->

	<div role="tabpanel" class="tab-pane" id="assets">
	<div class="tab-content padding-md">
		@include('core::_partials._show.asset_info')
	</div><!-- ./ tab-content -->
	</div><!-- ./ published panel -->

</div><!-- ./ tab panes -->


@stop
