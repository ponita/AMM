@extends("layout")
@section("content")

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('funders.index') }}">Funders</a></li>
		  <li class="active">Funder details</li>
		</ol>
	</div>
	<div class="panel panel-primary ">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Details
			<div class="panel-btn">
				<a class="btn btn-sm btn-info" href="{{ URL::route('funders.edit', array($funders->id)) }}">
					<span class="glyphicon glyphicon-edit"></span>
					{{ trans('messages.edit') }}
				</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="display-details">
				<h3 class="view"><strong>{{ Lang::choice('messages.name',1) }}:</strong>{{ $funders->name }} </h3>
				<p class="view-striped"><strong>{{ trans('messages.description') }}:</strong>
					{{ $funders->description }}</p>
				
			</div>
		</div>
	</div>
@stop