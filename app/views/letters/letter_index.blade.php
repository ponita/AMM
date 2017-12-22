<!--@extends("layout")-->
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Memo</li>
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
		Memo Board  ({{ count($appointment); }})
		
        @if(Auth::user()->can('manage_memo'))
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::route('letters.letter') }}">
				<span class="glyphicon glyphicon-plus-sign"></span>
				New Memo
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
					<!-- <th>Date</th> -->
					<th>RE</th>
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
					
					<td>{{ $appointment->ref_no }}</td>
					<td>{{ $appointment->ref }}</td>
					<td>{{ $appointment->user->name }}</td>
					
           			<td>
					@if ($appointment->approval_status)
           			<a href='#' title='{{ $appointment->approvedby }} at {{ $appointment->approvedon }}'>{{ $appointment->approval_status }}</a>
           			@else Pending
           			@endif
           		</td>
					
					
					<!-- <td>
						 <div class="dropdown">
  							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Action
  							<span class="caret"></span></button>
  							<ul class="dropdown-menu">
                                @if(Auth::user()->can('view_memo'))
    							<li><a href="{{ URL::route('letters.showletter', array($appointment->id)) }}">
    								View Details</a></li>
                                
                                @elseif(Auth::user()->can('edit_memo'))
    							<li><a href="{{ URL::route('letters.editletter', array($appointment->id)) }}">
    								Edit</a></li>
    							
                                @elseif(Auth::user()->can('approve_memo'))
    							<li><a href="{{ URL::route('letters.editapproval', array($appointment->id)) }}">
    								 Approve</a></li>
    								 @endif
    						</ul>
						</div>

					</td> -->

					<td align="center">
                                @if(Auth::user()->can('view_memo'))
						<a class="btn btn-sm btn-success"
                                href="{{ URL::route('letters.showletter', $appointment->id) }}"
                                id="view-details-{{$appointment->id}}-link" 
                                title="{{trans('messages.view-details-title')}}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                               @endif

                                @if(Auth::user()->can('edit_memo'))
                        <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("letters/" . $appointment->id . "/editletter") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Edit</a>
                               
                            @endif
                                @if(Auth::user()->can('approve_memo'))
                   		<a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("letters/" . $appointment->id . "/editapproval") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Approve</a>
                            @endif

                    </td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop