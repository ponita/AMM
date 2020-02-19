@extends("layout")
@section("content")

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105243767-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105243767-2');
</script>

<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Meetings</li>
	</ol>
</div>

<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<div class='container-fluid'>
	<ul class="nav navbar-nav navbar-left">

    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <span class="ion-chatbubbles"></span>
    <font size="3">  Unapproved <span class="badge badge-danger"> {{ $count = Meeting::where('approval_status_id', '=', '0')->count()}}</span></font>
 <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ URL::route('meeting.internal', ['type'=> 'Internal'])}}"><font size="3">
              Internal <span class="badge"> {{ $count = Meeting::where('approval_status_id', '=', '0')->where('category', '=', 'Internal')->count()}} </span></font></a></li>
              <li class="divider"></li>
            <li><a href="{{ URL::route('meeting.external', ['type'=> 'External'])}}"><font size="3">
              External <span class="badge"> {{ $count = Meeting::where('approval_status_id', '=', '0')->where('category', '=', 'External')->count()}} </span></font></a></li>
              <li class="divider"></li>
              </ul>
    </li>

    <li><a href="{{ URL::route('meeting.posponed', ['type' => 'postponed'])}}">
      <span class="ion-chatbubbles">
    <font size="3">  Posponed <span class="badge badge-info"> {{ $count = Meeting::where('approval_status_id', '=', '1')->where('approval_status', '=', 'postponed')->count()}}</span></font>
 </span>
        </a>
 
    <li><a href="{{ URL::route('meeting.posponed', ['type' => 'cancelled'])}}">
      <span class="ion-chatbubbles">
    <font size="3">  Cancelled <span class="badge badge-success"> {{ $count = Meeting::where('approval_status_id', '=', '2')->where('approval_status', '=', 'cancelled')->count()}}</font></span>
 </span>
        </a>
    </li>
    <li><a href="{{ URL::route('meeting.unattached', ['status' => '1'])}}">
      <span class="ion-chatbubbles">
    <font size="3">  Unsubmitted Minutes<span class="badge badge-warning"> {{ $count = Meeting::where('status_id', '=', '1')->count()}}</font></span>
 </span>
        </a>
    </li>
    <li><a href="{{ URL::route('meeting.pending', ['action' => '1'])}}">
      <span class="ion-chatbubbles">
    <font size="3">No action-points <span class="badge badge-info"> {{ $count = Meeting::where('action_status_id', '=', '1')->count()}}</font></span>
 </span>
        </a>
    </li>
</ul>

</div>


@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		<!-- List of Activities  ({{ count($meetings); }}) -->
		Meeting Board 
		
       @if(Auth::user()->can('manage_meeting'))
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('meetings.meeting') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				New Schedule
			</a>
		</div>

@endif
		
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed">
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
			  @foreach($meetingsss as $key => $values)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $values->id)?"class='info'":""}}
				      @endif
				>
					
					<td>{{ date('d', strtotime($values->start_time)) }}-{{ date('d M Y', strtotime($values->end_time)) }}</td>
					<td>{{ date('h:m:i', strtotime($values->start_time)) }}</td>
					<td>{{ $values->name }}</td>
					<td>@if ($values->organiser_id)
            {{ $values->organiser->name }}
          @endif</td> 
					<td align="center">{{ $values->participants_no }}</td>
					<td>{{ $values->venue}}</td> 
					
          <td>
					      @if ($values->approval_status)
           			<a href='#' title='{{ $values->approvedby }} at {{ $values->approvedon }}'>{{ $values->approval_status }}</a>
           			@else Pending
           			@endif
          </td>
					

					<td>
                    <a class="btn btn-sm btn-success"
                    href="{{ URL::route('meetings.show', $values->id) }}"
                    id="view-details-{{$values->id}}-link" 
                    title="{{trans('messages.view-details-title')}}">
                    <span class="glyphicon glyphicon-eye-open"></span>
                    View
                    </a>


                        @if ($values->approval_status_id == 0)

      					            @if(Auth::user()->can('approve_meeting') && ($values->approval_status_id == 0))
                   		      <a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("meetings/" . $values->id . "/editapproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif

                        @elseif ($values->approval_status == 'Approved')
                            @if(Auth::user()->can('view_meeting'))
                            <a class="btn btn-sm btn-success"
                            href="{{ URL::route('meetings.show', $values->id) }}"
                            id="view-details-{{$values->id}}-link" 
                            title="{{trans('messages.view-details-title')}}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            View
                            </a>
                            @endif

                            @if(Auth::user()->can('add_minutes') && ($values->status_id == 1))
                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $values->id . "/addminutes") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Attach Mins</a>
                            @endif

                            @if(Auth::user()->can('add_meeting_ap') && ($values->action_status_id == 1))
                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $values->id . "/actionpoints") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Action points</a>
                            @endif
                        @elseif ($values->approval_status == 'postponed')
                            @if(Auth::user()->can('approve_meeting') && ($values->approval_status_id == 1))
                            <a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("meetings/" . $values->id . "/editposponed") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif
                        @else
                            @if(Auth::user()->can('view_meeting'))
                            <a class="btn btn-sm btn-success"
                            href="{{ URL::route('meetings.show', $values->id) }}"
                            id="view-details-{{$values->id}}-link" 
                            title="{{trans('messages.view-details-title')}}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            View
                            </a>
                            @endif
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

