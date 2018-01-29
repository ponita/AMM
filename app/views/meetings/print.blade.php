    <!DOCTYPE html>
    <html>
    <head>
      <title></title>
    </head>
    
    
    <style type="text/css">
    table {
      padding: 2px;
    }
    </style>
    <?php
    $testedBy = '';
    ?>

    <body>
  
          <table  style="border-bottom: 1px solid #cecfd5;" >

        <tr>
          <td colspan="3" align="center"><b>{{$meetings->name}}</b></td>
        </tr>
        </table>
          
          <table  style="border-bottom: 1px solid #cecfd5;" >

        <tr>
          <td colspan="1"><b>Date</b></td>
          <td colspan="2">{{ date('d M Y', strtotime($meetings->start_time)) }}</td>
          <td class="col-sm-1"><strong>Duration</strong></td>
        <td class="col-sm-3">
            <?php
            $date1 = date_create($meetings->start_time);
            $date2 = date_create($meetings->end_time);

            //difference between two dates
            $diff = date_diff($date1,$date2);

            //count days
            echo ' '.$diff->format("%h hr %i min");
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="1"><b>Venue</b></td>
          <td colspan="3">{{ $meetings->venue }}</td>
        </tr>
        
        <tr>
          <td colspan="1"><b>Number of Participants</b></td>
          <td colspan="3">{{ $meetings->participants_no }}</td>
        </tr>
       

        <tr>
          <td colspan="3"><u>Objective</u></td>
        </tr>
         
        <tr>
          <td colspan="3">{{$meetings->objective}}</td>
        </tr>

        <tr>
          <td colspan="3"><b>Meeting Agenda</b></td>
          </tr>
          <tr>
          <td colspan="3"><ol>
          @foreach ($meetings->agenda as $agenda)
          <li>{{$agenda->agenda}}</li>
          @endforeach</ol></td>
        </tr>
       </table>
          <table >

        <tr>
         <td colspan="3">Compiled by</td>
        </tr>
        
        <tr>
        <td colspan="3">{{ $meetings->user->name }}</td>
        </tr>
   
</table>

    </body>
    </html>

    