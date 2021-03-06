@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('organisers.index') }}">Organisers</a>
		  </li>
		  <li class="active">Create Organiser</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Create Organiser
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'organisers.store', 'id' => 'form-create-organisers')) }}

				<div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',1)) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('cadre', Lang::choice('Designation',1)) }}
					{{ Form::text('cadre', Input::old('cadre'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', Lang::choice('messages.email',1)) }}
					{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('telephoneNo', Lang::choice('TelephoneNo',1)) }}
					{{ Form::text('telephoneNo', Input::old('telephoneNo'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', trans("messages.description")) }}</label>
					{{ Form::textarea('description', Input::old('description'), 
						array('class' => 'form-control', 'rows' => '2')) }}
				</div>
				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop	