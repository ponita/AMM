@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">UNHLS Strategic Indicator</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-adjust"></span>
		Sub Objectives
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("yearSubobjectives.create") }}" >
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
					<th>Strategy</th>
					<th>UNHLS Strategic Indicator</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($subobj as $key => $value)
				<tr @if(Session::has('activeunhlsWorkplan'))
                            {{(Session::get('activeunhlsWorkplan') == $value->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $value->id }}</td>
					<td>
			           @if($value->year_strategies_id)
			          {{ $value->yearstrategies->name }}
			        @endif
			       </td>
					<td>{{ $value->name }}</td>
					
					<td>

					<!-- show the test category (uses the show method found at GET /subobj/{id} -->
						<a class="btn btn-sm btn-success" href="{{ URL::to("yearSubobjectives/" . $value->id . "/show") }}" >
							<span class="glyphicon glyphicon-eye-open"></span>
							{{ trans('messages.view') }}
						</a>
						<a class="btn btn-sm btn-info" href="{{ URL::to("yearSubobjectives/" . $value->id . "/edit") }}" >
							<span class="glyphicon glyphicon-edit"></span>
							{{ trans('messages.update') }}
						</a>

					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>
@stop