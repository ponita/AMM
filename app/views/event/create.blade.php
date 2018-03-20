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
	
		
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('type', 'Type', array('class' => 'col-sm-2')) }}
			{{ Form::select('type', [
					'0' =>'---Select a type---',
					'Training' => 'Training',
					'Sensitization' => 'Sensitization',
					'Outreach' => 'Outreach',
					'Support Supervision' => 'Support Supervision'], 
					Input::old('type'), array('id' => 'type', 'class' => 'form-control col-sm-4')) }}

			{{ Form::label('uid', 'Unique ID', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::text('uid', 'Auto generated upon succesfull save!',
						array('class' => 'form-control col-sm-4', 'readonly' =>'true')) }}
			
		</div>

		<div class="form-group">
			{{ Form::label('name', 'Activity Name', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::old('name'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}			


			{{Form::label('thematicarea', 'Thematic Area', array('class' => 'col-sm-2 col-sm-offset-1'))}}
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
					'0' => '----Select Location----',
					'Butabika Headquaters' => 'Butabika Headquaters',
					'Field Activity InCountry' => 'Field Activity InCountry',
					'Field Activity Foreign' => 'Field Activity Foreign'], 
					Input::old('location'), array('id' => 'location', 'class' => 'form-control col-sm-4')) }}
			
			{{ Form::label('premise', 'Venue', array('class' => 'col-sm-1 col-sm-offset-1')) }}
			{{ Form::text('premise', Input::old('premise'), array('class' => 'form-control col-sm-4')) }}
		</div>

		<div class="form-group" style="" id="field-location">
			
			{{Form::label('healthregion', 'Health Region', array('class' => 'col-sm-2')) }}
			{{ Form::select('healthregion', $healthregion, Input::old('healthregion'),
					['class' => 'form-control col-sm-4']) }}

			{{ Form::label('district', 'District', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('district', $districts, Input::old('district'), array('class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group">
			{{ Form::label('country', 'Country', array('class' => 'col-sm-2')) }}
			{{ Form::select('country', $country, Input::old('country'), array('class' => 'form-control col-sm-4')) }}
			
			{{Form::label('funder', 'Funding Source', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::select('funder', $funders, Input::old('funder'),
					['class' => 'form-control col-sm-4']) }}
			</div>

		<div class="form-group">
			
			{{Form::label('organiser', 'Organiser', array('class' => 'col-sm-2')) }}
			{{ Form::select('organiser', $organisers, Input::old('organiser'),
					['class' => 'form-control col-sm-4']) }}

			{{Form::label('co_organiser', 'Co/Organiser', array('class' => 'col-sm-2 col-sm-offset-1')) }}
			{{ Form::text('co_organiser', Input::old('co_organiser'), array('class' => 'form-control col-sm-4')) }}	
		</div>


		<div class="form-group">

			{{ Form::label('audience', 'Target Audience', array('class' => 'col-sm-2')) }}
			
			<div class="form-pane panel panel-default">
			<div class="container-fluid">
			<div class="form-group" list="audience">
			<label>
 
			<input type="checkbox" list="" name="audience[]" id="audience" value="IPs" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			IPs
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios2" value="Dev't Partners"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Dev't Partners
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios3" value="DHOs"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			DHOs
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="RRH Directors"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			RRH Directors
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="Hospital Directors"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Hospital Directors
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="UNHLS facility"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			UNHLS facility
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="IP Lab Advisors"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			IP Lab Advisors
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios6" value="Lab Incharges"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Lab Incharges
			</label>
			<label>
			<input type="checkbox" list="" name="audience[]" id="audience" value="Medical Superintendents"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Medical Superintendents
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios2" value="DLFPs"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			DLFPs
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios3" value="Multi sectoral"  @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Multi sectoral
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="National stakeholders" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			National stakeholders
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="Regional Coordinators" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Regional Coordinators
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios6" value="Hub Coordinators" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Hub Coordinators
			</label>
			<label>
			<input type="checkbox" list="" name="audience[]" id="audience" value="Top Management" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Top Management
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios2" value="Senior Management" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Senior Management
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios3" value="M$E Focal Persons" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			M$E Focal Persons
			</label>
			<label>
			<input type="checkbox"  name="audience[]" id="optionsRadios4" value="General Staff" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			General Staff
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="Departmental" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Departmental
			</label>
			<label>
			<input type="checkbox" name="audience[]" id="optionsRadios5" value="Others" @if(is_array(input::old('audience')) && in_array(1, old('audience'))) checked @endif>
			Others
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