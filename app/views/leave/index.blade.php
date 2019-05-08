<!--@extends("layout")-->
@section("content")



<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">leave </li>
	</ol>
</div>



@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<!-- <div class="container-fluid" onclick="myFunction()">
	<h3><strong>Leave</strong></h3>
</div> -->

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		{{ count($leave); }}
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>SN</th>			
					<th>Employee</th>			
					<th>Date</th>			
					<th>Days</th>
					<th>Supervisor</th>
					<th>Manager</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($leave as $key => $value)
				<tr  @if(Session::has('activeleave'))
						{{(Session::get('activeleave') == $value->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ $value->id }}</td>
					<td>{{ $value->name }}</td>
					<td>{{ date('d M Y', strtotime($value->date_from)) }}</td>
					
					
					<td>
            <?php
            $date1 = date_create($value->date_from);
            $date2 = date_create($value->date_to);

            //difference between two dates
            $diff = date_diff($date1,$date2);

            //count days
            echo ' '.$diff->format("%d").'days';
            ?>
              
            		</td> 
					<td>{{ $value->approvedbys }}</td>
					<td>{{ $value->approvedbym }}</td>	
					
					<td align="center">
						
						@if(Auth::user()->can('supervisor_leave_approval') && ($value->approval_status_id == 0))
                        <a class="btn btn-sm btn-info" 
                            href="{{ URL::to("leave/" . $value->id . "/supervisor") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Supervisor</a>
                         @elseif(Auth::user()->can('manager_leave_approval') && ($value->approval_status_id == 2))     
                   		<a class="btn btn-sm btn-warning" 
                            href="{{ URL::to("leave/" . $value->id . "/manager") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            Manager</a>
 						@elseif(Auth::user()->can('head_leave_approval') && ($value->approval_status_id == 3))
						<a class="btn btn-sm btn-danger" href="{{ URL::to("leave/" . $value->id . "/head") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							Exective Dir
						</a>
						@elseif(Auth::user()->can('view_leave_details') && ($value->approval_status_id == 4))
						<a class="btn btn-sm btn-success" href="{{ URL::to("leave/" . $value->id) }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>
							@endif
                    </td>
					
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}
	</div>
</div>
@stop