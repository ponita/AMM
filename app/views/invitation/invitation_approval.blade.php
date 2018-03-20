@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('Invitation.invitation_index') }}">Invitation</a></li>
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
			
{{ Form::model($appointment, array('files'=>true,'route' => array('appointment.updateapproval', $appointment->id), 'method' => 'PUT',
				'id' => 'form-edit-invitation')) }}
<div class="form-group">
			{{ Form::hidden('approvedby', Auth::user()->name) }}
			{{ Form::label('approvalstatus', 'Approval Status', array('class' => 'col-sm-2')) }}
			{{ Form::select('approvalstatus', [
					'Not Updated' => 'Not Updated',
					'Approved' => 'Approved',
					'Not Approved' => 'Not Approved'], 
					Input::old('approvalstatus'), array('id' => 'approvalstatus', 'class' => 'form-control col-sm-4')) }}

			{{ Form::label('', '', array('class' => 'col-sm-4')) }}
			{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
			['class' => 'btn btn-primary col-sm-1', 'onclick' => 'submit()']) }}
</div>
{{ Form::close() }}

<div class="panel panel-info">
	<div class="panel-heading"><strong>Invitation Information</strong></div>
	<div class="panel-body">				
		
		<div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $appointment->serial_no }}</strong></div>
        
        <div class="col-sm-2"><strong>Date</strong></div>
        <div class="col-sm-7">{{ $appointment->date }}</div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-1"><strong>RE</strong></div>
        <div class="col-sm-3">{{ $appointment->reference }}</div>
        
        <div class="col-sm-1"><strong>Objective</strong></div>
        <div class="col-sm-3">{{ $appointment->objective }}</div>

        <div class="col-sm-1"><strong>scheduled period</strong></div>
        <div class="col-sm-3">{{ date('d M Y', strtotime($appointment->start_date)) }} 
          to {{ date('d M Y', strtotime($appointment->end_date)) }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Body</strong></div>
        <div class="col-sm-4" style="">{{ $appointment->body }}</div>
        
        <div class="col-sm-2"><strong>Output</strong></div>
        <div class="col-sm-4">{{ $appointment->output }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Venue</strong></div>
        <div class="col-sm-4" style="">{{ $appointment->venue }}</div>
        
        

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Invitation Attachment</strong></div>
        <div class="col-sm-4" style="">
          @if ($appointment->report_filename)
          <a href="{{ URL::to( 'attachments/' . $appointment->report_filename) }}"
            target="_blank">{{ $appointment->report_filename }}</a>
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