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
		        <div class="col-sm-1">
					{{Form::submit(trans('messages.export-to-word'), 
			    		array('class' => 'btn btn-success', 'id'=>'word', 'name'=>'word'))}}
				</div>
			</div>
		</div>
	</div> 

<div class="row">
<!-- <div class="col-md-6">
	    	
		        <div class="form-group">
		        	{{ Form::label('type', Lang::choice('Type',1)) }}
		       
		            {{ Form::select('type', array(0 => '-- All --')+UNHLSEvent::all()->sortBy('type')->lists('type','id'),
		            	isset($input['type'])?$input['type']:0, array('class' => 'form-control col-sm-4')) }}
		        </div>
        </div> -->

        <div class="col-md-6">
	    	
		        <div class="form-group">
		        	{{ Form::label('department', Lang::choice('Department',1)) }}
		        	<!-- {{ Form::label('thematicArea_id', Lang::choice('Department',1)) }} -->
		       
		            <!-- {{ Form::select('thematicArea_id', array(0 => '-- All --')+ThematicAreas::all()->sortBy('thematicArea_id')->lists('name','id'),
		            	isset($input['thematicArea_id'])?$input['thematicArea_id']:0, array('class' => 'form-control col-sm-4')) }} -->
		       {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Microbiology' => 'Microbiology','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'Results QC' =>'Results QC', 'Records' =>'Records','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository'], 
                    Input::old('department'), array('class' => 'form-control')) }}
		        </div>
		

        </div>
    </div>
	{{ Form::close() }}
	
	</div>


	<hr>

<!-- <?php if($events){ ?> -->
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
	 Activity Summary ({{ count($events); }})
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
					<th>Duration</th>
					
					
				</tr>
			</thead>
			<tbody>
			@foreach($events as $key => $event)
				<tr  @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					<td></td>
					<td>{{ $event->name }}</td>
					<td>{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
					<td>{{ $event->type }}</td>
					<td>
						{{ $event->department }}
					</td>
					
					<td>
						<?php
						$date1 = date_create($event->start_date);
						$date2 = date_create($event->end_date);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%d:%h").'days';
						?>
					</td>
					
				</tr>
			@endforeach
			</tbody>
			<tbody>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				> 
					<td></td>
					<td>{{ $meetings->name }}</td>
					<td>{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M Y', strtotime($meetings->end_time)) }}</td>
					<td>{{ $meetings->category }}</td>
					<td>
						{{ $meetings->department}}
					</td>
					
					<td>
						<?php
						$date1 = date_create($meetings->start_time);
						$date2 = date_create($meetings->end_time);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%h:%i").'hrs';
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