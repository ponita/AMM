<html>
<head>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
</head>
<body>
@include("reportHeader")
<div id="content" class="Section2">
	<strong>
		<p>
			{{trans('messages.test-records')}} 

			<?php $from = isset($input['start'])?$input['start']:date('01-m-Y');?>
			<?php $to = isset($input['end'])?$input['end']:date('d-m-Y');?>
			@if($from!=$to)
				{{trans('messages.from').' '.$from.' '.trans('messages.to').' '.$to}}
			@else
				{{trans('messages.for').' '.date('d-m-Y')}}
			@endif
		</p>
	</strong>
	<br>
	<table class="table table-bordered">
		<tbody>
			<th>#</th>
					<th>Name</th>
					<th>Department</th>
					<th>Organiser</th>
					<th>Date</th>
					<th>Hours</th>
			@foreach($meetings as $key => $meetings)
			<tr @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
					>
				<td>{{ $meetings->id }}</td>
					<td>{{ $meetings->name }}</td>
					<td>{{ $meetings->thematicarea->name}}</td>
					<td>{{ $meetings->organiser->name }}</td>
					<td>{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M Y', strtotime($meetings->end_time)) }}</td>
					
					<td>
						<?php
						$date1 = date_create($meetings->start_time);
						$date2 = date_create($meetings->end_time);

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						echo ' '.$diff->format("%h:%i");
						?>
					</td>
			</tr>
			@empty
			<tr><td colspan="9">{{trans('messages.no-records-found')}}</td></tr>
			@endforelse
		</tbody>
	</table>
</div>
</body>
</html>