<!--@extends("layout")-->
@section("content")

<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Report</li>
	</ol>
</div>

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		LEAVE SUMMARY 
		
	</div>
	
	<div class="panel-body">
		<table class="row-border hover table table-bordered table-condensed table-striped" style="width:100%">
			<thead>
				<tr>
					<th>Staff</th>
					<th>Contact</th>
					<th>Department</th>
					<th>Leave Total</th>
					<th>Leave Days Due</th>
					<th>Leave Details</th>

				</tr>
			</thead>
			<tbody>
				
			@foreach($rows as $key => $event)
				<tr @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ $event->staff }}</td>
					<td>{{ $event->contact }}</td>
					<td>{{ $event->department }}</td>
					<td>{{ $event->days }}</td>
					<td>{{ 21 - ($event->days) }}</td>
					<td><a class="btn btn-sm btn-info" href="{{ URL::to('leave/' . $event->user_id . "/staff_detail") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							Leave Details
						</a></td>
					
					
    				
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop