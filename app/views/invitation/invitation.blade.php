@extends("layout")
@section("content")
<!--<script>
$('#location').on('change', function() {
var el = $('#field-location');
if (this.value === 'Field Activity') { el.show();} 
else { el.hide();}
});
</script> -->



	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('invitation.invitation_index') }}">Invitation</a></li>
		  <li class="active">Write Up</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Write Up 
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::open(array('url' => 'invitation', 'id' => 'form-create-letters','files'=>true, 'autocomplete' => 'off')) }}

<!--<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>-->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Invitation Letter</strong></div>
	<div class="panel-body">				
		

			<div class="col-lg-7">
			{{ Form::label('ref_no', 'Unique ID', array('class' => 'col-sm-2')) }}
			{{ Form::text('ref_no', 'Auto generated upon succesfull save!',
						array('class' => 'form-control col-sm-4', 'readonly' =>'true')) }}
		</div>

		<div class="col-lg-7">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			
			{{ Form::label('date', 'Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('date', Input::old('date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
		
		</div>

		<div class="col-lg-7">
			{{ Form::label('reference', 'RE:', array('class' => 'col-sm-2')) }}
			{{ Form::text('reference', Input::old('reference'), array('class' => 'form-control col-sm-4')) }}

		</div>

		<div class="col-lg-7">
			<!-- {{ Form::hidden('user_id', Auth::user()->id) }} -->
			{{ Form::label('body', ' ', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('body', Input::old('body'), array('size' => '10x6','class' => 'htmleditor form-control col-sm-10','placeholder' => 'Body')) }}
			
		</div>

		<div class="col-lg-7">
			{{ Form::label('objective', 'Objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('objective', Input::old('objective'), array('size' => '10x3','class' => 'form-control col-sm-10','placeholder' => 'Objective')) }}
			
		</div>

		

		<div class="col-lg-7">
			{{ Form::label('output', 'Output ', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('output', Input::old('output'), array('size' => '10x3','class' => 'form-control col-sm-10','placeholder' => '')) }}
			
		</div>

		<div class="col-lg-7">
			{{ Form::label('venue', 'Venue', array('class' => 'col-sm-2')) }}
			{{ Form::text('venue', Input::old('venue'), array('class' => 'form-control col-sm-4')) }}

		</div>

		<div class="col-lg-7">
			{{ Form::label('start_date', 'Scheduled from', array('class' => 'col-sm-2')) }}
			{{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

			{{ Form::label('end_date', 'Scheduled to', array('class' => 'col-sm-2 ')) }}
			{{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}

		</div>

		<div class="col-lg-7">

			{{ Form::label('name', 'Name', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control col-sm-4')) }}

			{{ Form::label('title', 'Title ', array('class' => 'col-sm-2')) }}
			{{ Form::text('title', Input::old('title'), array('class' => 'form-control col-sm-4','placeholder' => 'Your title')) }}

	 
        
		</div>
		<div class="col-lg-7">
			{{ Form::label('attachment', 'Attachment', array('class' => 'col-sm-2')) }}
			{{ Form::file('attachment', Input::old('attachment'), array('class' => 'form-control col-sm-4')) }}

		</div>
		
				
<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
								
				
{{ Form::close() }}

</div>
</div>
@stop	