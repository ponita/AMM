    <!DOCTYPE html>
    <html>
    <head>
      <div id="topcorner"><b>{{$appointment->ref_no}}</b></div>
      <title></title>
      <div id="topcorner"><b>{{$appointment->ref_no}}</b></div>
        
    </head>
    
    
    <style type="text/css">
    .topcorner{
   position:absolute;
   top:0;
   right:0;
  }
  ul {
  list-style-type: none;
}
    table {
      padding: 2px;
    }
    </style>
    <?php
    $testedBy = '';
    ?>
      <div id="topcorner"><b>{{$appointment->ref_no}}</b></div>

    <body>
    <table>

        <tr>
          <td colspan="3"><b>{{$appointment->date}}</b></td>
        </tr>
        <br>
        <tr>
          <td><b>To:</b> {{ $appointment->receiver }}</td>
        </tr>
         <br>
          <tr>
          <td><b>Dear</b> {{ $appointment->dear }},</td>
        </tr>
    <br>
        <tr>
          <td colspan="3"><b>RE: {{ $appointment->ref }}</b></td>
        </tr>

        <tr>
          <td colspan="3">{{ $appointment->body }}</td>
        </tr>
        <br>
        <tr>
          <td colspan="3"><b>Yours sincerely,</b></td>
        </tr>

<div class="row">
  <div class="col-md-3" style="text-align:center;">
  <img class="img-circle" src="">

  </div >
</div>
        <tr>
          <td colspan="3">Dr. Nabadda Suzan</td>
        </tr>
          <tr>
          <td colspan="3">Head, Laboratory Services-CPHL/MOH</td>
          </tr>
         
          <tr>
            <td colspan="2"><b>CC:</b><ul>
              @if($appointment->copied)
          @foreach ($appointment->copied as $copied)
          <li>{{$copied->copied}}</li>
          @endforeach
          @endif
          </ul></td>
          </tr>
</table>
    </body>
    </html>

    