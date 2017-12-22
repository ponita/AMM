
    <style type="text/css">
    table {
      padding: 2px;
    }
    </style>
    
    <body>

    <table  style="border-bottom: 1px solid #cecfd5;" >

        <tr>
          <td colspan="1"><b>Activity:</b></td>
          <td colspan="3"><b>{{$event->name}}</b></td>
          <td colspan="1"><b>Date</b></td>
          <td colspan="3">{{$event->start_date}}</td>
        </tr>
        <tr>
          <td colspan="1"><b>Duration</b></td>
          <td colspan="3">{{ date('d M Y', strtotime($event->start_date)) }} 
          to {{ date('d M Y', strtotime($event->end_date)) }}</td>
          <td colspan="1"><b>Venue</b></td>
          <td colspan="3">{{ $event->premise }}</td>
        </tr>
        <tr>
        
          <td colspan="3"><b>Number of Participants</b></td>
          <td colspan="3">{{ $event->participants_no }}</td>
          </tr>
          
          <tr>
          <td colspan="3" style="border-bottom: 1px solid #cecfd5;"><b>Objective</b></td>
          </tr>
          <tr>
          <td colspan="3"><ul>
          @foreach ($event->objective as $objective)
          <li>{{$objective->objective}}</li>
          @endforeach</ul></td>
        </tr>

        <tr>
          <td colspan="3" style="border-bottom: 1px solid #cecfd5;"><b>Lessons Learnt</b></td>
          </tr>
          <tr>
          <td colspan="3"><ul>
           @foreach ($event->lesson as $lesson)
          <li>{{$lesson->lesson}}</li>
          @endforeach</ul></td>
        </tr>

        <tr>
          <td colspan="3" style="border-bottom: 1px solid #cecfd5;"><b>Recommendations</b></td>
          </tr>
          <tr>
          <td colspan="3"><ul>
          @foreach ($event->recommendation as $recommendation)
          <li>{{$recommendation->recommendation}}</li>
          @endforeach</ul></td>
        </tr>

        <tr>
          <td colspan="3" style="border-bottom: 1px solid #cecfd5;"><b>Action Points</b></td>
          </tr>
          <tr>
          <td colspan="9">
            <table class="table table-condensed table-bordered" BORDER="1" CELLPADDING="0" CELLSPACING="0" width="100%">
    <tr>
        <th class="warning" align="center">Action</th>
        <th align="center">Name</th>
        <th align="center">date</th>
        <th align="center">location</th>
    </tr>
    @foreach($event->action as $action)
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
   
        <tr>
         <td colspan="3" style="border-bottom: 1px solid #cecfd5;">Compiled by</td>
        </tr>
        <tr>
        <td colspan="3">{{ $event->user->name }}</td>
      </tr>
   

    </body>
    </html>

    