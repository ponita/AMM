@extends("layout")
@section("content")

	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li>
		  	<a href="{{ URL::route('unhlsWorkplan.index') }}">UNHLS Workplan</a>
		  </li>
		  <li class="active">Update Strategy</li>
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
			{{ Form::model($departments, array('route' => array('unhlsWorkplan.update', $departments->id), 
				'method' => 'PUT', 'id' => 'form-edit-unhlsWorkplan')) }}
				
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
         

                      <table class="table table-condensed table-bordered" BORDER="1" CELLPADDING="0" CELLSPACING="0" width="100%">
    <tr>
        <th>Workplan</th>
        <th>From</th>
        <th>To</th>
    </tr>
  <?php
    $i = 0;
    foreach ($departments->workplan as $workplan) {
        echo "<tr>";
        echo "<td>" . $workplan['workplan'] . "</td><td>" . strtolower(trim(($workplan['from_timeframe']))) . "</td><td>" . strtolower(trim($workplan['to_timeframe'])) . "</td><td>";
        echo "</tr>";

        $i++;
    }
    ?>

</table>

        </div>
           		</p>

			</div>
			</div>

				<!-- <div class="form-group">
					{{ Form::label('name', Lang::choice('messages.name',1)) }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div> -->
				<div id="action-point">
			<div class="row">
				<div class="col-lg-6">
			<div class="form-group">

			{{ Form::label('workplan', 'Sub objective', array('class' => 'col-sm-2')) }}
			{{ Form::textarea('workplan[]', '', array('size' => '10x2','class' => 'form-control col-sm-4')) }}
			</div>

			<div class="form-group row">
			{{ Form::label('from_timeframe', 'From', array('class' => 'col-sm-2')) }}
			{{ Form::text('from_timeframe[]', Input::old('from_timeframe'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
			</div>
			<div class="form-group row">

			{{ Form::label('to_timeframe', 'To', array('class' => 'col-sm-2')) }}
			{{ Form::text('to_timeframe[]', Input::old('to_timeframe'), array('class' => 'form-control standard-datepicker col-sm-4')) }}
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