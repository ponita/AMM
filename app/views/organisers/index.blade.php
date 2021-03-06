@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Organisers</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		Organisers
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("organisers/create") }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				Create New Organiser
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>{{ Lang::choice('messages.name',1) }}</th>
					<th>Telephone Number</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($organisers as $key => $value)
				<tr @if(Session::has('activeorganisers'))
                            {{(Session::get('activeorganisers') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->name }}</td>
					<td>{{ $value->telephoneNo }}</td>
					
					<td>

					<!-- show the test category (uses the show method found at GET /organisers/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("organisers/" . $value->id) }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>

					<!-- edit this test category (uses edit method found at GET /organisers/{id}/edit -->
						<a class="btn btn-sm btn-info" href="{{ URL::to("organisers/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.edit') }}
						</a>
						
					<!-- delete this test category (uses delete method found at GET /organisers/{id}/delete -->
						<!-- <button class="btn btn-sm btn-danger delete-item-link"
							data-toggle="modal" data-target=".confirm-delete-modal"	
							data-id='{{ URL::to("organisers/" . $value->id . "/delete") }}'>
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