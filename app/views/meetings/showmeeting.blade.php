@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
  <li><a href="{{ URL::route('meetings.meetingindex') }}">Meetings</a></li>
  <li class="active">Meeting Details</li>
  </ol>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span>Meeting Details
            
  <div class="panel-btn">
    <a class="btn btn-sm btn-info" href="{{ URL::route('meetings.showmeeting', array($previousmeetings)) }}" >
      <span class="glyphicon glyphicon-backward"></span> Previous
    </a>
        
    <a class="btn btn-sm btn-info" href="{{ URL::route('meetings.showmeeting', array($nextmeetings)) }}" >
      Next <span class="glyphicon glyphicon-forward"></span>
    </a>



     <!-- <a class="btn btn-sm btn-info" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> -->
     <a class="btn btn-sm btn-info" href="{{ URL::route('meetings.print', array($meetings->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-print"></span> PRINT
    </a> 

                
  </div>
  </div>
        
  <div class="panel-body">
  <div class="display-details">

  <div id="printReady">
            
    <div class="panel panel-info">
    <div class="panel-body">
                
      <div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $meetings->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $meetings->name }}</div>
      </div>
    
    <div class="row view-striped">
        <div class="col-sm-2"><strong>Registered by</strong></div>
        <div class="col-sm-4">{{ $meetings->user->name }}</div>
        
        <div class="col-sm-2"><strong>Approval Status</strong></div>
        <div class="col-sm-4">{{ $meetings->approval_status }} 
      @if ($meetings->approval_status) ({{ $meetings->approvedby }} / {{ $meetings->approvedon }})
      @endif
      </div>
      </div>

      <div class="row  view-striped">
    
       <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-3">{{$meetings->start_time }}</div>

       <div class="col-sm-1"><strong>Duration</strong></div>
        <div class="col-sm-3">
            <?php
            $date1 = date_create($meetings->start_time);
            $date2 = date_create($meetings->end_time);

            //difference between two dates
            $diff = date_diff($date1,$date2);

            //count days
            echo ' '.$diff->format("%h hr %i min");
            ?>
          </div>

          <div class="col-sm-1"><strong>Venue</strong></div>
        <div class="col-sm-3">{{ $meetings->venue }}</div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-2"><strong>Organiser</strong></div>
        <div class="col-sm-4">{{ $meetings->organiser->name }}</div>

        <div class="col-sm-2"><strong>Department</strong></div>
        <div class="col-sm-4">{{ $meetings->thematicarea->name}}</div>
        
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
        
      </div>
    
   <div class="row view-striped">
        <div class="col-sm-2"><strong>Comment:</strong><br></div>
          <div class="col-sm-4">{{ $meetings->comment }}</div>

        </div>
 

  </div>
  </div>
  </div>
</div>
@stop