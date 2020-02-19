@extends("layout")
@section("content")

<!-- <script>
$('#location').on('change', function() {
var el = $('#field-location');
if (this.value === 'Field Activity') { el.show();} 
else { el.hide();}
});

</script> -->
<link rel="stylesheet" href="css/bootstrap-year-calender.css">
<script src="js/bootstrap-year-calender.js"></script>

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
			New Meeting 
	</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::open(array('url' => 'meetings', 'id' => 'form-create-meetings','files'=>true, 'autocomplete' => 'off')) }}

			<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Meeting Information</strong></div>
	<div class="panel-body">				
		
		<div class="form-group">
			{{ Form::label('uid', 'Unique ID', array('class' => 'col-sm-2')) }}
			{{ Form::text('uid', 'Auto generated upon succesfull save!',
						array('class' => 'form-control col-sm-4', 'readonly' =>'true', 'style'=>'width: 80%;')) }}
		</div>
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('category', 'Meeting Type', array('class' => 'col-sm-2')) }}
			{{ Form::select('category', [
					'0' => '----Select category----',
					'Internal' => 'Internal',
					'External' => 'External'], 
					Input::old('category'), array('id' => 'category', 'class' => 'form-control', 'style'=>'width: 80%;')) }}
			
		</div> 

		<div class="form-group">
			{{ Form::label('name', 'Meeting', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('name', Input::old('name'), array('size' => '10x1','class' => 'form-control', 'style'=>'width: 80%;')) }}
		</div>

		<div class="form-group">
            {{ Form::label('department', 'Department', array('class' => 'col-sm-2')) }}
            {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Hep B' =>'Hep B', 'Microbiology' => 'Microbiology', 'M&E' =>'M&E', 'Pathology/Cancer' =>'Pathology/Cancer','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'QA' =>'QA', 'Results QC' =>'Results QC', 'Records' =>'Records', 'Research' =>'Research','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository', 'Customer Care' =>'Customer Care', 'Management' =>'Management','Community Outreach' =>'Community Outreach', 'All' =>'All'], 
                    Input::old('department'), array('class' => 'form-control', 'style'=>'width: 80%;')) }}
        </div>

		<div class="form-group">
		    {{ Form::label('start_time', 'Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('start_time', Input::old('start_time'), array('class' => 'form-control standard-datepicker', 'style'=>'width: 35%;', 'placeholder'=>'Start date')) }}
        
			{{ Form::text('end_time', Input::old('end_time'), array('class' => 'form-control col-sm-offset-1 standard-datepicker', 'style'=>'width: 35%;', 'placeholder'=>'End date')) }}	
		</div>
        

		<div class="form-group">
			{{ Form::label('venue', 'Venue', array('class' => 'col-sm-2')) }}
			<input list="venue" name="venue" class="form-control col-sm-4" placeholder="Click for options or write" style='width: 80%;'>
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
			{{ Form::select('organiser', $organisers, Input::get('organiser'),
					['class' => 'form-control', 'style'=>'width: 80%;']) }}		
		</div>
		

		<div class="form-group">
			<label>Audience</label>
			<div class="form-pane panel panel-default" style='width: 95%;'>
				<div class="container-fluid">
					<?php 
						$cnt = 0;
						$zebra = "";
					?>
					@foreach($audiencedata as $key=>$value)
					{{ ($cnt%4==0)?"<div class='row $zebra'>":"" }}
									<?php
										$cnt++;
										$zebra = (((int)$cnt/4)%2==1?"row-striped":"");
									?>
					<div class="col-md-3">
					<label class="checkbox-inline">
						<input type="checkbox" name="targetAudience[]" value="{{$value->name}}">
						{{$value->name}}
					</label>
					</div>	
					{{ ($cnt%4==0)?"</div>":"" }}
								@endforeach
				</div>
			</div>
		</div>
		
		<div class="form-group">	
			{{ Form::label('participants_no', 'No of Participants', array('class' => 'col-sm-2')) }}
			{{ Form::input('number','participants_no', Input::old('participants_no'), array('class' => 'form-control', 'style'=>'width: 80%;')) }}	
		</div>
		
		<div class="form-group">
			{{ Form::label('objective', 'Main Objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('objective', Input::old('objective'), array('size' => '10x1','class' => 'form-control', 'style'=>'width: 80%;')) }}
		</div>

		<!-- <div id="action-point">
			<div class="row">
				<div class="form-group">
				{{ Form::label('agenda', '&nbsp; &nbsp; Meeting Agenda', array('class' => 'col-sm-2')) }}
				{{ Form::textarea('agenda[]', ' ', array('size' => '10x1','class' => 'form-control col-sm-4','placeholder' => 'Auto numbered on save')) }}
				</div>
				{{ Form::button("<span class='glyphicon glyphicon-delete'></span> Remove", ['class' => 'remove-reason btn-normal']) }}
			</div>
		</div>

		<div>
		<a href="#" id="add-action"><i>Add More lists</i></a>
		</div>	 -->
	
	</div>
	</div>

				
	<div class="form-group actions-row" style="text-align:right;">
			{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
			['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
	</div>
	<div data-provide="calendar"></div>

	<script type="text/javascript">
	$('.clockpicker').clockpicker();

	$('.calendar').calendar()
	</script>								
					
	{{ Form::close() }}

	</div>
</div>
@stop	