
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
      </table>
      <table  style="border-bottom: 1px solid #cecfd5;" >
        <tr>
          <td colspan="1"><b>Duration</b></td>
          <td colspan="1">{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
          <td colspan="1"><b>Venue</b></td>
          <td colspan="1">{{ $event->premise }}</td>
          <td colspan="1">@if($event->district_id)
          <b>District:</b> {{ $event->district->name}}
         @endif 
            @if($event->country_id)
          <b>Country:</b> {{ $event->country->name}}
         @endif </td>
        </tr>
        <tr>
        
          <td colspan="4"><b>No. of Participants</b></td>
          <td colspan="6">{{ $event->participants_no }}</td>
          </tr>
          </table>
          <table  style="border-bottom: 1px solid #cecfd5;" >
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
        <th align="center">Person responsible</th>
        <th align="center">Deadline</th>
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

    