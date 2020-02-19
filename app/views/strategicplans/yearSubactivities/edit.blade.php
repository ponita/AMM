@extends("layout")
@section("content")

	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearSubactivities.index') }}">Sub Activities</a>
		  </li>
		  <li class="active">Update</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Edit
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::model($subactivities, array('route' => array('yearSubactivities.update', $subactivities->id), 
				'method' => 'PUT', 'id' => 'form-edit-yearSubactivities')) }}
				
				<div class="panel panel-info">
			<div class="panel-body">
				<div class="row view-striped">
    			
					<div class=""><strong>{{ $subactivities->name }}</strong></div>
				</div>

			</div>
			</div>

				<!-- <div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',1)) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div> -->
				<div id="action-point">
			<div class="row">
				<div class="col-lg-6">
			<div class="form-group">

			{{ Form::label('target_count', 'Number of participants', array('class' => 'col-sm-2')) }}
			{{ Form::input('number','target_count', Input::old('target_count'), array('class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group">
			{{ Form::label('location', 'location', array('class' => 'col-sm-2')) }}
			{{ Form::text('location', Input::old('location'), array('class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group">
			{{ Form::label('update_from_timeframe', 'From', array('class' => 'col-sm-2')) }}
			{{ Form::text('update_from_timeframe', Input::old('update_from_timeframe'), array('class' => 'form-control datepicker col-sm-4')) }}
			</div>
			<div class="form-group">

			{{ Form::label('update_to_timeframe', 'To', array('class' => 'col-sm-2')) }}
			{{ Form::text('update_to_timeframe', Input::old('update_to_timeframe'), array('class' => 'form-control datepicker col-sm-4')) }}
			</div>
					
			</div>
			</div>

				<!-- <div>
				<a href="#" id="add-action"><i>Add More sub objectives</i></a></div> -->
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop	