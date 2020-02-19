@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearSubactivities.index') }}">Sub Activities</a>
		  </li>
		  <li class="active">New</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Add
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'yearSubactivities.store', 'id' => 'form-create-yearSubactivities')) }}

			<div class="col-sm-12">
		<div class="row">
				<div class="form-group">
			{{Form::label('year_activities_id', 'Choose Activity', array('class' => 'col-md-2'))}}
			{{ Form::select('year_activities_id', $thematicAreas, Input::old('year_activities_id'),
					['class' => 'form-control col-md-10']) }}
					
			</div>
				<div class="form-group">
					{{ Form::label('name', 'Sub Activity', array('class' => 'col-md-2')) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
			
				
			<div class="form-group">

			{{ Form::label('target', 'Target number', array('class' => 'col-sm-2')) }}
			{{ Form::input('number','target', Input::old('target'), array('class' => 'form-control col-sm-4')) }}	
			</div>

			<div class="form-group">
			{{ Form::label('location', 'location', array('class' => 'col-sm-2')) }}
			{{ Form::text('location', Input::old('location'), array('class' => 'form-control col-sm-4')) }}
			</div>
			
			<div class="form-group">
			{{ Form::label('from_timeframe', 'From', array('class' => 'col-sm-2')) }}
			{{ Form::text('from_timeframe', Input::old('from_timeframe'), array('class' => 'form-control datepicker col-sm-4')) }}
			</div>
			<div class="form-group">

			{{ Form::label('to_timeframe', 'To', array('class' => 'col-sm-2')) }}
			{{ Form::text('to_timeframe', Input::old('to_timeframe'), array('class' => 'form-control datepicker col-sm-4')) }}
			</div>

			</div>
				
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>
			</div>
		</div>
			{{ Form::close() }}
		</div>
	</div>
@stop	