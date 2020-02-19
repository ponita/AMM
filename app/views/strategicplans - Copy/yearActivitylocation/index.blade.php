@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Updates</li>
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
			<a class="btn btn-sm btn-info" href="{{ URL::to("yearActivitylocation.create") }}" >
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
					<th>Sub Activity</th>
					<th>Location</th>
					<th>Target</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($location as $key => $value)
				<tr @if(Session::has('activeunhlsWorkplan'))
                            {{(Session::get('activeunhlsWorkplan') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->id }}</td>
					<td>
           @if($value->year_subactivities_id)
          {{ $value->yearsubactivities->name }}
        @endif
       </td>
					<td>{{ $value->name }}</td>
					<td>{{ $value->target }}</td>
					
					<td>

					<!-- show the test category (uses the show method found at GET /location/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("yearActivitylocation/" . $value->id . "/show") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>

					<!-- edit this test category (uses edit method found at GET /unhlsWorkplan/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("yearActivitylocation/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.update') }}
						</a>
						
					<!-- delete this test category (uses delete method found at GET /location/{id}/delete -->
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