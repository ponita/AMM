<!--@extends("layout")-->
@section("content")
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
		MEETINGS 
		 <!-- ({{ count($meetings); }}) -->
		

		
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Start Date</th>
					<th>Minutes</th>
					<th>Actions</th>
				</tr> 
			</thead>
			<tbody>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ $meetings->serial_no }}</td>
					<td>{{ $meetings->name }}</td>
					<td>{{$meetings->start_time }}</td>
					<td>
					@if ($meetings->minutes)
          			<a href="{{ URL::to( 'attachment2/' . $meetings->minutes) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					
					
           			<td><a class="btn btn-sm btn-info" href="{{ URL::route('meetings.print', array($meetings->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-eye-open"></span> View Report
    </a></td>
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop