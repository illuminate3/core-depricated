@if ( Module::exists('jinji') )


<div class="row">
<h2>
	<i class="fa fa-paste fa-lg"></i>
	{{ trans('kotoba::hr.contract_information') }}
	<hr>
</h2>
</div>


<div class="row">
<div class="col-sm-12">

<div class="row">
	<h3>
		{{ trans('kotoba::shop.total') }}&nbsp;{{ Lang::choice('kotoba::hr.contract', 1) }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}
	</h3>
	<hr>
</div>

<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::shop.total') }}&nbsp;{{ trans('kotoba::hr.leave') }}
			</td>
			<td class="col-sm-10">
				{{ $contract->total_leave }}
			</td>
		</tr>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::shop.total') }}&nbsp;{{ trans('kotoba::hr.sick') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $contract->total_sick }}
			</td>
		</tr>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::shop.total') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}&nbsp;{{ trans('kotoba::general.off') }}
			</td>
			<td class="col-sm-10">
				{{ $contract->total_off }}
			</td>
		</tr>

		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::hr.leave') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}&nbsp;{{ trans('kotoba::general.off') }}
			</td>
			<td class="col-sm-10">
				{{-- $contract->left_leave --}}
			</td>
		</tr>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::hr.sick') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}&nbsp;{{ trans('kotoba::general.off') }}
			</td>
			<td class="col-sm-10">
				{{-- $contract->left_sick --}}
			</td>
		</tr>
		<tr>
			<td class="col-span-2">
				{{ Lang::choice('kotoba::general.day', 2) }}&nbsp;{{ trans('kotoba::general.off') }}
			</td>
			<td class="col-sm-10">
				{{-- $contract->left_off --}}
			</td>
		</tr>
	</tbody>
</table>

<div class="row">
	<h3>
		{{ Lang::choice('kotoba::general.day', 2) }}&nbsp;{{ trans('kotoba::general.off') }}
	</h3>
	<hr>
</div>

<table class="table table-striped table-hover">
	<tbody>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::general.took') }}&nbsp;{{ trans('kotoba::hr.leave') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $contract->took_leave }}
			</td>
		</tr>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::general.took') }}&nbsp;{{ trans('kotoba::hr.sick') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $contract->took_sick }}
			</td>
		</tr>
		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::general.took') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $contract->took_off }}
			</td>
		</tr>

		<tr>
			<td class="col-span-2">
				{{ trans('kotoba::general.took') }}&nbsp;{{ trans('kotoba::general.misc') }}&nbsp;{{ Lang::choice('kotoba::general.day', 2) }}
			</td>
			<td class="col-sm-10">
				{{ $contract->misc_off }}
			</td>
		</tr>
	</tbody>
</table>

</div>
</div><!-- ./ row -->


@endif
