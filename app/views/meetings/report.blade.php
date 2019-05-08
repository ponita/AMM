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
	  <li class="active"><a href="{{ URL::route('meetings.report') }}">Report</a></li>
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
		LIST OF EVENTS
		 <!-- ({{ count($meetings); }}) -->
		

		
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<!-- <th>ID</th> -->
					<th>Start Date</th>
					<th>Duration</th>
					<th>Name</th>
					<th>Report</th>
					<th>List</th>
					<th>View</th>

				</tr> 
			</thead>
			<tbody>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{$meetings->start_time }}</td>
					<td>
						<?php
						$date1 = date_create($meetings->start_time);
						$date2 = date_create($meetings->end_time);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%h:%i").""."hours";
						?>
					</td>
					<td>{{ $meetings->name }}</td>
					<td>
					@if ($meetings->minutes) 

						@if (trim($meetings->department) == 'Executive Director' && Auth::user()->can('view_report_download'))
	          			<a href="{{ URL::to( 'attachment2/' . $meetings->minutes) }}"
	            			target="_blank">Download</a>
	            		@else 

	            		@endif

	            		@if (trim($meetings->department) == 'Executive Director') 
	            		<a href="{{ URL::to( 'attachment2/' . $meetings->minutes) }}"
	            			target="_blank">Download</a>	
	            		@endif
	            		
          			@else Pending
          			@endif	
					</td>
					<td>
					@if ($meetings->plist)
          			<a href="{{ URL::to( 'attachment2/' . $meetings->plist) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					<td><a class="btn btn-sm btn-info" href="{{ URL::route('meetings.print', array($meetings->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-eye-open"></span> Print
    </a></td>
					
      <!--  @if(Auth::user()->can('download_minutes'))
					<td>
					@if ($meetings->minutes)
          			<a href="{{ URL::to( 'attachment2/' . $meetings->minutes) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					@endif -->
					
           			
					
				</tr>
			@endforeach

			@foreach($events as $key => $event)
				<tr style="color: blue" @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ date('d M Y', strtotime($event->start_date)) }}</td>
					<td>
						<?php
						$date1 = date_create($event->start_date);
						$date2 = date_create($event->end_date);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%d:%h")."". "days";
						?>
					</td>
					<td>{{ $event->name }}</td>
					<td>
					@if ($event->reports)
          			<a href="{{ URL::to( 'attachments/' . $event->reports) }}"
            			target="_blank">Download</a>
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
        <td><a class="btn btn-sm btn-info" href="{{ URL::route('event.print', array($event->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-eye-open"></span> Print
    </a></td>
</tr>
@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop