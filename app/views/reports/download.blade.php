@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ URL::route('reports.download') }}">Report Download</a></li>
		<!-- <li><a href="{{ URL::route('bbincidence.bbfacilityreport') }}">Facility Report</a></li> -->
		<!-- <li class="active">Download</li> -->
	</ol>
</div>
<div class="panel panel-primary">
	<div class="panel-heading ">
		Generate CSV based on report Date:
	</div>
	<div class="panel-body">
		<form method="get" action="/reports_download/">
			
			<div class="row">
				<div class="col-sm-3 ">
					<div class='form-group'>
						<label for="fro">From: </label>
						{{ Form::text('start_time', Input::old('start_time'), array('class' => 'form-control input-sm standard-datepicker standard-datepicker-nofuture')) }}
					</div>
					<div class='form-group'>
						<label for="fro">To: </label>
						{{ Form::text('end_time', Input::old('end_time'), array('class' => 'form-control input-sm standard-datepicker standard-datepicker-nofuture')) }}
					</div>
					<input type='submit' value='Generate CSV' class="btn btn-primary">
				</div>
			</div>				
		</form>

	</div>
</div>
@stop
 