@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('invitation.invitation_index') }}">Invitation</a></li>
		  <li class="active">Invitation Approval</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Invitation Approval Status
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here --> 
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
{{ Form::model($appointment, array('files'=>true,'route' => array('invitation.updateapproval', $appointment->id), 'method' => 'PUT',
				'id' => 'form-edit-appointment')) }}
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
        <div class="col-sm-2" style="color:red;"><strong>{{ $appointment->serial_no }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $appointment->name }}</div>
    </div>
      
    <div class="row view-striped">
       <div class="col-sm-1"><strong>Date</strong></div>
        <div class="col-sm-3">{{ $appointment->date }}</div>
     
        <div class="col-sm-1"><strong>Registered by</strong></div>
        <div class="col-sm-3">{{ $appointment->user->name }}</div>
        
        <div class="col-sm-1"><strong>Approval Status</strong></div>
        <div class="col-sm-3">{{ $appointment->approval_status }} 
      @if ($appointment->approval_status) ({{ $appointment->approvedby }} / {{ $appointment->approvedon }})
      @endif
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

@stop	