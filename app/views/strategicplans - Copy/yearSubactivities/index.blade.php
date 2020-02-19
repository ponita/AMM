@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Sub Activities</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		Activities
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("yearSubactivities.create") }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				Add New
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Index</th>
					<th>Activity</th>
					<th>Sub Activity</th>
					<th>Period</th>
					<th>Target</th>
					<th>Location</th>
					<th>Actual period</th>
					<th>Actual N_o</th>
					<th>Bal</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($subactivities as $key => $value)
				<tr @if(Session::has('activeunhlsWorkplan'))
                            {{(Session::get('activeunhlsWorkplan') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->id }}</td>
					<td>
			           @if($value->year_activities_id)
			          {{ $value->yearactivities->name }}
			        @endif
       				</td>
					<td>{{ $value->name }}</td>
					<td>{{ date('d', strtotime($value->from_timeframe)) }}-{{ date('d M Y', strtotime($value->to_timeframe)) }}</td>
					<td>{{ $value->target }}</td>
					<td>{{ $value->location }}</td>
					<td>{{ date('d', strtotime($value->update_from_timeframe)) }}-{{ date('d M Y', strtotime($value->update_to_timeframe)) }}</td>
					<td>{{ $value->target_count }}</td>
					<td>
					<?php
						$val1 = $value->target;
						$val2 = $value->target_count;
						$diff = $val1-$val2;
						print_r($diff);
						?>
						</td>
				
					<td>

					<!-- show the test category (uses the show method found at GET /subactivities/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("yearSubactivities/" . $value->id . "/show") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>

					<!-- edit this test category (uses edit method found at GET /unhlsWorkplan/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("yearSubactivities/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.update') }}
						</a>
						
					<!-- delete this test category (uses delete method found at GET /subactivities/{id}/delete -->
						<!-- <button class="btn btn-sm btn-danger delete-item-link"
							data-toggle="modal" data-target=".confirm-delete-modal"	
							data-id='{{ URL::to("departments/" . $value->id . "/delete") }}'>
							<span class="glyphicon glyphicon-trash"></span>
							{{ trans('messages.delete') }}
						</button> -->
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>
@stop