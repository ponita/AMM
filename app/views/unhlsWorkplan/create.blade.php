@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('unhlsWorkplan.index') }}">UNHLS Workplan</a>
		  </li>
		  <li class="active">Add strategy</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Add strategy
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'unhlsWorkplan.store', 'id' => 'form-create-unhlsWorkplan')) }}

				<div class="form-group col-lg-6">
			{{Form::label('thematicArea_Id', 'Thematic Area', array('class' => 'col-sm-2'))}}
			{{ Form::select('thematicArea_id', $thematicAreas, Input::old('thematicArea_id'),
					['class' => 'form-control col-sm-4']) }}
					
			</div>
				<div class="form-group col-lg-6">
					{{ Form::label('name', 'Strategy') }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
			</div>
				
				<div id="action-point">
			<div class="row">
				<div class="col-lg-6">
			<div class="form-group">

			{{ Form::label('workplan', 'Sub objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('workplan[]', '', array('size' => '10x2','class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group row">
			{{ Form::label('from_timeframe', 'From', array('class' => 'col-sm-2')) }}
			{{ Form::text('from_timeframe[]', Input::old('from_timeframe'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			</div>
			<div class="form-group row">

			{{ Form::label('to_timeframe', 'To', array('class' => 'col-sm-2')) }}
			{{ Form::text('to_timeframe[]', Input::old('to_timeframe'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			</div>
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
			</div>

				<div>
				<a href="#" id="add-action"><i>Add More sub objectives</i></a></div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop	