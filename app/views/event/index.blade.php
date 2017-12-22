<!--@extends("layout")-->
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Activities</li>
	</ol>
</div>
<!--
<div class='container-fluid'>

</div>-->


@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		<!-- List of Activities  ({{ count($events); }}) -->
		Activity Board  ({{ count($events); }})
		
      @if(Auth::user()->can('manage_activities'))
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('event.create') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				New Activity
			</a>
		</div>
		@endif

		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('event.eventfilter') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				Search / Filter
			</a>
		</div>
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Actions</th>
					<th>SN</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Activity Name</th>
					<th>Department</th>
					<!-- <th>Registered by</th> -->
					<th>Type</th>
					<th>Objectives</th>
					<th>Approval Status</th>
					<th>Participants List</th>
				</tr>
			</thead>
			<tbody>
			@foreach($events as $key => $event)
				<tr  @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					<td>
						 <div class="dropdown">
  							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Action
  							<span class="caret"></span></button>
  							<ul class="dropdown-menu">
                                @if(Auth::user()->can('view_activities'))
    							<li><a href="{{ URL::route('event.show', array($event->id)) }}">
    								View Details</a></li>
                                @endif
                                @if(Auth::user()->can('edit_activity'))
    							<li><a href="{{ URL::route('event.edit', array($event->id)) }}">
    								Update Details</a></li>
                               @endif
                                @if(Auth::user()->can('approve_activity'))
    							<li><a href="{{ URL::route('event.editapproval', array($event->id)) }}">
    								Update Approval</a></li>
                                @endif
                                @if(Auth::user()->can('update_objective'))
    							<li><a href="{{ URL::route('event.editobjectives', array($event->id)) }}">
    								Update Objectives</a></li>
                                @endif
                                @if(Auth::user()->can('update_lessons'))
    							<li><a href="{{ URL::route('event.editlessons', array($event->id)) }}">
    								Update Lessons</a></li>
                                @endif
                                @if(Auth::user()->can('update_recommendations'))
    							<li><a href="{{ URL::route('event.editrecommendations', array($event->id)) }}">
    								Update Recommendations</a></li>
                                @endif
                                @if(Auth::user()->can('update_actions'))
    							<li><a href="{{ URL::route('event.editactions', array($event->id)) }}">
    								Update Actions</a></li>
                                @endif
                                @if(Auth::user()->can('add_report'))
    							<li><a href="{{ URL::route('event.addreport', array($event->id)) }}">
    								Add Report</a></li>
    								@endif
    						</ul>
						</div>

					</td>
					<td>{{ $event->serial_no }}</td>
					<td>{{ date('d M Y', strtotime($event->start_date)) }}</td>
					<td>{{ date('d M Y', strtotime($event->end_date)) }}</td>
					<td>{{ $event->name }}</td>
					<td>{{ $event->department }}</td>
					<!-- <td>{{ $event->user->name }}</td> -->
					<td>{{ $event->type }}</td>
					<td title ="@foreach ($event->objective as $objective)
              		{{$objective->objective}}
           			@endforeach"> <a href='#'>Point here</a> </td>
           			<td>
					@if ($event->approval_status)
           			<a href='#' title='{{ $event->approvedby }} at {{ $event->approvedon }}'>{{ $event->approval_status }}</a>
           			@else Pending
           			@endif
           		</td>
					<td>
					@if ($event->report_filename)
          			<a href="{{ URL::to( 'attachments/' . $event->report_filename) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop