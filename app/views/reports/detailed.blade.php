@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li><a href="{{ URL::route('reports.detailed') }}">Reports</a></li>
	  <li class="active">Report</li>
	</ol>
</div>

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	
	<div class='container-fluid'>
		{{ Form::open(array('route' => array('reports.detailed'), 'class'=>'form-inline',
				'role'=>'form', 'method'=>'GET')) }}
	<div class='row'>
    	<div class="col-sm-2">
	    	<div class="row">
				<div class="col-sm-2">
				    {{ Form::label('start_time', trans('messages.from')) }}
				</div>
				<div class="col-sm-2">
				    {{ Form::text('start_time', isset($input['start_time'])?$input['start_time']:date('Y-m-d'), 
			                array('class' => 'form-control datepicker')) }}
		        </div>
			</div>
		</div>
		<div class="col-sm-2">
	    	<div class="row">
				<div class="col-sm-2">
				    {{ Form::label('end_time', trans('messages.to')) }}
				</div>
				<div class="col-sm-2">
				    {{ Form::text('end_time', isset($input['end_time'])?$input['end_time']:date('Y-m-d'), 
			                array('class' => 'form-control datepicker')) }}
		        </div>
			</div>
		</div>
		<div class="col-md-4">
		        <div class="form-group">
		        	{{ Form::label('department', Lang::choice('Department',1)) }}
		       
		            {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Microbiology' => 'Microbiology','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'Results QC' =>'Results QC', 'Records' =>'Records','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository'], 
                    Input::old('department'), array('class' => 'form-control col-sm-4')) }}
		        </div>
		 </div>
		<div class="col-sm-3">
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
					<th rowspan="2">Date</th>
						<th rowspan="2">Time</th>
						<th rowspan="2">Title</th>
						<th rowspan="2">Venue</th>
						<th rowspan="2">Organiser</th>
						<th rowspan="2">Agenda</th>
						<th rowspan="2" align="left">Action Points</th>
					
					
				</tr>
			</thead>
			<tbody>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				> 
					<td>{{$meetings->start_time }}</td>
					<td>{{ date('h:m:i', strtotime($meetings->start_time)) }}</td>
					<td>{{ $meetings->name }}</td>
					<td>{{ $meetings->venue }}</td>
					<td>@if ($meetings->organiser_id)
          {{ $meetings->organiser->name }}
        @endif</td>
					<td><ol>
          @foreach ($meetings->agenda as $agenda)
          <li>{{$agenda->agenda}}</li>
          @endforeach</ol></td>
					
					<td>
				 <table class="table table-condensed table-bordered" BORDER="1" CELLPADDING="0" CELLSPACING="0" width="100%">
				    <tr>
				        <th align="center">Action Point</th>
				        <th align="center">Person responsible</th>
				        <th align="center">date</th>
				        <th align="center">location</th>
				        <th align="center">status</th>
				    </tr>
				    @foreach($meetings->maction as $maction)
				    <tr>
				        <td>{{ $maction['action'] }}</td>
				        <td align="center">{{ $maction['name'] }}</td>
				        <td align="center">{{ $maction['date'] }}</td>
				        <td align="center">{{ $maction['location'] }} </td>
				        <td align="center">
				        <?php 
				        if($maction->action_status_id == 0){
								echo '<span style="color:#FF0000;">Pending</span>';
						}
						else{
							echo "Done";
						}
						?>
					</td>
				    </tr>
				    @endforeach

				</table>
					</td>
					
				</tr>
			@endforeach
			</tbody>
			</table>
	</div>
<?php } ?>
</div>
@stop