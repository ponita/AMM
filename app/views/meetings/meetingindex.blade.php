<!--@extends("layout")-->
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Meetings</li>
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
		<!-- List of Activities  ({{ count($meetings); }}) -->
		Meeting Board  ({{ count($meetings); }})
		
       @if(Auth::user()->can('manage_meeting'))
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('meetings.meeting') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				New Meeting
			</a>
		</div>
@endif
		
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Date</th>			
					<th>Time</th>			
					<th>Name</th>
					<th>Organised by</th>
					<th>Paticipants No</th>
					<th>Venue</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M Y', strtotime($meetings->end_time)) }}</td>
					<td>{{ date('h:m:i', strtotime($meetings->start_time)) }}</td>
					<td>{{ $meetings->name }}</td>
					<td>{{ $meetings->organiser->name }}</td>
					<td align="center">{{ $meetings->participants_no }}</td>
					<td>{{ $meetings->venue}}</td> 
					
           			<td>
					@if ($meetings->approval_status)
           			<a href='#' title='{{ $meetings->approvedby }} at {{ $meetings->approvedon }}'>{{ $meetings->approval_status }}</a>
           			@else Pending
           			@endif
           		</td>
					<!-- <td>
					@if ($meetings->report_filename)
          			<a href="{{ URL::to( 'attachments/' . $meetings->report_filename) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					 -->
<!-- <td>{{ $meetings->type }}</td> -->
					


           			

					<td>
       					@if(Auth::user()->can('view_meeting'))
						<a class="btn btn-sm btn-success"
                                href="{{ URL::route('meetings.show', $meetings->id) }}"
                                id="view-details-{{$meetings->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                            @endif

    					@if(Auth::user()->can('edit_meeting') && ($meetings->status_id == 1))
                       
                        <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $meetings->id . "/m_edit") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Edit</a>
                            @endif

      					@if(Auth::user()->can('approve_meeting') && ($meetings->approval_status_id == 0))
                   		<a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("meetings/" . $meetings->id . "/editapproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif

      					@if(Auth::user()->can('add_minutes') && ($meetings->status_id == 1))

                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $meetings->id . "/addminutes") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Attach Mins</a>
                            @endif

      					@if($meetings->action_status_id == 1)
                         <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $meetings->id . "/actionpoints") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Action points</a>
                            @endif
                    </td>
                    
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}
	</div>
</div>
@stop