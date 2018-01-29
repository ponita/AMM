@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('meetings.meetingindex') }}">Meeting</a></li>
		  <li class="active">Meeting Approval</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Meeting Approval Status
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif 
			
{{ Form::model($meetings, array('files'=>true,'route' => array('meetings.updateapproval', $meetings->id), 'method' => 'PUT',
				'id' => 'form-edit-meetings')) }}
<div class="form-group">
      {{ Form::hidden('approvedby', Auth::user()->name) }}
      {{ Form::label('approvalstatus', 'Approval Status', array('class' => 'col-sm-2')) }}
      {{ Form::select('approvalstatus', [
          'posponed' => 'posponed',
          'Approved' => 'Approved',
          'Not Approved' => 'Not Approved'], 
          Input::old('approvalstatus'), array('id' => 'approvalstatus', 'class' => 'form-control col-sm-4')) }}

     
</div>
<div class="form-group">
			 {{ Form::label('comment', 'Comment/Reason', array('class' => 'col-sm-2')) }}
      {{ Form::textarea('comment', Input::old('comment'), array('size' => '10x3','class' => 'form-control col-sm-10')) }}

			{{ Form::label('', '', array('class' => 'col-sm-4')) }}
			{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
			['class' => 'btn btn-primary col-sm-1', 'onclick' => 'submit()']) }}
</div>

<div class="form-group">
      {{ $meetings->user->name }}
 <br>
      {{ $meetings->user->email }}
        
      </div>
{{ Form::close() }}

<div class="panel panel-info">
	<div class="panel-heading"><strong>Activity Information</strong></div>
	<div class="panel-body">				
		
		<div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $meetings->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $meetings->name }}</div>
      </div>
      
<div class="row  view-striped">
    
       <div class="col-sm-2"><strong>Duration</strong></div>
        <div class="col-sm-4">{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M Y', strtotime($meetings->end_time)) }}</div>

          <div class="col-sm-2"><strong>Venue</strong></div>
        <div class="col-sm-4">{{ $meetings->venue }}</div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-2"><strong>Organiser</strong></div>
        <div class="col-sm-4">{{ $meetings->organiser->name }}</div>

        <div class="col-sm-2"><strong>Department</strong></div>
        <div class="col-sm-4">{{ $meetings->thematicarea->name }}</div>
        
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Target Audience</strong>
        <br>
          <ul>
          @foreach ($meetings->targetAudience as $targetAudience)
          <li>{{$targetAudience->targetAudience}}</li>
          @endforeach
          </ul>
        </div>
        
        <div class="col-sm-2"><strong>Participants</strong></div>
        <div class="col-sm-4">{{ $meetings->participants_no }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Main Objective</strong><br></div>
          <div class="col-sm-4">{{ $meetings->objective }}</div>

        </div>

         <div class="row view-striped">
        <div class="col-sm-2"><strong>Meeting Agenda</strong>
        <br>
          <ol>
          @foreach ($meetings->agenda as $agenda)
          <li>{{$agenda->agenda}}</li>
          @endforeach
          </ol>
        </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Attached Minutes</strong></div>
        <div class="col-sm-4" style="">
          @if ($meetings->minutes)
          <a href="{{ URL::to( 'attachment2/' . $meetings->minutes) }}"
            target="_blank">{{ $meetings->minutes }}</a>
          @else
          Pending
          @endif
        </div>
        
        <div class="col-sm-2"><strong>
      {{ $meetings->user->name }}
        </strong></div>
        <div class="col-sm-4"></div>
      </div>	
	
	</div>
</div>

</div>
</div>
@stop	