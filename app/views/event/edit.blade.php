@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('event.index') }}">Activities</a></li>
		  <li class="active">New Activity</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Activity Information
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif 
			
{{ Form::model($event, array('files'=>true,'route' => array('event.update', $event->id), 'method' => 'PUT',
				'id' => 'form-edit-event')) }}



<div class="panel panel-info">
	<div class="panel-heading"><strong>Activity Information</strong></div>
	<div class="panel-body">	
	
		
		
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('type', 'Type', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('type', [
					'0' =>'---Select a type---',
					'Training' => 'Training',
					'Sensitization' => 'Sensitization',
					'Outreach' => 'Outreach',
					'Support Supervision' => 'Support Supervision'], 
					Input::old('type'), array('id' => 'type', 'class' => 'form-control col-sm-4')) }}
			
		</div>

		<div class="form-group">
			{{ Form::label('name', 'Activity Name', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::old('name'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}			


			{{Form::label('thematicarea', 'Thematic Area', array('class' => 'col-sm-2'))}}
			{{ Form::select('thematicarea', $thematicAreas, Input::old('thematicarea'),
					['class' => 'form-control col-sm-4']) }}
					
		</div>

		<div class="form-group">
			{{ Form::label('start_date', 'Start Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

			{{ Form::label('end_date', 'End Date', array('class' => 'col-sm-1 col-sm-offset-1')) }}
			{{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

		</div>
		
	

		<div class="form-group">
			{{ Form::label('location', 'Location', array('class' => 'col-sm-2')) }}
			{{ Form::select('location', [
					'' => '',
					'Butabika Headquaters' => 'Butabika Headquaters',
					'Field Activity' => 'Field Activity In-Country',
					'Field Activity' => 'Field Activity Foreign'], 
					Input::old('location'), array('id' => 'location', 'class' => 'form-control col-sm-4')) }}
			
			{{ Form::label('premise', 'Venue', array('class' => 'col-sm-1 col-sm-offset-1')) }}
			{{ Form::text('premise', Input::old('premise'), array('class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group" style="" id="field-location">
			
			{{Form::label('healthregion', 'Health Region', array('class' => 'col-sm-2')) }}
			{{ Form::select('healthregion', $healthregion, $event->healthregion_id,
					['class' => 'form-control col-sm-4']) }}

			{{ Form::label('district', 'District', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('district', $districts, $event->district_id, array('class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group">
			{{ Form::label('country', 'Country', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('country', $country, Input::old('country'), array('class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group">
			{{Form::label('funders', 'Funding Source', array('class' => 'col-sm-2')) }}
			{{ Form::select('funders', $funders, $event->funders_id,
					['class' => 'form-control col-sm-4']) }}

			{{Form::label('organiser', 'Organiser', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('organiser', $organisers, $event->organiser_id,
					['class' => 'form-control col-sm-4']) }}	
		</div>

		<div class="form-group">
			{{Form::label('co_organiser', 'Co/Organiser', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('co_organiser', Input::old('co_organiser'),
					['class' => 'form-control col-sm-4']) }}
		</div>
		
			<div class="form-group">
			{{ Form::label('participants_no', 'No of Participants', array('class' => 'col-sm-2' )) }}
			{{ Form::input('number','participants_no', Input::old('participants_no'), array('class' => 'form-control col-sm-4')) }}	
		
			</div>
			
			


		
	
	
</div>
				
<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
		
				
{{ Form::close() }}

</div>
</div>
@stop	