@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearSubobjectives.index') }}"> UNHLS Strategic Indicator</a>
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

			{{ Form::open(array('route' => 'yearSubobjectives.store', 'id' => 'form-create-yearSubobjectives')) }}

			<div class="col-sm-12">
		<div class="row">
				<div class="form-group col-md-12">
			{{Form::label('year_strategies_id', ' Choose Strategy', array('class' => 'col-md-2'))}}
			{{ Form::select('year_strategies_id', $thematicAreas, Input::old('year_strategies_id'),
					['class' => 'form-control col-md-10']) }}
					
			</div>
				
			</div>
				
				<div id="YSO-point">
			<div class="col-md-12">
			<div class="form-group">
					{{ Form::label('name', 'Sub Objective', array('class' => 'col-md-2')) }}
					{{ Form::textarea('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>

			
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
			</div>

				<!-- <div>
				<a href="#" id="add-YSO"><i>Add More sub objectives</i></a></div> -->
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