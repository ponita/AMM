@extends("layout")
@section("content")

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('yearSubactivities.index') }}">Sub Activities</a></li>
		  <li class="active">Sub</li>
		</ol>
	</div>
	<div class="panel panel-primary ">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			List
		</div>
		<div class="panel-body">
			<div class="display-details">
	
				<p class="view"><strong>Strategic plan:</strong>{{ $subactivities->name }} </p>
				
           		<p>
           			<div class="col-sm-6"><strong>Sub objectives:</strong><br>
         

        </div>
           		</p>
           	</div>
           		<div>
     
           		</div>
				
			
		</div>
	</div>
@stop