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
	  <li class="active">Activities</li>
	</ol>
</div>

<div class='container-fluid'>
	<ul class="nav navbar-nav navbar-left">
    <li>
      <a href="{{ URL::route('event.Unapproved')}}">
        <span class="ion-planet">
          <font size="3">  Unapproved <span class="badge badge-danger"> {{ $count = UNHLSEvent::where('approval_status_id', '=', '0')->count()}}</span>
          </font>
        </span>
      </a>
    </li>
    <li>
      <a href="{{ URL::route('event.posponed', ['type'=> 'posponed'])}}">
      <span class="ion-chatbubbles">
        <font size="3">  Posponed <span class="badge badge-success"> {{ $count = UNHLSEvent::where('approval_status_id', '=', '1')->where('approval_status', '=', 'posponed')->count()}}</span>
        </font>
      </span>
      </a>
    </li>
    <li>
      <a href="{{ URL::route('event.cancelled', ['type'=> 'cancelled'])}}">
      <span class="ion-chatbubbles">
        <font size="3">  Cancelled <span class="badge badge-success"> {{ $count = UNHLSEvent::where('approval_status_id', '=', '1')->where('approval_status', '=', 'cancelled')->count()}}</span>
        </font>
      </span>
      </a>
    </li>
    <li>
      <a href="{{ URL::route('event.unattached')}}">
      <span class="ion-chatbubbles">
        <font size="3">  Unsubmitted Reports<span class="badge badge-warning"> {{ $count = UNHLSEvent::where('status_id', '=', '0')->count()}}</span>
        </font>
      </span>
      </a>
    </li>
    <li>
      <a href="{{ URL::route('event.pending')}}">
      <span class="ion-chatbubbles">
        <font size="3">Unsubmitted Findings<span class="badge badge-info"> {{ $count = UNHLSEvent::where('action_status_id', '=', '0')->count()}}</span>
        </font>
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
  					<th>Date</th>
  					<th>Activity Name</th>
  					<th>Type</th>
  					<th>Objectives</th>
  					<th>Approval</th>
  					<th>Actions</th>
  				</tr>
  		</thead>
			<tbody>
			@foreach($events as $key => $event)
				<tr  @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					
					<!-- <td>{{ $event->uid }}</td> -->
					<td>{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
					<td>{{ $event->name }}</td>
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
                @if($event->approval_status_id == 0)
                
                            @if(Auth::user()->can('approve_activity'))
                            <a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("event/" . $event->id . "/editapproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif
                @elseif($event->approval_status == 'Approved')
                            @if(Auth::user()->can('view_activities'))
                            <a class="btn btn-sm btn-success"
                                href="{{ URL::route('event.show', $event->id) }}"
                                id="view-details-{{$event->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                            @endif
                            @if(Auth::user()->can('add_report'))

                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("event/" . $event->id . "/addreport") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Attach Report</a>
                             @endif

                            @if(Auth::user()->can('update_findings'))
                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("event/" . $event->id . "/reportings") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Findings</a>
                            @endif
                @elseif($event->approval_status == 'posponed')
                 
                            @if(Auth::user()->can('edit_activity'))
                       
                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("event/" . $event->id . "/edit") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Edit</a>
                            @endif

                            @if(Auth::user()->can('approve_activity'))
                            <a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("event/" . $event->id . "/editPosponedApproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif

                @elseif($event->approval_status == 'cancelled')
             			          @if(Auth::user()->can('view_activities'))
  						                <a class="btn btn-sm btn-success"
                              href="{{ URL::route('event.show', $event->id) }}"
                              id="view-details-{{$event->id}}-link" 
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