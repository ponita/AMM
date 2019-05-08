<html>
<head>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
</head>
<body>
@include("reportHeader")
<div id="content">
	<strong>
		<p>
			<?php $from = isset($input['start'])?$input['start']:date('Y-m-d'); ?>
			<?php $to = isset($input['end'])?$input['end']:date('Y-m-d'); ?>
				{{trans('messages.daily-visits')}} @if($from!=$to)
					{{trans('messages.from').' '.$from.' '.trans('messages.to').' '.$to}}
				@else
					{{trans('messages.for').' '.date('d-m-Y')}}
				@endif
		</p>
	</strong>
	<br>
	<table class="table table-bordered"  width="100%">
		<tbody align="left">
			<tr>
				<th colspan="3">{{trans('messages.summary')}}</th>
			</tr>
			<th>Total count</th>
			<tr>
				<td></td>
			</tr>
		</tbody>
	</table>
	<br>
  	<table class="table table-bordered"  width="100%">
		<tbody align="left">
						<th rowspan="2">Date</th>
						<th rowspan="2">Time</th>
						<th rowspan="2">Title</th>
						<th rowspan="2">Venue</th>
						<th rowspan="2">Organiser</th>
						<th rowspan="2">Agenda</th>
						<th rowspan="2" align="left">Action Points</th>
			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				> 
					<td>{{$meetings->start_time }}</td>
					<td>{{ date('h:m:i', strtotime($meetings->start_time)) }}</td>
					<td>{{ $meetings->name }}</td>
					<td>{{ $meetings->venue }}</td>
					<td>@if ($meetings->organiser_id)
          {{ $meetings->organiser->name }}
        @endif</td>
					<td><ol>
          @foreach ($meetings->agenda as $agenda)
          <li>{{$agenda->agenda}}</li>
          @endforeach</ol></td>
					
					<td>
				 <table class="table table-condensed table-bordered" BORDER="1" CELLPADDING="0" CELLSPACING="0" width="100%">
				    <tr>
				        <th align="center">Action Point</th>
				        <th align="center">Person responsible</th>
				        <th align="center">date</th>
				        <th align="center">location</th>
				    </tr>
				    @foreach($meetings->maction as $action)
				    <tr>
				        <td>{{ $action['action'] }}</td>
				        <td align="center">{{ $action['name'] }}</td>
				        <td align="center">{{ $action['date'] }}</td>
				        <td align="center">{{ $action['location'] }} </td>
				    </tr>
				    @endforeach

				</table>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>