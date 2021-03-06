@extends("layout")
@section("content")

<style>
table {
    border-collapse: collapse;
}

th, td {
    border: 1px solid green;
    padding:5px;
    text-align: center;
}

.hidden{
    display:none;
}
.highliht{
	background-color: blue;

}
</style>

<script type="text/javascript" charset="utf-8">
   
</script>


<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Year plan</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		UNHLS IP Supported work plan
	</div>
	<div class="panel-body">
		<table class="search-table" id="myTable">
			<thead>
				<tr class="parent-grid-row">
					
					<th>Objective</th>
					<th>Strategies</th>
					<th>Strategic indicator</th>
					<th>Funder</th>
					<th>Grant/ Sub Grant Activities</th>
					<th>Grant/ Sub Grant Sub Activities</th>
					<th>Location</th>
					<th>Target</th>
					<th>Person responsible</th>
					<th colspan="12">Timeline</th>
				</tr>
			</thead>
			<tbody>
			@foreach($yrobj as $key => $value)
				<tr class="parent-grid-row" @if(Session::has('activeunhlsWorkplan'))
                            {{(Session::get('activeunhlsWorkplan') == $value->id)?"class='info'":""}}
                        @endif
                        >
						<td>
					    	{{ $value->name }}
					   </td> 
					   @foreach($stgic as $key => $value)
						<td title="{{ $value->strategy }}">
					    	<a href='#'>Point here</a>
						</td>
						@endforeach
						@foreach($subobj as $key => $value)
						<td>
					    {{ $value->name }}
						</td>
						@endforeach
						@foreach($activities as $key => $value)
					    <td>
					    	{{ $value->name }}
						</td>
					   	<td>
					    	{{ $value->funder }}
						</td>
						<td>
					    	{{ $value->person_responsible }}
						</td>
						@endforeach
						@foreach($subactivities as $key => $value)
					    <td>
					    	{{ $value->name }}
						</td>
					    
					    <td>
					    	{{ $value->location }}
						</td>
						<td>
					    	{{ $value->target }}
						</td>

						<?php
							$start = date_create($value->from_timeframe);
							$end = date_create($value->to_timeframe);
							$interval = DateInterval::createFromDateString('1 month');
							$period   = new DatePeriod($start, $interval, $end);
							$spanned_months = array();
							foreach ($period as $dt) {
	    						$spanned_months[] = $dt->format("n");
							}
						?>

						<td class="<?php if(in_array(1, $spanned_months)) echo 'highliht';?>"> 
					    	J
						</td>
						<td class="<?php if(in_array(2, $spanned_months)) echo 'highliht';?>">
					    	F
						</td>
						<td class="<?php if(in_array(3, $spanned_months)) echo 'highliht';?>">
					    	M
						</td>
						<td class="<?php if(in_array(4, $spanned_months)) echo 'highliht';?>">
					    	A
						</td>
						<td class="<?php if(in_array(5, $spanned_months))  echo 'highliht';?>">
					    	M
						</td>
						<td class="<?php if(in_array(6, $spanned_months))  echo 'highliht';?>">
					    	J
						</td>
						<td class="<?php if(in_array(7, $spanned_months)) echo 'highliht'; ?>">
					    	J
						</td>
						<td class="<?php if(in_array(8, $spanned_months)) echo 'highliht'; ?>">
					    	A
						</td>
						<td class="<?php if(in_array(9, $spanned_months)) echo 'highliht'; ?>">
					    	S
						</td>
						<td class="<?php if(in_array(10, $spanned_months)) echo 'highliht'; ?>">
					    	O
						</td>
						<td class="<?php if(in_array(11, $spanned_months))  echo 'highliht';?>">
					    	N
						</td>
						<td class="<?php if(in_array(12, $spanned_months))  echo 'highliht';?>">
					    	D
						</td>
						@endforeach
						
						
				
				</tr>
				@endforeach
			</tbody>
		</table>

		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>


@stop