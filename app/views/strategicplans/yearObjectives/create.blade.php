@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearObjectives.index') }}">Objectives</a>
		  </li>
		  <li class="active">New</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Add
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'yearObjectives.store', 'id' => 'form-create-yearObjectives')) }}

			
			<div class="col-lg-8">
				<div class="form-group">
					{{Form::label('year', 'Year planner', array('class' => 'col-sm-2'))}}
					{{ Form::select('year', [
							'0' =>'---Select period---',
							'2019-2020' => '2019-2020',
							'2020-2021' => '2020-2021'], 
							Input::old('year'), array('id' => 'year', 'class' => 'form-control')) }}
					
				</div>
				
			</div>
				
			<div class="col-lg-8">
				<div class="form-group">

				{{ Form::label('name', 'Objective', array('class' => 'col-sm-2')) }}
				{{ Form::textarea('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
			</div>
		
			<div class="form-group actions-row">
				{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
					array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
			</div>
			
		</div>
			{{ Form::close() }}
		</div>
	</div>
@stop	