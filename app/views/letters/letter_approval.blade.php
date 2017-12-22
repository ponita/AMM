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
        <div class="col-sm-2" style="color:red;"><strong>{{ $appointment->ref_no }}</strong></div>
        
        <div class="col-sm-2"><strong>Dear</strong></div>
        <div class="col-sm-7">{{ $appointment->dear }}</div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-1"><strong>RE</strong></div>
        <div class="col-sm-3">{{ $appointment->ref }}</div>
        
        <div class="col-sm-1"><strong>Body</strong></div>
        <div class="col-sm-3">{{ $appointment->body }}</div>
      </div>

      
      </div>

  
	
	</div>
</div>

</div>
</div>
@stop	