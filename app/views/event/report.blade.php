<!--@extends("layout")-->
@section("content")


<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Report</li>
	</ol>
</div>
<!-- {{ Form::open(array('route' => array('event.report'), 'class'=>'form-inline', 'role'=>'form', 'method'=>'POST')) }}
		<div class="form-group">

		    {{ Form::label('search', "search", array('class' => 'sr-only')) }}
            {{ Form::text('search', Input::get('search'), array('class' => 'form-control test-search')) }}
		</div>
		<div class="form-group">
			{{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.search'), 
		        array('class' => 'btn btn-primary', 'id' => 'filter', 'type' => 'submit')) }}
		</div>
	{{ Form::close() }}
	<br> -->
	


@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		ACTIVITIES  
		
		

		
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Report</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			@foreach($events as $key => $event)
				<tr  @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ $event->id }}</td>
					<td>{{ $event->name }}</td>
					<td>{{ date('d M Y', strtotime($event->start_date)) }}</td>
					<td>{{ date('d M Y', strtotime($event->end_date)) }}</td>
					
       @if(Auth::user()->can('download_report'))
					<td>
					@if ($event->reports)
          			<a href="{{ URL::to( 'attachments/' . $event->reports) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					@endif
					<td><a class="btn btn-sm btn-info" href="{{ URL::route('event.print', array($event->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-eye-open"></span>View Report
    </a></td>

					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop