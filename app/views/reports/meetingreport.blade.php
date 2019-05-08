@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li><a href="{{ URL::route('reports.meetingreport') }}">Reports</a></li>
	  <li class="active">Report</li>
	</ol>
</div>

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	
	<div class='container-fluid'>
		{{ Form::open(array('route' => array('reports.meetingreport'), 'class'=>'form-inline',
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
		        <div class="col-sm-1">
					{{Form::submit(trans('messages.export-to-word'), 
			    		array('class' => 'btn btn-success', 'id'=>'word', 'name'=>'word'))}}
				</div>
			</div>
		</div>
	</div> 
	<div class='row'>
		<div class='row col-sm-12'>
					

			<!-- <div class="form-group">
			{{ Form::label('name', 'Search', array('class' => 'col-sm-1')) }}
			{{ Form::text('name', Input::get('name'), array('placeholder' => 'Only one keyword', 'class' => 'form-control col-sm-4')) }}

			</div> -->

			<div class="col-md-6">
	    	
		        <div class="form-group">
		        	{{ Form::label('thematicArea_id', Lang::choice('Department',1)) }}
		       
		            {{ Form::select('thematicArea_id', array(0 => '-- All --')+ThematicAreas::all()->sortBy('thematicArea_id')->lists('name','id'),
		            	isset($input['thematicArea_id'])?$input['thematicArea_id']:0, array('class' => 'form-control col-sm-4')) }}
		        </div>
		

        </div>
		</div>
	</div>
		{{ Form::close() }}
	
	</div>


	<hr>

<?php if($meetings){ ?>
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		 Meeting Summary ({{ count($meetings); }})
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Department</th>
					<th>Organiser</th>
					<th>Date</th>
					<th>Hours</th>
					
					
				</tr>
			</thead>
			<tbody>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				> 
					<td>{{ $meetings->id }}</td>
					<td>{{ $meetings->name }}</td>
					<td>@if($meetings->thematicArea_id)
						{{ $meetings->thematicarea->name}}
					@endif</td>
					<td>{{ $meetings->organiser->name }}</td>
					<td>{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M Y', strtotime($meetings->end_time)) }}</td>
					
					<td>
						<?php
						$date1 = date_create($meetings->start_time);
						$date2 = date_create($meetings->end_time);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%h:%i");
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