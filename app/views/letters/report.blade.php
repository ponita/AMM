<!--@extends("layout")-->
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Report</li>
	</ol>
</div>
<!--
<div class='container-fluid'>

</div>-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105243767-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105243767-2');
</script>


@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		Out going Letters  ({{ count($appointment); }})
		

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
					
				

					<td align="center">
						<a class="btn btn-sm btn-success"
                                href="{{ URL::route('letters.print', $appointment->id) }}"
                                id="view-details-{{$appointment->id}}-link" 
                                title="{{trans('messages.view-details-title')}}" target="_blank">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                View
                            </a>
                              
                    </td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop