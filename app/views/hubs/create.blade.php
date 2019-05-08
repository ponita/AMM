@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
		  <li>
		  	<a href="{{ URL::route('hubs.index') }}">Hubs</a>
		  </li>
		  <li class="active">Create Hub</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			Create Hub
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif

			{{ Form::open(array('route' => 'hubs.store', 'id' => 'form-create-hubs')) }}

				<div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',1)) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
				 <div class="form-group">
			<label>Facilities</label>
				<div class="form-pane panel panel-default">
			<div class="container-fluid">
			<?php  
							$cnt = 0;
							$zebra = "";
						?>
			@foreach($facilities as $key=>$value)
			{{ ($cnt%4==0)?"<div class='row $zebra'>":"" }}
							<?php
								$cnt++;
								$zebra = (((int)$cnt/4)%2==1?"row-striped":"");
							?>
							<div class="col-md-3">
				<label class="checkbox-inline">
				<input type="checkbox" name="facilityId[]" value="{{$value->id}}">
				{{$value->name}}
			</label>
			</div>	
			{{ ($cnt%4==0)?"</div>":"" }}
						@endforeach
						</div>
					</div>
				</div> 

				<div class="form-group actions-row">
					{{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
						array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
@stop	