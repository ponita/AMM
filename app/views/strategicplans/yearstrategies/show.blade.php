@extends("layout")
@section("content")

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('yearstrategies.index') }}">Strategies</a></li>
		  <li class="active">Strategies</li>
		</ol>
	</div>
	<div class="panel panel-primary ">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-adjust"></span>
			List
		</div>
		<div class="panel-body">
			<div class="display-details">
				<p class="view"><strong>Thematic Area:</strong>
          @if($departments->thematicArea_id)
          {{ $departments->thematicarea->name }}
        @endif
        </p>
				<p class="view"><strong>Strategic plan:</strong>{{ $departments->name }} </p>
				<!-- <p class="view-striped"><strong>Sub Objectives:</strong>
					<ul>
					@foreach ($departments->workplan as $workplan)
              		<li>{{$workplan->workplan}}</li>
              		<li>{{$workplan->from_timeframe}} to {{$workplan->to_timeframe}}</li>
           			@endforeach
           			</ul></p> --> 
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
	</div>
@stop