@extends("layout")
@section("content")

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn1").click(function(){
        $("1").hide();
    });
    // $(".btn2").click(function(){
    //     $("p").show();
    // });
});
</script>  -->
<script>
$('#location').on('change', function() {
var el = $('#field-location');
if (this.value === 'Field Activity') { el.show();} 
else { el.hide();}
});

</script>

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
			New Activity 
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::open(array('url' => 'event', 'id' => 'form-create-event','files'=>true, 'autocomplete' => 'off')) }}

			<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Activity Information</strong></div>
	<div class="panel-body">	
	
<div class="form-pane panel panel-default">
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('type', 'Type', array('class' => 'col-sm-2')) }}
			{{ Form::select('type', [
					'0' =>'---Select a type---',
					'Training' => 'Training',
					'Workshop' => 'Workshop',
					'Conference' => 'Conference',
					'Sensitization' => 'Sensitization',
					'Outreach' => 'Outreach',
					'Support Supervision' => 'Support Supervision'], 
					Input::old('type'), array('id' => 'type', 'class' => 'form-control col-sm-4')) }}

			{{ Form::label('uid', 'Unique ID', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::text('uid', 'Auto generated upon succesfull save!',
						array('class' => 'form-control col-sm-4', 'readonly' =>'true')) }}
			
		</div>
	</div>

<div class="form-pane panel panel-default">
	<div class="form-group">
			{{ Form::label('name', 'Activity Name', array('class' => 'col-sm-2 required')) }}
			{{ Form::text('name', Input::old('name'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}			


            {{ Form::label('department', 'Department', array('class' => 'col-sm-2 col-sm-offset-1')) }}
            {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Hep B' =>'Hep B', 'Microbiology' => 'Microbiology','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'QA' =>'QA', 'Results QC' =>'Results QC', 'Records' =>'Records', 'Research' =>'Research','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository', 'Customer Care' =>'Customer Care', 'Management' =>'Management', 'All' =>'All'], 
                    Input::old('department'), array('class' => 'form-control')) }}
                    
			<!-- {{Form::label('thematicarea', 'Thematic Area', array('class' => 'col-sm-2 col-sm-offset-1'))}}
			{{ Form::select('thematicarea', $thematicAreas, Input::old('thematicarea'),
					['class' => 'form-control', 'id' => 'thematicarea']) }} -->
					
		</div>
	</div>
		<!-- <div class="col-md-6 strategy-list">
										</div> -->
		
	<!-- 	<div class="form-pane panel panel-default">
			<div class="form-group" >
			{{Form::label('department', 'Strategic plan', array('class' => 'col-sm-2'))}}
			{{ Form::select('department', $departments, Input::old('department'),
					['class' => 'form-control department', 'id' => 'department']) }}


		
		<div id="workplan" name="workplan" class="col-md-6 workplan-list">
										</div>
</div>
</div> -->

<div class="form-pane panel panel-default">
		<div class="form-group">
			{{ Form::label('start_date', 'Start Date', array('class' => 'col-sm-2 required')) }}
			{{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

			{{ Form::label('end_date', 'End Date', array('class' => 'col-sm-1 col-sm-offset-1')) }}
			{{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

		</div>
	</div>
		
	

<div class="form-pane panel panel-default">
		<div class="form-group">
			{{ Form::label('location', 'Location', array('class' => 'col-sm-2')) }}
			{{ Form::select('location', [
					'0' => '----Select Location----',
					'Butabika Headquaters' => 'Butabika Headquaters',
					'Field Activity InCountry' => 'Field Activity InCountry',
					'Field Activity Foreign' => 'Field Activity Foreign'], 
					Input::old('location'), array('id' => 'location', 'class' => 'form-control col-sm-4')) }}
			
			{{ Form::label('premise', 'Venue', array('class' => 'col-sm-1 col-sm-offset-1')) }}
			{{ Form::textarea('premise', Input::old('premise'), array('size' => '10x1','class' => 'form-control col-sm-4')) }}
		</div>
	</div>

		

<!-- <div class="form-pane panel panel-default">
		<div id="lesson-point">
			<div class="row">
			<div class="form-group">
				{{ Form::label('hub', '&nbsp; &nbsp; &nbsp; &nbsp; Hub', array('class' => 'col-sm-2')) }}
			{{ Form::select('hub[]', $hubs, Input::old('hub'), array('class' => 'form-control col-sm-4')) }}

			
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>
		<div>
				<a href="#" id="add-lesson"><i>Select more hubs</i></a></div>
	</div> -->

<div class="form-pane panel panel-default">
		<div class="form-group" style="" id="field-location">
			
			{{Form::label('healthregion', 'Health Region', array('class' => 'col-sm-2')) }}
			{{ Form::select('healthregion', $healthregion, Input::old('healthregion'),
					['class' => 'form-control col-sm-4']) }}

			{{ Form::label('district', 'District', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('district', $districts, Input::old('district'), array('class' => 'form-control col-sm-4')) }}
			</div>

		</div>

<div class="form-pane panel panel-default">
			<div class="form-group">
			{{ Form::label('country', 'Country', array('class' => 'col-sm-2')) }}
			{{ Form::select('country', $country, Input::old('country'), array('class' => 'form-control col-sm-4')) }}
			
			{{Form::label('funder', 'Funding Source', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('funder', $funders, Input::old('funder'),
					['class' => 'form-control col-sm-4']) }}
			</div>
		</div>

<div class="form-pane panel panel-default">
		<div class="form-group">
			
			{{Form::label('organiser', 'Organiser', array('class' => 'col-sm-2')) }}
			{{ Form::select('organiser', $organisers, Input::old('organiser'),
					['class' => 'form-control col-sm-4']) }}

			{{Form::label('co_organiser', 'Co/Organiser', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::text('co_organiser', Input::old('co_organiser'), array('class' => 'form-control col-sm-4')) }}	
		</div>
	</div>


<div class="form-pane panel panel-default">
		<div class="form-group">
			<label>Audience</label>
				<div class="form-pane panel panel-default">
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
				<input type="checkbox" name="audience[]" value="{{$value->name}}">
				{{$value->name}}
			</label>
			</div>	
			{{ ($cnt%4==0)?"</div>":"" }}
						@endforeach
						</div>
					</div>
				</div>

			</div>
		
<div class="form-pane panel panel-default">
			<div class="form-group">
			{{ Form::label('participants_no', 'No of Participants', array('class' => 'col-sm-2' )) }}
			{{ Form::input('number','participants_no', Input::old('participants_no'), array('class' => 'form-control col-sm-4')) }}	
		
			</div>
		</div>
			
			

<div class="form-pane panel panel-default">
			<div id="action-point">
			<div class="row">
			<div class="form-group">

			{{ Form::label('objective', '&nbsp; &nbsp; &nbsp; Add Objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('objective[]', '', array('size' => '10x1','class' => 'form-control col-sm-4')) }}
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>

				<div>
				<a href="#" id="add-action"><i>Add More Objectives</i></a></div>

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