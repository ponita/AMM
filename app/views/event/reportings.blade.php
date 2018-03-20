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
			Updating Activity Information 
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($event, array('files'=>true,'route' => array('event.updatereportings', $event->id), 'method' => 'PUT',
				'id' => 'form-edit-eventreportings')) }}

			
			<div class="row view-striped">
					<div class=""><strong>{{ $event->name }}: From {{ $event->start_date }} to {{ $event->end_date }}</strong></div>
				</div>
				<div class="panel panel-info">
				<div class="panel-heading">
				Challenges Encountered	
				</div>
			
			</div>

		<div id="challenge-point">
			<div class="row">
			<div class="form-group row">
			{{ Form::hidden('event_id', $event->id) }}
			{{ Form::label('challenges', 'Add challenges', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('challenges[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}


			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>
				

			<div>
				<a href="#" id="add-challenge"><i>Click here to Add More</i></a></div>

			<div class="panel panel-info">
				<div class="panel-heading">
				Lessons Learnt	
				</div>
			
			</div>

		<div id="lesson-point">
			<div class="row">
			<div class="form-group row">
			{{ Form::hidden('event_id', $event->id) }}
			{{ Form::label('lesson', 'Add Lesson', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('lesson[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}


			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>
				

			<div>
				<a href="#" id="add-lesson"><i>Add More Lessons Learnt</i></a></div>

			<div class="panel panel-info">
				<div class="panel-heading">
				Recommendations	
				</div>
			
			</div>

		<div id="rec-point">
			<div class="row">
			<div class="form-group row">
			{{ Form::hidden('event_id', $event->id) }}
			{{ Form::label('recommendation', 'Add Recommendation', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('recommendation[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>
				

			<div>
				<a href="#" id="add-rec"><i>Add More recommendations</i></a></div>

				<div class="panel panel-info">
					<div class="panel-heading">
				Action Points	
				</div>

			</div>

		<div id="action-point">
			<div class="row">
			<div class="form-group row">
			{{ Form::hidden('event_id', $event->id) }}
			{{ Form::label('action', 'Add Action Point', array('class' => 'col-sm-2')) }}
			{{ Form::text('action[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			</div>

			
			<div class="form-group row">
			{{ Form::label('name', 'Person responsible', array('class' => 'col-sm-2')) }}
			{{ Form::text('name[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			</div>
			
			<div class="form-group row">
			{{ Form::label('date', 'Date', array('class' => 'col-sm-2')) }}
			{{ Form::text('date[]', Input::old('date'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			</div>

			<div class="form-group row">
			{{ Form::label('location', 'Location', array('class' => 'col-sm-2')) }}
			{{ Form::text('location[]', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
		</div>
				

			<div>
				<a href="#" id="add-action"><i>Add More action points</i></a></div>
			<div class="form-group actions-row" style="text-align:centre;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>
			
{{ Form::close() }}

@stop	