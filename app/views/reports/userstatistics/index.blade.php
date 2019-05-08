@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">{{ Lang::choice('messages.report',2) }}</li>
	  <li class="active">{{ trans('messages.user-statistics-report') }}</li>
	</ol>
</div>

{{ Form::open(array('route' => array('reports.aggregate.userStatistics'), 'class' => 'form-inline', 'role' => 'form')) }}

<div class='container-fluid'>
	<div class="row">
		<div class="col-md-4"><!-- From Datepicker-->
	    	<div class="row">
				<div class="col-md-2">
					{{ Form::label('start', trans("messages.from")) }}
				</div>
				<div class="col-md-10">
					{{ Form::text('start_date', isset($input['start_date'])?$input['start_date']:date('Y-m-d'), 
				        array('class' => 'form-control standard-datepicker')) }}
			    </div>
	    	</div><!-- /.row -->
	    </div>
	    <div class="col-md-4"><!-- To Datepicker-->
	    	<div class="row">
				<div class="col-md-4">
			    	{{ Form::label('end_date', trans("messages.to")) }}
			    </div>
				<div class="col-md-8">
				    {{ Form::text('end_date', isset($input['end_date'])?$input['end_date']:date('Y-m-d'), 
				        array('class' => 'form-control standard-datepicker')) }}
		        </div>
	    	</div><!-- /.row -->
	    </div> 
    </div><!-- /.row -->
    <br />
	<div class="row">
       <div class="col-md-4">
	    	<div class="row">
		        <div class="col-md-2">
		        	{{ Form::label('user', Lang::choice('messages.user',1)) }}
		        </div>
		        <div class="col-md-10">
		            {{ Form::select('user', array(0 => '-- All --')+User::all()->sortBy('name')->lists('name','id'),
		            	isset($input['user'])?$input['user']:0, array('class' => 'form-control')) }}
		        </div>
	        </div>
        </div>
        
	</div><!-- /.row -->
</div><!-- /.container-fluid -->

{{ Form::close() }}

<br />

<div class="panel panel-primary">

	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{ trans('messages.user-statistics-report') }}
	</div>

	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Activities created</th>
					<th>Meetings created</th>
					<th>Approved Activites</th>
					<th>Approved meetings</th>
					
					
				</tr>
			</thead>
			<tbody>
			@foreach($user as $user)
				<tr @if(Session::has('activeuser'))
                            {{(Session::get('activeuser') == $user->id)?"class='info'":""}}
                        @endif
                        >
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<!-- <td>{{ $event->user->name }}</td>
					<td>{{ $meetings->user->name }}</td>
					<td>{{ $event->approvedby }}</td>
					<td>{{ $meetings->approvedby }}</td> -->
					
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

</div>
@stop