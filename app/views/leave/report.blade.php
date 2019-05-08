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
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Department</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Leave type</th>
					<th>Duration</th>
					<th>Supervisor</th>
					<th>Manager</th>
					<th>Status</th>

				</tr>
			</thead>
			<tbody>
				
			@foreach($leave as $key => $event)
				<tr @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ $event->id }}</td>
					<td>{{ $event->department }}</td>
					<td>{{ $event->name }}</td>
					<td>{{ $event->emp_contact }}</td>
					<td>{{ $event->leave_type }}</td>
					<td>{{ date('d', strtotime($event->date_from)) }}-{{ date('d M Y', strtotime($event->date_to)) }}</td>
					<td>{{ $event->approvedbys }}</td>
					<td>{{ $event->approvedbym }}</td>
					<td>@if($event->m_approval_status == 'Rejected')
						<span style="color: red">{{ $event->m_approval_status }}</span>
						@elseif($event->m_approval_status == 'Approved')
						{{ $event->m_approval_status }}
						@endif
					</td>
					
    				
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop