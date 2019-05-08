@extends("layout")
@section("content")

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('action.index') }}">Action Points</a></li>
		  <li class="active">Solutions</li>
		</ol>
	</div>
	<div class="panel panel-primary ">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Details
			<div class="panel-btn">
				<a class="btn btn-sm btn-info" href="{{ URL::route('action.edit', array($action->id)) }}">
					<span class="glyphicon glyphicon-edit"></span>
					Add solutions
				</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="display-details">
				<h3 class="view"><strong>Action Point:</strong>{{ $action->action }} </h3>
				
				
			</div>
			<div class="col-sm-2"><strong>Solutions</strong>
        <br>
          <ul>
          @foreach ($action->solution as $solution)
          <li>{{$solution->solution}}</li>
          @endforeach
          </ul>
        </div>
		</div>
	</div>
@stop