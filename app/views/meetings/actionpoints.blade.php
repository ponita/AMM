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
			Updating Meeting Information - Action Points
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($meetings, array('files'=>true,'route' => array('meetings.updateactions', $meetings->id), 'method' => 'PUT',
				'id' => 'form-edit-meetingsactions')) }}

			<div class="panel panel-info">
			<div class="panel-body">
                
				<div class="row view-striped">
					<div class=""><strong>{{ $meetings->name }}: From {{ $meetings->start_time }} to {{ $meetings->end_time }}</strong></div>
				</div>

				<div class="row view-striped">
					<strong>Actions</strong><br>
					


   <table class='table table-condensed table-bordered'>
    <tr>
        <th>Action</th>
        <th>Name</th>
        <th>date</th>
        <th>location</th>
    </tr>
    @foreach($meetings->action as $action)
    <tr>
        <td>{{ $action['action'] }}</td>
        <td>{{ $action['name'] }}</td>
        <td>{{ $action['date'] }}</td>
        <td>{{ $action['location'] }} </td>
    </tr>
    @endforeach

</table>
				</div>

			</div>
			</div>

		<div id="action-point">
			<div class="row">
			<div class="form-group row">
			{{ Form::hidden('meeting_id', $meetings->id) }}
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
			</div>
{{ Form::close() }}

@stop	