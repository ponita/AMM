@extends("layout")
@section("content")

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<script src="{{ asset('js/bootstrapValidator.min.js') }}"></script> 
<script src="{{ asset('js/select2.min.js') }}"></script> 
<script>
	$(document).ready(function() {
		$('.select2').select2();
		$('#routingscheduleform').bootstrapValidator({
       
        fields: {
			monday: {
                    validators: {
                        notEmpty: {
                            message: 'Please select at least one facility'
                        }
                    }
                },
                
			email: {          
			validators: {
					regexp: {
					  regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
					  message: 'The value is not a valid email address'
					}
				}
			}
		}//endo of validation rules
    });// close form validation function
	});
</script> 
<script>
$('#location').on('change', function() {
var el = $('#field-location');
if (this.value === 'Field Activity') { el.show();} 
else { el.hide();}
});

</script>
<script>
	$('#my-select').multiSelect()
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
	
<div>
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
					Input::old('type'), array('id' => 'type', 'class' => 'form-control', 'style'=>'width: 80%;')) }}
		</div>
		<div class="form-group">
			{{ Form::label('uid', 'Unique ID', array('class' => 'col-sm-2')) }}
			{{ Form::text('uid', 'Auto generated upon succesfull save!',
						array('class' => 'form-control col-sm-4', 'readonly' =>'true', 'style'=>'width: 80%;')) }}
			
		</div>
	</div>

<div>
	<div class="form-group">
			{{ Form::label('name', 'Activity Name', array('class' => 'col-sm-2 required')) }}
			{{ Form::text('name', Input::old('name'), array('size' => '10x1','class' => 'form-control', 'style'=>'width: 80%;')) }}			

	</div>
	<div class="form-group">
            {{ Form::label('department', 'Department', array('class' => 'col-sm-2')) }}
            {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Hep B' =>'Hep B', 'Microbiology' => 'Microbiology','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'QA' =>'QA', 'M&E' =>'M&E', 'Pathology/Cancer' =>'Pathology/Cancer', 'Outbreak & Surveillance' =>'Outbreak & Surveillance', 'Results QC' =>'Results QC', 'Records' =>'Records', 'Research' =>'Research','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository', 'Customer Care' =>'Customer Care', 'Management' =>'Management', 'All' =>'All'], 
                    Input::old('department'), array('class' => 'form-control', 'style'=>'width: 80%;')) }}
	</div>
</div>
		
	<div>
		<div class="form-group">
			{{ Form::label('start_date', 'Period', array('class' => 'col-sm-2 required')) }}
			{{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control datepicker', 'style'=>'width: 35%;', 'placeholder'=>'Start Date')) }}
			{{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control col-sm-offset-1 datepicker', 'style'=>'width: 35%;', 'placeholder'=>'End date')) }}
		</div>
	</div>
<div>
		<div class="form-group">
			{{ Form::label('location', 'Location', array('class' => 'col-sm-2')) }}
			{{ Form::select('location', [
					'0' => '----Select Location----',
					'Butabika Headquaters' => 'Butabika Headquaters',
					'Field Activity InCountry' => 'Field Activity InCountry',
					'Field Activity Foreign' => 'Field Activity Foreign'], 
					Input::old('location'), array('id' => 'location', 'class' => 'form-control', 'style'=>'width: 80%;')) }}
		</div>
		<div class="form-group">	
			{{ Form::label('premise', 'Venue', array('class' => 'col-sm-1')) }}
			{{ Form::textarea('premise', Input::old('premise'), array('size' => '10x1','class' => 'form-control', 'style'=>'width: 80%;')) }}
		</div>
	</div>

<div>
		<div class="form-group">
			{{ Form::label('district', 'District', array('class' => 'col-sm-2')) }}
			{{ Form::select('district[]', $districts, null, ['class' => 'form-control col-sm-4 select2 select2-hidden-accessible', 'multiple'=>"",'style'=>'width: 80%;', 'tabindex'=>'"-1"', 'aria-hidden'=>'"true"', 'data-placeholder'=>'Select Districts']) }}
		</div>
		<div class="form-group">
			{{ Form::label('hub', 'Hub/Facility', array('class' => 'col-sm-2')) }}
			{{ Form::select('hub[]', $hubs, null, ['class' => 'form-control col-sm-4 select2 select2-hidden-accessible', 'multiple'=>"",'style'=>'width: 80%;', 'tabindex'=>'"-1"', 'aria-hidden'=>'"true"', 'data-placeholder'=>'Select facilities to be visited']) }}
		</div>

</div>
		
<div>
			<div class="form-group">
			{{ Form::label('country', 'Country', array('class' => 'col-sm-2')) }}
			{{ Form::select('country', $country, Input::old('country'), array('class' => 'form-control', 'style'=>'width: 80%;')) }}
			</div>
			<div class="form-group">
			{{Form::label('funder', 'Funding Source', array('class' => 'col-sm-2')) }}
			{{ Form::select('funder', $funders, Input::old('funder'),
					['class' => 'form-control', 'style'=>'width: 80%;']) }}
			</div>
		</div>

<div>
		<div class="form-group">
			
			{{Form::label('organiser', 'Organiser', array('class' => 'col-sm-2')) }}
			{{ Form::select('organiser', $organisers, Input::old('organiser'),
					['class' => 'form-control', 'style'=>'width: 80%;']) }}
		</div>
		<div class="form-group">
			{{Form::label('co_organiser', 'Co/Organiser', array('class' => 'col-sm-2')) }}
			{{ Form::text('co_organiser', Input::old('co_organiser'), array('class' => 'form-control', 'style'=>'width: 80%;')) }}	
		</div>
	</div>


<div>
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
		
<div>
			<div class="form-group">
			{{ Form::label('participants_no', 'No of Participants', array('class' => 'col-sm-2' )) }}
			{{ Form::input('number','participants_no', Input::old('participants_no'), array('class' => 'form-control', 'style'=>'width: 80%;')) }}	
		
			</div>
		</div>
			
			

		<div>
			<div id="action-point">
			<div class="row">
			<div class="form-group">

			{{ Form::label('objective', '&nbsp; &nbsp; &nbsp; Add Objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('objective[]', '', array('size' => '10x1','class' => 'form-control', 'style'=>'width: 80%;')) }}
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