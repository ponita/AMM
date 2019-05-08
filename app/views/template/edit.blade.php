@extends("layout")
@section("content")
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('template.index') }}">Template</a></li>
		</ol>
	</div>

	@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif

	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			Standardised templates
		</div>
		<div class="panel-body">
		<!-- if there are creation errors, they will show here -->
			
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			

				{{ Form::open(array('route' =>array('template.update', $template->id), 'method' => 'POST')) }}


			<!-- <input type="hidden" name="_token" value="{{ Session::token() }}"> -->
			<!--to be removed function for csrf_token -->

<div class="panel panel-info">
	<div class="panel-heading"><strong>Template Information</strong></div>
	<div class="panel-body">	
	<div class="panel-default">
		<div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $template->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Name</strong></div>
        <div class="col-sm-7">{{ $template->t_name }}</div>
      </div>
		
	</div>

		

			<div class="form-group">
			{{ Form::hidden('user_id', Auth::user()->id) }}
			</div>
			<div class="form-group">
			{{ Form::label('doc', 'Attachment', array('class' => 'col-sm-2')) }}
			{{ Form::file('doc', '', array('size' => '10x1','class' => 'form-control col-sm-10')) }}
			</div>

			<div class="form-group actions-row" style="text-align:centre;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>
			
{{ Form::close() }}

@stop	