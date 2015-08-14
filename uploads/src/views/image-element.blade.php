<div class="form-group{{ $state }}">
	@if($element->getLabel())
	{{ Form::label($element->getName(), $element->getLabel(), array('class' => 'col-sm-2 col-lg-2 control-label')) }}
	@else
	<div class="col-lg-2"></div>
	@endif
	<div class="col-sm-10 col-lg-6">

		@if($element->getValue())
		<div class="media">
			<a class="pull-left" href="#">
				{{ HTML::image('image/100/100/' . $element->getValue(), $element->getValue(), array('class' => 'media-object')) }}
			</a>
			<div class="media-body">
				{{ $element->getValue() }}
			</div>
		</div>
		@endif

		{{ Form::file($element->getName(), $element->getAttributes()) }}
		@if($element->getHelp())
		<p class="help-block">{{ $element->getHelp() }}</p>
		@endif
	</div>
</div>