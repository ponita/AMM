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
    <table>

        <tr>
          <td colspan="3" align="center"><b>{{$meetings->name}}</b></td>
        </tr>
        
        <tr>
          <td colspan="1"><b>Duration</b></td>
          <td colspan="2">{{$meetings->start_time }} 
          to {{$meetings->end_time }}</td>
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
        
        <tr>
         <td colspan="3" style="border-bottom: 1px solid #cecfd5;">Compiled by</td>
        </tr>
        
        <tr>
        <td colspan="3">{{ $meetings->user->name }}</td>
        </tr>
   
</table>

    </body>
    </html>

    