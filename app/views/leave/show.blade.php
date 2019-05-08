@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
  <li><a href="{{ URL::route('leave.index') }}">Leave</a></li>
  <li class="active">Leave Details</li>
  </ol>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span>Leave Details
  
            
  <div class="panel-btn">
    <a class="btn btn-sm btn-info" href="{{ URL::route('leave.show', array($previousleave)) }}" >
      <span class="glyphicon glyphicon-backward"></span> Previous
    </a>
        
    <a class="btn btn-sm btn-info" href="{{ URL::route('leave.show', array($nextleave)) }}" >
      Next <span class="glyphicon glyphicon-forward"></span>
    </a>
    
    <a class="btn btn-sm btn-info" href="{{ URL::route('leave.print', array($leave->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
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
        <div class="col-sm-2" style="color:red;">{{ $leave->id }}</div>
        
        <div class="col-sm-2"><strong>Leave type</strong></div>
        <div class="col-sm-7">{{ $leave->leave_type }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Name</strong></div>
        <div class="col-sm-2">{{ $leave->name }}</div>
        
        <div class="col-sm-2"><strong>Email/Contact</strong></div>
        <div class="col-sm-7">{{ $leave->emp_contact }}/{{ $leave->email }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Section</strong></div>
        <div class="col-sm-2">{{ $leave->department }}</div>

        <div class="col-sm-1"><strong>Position</strong></div>
        <div class="col-sm-2">{{ $leave->position }}</div>
        
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Duration</strong></div>
        <div class="col-sm-2">{{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}</div>
        
        <div class="col-sm-2"><strong>Destination</strong></div>
        <div class="col-sm-7">{{ $leave->destination }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Next of Keen</strong></div>
        <div class="col-sm-2">{{ $leave->nok_name }}</div>
        
        <div class="col-sm-2"><strong>NOK Contact</strong></div>
        <div class="col-sm-7">{{ $leave->nok_contact }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Reason for leave</strong></div>
        <div class="col-sm-7 col-sm-offset-1">{{ $leave->comment }}</div>
        
      </div>
    </div>
  </div>

          @if($leave->s_approval_status == 'Rejected')

      <div class="panel panel" style="border-width: thick; border-color: red">
        <div class="panel-heading">Supervisor</div>
    <div class="panel-body">
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Confirmation</strong></div>
        <div class="col-sm-2">{{ $leave->s_approval_status }}</div>
        
        <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-2">{{ $leave->approvedon }}</div>

        <div class="col-sm-2"><strong>By</strong></div>
        <div class="col-sm-3">{{ $leave->approvedbys }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Comment</strong></div>
        <div class="col-sm-7">{{ $leave->s_comment }}</div>
        
      </div>
    </div>
  </div>
          @elseif($leave->s_approval_status == 'Approved')
      <div class="panel panel" style="border-width: thick; border-color: green">
        <div class="panel-heading">Supervisor</div>
      <div class="panel-body">
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Confirmation</strong></div>
        <div class="col-sm-2">{{ $leave->s_approval_status }}</div>
        
        <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-2">{{ $leave->approvedon }}</div>

        <div class="col-sm-2"><strong>By</strong></div>
        <div class="col-sm-3">{{ $leave->approvedbys }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Comment</strong></div>
        <div class="col-sm-7">{{ $leave->s_comment }}</div>
        
      </div>
    </div>
  </div>
  @endif



      @if($leave->m_approval_status == 'Rejected')

      <div class="panel panel" style="border-width: thick; border-color: red">
        <div class="panel-heading">Manager</div>
    <div class="panel-body">
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Confirmation</strong></div>
        <div class="col-sm-2">{{ $leave->m_approval_status }}</div>
        
        <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-2">{{ $leave->m_approvedon }}</div>

        <div class="col-sm-2"><strong>By</strong></div>
        <div class="col-sm-3">{{ $leave->approvedbym }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Comment</strong></div>
        <div class="col-sm-7">{{ $leave->m_comment }}</div>
      </div>
      
    </div>
  </div>
          @elseif($leave->m_approval_status == 'Approved')
      <div class="panel panel" style="border-width: thick; border-color: green">
        <div class="panel-heading">Manager</div>
      <div class="panel-body">
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Confirmation</strong></div>
        <div class="col-sm-2">{{ $leave->m_approval_status }}</div>
        
        <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-2">{{ $leave->m_approvedon }}</div>

        <div class="col-sm-2"><strong>By</strong></div>
        <div class="col-sm-3">{{ $leave->approvedbym }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Comment</strong></div>
        <div class="col-sm-7">{{ $leave->m_comment }}</div>
        
      </div>
      
    </div>
  </div>
  @endif

    @if($leave->h_approval_status == 'Rejected')

      <div class="panel panel" style="border-width: thick; border-color: red">
        <div class="panel-heading">Executive Director</div>
    <div class="panel-body">
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Confirmation</strong></div>
        <div class="col-sm-2">{{ $leave->h_approval_status }}</div>
        
        <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-2">{{ $leave->h_approvedon }}</div>

        <div class="col-sm-2"><strong>By</strong></div>
        <div class="col-sm-3">{{ $leave->approvedbyh }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Comment</strong></div>
        <div class="col-sm-7">{{ $leave->h_comment }}</div>
      </div>
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Reply</strong></div>
        <div class="col-sm-7">{{ $leave->section }}</div>
      </div>
    </div>
  </div>
          @elseif($leave->h_approval_status == 'Approved')
      <div class="panel panel" style="border-width: thick; border-color: green">
        <div class="panel-heading">Executive Director</div>
      <div class="panel-body">
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Confirmation</strong></div>
        <div class="col-sm-2">{{ $leave->h_approval_status }}</div>

        <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-2">{{ $leave->h_approvedon }}</div>
        
        <div class="col-sm-2"><strong>By</strong></div>
        <div class="col-sm-3">{{ $leave->approvedbyh }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-1"><strong>Comment</strong></div>
        <div class="col-sm-7">{{ $leave->h_comment }}</div>
        
      </div>
      <div class="row view-striped">
        <div class="col-sm-1"><strong>Reply</strong></div>
        <div class="col-sm-7">{{ $leave->section }}</div>
        
      </div>
    </div>
  </div>
  @endif


  </div>
  </div>
  </div>
</div>
@stop