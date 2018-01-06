@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('meetings.meetingindex') }}">Meeting</a></li>
		</ol>
	</div>

	@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif

	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Meeting Minutes
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($meetings, array('files'=>true,'route' => array('meetings.updateminutes', $meetings->id), 'method' => 'PUT',
				'id' => 'form-edit-meetings')) }}

			<div class="panel panel-info">
			<div class="panel-body">
                
				<div class="row view-striped">
					<div class=""><strong>{{ $meetings->name }}: From {{ $meetings->start_time }} to {{ $meetings->end_time }}</strong></div>
				</div>

				<div class="row view-striped">
					<strong>Minutes</strong><br>
					
				</div>

			</div>
			</div>

			<div class="form-group">
			{{ Form::hidden('meeting_id', $meetings->id) }}
			{{ Form::label('minutes', 'Upload Minutes', array('class' => 'col-sm-2')) }}
			{{ Form::file('minutes', Input::old('minutes'), array('class' => 'form-control col-sm-4')) }}

		</div>

			<div class="form-group actions-row" style="text-align:centre;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>
			
{{ Form::close() }}

@stop	