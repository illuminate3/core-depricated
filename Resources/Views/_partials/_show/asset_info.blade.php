@if (Auth::user()->can('manage_shisan'))
@if ( Module::exists('shisan') )
<hr>


<div class="panel panel-info">
<div class="panel-heading">

	<h3 class="panel-title">
		{{ Lang::choice('kotoba::shop.asset', 2) }}
	</h3>

</div>
<div class="panel-body">

	<a href="/user_assets" class="btn btn-default btn-block" title="{{ trans('kotoba::button.view') }}">
		<i class="fa fa-search fa-fw"></i>
		{{ trans('kotoba::button.view') }}&nbsp;{{ Lang::choice('kotoba::shop.asset', 2) }}
	</a>

</div><!-- ./ panel body -->
</div><!-- ./ panel panel-info -->
@endif
@endif
