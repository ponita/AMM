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
		  <li><a href="{{ URL::route('letters.letter_index') }}">Memo</a></li>
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
			
{{ Form::open(array('url' => 'letters', 'id' => 'form-create-letters','files'=>true, 'autocomplete' => 'off')) }}

<!--<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>-->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Create official Memo</strong></div>
	<div class="panel-body">				
		
		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('date', 'Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('date', Input::old('date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			
		</div> 

		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('receiver', ' ', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('receiver', Input::old('receiver'), array('size' => '10x3','class' => 'form-control col-sm-10','placeholder' => 'Receiver Address')) }}
			
		</div> 

		<div class="form-group">
			{{ Form::label('dear', 'Dear', array('class' => 'col-sm-2')) }}
			{{ Form::text('dear', Input::old('dear'), array('class' => 'form-control col-sm-4','placeholder' => 'Sir/Madam/name')) }}

		</div>

		<div class="form-group">
			{{ Form::label('ref', 'RE:', array('class' => 'col-sm-2')) }}
			{{ Form::text('ref', Input::old('ref'), array('class' => 'form-control col-sm-4')) }}

		</div>

		<div class="form-group">
			<!-- {{ Form::hidden('user_id', Auth::user()->id) }} -->
			{{ Form::label('body', ' ', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('body', Input::old('body'), array('size' => '10x6','class' => 'form-control col-sm-10','placeholder' => 'Body')) }}
			
		</div>

		

		<div class="form-group">
			{{ Form::label('name', ' ', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control col-sm-4','placeholder' => 'Your Name')) }}

		</div>

		<div class="form-group">
			{{ Form::label('title', ' ', array('class' => 'col-sm-2')) }}
			{{ Form::text('title', Input::old('title'), array('class' => 'form-control col-sm-4','placeholder' => 'Your Title')) }}

		</div>

		<!-- <div class="form-group">
			{{ Form::label('report_path', 'Upload Invitation Letter', array('class' => 'col-sm-2')) }}
			{{ Form::file('report_path', Input::old('report_path'), array('class' => 'form-control col-sm-4')) }}

		</div> -->
		
				
<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
								
				
{{ Form::close() }}

</div>
</div>
@stop	