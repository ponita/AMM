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
			{{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Microbiology' => 'Microbiology','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'Results QC' =>'Results QC', 'Records' =>'Records','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository'], 
                    Input::old('department'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
		    {{ Form::label('start_time', 'Start Time', array('class' => 'col-sm-2')) }}
			{{ Form::text('start_time', Input::old('start_time'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
         </div>
			

			
		<div class="form-group">
			{{ Form::label('end_time', 'End Time', array('class' => 'col-sm-2')) }}
			{{ Form::text('end_time', Input::old('end_time'), array('class' => 'form-control standard-datepicker col-sm-4')) }}	
		</div>
        

		<div class="form-group">
			{{ Form::label('venue', 'Venue', array('class' => 'col-sm-2')) }}
			<!-- {{ Form::select('venue', [
					'Upper Board room' => 'Upper Board room',
					'EDs Board room' => 'EDs Board room',
					'Lower Board room' => 'Lower Board room',
					'Quadrangle' => 'Quadrangle',
					'NTRL' => 'NTRL',
					'Tent' => 'Tent'], 
					Input::old('venue'), array('id' => 'location', 'class' => 'form-control col-sm-4')) }} -->
			<input list="venue" name="venue" value="<?php echo $meetings->venue; ?>" class="form-control col-sm-4" placeholder="Double click for options or write">
					<datalist id="venue">
						<option value="Upper Board room">
						<option value="EDs Board room">
						<option value="Lower Board room">
						<option value="Quadrangle">
						<option value="NTRL">
							<option value="Tent">
					</datalist>
		</div>

		

		<div class="form-group">
			
			{{Form::label('organiser', 'Organiser', array('class' => 'col-sm-2')) }}
			{{ Form::select('organiser', $organisers, $meetings->organiser_id,
					['class' => 'form-control']) }}		
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