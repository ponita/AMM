@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('event.index') }}">Activities</a></li>
		  <li class="active">Activity Approval</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Updating Activity Approval Status
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($event, array('files'=>true,'route' => array('event.updateapproval', $event->id), 'method' => 'PUT',
				'id' => 'form-edit-event')) }}
<div class="form-group">
      {{ Form::hidden('approvedby', Auth::user()->name) }}
      {{ Form::label('approvalstatus', 'Approval Status', array('class' => 'col-sm-2')) }}
      {{ Form::select('approvalstatus', [
          'Not Updated' => 'Not Updated',
          'Approved' => 'Approved',
          'Not Approved' => 'Not Approved'], 
          Input::old('approvalstatus'), array('id' => 'approvalstatus', 'class' => 'form-control col-sm-4')) }}

     
</div>
<div class="form-group">
			 {{ Form::label('comment', 'Comment/Reason', array('class' => 'col-sm-2')) }}
      {{ Form::textarea('comment', Input::old('comment'), array('size' => '10x1','class' => 'form-control col-sm-10')) }}

			{{ Form::label('', '', array('class' => 'col-sm-4')) }}
			{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
			['class' => 'btn btn-primary col-sm-1', 'onclick' => 'submit()']) }}
</div>
{{ Form::close() }}

<div class="panel panel-info">
	<div class="panel-heading"><strong>Activity Information</strong></div>
	<div class="panel-body">				
		
		<div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $event->serial_no }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $event->name }}</div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-1"><strong>Department</strong></div>
        <div class="col-sm-3">{{ $event->department }}</div>
        
        <div class="col-sm-1"><strong>Type</strong></div>
        <div class="col-sm-3">{{ $event->type }}</div>

        <div class="col-sm-1"><strong>Duration</strong></div>
        <div class="col-sm-3">{{ date('d M Y', strtotime($event->start_date)) }} 
          to {{ date('d M Y', strtotime($event->end_date)) }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Location</strong></div>
        <div class="col-sm-4" style="">{{ $event->location }}</div>
        
        <div class="col-sm-2"><strong>Venue</strong></div>
        <div class="col-sm-4">{{ $event->premise }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Health Region</strong></div>
        <div class="col-sm-4" style="">{{ $event->region }}</div>
        
        <div class="col-sm-2"><strong>District</strong></div>
        <div class="col-sm-4">
          @if ($event->district)
          {{ $event->district->name }}
          @endif
        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Funding Source</strong></div>
        <div class="col-sm-4" style="">{{ $event->sponsor }}</div>
        
        <div class="col-sm-2"><strong>Organiser</strong></div>
        <div class="col-sm-4">{{ $event->organiser }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Target Audience</strong><br>
          <ul>
          @foreach ($event->audience as $audience)
          <li>{{$audience->audience}}</li>
          @endforeach
          </ul></div>
        
        <div class="col-sm-2"><strong>Participants</strong></div>
        <div class="col-sm-4">{{ $event->participants_no }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-6"><strong>Objectives</strong><br>
          <ul>
          @foreach ($event->objective as $objective)
          <li>{{$objective->objective}}</li>
          @endforeach
          </ul>

        </div>

        <div class="col-sm-6"><strong>Lessons Learned</strong><br>
          <ul>
          @foreach ($event->lesson as $lesson)
          <li>{{$lesson->lesson}}</li>
          @endforeach
          </ul>

        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-6"><strong>Recommendations</strong><br>
          <ul>
          @foreach ($event->recommendation as $recommendation)
          <li>{{$recommendation->recommendation}}</li>
          @endforeach
          </ul>

        </div>

        <div class="col-sm-6"><strong>Action Points</strong><br>
          <ul>
          @foreach ($event->action as $action)
          <li>{{$action->action}}</li>
          @endforeach
          </ul>

        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Activity Report</strong></div>
        <div class="col-sm-4" style="">
          @if ($event->report_filename)
          <a href="{{ URL::to( 'attachments/' . $event->report_filename) }}"
            target="_blank">{{ $event->report_filename }}</a>
          @else
          Pending
          @endif
        </div>
        
        <div class="col-sm-2"><strong></strong></div>
        <div class="col-sm-4"></div>
      </div>	
	
	</div>
</div>

</div>
</div>
@stop	