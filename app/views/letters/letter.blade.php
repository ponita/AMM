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
		
		
    
    	<div class="col-lg-8">
			{{ Form::label('ref_no', 'Unique ID', array('class' => 'col-sm-2')) }}
			{{ Form::text('ref_no', 'Auto generated upon succesfull save!',
						array('class' => 'form-control', 'readonly' =>'true')) }}
		</div>

		<div class="col-lg-8">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			{{ Form::label('date', 'Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('date', Input::old('date'), array('size' => '10x2','class' => 'form-control standard-datepicker')) }}
			
		</div> 

		<div class="col-lg-8">
			{{ Form::label('receiver', 'Receiver ', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('receiver', Input::old('receiver'), array('size' => '10x3','class' => 'htmleditor form-control','placeholder' => 'Receiver Address')) }}
			
		</div> 

		<div class="col-lg-8">
			{{ Form::label('dear', 'Dear', array('class' => 'col-sm-2')) }}
			{{ Form::text('dear', Input::old('dear'), array('size' => '10x3','class' => 'form-control','placeholder' => 'Sir/Madam/name')) }}

		</div>

		<div class="col-lg-8" style="text-transform: uppercase;">
			{{ Form::label('ref', 'RE:', array('class' => 'col-sm-2')) }}
			{{ Form::text('ref', Input::old('ref'), array('size' => '10x3','class' => 'form-control')) }}

		</div>

		<div class="col-lg-8">
			<!-- {{ Form::hidden('user_id', Auth::user()->id) }} -->
			{{ Form::label('body', 'Body ', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('body', Input::old('body'), array('size' => '10x6','class' => 'htmleditor form-control','placeholder' => 'Body')) }}
			
		</div>
		<div class="col-lg-8">
			
		</div>
		
		<div class="form-pane panel panel-default">
			<div id="copy-point">
			<div class="row">
			<div class="form-group">

			{{ Form::label('copied', '&nbsp; &nbsp; &nbsp; Copy to', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('copied[]', '', array('size' => '10x1','class' => 'form-control col-sm-4')) }}
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>

				<div>
				<a href="#" id="add-copy"><i>Add More</i></a></div>

			</div>


		
		
				
<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
								
				
{{ Form::close() }}

</div>
</div>
@stop	