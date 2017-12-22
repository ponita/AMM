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



<div class="panel panel-info">
	<div class="panel-heading"><strong>Activity Information</strong></div>
	<div class="panel-body">	
	
		
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('name', 'Activity Name', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::old('name'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			
		</div>

		<div class="form-group">
			

			{{Form::label('name', 'Thematic Area', array('class' => 'col-sm-2'))}}
			{{ Form::select('name', $thematicAreas, Input::get('name'),
					['class' => 'form-control name col-sm-4']) }}
 
			
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
					'Field Activity' => 'Field Activity'], 
					Input::old('location'), array('id' => 'location', 'class' => 'form-control col-sm-4')) }}
			
			{{ Form::label('premise', 'Venue', array('class' => 'col-sm-1 col-sm-offset-1')) }}
			{{ Form::text('premise', Input::old('premise'), array('class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group" style="" id="field-location">
			
			{{Form::label('name', 'Health Region', array('class' => 'col-sm-2')) }}
			{{ Form::select('name', $healthregion, Input::get('name'),
					['class' => 'form-control name col-sm-4']) }}

			{{ Form::label('district', 'District', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('district', $districts, Input::old('district'), array('class' => 'form-control col-sm-4')) }}
			</div>


		<div class="form-group">
			{{Form::label('name', 'Fundering Source', array('class' => 'col-sm-2')) }}
			{{ Form::select('name', $funders, Input::get('name'),
					['class' => 'form-control name col-sm-4']) }}

			{{Form::label('name', 'Organiser', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('name', $organisers, Input::get('name'),
					['class' => 'form-control name']) }}	
		</div>

		<div class="form-group">

			{{ Form::label('audience', 'Target Audience', array('class' => 'col-sm-2')) }}
			
			<div class="form-pane panel panel-default">
			<div class="container-fluid">
			<div class="form-group" list="audience">
			<label>
			<input type="checkbox" list="" name="audience[]" id="audience" value="IPs">
			IPs
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios2" value="Dev't Partners">
			Dev't Partners
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios3" value="DHOs">
			DHOs
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="RRH Directors">
			RRH Directors
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="IP Lab Advisors">
			IP Lab Advisors
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios6" value="Lab Incharges">
			Lab Incharges
			</label>
			<label>
			<input type="checkbox" list="" name="audience[]" id="audience" value="Medical Superintendents">
			Medical Superintendents
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios2" value="DLFPs">
			DLFPs
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios3" value="Multi sectoral">
			Multi sectoral
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="National stakeholders">
			National stakeholders
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="Regional Coordinators">
			Regional Coordinators
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios6" value="Hub Coordinators">
			Hub Coordinators
			</label>
			<label>
			<input type="checkbox" list="" name="audience[]" id="audience" value="Top Management">
			Top Management
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios2" value="Senior Management">
			Senior Management
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios3" value="M$E Focal Persons">
			M$E Focal Persons
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="General Staff">
			General Staff
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="Departmental">
			Departmental
			</label>
			
		</div>
		</div>
	</div>
		</div>	
			<div class="form-group">
			{{ Form::label('participants_no', 'No of Participants', array('class' => 'col-sm-2' )) }}
			{{ Form::input('number','participants_no', Input::old('participants_no'), array('class' => 'form-control col-sm-4')) }}	
		
			</div>
			
			

			<div id="action-point">
			<div class="row">
			<div class="form-group">

			{{ Form::label('objective', 'Add Objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('objective[]', '', array('size' => '10x1','class' => 'form-control col-sm-4')) }}
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>

				<div>
				<a href="#" id="add-action"><i>Add More Objectives</i></a></div>


		
	
	
</div>
				
<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
		
				
{{ Form::close() }}

</div>
</div>
@stop	