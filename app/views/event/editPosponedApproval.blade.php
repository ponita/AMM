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
			
{{ Form::model($event, array('files'=>true,'route' => array('event.UpdatePosponedApproval', $event->id), 'method' => 'PUT',
				'id' => 'form-edit-event')) }}
<div class="form-group">
      {{ Form::hidden('approvedby', Auth::user()->name) }}
      {{ Form::label('approvalstatus', 'Approval Status', array('class' => 'col-sm-2')) }}
      {{ Form::select('approvalstatus', [
          'Approved' => 'Approved',
          'posponed' => 'posponed',
          'Cancelled' => 'Cancelled'], 
          Input::old('approvalstatus'), array('id' => 'approvalstatus', 'class' => 'form-control col-sm-4')) }}

     
</div>
<div class="form-group">
      {{ Form::label('start_date', 'Start Date', array('class' => 'col-sm-2 required')) }}
      {{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control datepicker col-sm-4')) }}
</div>
<div class="form-group">
      {{ Form::label('end_date', 'End Date', array('class' => 'col-sm-2')) }}
      {{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control datepicker col-sm-4')) }}
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
        <div class="col-sm-2" style="color:red;"><strong>{{ $event->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $event->name }}</div>
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-1"><strong>Department</strong></div>
        <div class="col-sm-3">
          {{ $event->department }}
       
          </div>
        
        <div class="col-sm-1"><strong>Type</strong></div>
        <div class="col-sm-3">{{ $event->type }}</div>

        <div class="col-sm-1"><strong>Duration</strong></div>
        <div class="col-sm-3">{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}
        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Location</strong></div>
        <div class="col-sm-4" style="">{{ $event->location }}</div>
        
        <div class="col-sm-2"><strong>Venue</strong></div>
        <div class="col-sm-4">{{ $event->premise }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Health Region</strong></div>
        <div class="col-sm-4" style="">
          @if ($event->healthregion_id)
          {{ $event->healthregion->name }}
        @endif</div>
        
        <div class="col-sm-2"><strong>District</strong></div>
        <div class="col-sm-4">
          @if ($event->district)
          {{ $event->district->name }}
          @endif
        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Funding Source</strong></div>
        <div class="col-sm-4" style=""> @if ($event->funders_id)
        {{ $event->funder->name }}
      @endif</div>
        
        <div class="col-sm-2"><strong>Organiser</strong></div>
        <div class="col-sm-4"> @if ($event->organiser_id)
        {{ $event->organiser->name }}
      @endif</div>
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
	
	
	</div>
</div>

</div>
</div>
@stop	