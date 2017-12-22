@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
  <li><a href="{{ URL::route('invitation.invitation_index') }}">Invitation</a></li>
  <li class="active">Invitation Details</li>
  </ol>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span>Appointment Details
            
  <div class="panel-btn">
    <a class="btn btn-sm btn-info" href="{{ URL::route('invitation.showinvitation', array($previousappointment)) }}" >
      <span class="glyphicon glyphicon-backward"></span> Previous
    </a>
        
    <a class="btn btn-sm btn-info" href="{{ URL::route('invitation.showinvitation', array($nextappointment)) }}" >
      Next <span class="glyphicon glyphicon-forward"></span>
    </a>



     <!-- <a class="btn btn-sm btn-info" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> -->
     <a class="btn btn-sm btn-info" href="{{ URL::route('invitation.print', array($appointment->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
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
        <div class="col-sm-2" style="color:green;"><strong>{{ $appointment->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Date</strong></div>
        <div class="col-sm-7">{{ $appointment->date }}</div>
      </div>
	  
	  <div class="row view-striped">
        <div class="col-sm-2"><strong>Registered by</strong></div>
        <div class="col-sm-4">{{ $appointment->user->name }}</div>
        
        <div class="col-sm-2"><strong>Approval Status</strong></div>
        <div class="col-sm-4">{{ $appointment->approval_status }} 
			@if ($appointment->approval_status) ({{ $appointment->approvedby }} / {{ $appointment->approvedon }})
			@endif
      </div>
      </div>
		
       <div class="col-sm-2"><strong>Date</strong></div>
        <div class="col-sm-4">{{$appointment->date }} 
          </div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-2"><strong>RE</strong></div>
        <div class="col-sm-4">{{ $appointment->reference }}</div>
        
        </div>

       

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Objective</strong></div>
        <div class="col-sm-4" style="">{{ $appointment->objective }}</div>
     
      
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Body</strong><br></div>
          <div class="col-sm-4" style="">{{ $appointment->body }}</div>
        
    </div>

        <div class="row view-striped">
        <div class="col-sm-2"><strong>Output</strong><br></div>
         <div class="col-sm-4" style="">{{ $appointment->output }}</div>

      
      </div>

      <div class="row  view-striped">
        <div class="col-sm-2"><strong>Venue</strong></div>
        <div class="col-sm-4">{{ $appointment->venue }}</div>
        
        </div>

        <div class="row  view-striped">
        <div class="col-sm-2"><strong>Scheduled period</strong></div>
        <div class="col-sm-4">{{ $appointment->start_date }} 
          to {{ $appointment->end_date }}</div>
      </div>
        
        <div class="row view-striped">
        <div class="col-sm-2"><strong>Name</strong></div>
        <div class="col-sm-4" style="">{{ $appointment->name }}</div>
        
      </div>
        <div class="row view-striped">
        <div class="col-sm-2"><strong>Title</strong></div>
        <div class="col-sm-4" style="">{{ $appointment->title }}</div>
        
      </div>
    <div class="row view-striped">
        <div class="col-sm-2"><strong>Attachment</strong></div>
        <div class="col-sm-4" style="">
          @if ($appointment->attachment)
          <a href="{{ URL::to( 'attachment1/' . $appointment->attachment) }}"
            target="_blank">{{ $appointment->attachment }}</a>
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
  </div>
</div>
@stop