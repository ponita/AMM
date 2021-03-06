 <!--@extends("layout")-->
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
	  <li class="active">appointments</li>
	</ol>
</div>


<div class='container-fluid'>
<ul class="nav navbar-nav navbar-left">

    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <span class="ion-chatbubbles">
    <font size="3">  Unapproved <span class="badge badge-danger"> {{ $count = Invitation::where('approval_status_id', '=', '0')->count()}}</font></span>
 </span>
        </a>
    </li>

    <li><a href="#">
      <span class="ion-chatbubbles">
    <font size="3">  Unsubmitted Reports<span class="badge badge-warning"> {{ $count = Invitation::where('approval_status_id', '=', '1')->count()}}</font></span>
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
		appointment Board  ({{ count($appointment); }})
		
    @if(Auth::user()->can('manage_invitation'))
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('invitation.invitation') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				New Invitation
			</a>
		</div>
@endif
		<!-- <div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('event.eventfilter') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				Search / Filter
			</a>
		</div> -->
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Ref_no</th>
					<th>Date</th>
					<th>RE</th>
					<th>Venue</th>
					<th>Registered by</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($appointment as $key => $appointment)
				<tr  @if(Session::has('activeappointment'))
						{{(Session::get('activeappointment') == $appointment->id)?"class='info'":""}}
					@endif
				>
                                @if(Auth::user()->can('view_invitation'))
					
					<td>{{ $appointment->ref_no }}</td>
					<td>{{$appointment->date }}</td>
					<td>{{ $appointment->reference }}</td>
					<td align="center">{{ $appointment->venue }}</td>
					
					<td>{{ $appointment->user->name }}</td>
				
					<!-- <td>
					@if ($appointment->attachment)
          			<a href="{{ URL::to( 'attachment1/' . $appointment->attachment) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td> -->
					<td>
					@if ($appointment->approval_status)
           			<a href='#' title='{{ $appointment->approvedby }} at {{ $appointment->approvedon }}'>{{ $appointment->approval_status }}</a>
           			@else Pending
           			@endif
           		</td>
					
           		
           			<!-- <td>
						 <div class="dropdown">
                                @if(Auth::user()->can('view_invitation'))
  							<button class="btn btn-primary" type="button"><a href="{{ URL::route('invitation.showinvitation', array($appointment->id)) }}">
    								<b style="color:white">View</b></a>
  							<span style="color:white;font-weight:bold"></span></button>
  							@endif

                                @if(Auth::user()->can('approve_invitation'))
  							<button class="btn btn-primary" type="button"><a href="{{ URL::route('invitation.editapproval', array($appointment->id)) }}">
    								<b style="color:red">Approve</b></a>
  							<span style="color:white;font-weight:bold"></span></button>
  							@endif
  							<ul class="dropdown-menu">
    							<li><a href="{{ URL::route('invitation.showinvitation', array($appointment->id)) }}">
    								View</a></li>
    						
    							
    						</ul>
						</div>

					</td> -->

					<td>
						<a class="btn btn-sm btn-success"
                                href="{{ URL::route('invitation.showinvitation', $appointment->id) }}"
                                id="view-details-{{$appointment->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                            @endif
    				
                                @if(Auth::user()->can('approve_invitation') && ($appointment->approval_status_id == 0))
                   		<a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("invitation/" . $appointment->id . "/editapproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @elseif (($appointment->approval_status_id == 1))
                            <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("invitation/" . $appointment->id . "/attachment") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Attach Report</a>
                            @endif

                    </td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop