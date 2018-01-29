@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">{{ Lang::choice('messages.report',2) }}</li>
	  <li class="active">{{ trans('messages.infection-report') }}</li>
	</ol>
</div>
{{ Form::open(array('route' => array('reports.aggregate.infection'), 'class' => 'form-inline', 'role' => 'form')) }}
<!-- <div class='container-fluid'> -->
	<div class="row">
		<div class="col-md-3">
	    	<div class="row">
				<div class="col-md-2">
					{{ Form::label('start', trans("messages.from")) }}
				</div>
				<div class="col-md-10">
					{{ Form::text('start', isset($input['start'])?$input['start']:date('Y-m-d'), 
				        array('class' => 'form-control standard-datepicker')) }}
			    </div>
	    	</div>
	    </div>
	    <div class="col-md-3">
	    	<div class="row">
				<div class="col-md-2">
			    	{{ Form::label('end', trans("messages.to")) }}
			    </div>
				<div class="col-md-10">
				    {{ Form::text('end', isset($input['end'])?$input['end']:date('Y-m-d'), 
				        array('class' => 'form-control standard-datepicker')) }}
		        </div>
	    	</div>
	    </div>
        <div class="col-md-4">
	        <div class="col-md-4">
	        	{{ Form::label('test_type', Lang::choice('messages.test-category',1)) }}
	        </div>
	        <div class="col-md-8">
	            {{ Form::select('thematicarea', array(0 => '-- All --')+ThematicAreas::all()->sortBy('name')->lists('name','id'),
	            	isset($input['thematicarea'])?$input['thematicarea']:0, array('class' => 'form-control')) }}
	        </div>
        </div>
	    <div class="col-md-2">
		    {{ Form::button("<span class='glyphicon glyphicon-filter'></span> ".trans('messages.view'), 
		        array('class' => 'btn btn-info', 'id' => 'filter', 'type' => 'submit')) }}
	    </div>
	</div>
<!-- </div> -->
{{ Form::close() }}
<br />
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{ trans('messages.infection-report') }}
	</div>
	<div class="panel-body">
	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif	
	<strong>
		<p> {{ trans('messages.infection-report') }} - 
			<?php $from = isset($input['start'])?$input['start']:date('01-m-Y');?>
			<?php $to = isset($input['end'])?$input['end']:date('d-m-Y');?>
			@if($from!=$to)
				{{trans('messages.from').' '.$from.' '.trans('messages.to').' '.$to}}
			@else
				{{trans('messages.for').' '.date('d-m-Y')}}
			@endif
		</p>
	</strong>
		<div class="table-responsive">
			<table class="table table-condensed report-table-border">
				<thead>
					<tr>
						<th rowspan="2">Activity</th>
						<th rowspan="2">Type</th>
						<th rowspan="2">Venue</th>
						<th colspan="2">District</th>
						<th rowspan="2">No. of days</th>
						
					</tr>
					
				</thead>
				<tbody>
					<td rowspan="2">{{ $event->name }}</td>
						<td rowspan="2">{{ $event->type }}</td>
						<td rowspan="2">{{ $event->premise }}</td>
						<td colspan="2">{{ $event->district->name }}</td>
					<td>
						<?php 
						$to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', 'start_date');
						$from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', 'end_date');
						$diff_in_days = $to->diffInDays($from);
						print_r($diff_in_days); 
					?>
					</td>

				</tbody>
			</table>
		</div>
	</div>
</div>

@stop