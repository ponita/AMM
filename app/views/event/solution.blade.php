@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('event.report') }}">Activities</a></li>
		</ol>
	</div>

	@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif

	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Solutions to Action points
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($action, array('files'=>true,'route' => array('action.updatesolution', $action->id), 'method' => 'PUT',
				'id' => 'form-edit-eventlessons')) }}

			<div class="panel panel-info">
			<div class="panel-body">
                
				<div class="row view-striped">
					<div class=""><strong>{{ $action->action }}: </strong></div>
				</div>

				<div class="row view-striped">
					<strong>Solution</strong><br>
					<ul>
					@foreach ($action->solution as $solution)
              		<li>{{$solution->solution}}</li>
           			@endforeach
           			</ul>
				</div>

			</div>
			</div>

		<div id="action-point">
			<div class="row">
			<div class="form-group row">
			{{ Form::hidden('event_action_id', $action->id) }}
			{{ Form::label('solution', 'Add solution', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('solution[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}


			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>
				

			<div>
				<a href="#" id="add-action"><i>Add More solutions</i></a></div>

			<div class="form-group actions-row" style="text-align:centre;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>
			
{{ Form::close() }}

@stop	