@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li><a href="{{ URL::route('event.index') }}">Activities</a></li>
	  <li class="active">Activities Filter</li>
	</ol>
</div>

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	
	<div class='container-fluid'>
	<div class='row'>
		<div class='row col-sm-12'>
		{{ Form::open(array('route' => array('event.eventfilter'), 'class'=>'form-inline',
				'role'=>'form', 'method'=>'GET')) }}			
			<div class="form-group">
			{{ Form::label('datefrom', 'Date From', array('class' => 'col-sm-2')) }}
			{{ Form::text('datefrom', Input::get('datefrom'), 
			array('class' => 'form-control standard-datepicker col-sm-4', 
			)) }}

			{{ Form::label('dateto', 'Date To', array('class' => 'col-sm-2')) }}
			{{ Form::text('dateto', Input::get('dateto'), 
			array('class' => 'form-control standard-datepicker col-sm-4', 
			)) }}	
			</div>

			<div class="form-group">
			{{ Form::label('name', 'Keyword in event', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::get('name'), array('placeholder' => 'Only one keyword', 'class' => 'form-control col-sm-4')) }}

			{{ Form::label('', '', array('class' => 'col-sm-2')) }}
			{{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.filter'), 
				        array('class' => 'btn btn-primary', 'type' => 'submit')) }}

			&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ URL::route('event.index') }}">Back</a>
			</div>
		{{ Form::close() }}
		</div>
	</div>
	</div>

	<hr>

<?php if($events){ ?>
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		Filtered Activities  ({{ count($events); }})
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>#</th>
					<!-- <th>Serial No</th> -->
					<th>Date</th>
					<th>Event Name</th>
					<th>Department</th>
					<th>Objectives</th>

					
				</tr>
			</thead>
			<tbody>
			@foreach($events as $key => $event)
				<tr  @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					<td>{{ $event->id }}</td>
					<!-- <td>{{ $event->serial_no }}</td> -->
					<td>{{ date('d M', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
					<td>{{ $event->name }}</td>
					<td>{{ $event->thematicarea->name }}</td>
					<td title ="@foreach ($event->objective as $objective)
              		{{$objective->objective}}
           			@endforeach"> <a href='#'>Point here</a> </td>
					

					
					
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
<?php } ?>
</div>
@stop