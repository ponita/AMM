@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('event.index') }}">Activities</a></li>
		</ol>
	</div>

	@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif

	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Activity Information - Report
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($event, array('files'=>true,'route' => array('event.updatereport', $event->id), 'method' => 'PUT',
				'id' => 'form-edit-eventreport')) }}

			<div class="panel panel-info">
			<div class="panel-body">
                
				<div class="row view-striped">
					<div class=""><strong>{{ $event->name }}:</strong> From {{ $event->start_date }} to {{ $event->end_date }}</div>
				</div>

				<div class="row view-striped">
					<strong>Report</strong><br>
					
				</div>

			</div>
			</div>

			<div class="form-group row">
			{{ Form::hidden('event_id', $event->id) }}
			{{ Form::label('reports', 'Submit Report', array('class' => 'col-sm-2')) }}
			{{ Form::file('reports', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			</div>

			<div class="form-group actions-row" style="text-align:centre;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>
			
{{ Form::close() }}

@stop	