@if ( Module::exists('kagi') )


<div class="row">
<h2>
	<i class="fa fa-heart fa-fw"></i>
	{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ Lang::choice('kotoba::general.status', 1) }}
	<hr>
</h2>
</div>


<div class="row">

	<div class="col-sm-12">

		<div class="panel panel-info">
		<div class="panel-heading">

			<h3 class="panel-title">
				<i class="fa fa-heart fa-fw"></i>
				{{ Lang::choice('kotoba::general.status', 1) }}
			</h3>

		</div>
		<div class="panel-body">

			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tbody>
					<tr>
						<td>
							{{ trans('kotoba::account.last_login') }}
						</td>
						<td>
							{{ Carbon\Carbon::parse($user->last_login)->diffForHumans() }}
						</td>
						<td>
							{{ $user->last_login }}
						</td>
					</tr>
					<tr>
						<td>
							{{ trans('kotoba::account.created_at') }}
						</td>
						<td>
							{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
						</td>
						<td>
							{{ $user->created_at }}
						</td>
					</tr>
					<tr>
						<td>
							{{ trans('kotoba::account.updated_at') }}
						</td>
						<td>
							{{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
						</td>
						<td>
							{{ $user->updated_at }}
						</td>
					</tr>
				</tbody>
			</table>
			</div><!-- ./responsive -->

		</div><!-- ./ panel body -->
		</div><!-- ./ panel panel-info -->

	</div>
</div><!-- ./row -->


@endif
