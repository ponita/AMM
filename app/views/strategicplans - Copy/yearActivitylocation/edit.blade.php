@extends("layout")
@section("content")

	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li>
		  	<a href="{{ URL::route('yearActivitylocation.index') }}">Updates</a>
		  </li>
		  <li class="active">Update</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			Edit
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			{{ Form::model($departments, array('route' => array('yearActivitylocation.update', $departments->id), 
				'method' => 'PUT', 'id' => 'form-edit-yearActivitylocation')) }}
				
				<div class="panel panel-info">
			<div class="panel-body">
				<div class="row view-striped">
					<div class=""><strong>
					 @if($departments->thematicArea_id)
          {{ $departments->thematicarea->name }}
        @endif</strong></div>
    </div>
				<div class="row view-striped">
    			
					<div class=""><strong>{{ $departments->name }}</strong></div>
				</div>

				<p>
           			<div class="col-sm-6"><strong>Sub objectives:</strong><br>
        
        </div>
           		</p>

			</div>
			</div>
				</div> -->
				<div id="action-point">
			<div class="row">
				<div class="col-lg-6">
			<div class="form-group">
			{{ Form::label('target', 'Number of participants', array('class' => 'col-sm-2')) }}
			{{ Form::input('number','target', Input::old('target'), array('class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group">
			{{ Form::label('location', 'location', array('class' => 'col-sm-2')) }}
			{{ Form::input('location', Input::old('location'), array('class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group row">
			{{ Form::label('update_from_timeframe', 'From', array('class' => 'col-sm-2')) }}
			{{ Form::text('update_from_timeframe[]', Input::old('update_from_timeframe'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			</div>
			<div class="form-group row">

			{{ Form::label('update_to_timeframe', 'To', array('class' => 'col-sm-2')) }}
			{{ Form::text('update_to_timeframe[]', Input::old('update_to_timeframe'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			</div>
			</div>
			{{ Form::button("<span class='glyphicon glyphicon-delete'></span> ".'Remove', ['class' => 'remove-reason btn-normal']) }}
					
			</div>
			</div>

				<div>
				<a href="#" id="add-action"><i>Add More sub objectives</i></a></div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop	