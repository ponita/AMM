@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearActivities.index') }}">BA</a>
		  </li>
		  <li class="active">Edit</li>
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

			<!-- {{ Form::open(array('route' => 'yearActivities.store', 'id' => 'form-create-yearActivities')) }} -->
			{{ Form::model($activities, array('files'=>true,'route' => array('yearActivities.update', $activities->id), 'method' => 'PUT',
				'id' => 'form-edit-activity')) }}

				<div class="col-sm-12">
				<div class="row">
				<div class="form-group col-md-12">
			{{Form::label('year_subobjectives_id', 'Sub Objectives', array('class' => 'col-md-2'))}}
			{{ Form::select('year_subobjectives_id', $thematicAreas, Input::old('year_subobjectives_id'),
					['class' => 'form-control col-md-10']) }}
					
				</div>
				</div>
				
				<div id="YA-point">
			<div class="row">
				<div class="col-md-12">
			<div class="form-group">

			{{ Form::label('name', 'Activity', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('name', '', Input::old('name'), array('class' => 'form-control col-md-12')) }}
			</div>

			<div class="form-group">
			{{ Form::label('funder', 'Funder', array('class' => 'col-sm-2')) }}
			{{ Form::text('funder', Input::old('funder'), array('class' => 'form-control col-sm-4')) }}
			</div>
			<div class="form-group">
			{{ Form::label('person_responsible', 'Person responsible', array('class' => 'col-sm-2')) }}
			{{ Form::text('person_responsible', Input::old('person_responsible'), array('class' => 'form-control col-sm-4')) }}
			</div>
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
			</div>

				<!-- <div>
				<a href="#" id="add-YA"><i>Add More activities</i></a></div> -->
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