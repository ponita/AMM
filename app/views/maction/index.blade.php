@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">ActionPoint</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		Action points
		<!-- <div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("funders/create") }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				Create Funder
			</a>
		</div> -->
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Action Point</th>
					<th>Person responsible</th>
					<th>Date</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($maction as $key => $value)
				<tr @if(Session::has('activeaction'))
                            {{(Session::get('activeaction') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->action }}</td>
					<td>{{ $value->name }}</td>
					<td>{{ $value->date }}</td>
					<td>{{ $value->location }}</td>
					
					<td>
 
					<!-- show the test category (uses the show method found at GET /testcategory/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("maction/" . $value->id) }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>
    				@if(($value->action_status_id == 0))

					<!-- edit this test category (uses edit method found at GET /testcategory/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("maction/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							Solution
						</a>
						@endif
					<!-- delete this test category (uses delete method found at GET /testcategory/{id}/delete -->
						<!-- <button class="btn btn-sm btn-danger delete-item-link"
							data-toggle="modal" data-target=".confirm-delete-modal"	
							data-id='{{ URL::to("funders/" . $value->id . "/delete") }}'>
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