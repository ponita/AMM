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
			
<!-- {{ Form::open(array('url' => 'event.update', 'id' => 'form-create-event','files'=>true, 'autocomplete' => 'off')) }} -->
{{ Form::open(array('route' =>array('event.update', $event->id), 'method' => 'POST')) }}


			<input type="hidden" name="_token" value="{{ Session::token() }}"><!--to be removed function for csrf_token -->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Activity Information</strong></div>
	<div class="panel-body">	
	<div class="panel-default">
		<div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $event->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $event->name }}</div>
      </div>
		
	</div>
		
		

		<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
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

		
	
	
</div>
				
<div class="form-group actions-row" style="text-align:right;">
		{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
		['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
		
				
{{ Form::close() }}

</div>
</div>
@stop	