<div class="container-fluid" onclick="myFunction()">
	<h3><strong>Everything</strong></h3>
</div>

<div class="panel panel-primary" id="myDIV">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		<!-- List of Activities  ({{ count($meetings); }}) -->
		{{ count($meetings); }}
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<!-- <th>SN</th>			 -->
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
			@foreach($meetings as $key => $value)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $value->id)?"class='info'":""}}
					@endif
				>
					
					<!-- <td>{{ $value->serial_no }}</td> -->
					<td>{{ date('d', strtotime($value->start_time)) }}-{{ date('d M Y', strtotime($value->end_time)) }}</td>
					<td>{{ date('h:m:i', strtotime($value->start_time)) }}</td>
					<td>{{ $value->name }}</td>
					<td>@if ($value->organiser_id)
            {{ $value->organiser->name }}
          @endif</td>
					<td align="center">{{ $value->participants_no }}</td>
					<td>{{ $value->venue}}</td> 
					
           			<td>
					@if ($value->approval_status)
           			<a href='#' title='{{ $value->approvedby }} at {{ $value->approvedon }}'>{{ $value->approval_status }}</a>
           			@else Pending
           			@endif
           		</td>
					<!-- <td>
					@if ($value->report_filename)
          			<a href="{{ URL::to( 'attachments/' . $value->report_filename) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					 -->
<!-- <td>{{ $value->type }}</td> -->
					


           			

					<td>
            @if ($value->approval_status_id == 0)

                @if(Auth::user()->can('approve_meeting') && ($value->approval_status_id == 0))
                      <a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("meetings/" . $value->id . "/editapproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif

                @elseif ($value->approval_status == 'Approved')
                @if(Auth::user()->can('view_meeting'))
                            <a class="btn btn-sm btn-success"
                                href="{{ URL::route('meetings.show', $value->id) }}"
                                id="view-details-{{$value->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                            @endif

                @if(Auth::user()->can('add_minutes') && ($value->status_id == 1))

                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $value->id . "/addminutes") }}" >
                             <span class="glyphicon glyphicon-edit"></span>
                            Attach Mins</a>
                            @endif

                @if(Auth::user()->can('add_meeting_ap') && ($value->action_status_id == 1))
                         <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("meetings/" . $value->id . "/actionpoints") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Action points</a>
                            @endif
                @elseif ($value->approval_status == 'postponed')
                         @if(Auth::user()->can('approve_meeting') && ($value->approval_status_id == 1))
                      <a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("meetings/" . $value->id . "/editposponed") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif
                @else
                          @if(Auth::user()->can('view_meeting'))
                            <a class="btn btn-sm btn-success"
                                href="{{ URL::route('meetings.show', $value->id) }}"
                                id="view-details-{{$value->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                          @endif
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