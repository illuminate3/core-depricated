@if ( Module::exists('profiles') )


<div class="row">
<h2>
		<i class="fa fa-user fa-lg"></i>
		{{ Lang::choice('kotoba::account.user', 1) }}&nbsp;{{ trans('kotoba::general.information') }}
	<hr>
</h2>
</div>


<div class="row">
	<div class="col-sm-6">
		<strong>
			{{ trans('kotoba::account.primary_phone') }}:
		</strong>
		<br>
		@if ( !empty($profile->phone_1 ) )
			{{ $profile->phone_1 }}
		@endif
		<br>
		<br>
		<strong>
			{{ trans('kotoba::account.secondary_phone') }}:
		</strong>
		<br>
		@if ( !empty($profile->phone_2 ) )
			{{ $profile->phone_2 }}
		@endif
		<br>
		<br>
		<strong>
			{{ trans('kotoba::account.phone') }}&nbsp;{{ trans('kotoba::account.extension') }}:
		</strong>
		<br>
		@if ( !empty($profile->phone_extension ) )
			{{ $profile->phone_extension }}
		@endif
		<br>
		<br>
		<strong>
			{{ trans('kotoba::account.address') }}:
		</strong>
		<br>
		@if ( !empty($profile->address ) )
			{{ $profile->address }}
		@endif
		<br>
		@if ( !empty($profile->city ) )
			{{ $profile->city }}
		@endif
		@if ( !empty($profile->state ) )
			,&nbsp;{{ $profile->state }}
		@endif
		@if ( !empty($profile->zipcode ) )
			&nbsp;&nbsp;&nbsp;{{ $profile->zipcode }}
		@endif
	</div>
	<div class="col-sm-3">
		<strong>
			{{ trans('kotoba::account.primary_email') }}:
		</strong>
		<br>
		@if ( !empty($profile->email_1 ) )
			<a href="mailto:{{ $profile->email_1 }}">{{ $profile->email_1 }}</a>
		@endif
		<br>
		<br>
		<strong>
			{{ trans('kotoba::account.secondary_email') }}:
		</strong>
		<br>
		@if ( !empty($profile->email_2 ) )
			<a href="mailto:{{ $profile->email_1 }}">{{ $profile->email_2 }}</a>
		@endif
	</div>
	<div class="col-sm-3">
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
				{{-- trans('kotoba::account.error.logo') --}}
			@endif
	</div>
</div><!-- ./row -->


<div class="row">
	<div class="col-sm-12">
		<strong>
			{{ trans('kotoba::general.introduction') }}:
		</strong>
		<br>
		@if ( !empty($profile->notes ) )
			{{ $profile->notes }}
		@endif
		<br>
	</div>
</div><!-- ./row -->




@if ( (Auth::user()->id == $profile->id) || (Shinobi::can('manage_profiles')) )
<div class="row">

<hr>

	<div class="col-sm-12">
		<a href="/profiles/{{ $profile->id }}/edit" class="btn btn-success btn-block" title="{{ trans('kotoba::button.edit') }}">
			<i class="fa fa-pencil fa-fw"></i>
			{{ trans('kotoba::button.edit') }}
		</a>
	</div>

</div> <!-- ./ row -->
@endif


@endif
