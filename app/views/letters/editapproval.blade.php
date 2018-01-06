@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('letters.letter_index') }}">Memo</a></li>
		  <li class="active">Memo Approval</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Memo Approval Status
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif 
			
{{ Form::model($appointment, array('files'=>true,'route' => array('letters.updateapproval', $appointment->id), 'method' => 'PUT',
				'id' => 'form-edit-appointment')) }}
<div class="form-group">
      {{ Form::hidden('approvedby', Auth::user()->name) }}
      {{ Form::label('approvalstatus', 'Approval Status', array('class' => 'col-sm-2')) }}
      {{ Form::select('approvalstatus', [
          'Not Updated' => 'Not Updated',
          'Approved' => 'Approved',
          'Cancelled' => 'Cancelled'], 
          Input::old('approvalstatus'), array('id' => 'approvalstatus', 'class' => 'form-control col-sm-4')) }}

     
</div>
<div class="form-group">
			 {{ Form::label('comment', 'Comment/Reason', array('class' => 'col-sm-2')) }}
      {{ Form::textarea('comment', Input::old('comment'), array('size' => '10x3','class' => 'form-control col-sm-10')) }}

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
      
      <div class="col-sm-2"><strong>Date</strong></div>
        <div class="col-sm-4">{{$appointment->date }} </div>
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

        <div class="row view-striped">
        <div class="col-sm-2"><strong>RE</strong></div>
        <div class="col-sm-7">{{ $appointment->ref }}</div>
      </div>
    
    
    <div class="row view-striped">
       <div class="col-sm-2"><strong>Receiver</strong></div>
        <div class="col-sm-4">{{$appointment->receiver }} </div>


      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-2"><strong>Body</strong></div>
        <div class="col-sm-4">{{ $appointment->body }}</div>
        
        </div>

       

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Yours</strong></div>
        <div class="col-sm-4" style="">{{ $appointment->name }}</div>
        
      </div>
        
        <div class="row view-striped">
        <div class="col-sm-4" style="">{{ $appointment->title }}</div>
        
      </div>
        
        <div class="col-sm-2"><strong></strong></div>
        <div class="col-sm-4"></div>
      </div>	
	
	</div>
</div>

</div>
</div>
@stop	