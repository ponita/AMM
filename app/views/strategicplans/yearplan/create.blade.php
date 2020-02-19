@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearplan.index') }}">Year plan</a>
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

			{{ Form::open(array('route' => 'yearplan.store', 'id' => 'form-create-yearplan')) }}

		<div class="col-sm-12">
		<div class="row">
				<div class="form-group col-md-12">
			{{Form::label('year', 'Year planner', array('class' => 'col-md-2'))}}
			{{ Form::select('year', [
					'0' =>'---Select period---',
					'2019-2020' => '2019-2020',
					'2020-2021' => '2020-2021'], 
					Input::old('year'), array('id' => 'year', 'class' => 'form-control col-md-10')) }}
					
			</div>
				
			</div>
				
				<div id="YP-point">
			<div class="row">
				<div class="col-md-12">
			<div class="form-group">

			{{ Form::label('name', 'Name', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('name', '', array('size' => '10x2','class' => 'form-control col-sm-4')) }}
			</div>
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
			</div>

				<div>
				<a href="#" id="add-YP"><i>Add More sub objectives</i></a></div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>
			</div>
		</div>
			{{ Form::close() }}
		</div>
	</div>
@stop	