@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li><a href="{{ URL::route('reports.department') }}">Reports</a></li>
	  <li class="active">Report</li>
	</ol>
</div>

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	
	<div class='container-fluid'>
		{{ Form::open(array('route' => array('reports.department'), 'class'=>'form-inline',
				'role'=>'form', 'method'=>'GET')) }}
	<div class='row'>
    	<div class="col-sm-4">
	    	<div class="row">
				<div class="col-sm-2">
				    {{ Form::label('datefrom', trans('messages.from')) }}
				</div>
				<div class="col-sm-2">
				    {{ Form::text('datefrom', isset($input['datefrom'])?$input['datefrom']:date('Y-m-d'), 
			                array('class' => 'form-control standard-datepicker')) }}
		        </div>
			</div>
		</div>
		<div class="col-sm-4">
	    	<div class="row">
				<div class="col-sm-2">
				    {{ Form::label('dateto', trans('messages.to')) }}
				</div>
				<div class="col-sm-2">
				    {{ Form::text('dateto', isset($input['dateto'])?$input['dateto']:date('Y-m-d'), 
			                array('class' => 'form-control standard-datepicker')) }}
		        </div>
			</div>
		</div>
		<div class="col-sm-4">
	    	<div class="row">
				<div class="col-sm-3">
				  	{{ Form::button("<span class='glyphicon glyphicon-filter'></span> ".trans('messages.view'), 
		                array('class' => 'btn btn-info', 'id' => 'filter', 'type' => 'submit')) }}
		        </div>
		        <!-- <div class="col-sm-1">
					{{Form::submit(trans('messages.export-to-word'), 
			    		array('class' => 'btn btn-success', 'id'=>'word', 'name'=>'word'))}}
				</div> -->
			</div>
		</div>
	</div> 

	
	<div class='row'>
		<div class='row col-sm-12'>
			
			<div class="form-group">

			{{ Form::label('name', 'Search', array('class' => 'col-sm-2')) }}
			{{ Form::text('name', Input::get('name'), array('placeholder' => 'Only one keyword', 'class' => 'form-control col-sm-4')) }}

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
					<th>Event Name</th>
					<th>Date</th>
					<th>Type</th>
					<th>Department</th>
					<th>Days/Hours</th>
					
					
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
					<td>{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
					<td>{{ $event->type }}</td>
					<td>{{ $event->thematicarea->name }}</td>
					
					<td>
						<?php
						$date1 = date_create($event->start_date);
						$date2 = date_create($event->end_date);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%d:%h");
						?>
					</td>
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
<?php } ?>
</div>
@stop