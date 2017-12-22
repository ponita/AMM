@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('meetings.meetingindex') }}">Meetings</a></li>
		  <li class="active">New Meeting</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Meeting Information
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($meetings, array('files'=>true,'route' => array('meetings.update', $meetings->id), 'method' => 'PUT',
				'id' => 'form-edit-meetings')) }}

<!-- <div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div> -->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Meeting Information</strong></div>
	<div class="panel-body">				
		
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('name', 'Meeting Name', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('name', Input::old('name'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}
		</div>

		<div class="form-group">
			{{Form::label('name', 'Thematic Area', array('class' => 'col-sm-2'))}}
			{{ Form::select('name', $thematicAreas, Input::get('name'),
					['class' => 'form-control name col-sm-4']) }}
		</div>

		<div class="form-group">
		

          

			<!-- {{ Form::label('currentTime', 'Time', array('class' => 'col-sm-2')) }} 
			{{ Form::text('start_date', Input::old('currentTime'), array('class' => 'form-control standard-timepicker col-sm-4')) }} -->

		    {{ Form::label('start_time', 'Start Time', array('class' => 'col-sm-2')) }}
			{{ Form::text('start_time', Input::old('start_time'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
         </div>
			

			
			<div class="form-group">
			{{ Form::label('end_time', 'End Time', array('class' => 'col-sm-2')) }}
			{{ Form::text('end_time', Input::old('end_time'), array('class' => 'form-control standard-datepicker col-sm-4')) }}	

		</div>
        

		<div class="form-group">
			{{ Form::label('venue', 'Venue', array('class' => 'col-sm-2')) }}
			{{ Form::select('venue', [
					'Upper Board room' => 'Upper Board room',
					'EDs Board room' => 'EDs Board room',
					'Lower Board room' => 'Lower Board room',
					'Quadrangle' => 'Quadrangle',
					'NTRL' => 'NTRL',
					'Tent' => 'Tent'], 
					Input::old('venue'), array('id' => 'location', 'class' => 'form-control col-sm-4')) }}
			
		</div>

		

		<div class="form-group">
			
			{{Form::label('name', 'Organiser', array('class' => 'col-sm-2')) }}
			{{ Form::select('name', $organisers, Input::get('name'),
					['class' => 'form-control name']) }}		
		</div>
		<div class="form-group">
			
			{{ Form::label('targetAudience', 'Target Audience', array('class' => 'col-sm-2')) }}
			
			<div class="form-pane panel panel-default">
			<div class="container-fluid">
			<div class="form-group" list="targetAudience">
		
			<label>
			<input type="checkbox" list="" name="targetAudience[]" id="audience" value="IPs">
			IPs
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios2" value="Dev't Partners">
			Dev't Partners
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios3" value="DHOs">
			DHOs
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios4" value="RRH Directors">
			RRH Directors
			</label>
			<label>
			<input type="checkbox" name="targetAudience[]" id="optionsRadios5" value="IP Lab Advisors">
			IP Lab Advisors
			</label>
			<label>
			<input type="checkbox" name="targetAudience[]" id="optionsRadios6" value="Lab Incharges">
			Lab Incharges
			</label>
			<label>
			<input type="checkbox" list="" name="targetAudience[]" id="audience" value="Medical Superintendents">
			Medical Superintendents
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios2" value="DLFPs">
			DLFPs
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios3" value="Multi sectoral">
			Multi sectoral
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios4" value="National stakeholders">
			National stakeholders
			</label>
			<label>
			<input type="checkbox" name="targetAudience[]" id="optionsRadios5" value="Regional Coordinators">
			Regional Coordinators
			</label>
			<label>
			<input type="checkbox" name="targetAudience[]" id="optionsRadios6" value="Hub Coordinators">
			Hub Coordinators
			</label>
			<label>
			<input type="checkbox" list="" name="targetAudience[]" id="audience" value="Top Management">
			Top Management
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios2" value="Senior Management">
			Senior Management
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios3" value="M$E Focal Persons">
			M$E Focal Persons
			</label>
			<label>
			<input type="checkbox"  name="targetAudience[]" id="optionsRadios4" value="General Staff">
			General Staff
			</label>
			<label>
			<input type="checkbox" name="targetAudience[]" id="optionsRadios5" value="Departmental">
			Departmental
			</label>
		</div>
		</div>
	</div>
		</div>
		
		<div class="form-group">	
			{{ Form::label('participants_no', 'No of Participants', array('class' => 'col-sm-2')) }}
			{{ Form::input('number','participants_no', Input::old('participants_no'), array('class' => 'form-control col-sm-4')) }}	
		</div>
		
		<div class="form-group">
			{{ Form::label('objective', 'Main Objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('objective', Input::old('objective'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}


		</div>	

		

		<div id="action-point">
			<div class="row">
			<div class="form-group">

			{{ Form::label('agenda', 'Meeting Agenda', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('agenda[]', '', array('size' => '10x1','class' => 'form-control col-sm-4')) }}
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>

				<div>
				<a href="#" id="add-action"><i>Add More lists</i></a></div>	
			
	<!-- <div class="form-group">
			{{ Form::label('minutes', 'Upload Minutes', array('class' => 'col-sm-2')) }}
			{{ Form::file('minutes', Input::old('minutes'), array('class' => 'form-control col-sm-4')) }}

		</div> -->
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