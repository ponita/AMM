@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Bubgeted Activities</li>
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
			<a class="btn btn-sm btn-info" href="{{ URL::to("yearActivities.create") }}" >
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
					<th>Sub objective</th>
					<th>Activities</th>
					<th>Funder</th>
					<th>Person responsible</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($activities as $key => $value)
				<tr @if(Session::has('activeunhlsWorkplan'))
                            {{(Session::get('activeunhlsWorkplan') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->id }}</td>
					<td>
			           @if($value->year_subobjectives_id)
			          {{ $value->yearsubobjectives->name }}
			        @endif
			       </td>
					<td>{{ $value->name }}</td>
					<td>{{ $value->funder }}</td>
					<td>{{ $value->person_responsible }}</td>
					
					<td>

					<!-- show the test category (uses the show method found at GET /departments/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("#" . $value->id . "/show") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>

					<!-- edit this test category (uses edit method found at GET /unhlsWorkplan/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("yearActivities/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.update') }}
						</a>
						
					<!-- delete this test category (uses delete method found at GET /departments/{id}/delete -->
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