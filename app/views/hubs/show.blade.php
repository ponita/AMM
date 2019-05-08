@extends("layout")
@section("content")

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('hubs.index') }}">Hubs</a></li>
		  <li class="active">Hub details</li>
		</ol>
	</div>
	<div class="panel panel-primary ">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Details
			<div class="panel-btn">
				<a class="btn btn-sm btn-info" href="{{ URL::route('hubs.edit', array($hubs->id)) }}">
					<span class="glyphicon glyphicon-edit"></span>
					{{ trans('messages.edit') }}
				</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="display-details">
				<h3 class="view"><strong>{{ Lang::choice('messages.name',1) }}:</strong>{{ $hubs->name }} </h3>
				
				
			</div>
			<div class="col-sm-2"><strong>Facilities</strong>
        <br>
          <ol>
          @foreach ($hubs->facility_id as $facilityId)
          <li>{{$facilityId->facilityId}}</li>
          @endforeach
          </ol>
        </div>
		</div>
	</div>
@stop