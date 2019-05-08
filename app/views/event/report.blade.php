<!--@extends("layout")-->
@section("content")

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105243767-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105243767-2');
</script>

<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">Report</li>
	</ol>
</div>
<!-- {{ Form::open(array('route' => array('event.report'), 'class'=>'form-inline', 'role'=>'form', 'method'=>'POST')) }}
		<div class="form-group">

		    {{ Form::label('search', "search", array('class' => 'sr-only')) }}
            {{ Form::text('search', Input::get('search'), array('class' => 'form-control test-search')) }}
		</div>
		<div class="form-group">
			{{ Form::button("<span class='glyphicon glyphicon-search'></span> ".trans('messages.search'), 
		        array('class' => 'btn btn-primary', 'id' => 'filter', 'type' => 'submit')) }}
		</div>
	{{ Form::close() }}
	<br> -->
	


@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		EVENTS SUMMARY 
		
		

		
		
	</div>
	
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Name</th>
					<!-- <th>Thematic Area</th> -->
					<!-- <th>Strategic Plan</th> -->
					<!-- <th>Sub-Objective</th> -->
					<th>ActionPoints</th>
					<th>Status</th>
					<th>Actions</th>
					<!-- <th>Report</th> -->

				</tr>
			</thead>
			<tbody>
				
			@foreach($events as $key => $event)
				<tr style="color: blue" @if(Session::has('activeevent'))
						{{(Session::get('activeevent') == $event->id)?"class='info'":""}}
					@endif
				>
					
					<td>{{ $event->id }}</td>
					<td>{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
					<td>{{ $event->name }}</td>
					<!-- <td> @if($event->thematicArea_id)
          {{ $event->thematicarea->name }}
        @endif</td>
					<td> @if($event->department_id)
          {{ $event->department->name }}
         @endif</td> 
					<td>@if($event->workplan_id) {{ $event->workplan->workplan }}
					@endif</td> -->
					<td> <ol>
          @foreach ($event->action as $action)
          <li>{{$action->action}}</li>
    				
    				@if(Auth::user()->can('update_actions') && ($action->action_status_id == 0))
         
          <a class="btn btn-sm btn-info" href="{{ URL::to("action/" . $action->id . "/edit") }}" >
      <span class="glyphicon glyphicon-eye-open"></span>Resolution
    </a>
    	@endif
          @endforeach
          </ol></td>
					<td>
          @foreach ($event->action as $action)
          		<!-- <ul><li> -->
                	@if(($action->action_status_id == 0))
                <!-- <p><span class="glyphicon glyphicon-remove" hidden></span> -->

                		<?php
						$date1 = date_create($action->date);
						$date2 = new DateTime();

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						if($diff->d == 0){
								echo "The deadline is today.";

						}
						elseif ($diff->m == 1) {
							//$results = $diff->format("%m") ." month.";

										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										
										
									}

								elseif($diff->d >= 1 && $diff->d <= 6){
										echo '<span style="color:#000000;text-align:center;" class="glyphicon glyphicon-star"></span>';echo '' . $diff->format("%d") ." days.";
								}
								elseif ($diff->d >= 7) {
									if ($diff->d >= 7 && $diff->d <= 13) {
										echo '<span style="color:#0000FF;text-align:center;" class="glyphicon glyphicon-star glyphicon glyphicon-star"></span>';
										

									}
									elseif ($diff->d >= 14 && $diff->d <= 20) {
										echo '<span style="color:#00FF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#00FF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										
									}
									elseif ($diff->d >= 21 && $diff->d <= 28) {
										echo '<span style="color:#FFFF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FFFF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FFFF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										
									}
									elseif ($diff->m >= 2) {
							//$results = $diff->format("%m") ." month.";

										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '' . $diff->format("%m") ." months.";
										
										
									}
									
									
							}
						// echo ' '.$diff->format("%d:%h");
						?>
				</p>
                	 @else
                <p><span class="glyphicon glyphicon-ok"></span></p>
                <!-- <label class="checkbox-inline">
                	  <input type="checkbox" id="1" name="thisonetocheck1" class="glyphicon glyphicon-ok">
                	</label> -->
                @endif
                   
               <!--  <label class="checkbox-inline">
                    <input type="checkbox" id="2" class="thisonetocheck2" checked>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="3" class="thisonetocheck3" checked>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="4" class="thisonetocheck4" checked>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="5" class="thisonetocheck5" checked> 
           		 </label> -->
           <!--  </li>
                
					</ul> -->
                @endforeach
					</td>
					
					<td><a class="btn btn-sm btn-info" href="{{ URL::route('event.print', array($event->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-eye-open"></span>View Details
    </a></td>
					
       @if(Auth::user()->can('download_report'))
					<!-- <td>
					@if ($event->reports)
          			<a href="{{ URL::to( 'attachments/' . $event->reports) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td> -->
					@endif
					

					
				</tr>
			@endforeach

			@foreach($meetings as $key => $meetings)
				<tr  @if(Session::has('activemeetings'))
						{{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
					@endif
				>
					
					<td style="color: green">{{ $meetings->id }}</td>
					<td>{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M Y', strtotime($meetings->end_time)) }}</td>
					<td>{{ $meetings->name }}</td>
					<!-- <td>@if($meetings->thematicArea_id)
						{{ $meetings->thematicarea->name }}
					@endif</td>
					<td> @if($meetings->department_id)
          {{ $meetings->department->name }}
        @endif</td>
					<td>@if($meetings->workplan_id)
          {{ $meetings->workplan->workplan }}
        @endif</td> -->
					<td> <ol>
          @foreach ($meetings->maction as $maction)
          <li>{{$maction->action}}</li>
    				
    				@if(Auth::user()->can('update_actions') && ($maction->action_status_id == 0))
         
          <a class="btn btn-sm btn-info" href="{{ URL::to("maction/" . $maction->id . "/edit") }}" >
      <span class="glyphicon glyphicon-eye-open"></span>Resolution
    </a>
    	@endif
          @endforeach
          </ol></td>
					<td>
          @foreach ($meetings->maction as $maction)
          		<!-- <ul><li> -->
                	@if(($maction->action_status_id == 0))
                <!-- <p><span class="glyphicon glyphicon-remove" hidden></span> -->

                		<?php
						$date1 = date_create($maction->date);
						$date2 = new DateTime();

						//difference between two dates
						$diff = date_diff($date1,$date2);

						//count days
						if($diff->d == 0){
								echo "The deadline is today.";

						}
						elseif ($diff->m == 1) {
							//$results = $diff->format("%m") ." month.";

										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										
										
									}
								elseif ($diff->m >= 2) {
							//$results = $diff->format("%m") ." month.";

										echo '<span style="color:#FF0000;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '' . $diff->format("%m") ." months.";
										
										
									}

								elseif($diff->d >= 1 && $diff->d <= 6){
										echo '<span style="color:#000000;text-align:center;" class="glyphicon glyphicon-star"></span>';echo '' . $diff->format("%d") ." days.";
								}
								elseif ($diff->d >= 7) {
									if ($diff->d >= 7 && $diff->d <= 13) {
										echo '<span style="color:#0000FF;text-align:center;" class="glyphicon glyphicon-star glyphicon glyphicon-star"></span>';
										

									}
									elseif ($diff->d >= 14 && $diff->d <= 20) {
										echo '<span style="color:#00FF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#00FF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										
									}
									elseif ($diff->d >= 21 && $diff->d <= 28) {
										echo '<span style="color:#FFFF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FFFF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										echo '<span style="color:#FFFF00;text-align:center;" class="glyphicon glyphicon-star"></span>';
										
									}
									
									
							}
						// echo ' '.$diff->format("%d:%h");
						?>
				</p>
                	 @else
                <p><span class="glyphicon glyphicon-ok"></span></p>
                <!-- <label class="checkbox-inline">
                	  <input type="checkbox" id="1" name="thisonetocheck1" class="glyphicon glyphicon-ok">
                	</label> -->
                @endif
                   
               <!--  <label class="checkbox-inline">
                    <input type="checkbox" id="2" class="thisonetocheck2" checked>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="3" class="thisonetocheck3" checked>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="4" class="thisonetocheck4" checked>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="5" class="thisonetocheck5" checked> 
           		 </label> -->
           <!--  </li>
                
					</ul> -->
                @endforeach
					</td>
					<td><a class="btn btn-sm btn-info" href="{{ URL::route('meetings.print', array($meetings->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
  ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-eye-open"></span> View Details
    </a></td>
					
      <!--  @if(Auth::user()->can('download_minutes'))
					<td>
					@if ($meetings->minutes)
          			<a href="{{ URL::to( 'attachment2/' . $meetings->minutes) }}"
            			target="_blank">Download</a>
          			@else Pending
          			@endif	
					</td>
					@endif
					 -->
           			
					
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop