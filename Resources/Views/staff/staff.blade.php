@extends($theme_front)


{{-- Web contract Title --}}
@section('title')
{{ trans('kotoba::general.staff') }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')

<div class="container margin-top-xl">

<div class="row">
<h1>
	<i class="fa fa-users fa-lg"></i>
	{{ trans('kotoba::general.staff') }}&nbsp;{{ trans('kotoba::cms.portal') }}
	<hr>
</h1>
</div>


<div class="row center">
<div class="col-sm-4">
	<a href="/" class="blue blue-hover"><i class="fa fa-clock-o fa-5x"></i></a>
{{--
	<h3><a href="/" class="blue blue-hover">{{ trans('kotoba::general.time') }}&nbsp;{{ trans('kotoba::general.clock') }}</a></h3>
--}}
</div>
<div class="col-sm-4">
	<a href="/" class="blue blue-hover"><i class="fa fa-envelope-o fa-5x"></i></a>
{{--
	<h3><a href="/" class="blue blue-hover">{{ trans('kotoba::account.email') }}</a></h3>
--}}
</div>
<div class="col-sm-4">
	<a href="/" class="blue blue-hover"><i class="fa fa-dashboard fa-5x"></i></a>
	<h3><a href="staff/dashboard/{{ Auth::user()->id }}" class="blue blue-hover">{{ trans('kotoba::cms.dashboard') }}</a></h3>
</div>
</div><!-- ./row -->

<div class="row center margin-top-xl">
<div class="col-sm-4">
	<a href="helpdesk" class="blue blue-hover"><i class="fa fa-laptop fa-5x"></i></a>
	<h3><a href="/helpdesk" class="blue blue-hover">{{ trans('kotoba::helpdesk.helpdesk') }}</a></h3>
</div>
<div class="col-sm-4">
	<a href="helpdesk/knowledgebase" class="blue blue-hover"><i class="fa fa-lightbulb-o fa-5x"></i></a>
	<h3><a href="helpdesk/knowledgebase" class="blue blue-hover">{{ trans('kotoba::helpdesk.knowledge_base') }}</a></h3>
</div>
<div class="col-sm-4">
</div>
</div><!-- ./row -->

</div><!-- ./container -->


@stop
