@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
  <li><a href="{{ URL::route('event.index') }}">Activities</a></li>
  <li class="active">Activity Details</li>
  </ol>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span>Activity Details
            
  <div class="panel-btn">
    <a class="btn btn-sm btn-info" href="{{ URL::route('event.show', array($previousevent)) }}" >
      <span class="glyphicon glyphicon-backward"></span> Previous
    </a>
        
    <a class="btn btn-sm btn-info" href="{{ URL::route('event.show', array($nextevent)) }}" >
      Next <span class="glyphicon glyphicon-forward"></span>
    </a>



     <!-- <a class="btn btn-sm btn-info" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> -->
     <a class="btn btn-sm btn-info" href="{{ URL::route('event.print', array($event->id)) }}" href="javascript:printSpecial('UGANDA NATIONAL HEALTH LABORATORY SERVICES - ACTIVITIES REPORTING <br> 
	ACTIVITY STATUS/DETAILS')" target="_blank">
      <span class="glyphicon glyphicon-print"></span> PRINT
    </a> 

    <div class="panel-body">
        </div>
                
  </div>
  </div>
        
  <div class="panel-body">
  <div class="display-details">

  <div id="printReady">
            
    <div class="panel panel-info">
    <div class="panel-body">
                
      <div class="row view-striped">
        <div class="col-sm-1"><strong>ID #</strong></div>
        <div class="col-sm-2" style="color:red;"><strong>{{ $event->id }}</strong></div>
        
        <div class="col-sm-2"><strong>Activity</strong></div>
        <div class="col-sm-7">{{ $event->name }}</div>
      </div>
	  
	  <div class="row view-striped">
        <div class="col-sm-2"><strong>Registered by</strong></div>
        <div class="col-sm-4">{{ $event->user->name }}</div>
        
        <div class="col-sm-2"><strong>Approval Status</strong></div>
        <div class="col-sm-4">{{ $event->approval_status }} 
			@if ($event->approval_status) ({{ $event->approvedby }} / {{ $event->approvedon }})
			@endif
      </div>
      </div>

      <div class="row  view-striped">
       <div class="col-sm-2"><strong>Date</strong></div>
     <div class="col-sm-4">{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</div>
      <div class="col-sm-2"><strong>Duration</strong></div>
      <td colspan="1">
            <?php
            $date1 = date_create($event->start_date);
            $date2 = date_create($event->end_date);

            //difference between two dates
            $diff = date_diff($date1,$date2);

            //count days
            echo ' '.$diff->format("%d days %h hrs");
            ?>
          </td>
		
      
      </div>
      
      <div class="row  view-striped">
        <div class="col-sm-2"><strong>Department</strong></div>
        <div class="col-sm-4">
           <!-- @if($event->thematicArea_id) -->
          {{ $event->department }}
        <!-- @endif -->
          </div>
        
        <div class="col-sm-2"><strong>Type</strong></div>
        <div class="col-sm-4">{{ $event->type }}</div>
        </div>

       <!-- <div class="row  view-striped">
        <div class="col-sm-2"><strong>Strategic Plan</strong></div>
        <div class="col-sm-4">
           @if($event->department_id)
          {{ $event->department->name }}
        @endif
          </div>
        
        <div class="col-sm-2"><strong>Workplan</strong></div>
        <div class="col-sm-4">
         @if($event->workplan_id)
          {{ $event->workplan->workplan }}
        @endif</div>
        </div> -->

       <!--  <div class="row  view-striped">
        <div class="col-sm-2"><strong>Hub</strong></div>
        
        
        
        <div class="col-sm-8"><strong>Facility</strong>
        </div>
      </div> -->
        

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Location</strong></div>
        <div class="col-sm-4" style="">{{ $event->location }}</div>
        
        <div class="col-sm-2"><strong>Venue</strong></div>
        <div class="col-sm-4">{{ $event->premise }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Health Region</strong></div>
        <div class="col-sm-2" style="">
          @if($event->healthregion_id)
          {{ $event->healthregion->name }}
        @endif
        </div>
        <div class="col-sm-2"><strong>District</strong></div>
        <div class="col-sm-2">
          <ul>
            @foreach ($event->eventdistrict as $districts)
          <li>{{ $districts->name }}</li>
          @endforeach
        </ul>
        </div>
        <div class="col-sm-2"><strong>Facilities</strong></div>
        <div class="col-sm-2">
          <ul>
          @foreach ($event->eventhub as $hubs)
          <li>{{ $hubs->hub }}</li>
          @endforeach
        </ul>
        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Funding Source</strong></div>
        <div class="col-sm-2" style="">@if($event->funders_id)
          {{ $event->funder->name}}
        @endif</div>
        
        <div class="col-sm-2"><strong>Organiser</strong></div>
        <div class="col-sm-2">@if($event->organiser_id)
          {{ $event->organiser->name }}/{{ $event->organiser->telephoneNo}}
        @endif</div>

        <div class="col-sm-2"><strong>Co-organiser</strong></div>
        <div class="col-sm-2">{{ $event->co_organiser }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Target Audience</strong>
        <br>
          <ul>
          @foreach ($event->audience as $audience)
          <li>{{$audience->audience}}</li>
          @endforeach
          </ul>
        </div>
        <!-- <div class="col-sm-4" style="">{{ $event->audience }}</div> -->
        
        <div class="col-sm-4"><strong>Participants</strong></div>
        <div class="col-sm-2">{{ $event->participants_no }}</div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-6"><strong>Objectives</strong><br>
          <ul>
          @foreach ($event->objective as $objective)
          <li>{{$objective->objective}}</li>
          @endforeach
          </ul>

        </div>

        <div class="col-sm-6"><strong>Lessons Learnt</strong><br>
          <ul>
          @foreach ($event->lesson as $lesson)
          <li>{{$lesson->lesson}}</li>
          @endforeach
          </ul>

        </div>
      </div>

      <div class="row view-striped">
        <div class="col-sm-6"><strong>Recommendations</strong><br>
          <ul>
          @foreach ($event->recommendation as $recommendation)
          <li>{{$recommendation->recommendation}}</li>
          @endforeach
          </ul>

        </div>

        <div class="col-sm-6"><strong>Action Points</strong><br>
          <!-- <ul>
          @foreach ($event->action as $action)
          <li>{{$action->action}}</li>
          @endforeach
          </ul> -->

                      <table>
    <tr>
        <th>Action</th>
        <th>Name</th>
        <th>date</th>
        <th>location</th>
    </tr>
  <?php
    $i = 0;
    foreach ($event->action as $action) {
        echo "<tr>";
        echo "<td>" . $action['action'] . "</td><td>" . strtolower(trim(($action['name']))) . "</td><td>" . strtolower(trim($action['date'])) . "</td><td>" . strtolower(trim(($action['location']))) . "</td>";
        echo "</tr>";

        $i++;
    }
    ?>

</table>

        </div>
      </div>

      <!-- <div class="row view-striped">
        <div class="col-sm-2"><strong>Participant list</strong></div>
        <div class="col-sm-4" style="">
          @if ($event->report_filename)
          <a href="{{ URL::to( 'attachments/' . $event->report_filename) }}"
            target="_blank">{{ $event->report_filename }}</a>
          @else
          Pending
          @endif
        </div>
        
        <div class="col-sm-2"><strong></strong></div>
        <div class="col-sm-4"></div>
      </div> -->

      <div class="row view-striped">
        <div class="col-sm-2"><strong>Activity Report</strong></div>
        <div class="col-sm-4" style="">
          @if ($event->reports)
          <a href="{{ URL::to( 'attachments/' . $event->reports) }}"
            target="_blank">{{ $event->reports }}</a>
          @else
          Pending
          @endif
        </div>
        
        <div class="col-sm-2"><strong>Paticipant List</strong></div>
        <div class="col-sm-4" style="">
          @if ($event->report_filename)
          <a href="{{ URL::to( 'attachments/' . $event->report_filename) }}"
            target="_blank">{{ $event->report_filename }}</a>
          @else
          Pending
          @endif
        </div>
      </div>
    
    <div class="row view-striped">
        <div class="col-sm-2"><strong>Comment</strong><br></div>
          <div class="col-sm-4">{{ $event->comment }}</div>

        </div>
    </div>
    </div>

  </div>
  </div>
  </div>
</div>
@stop