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
          <td colspan="3"><b>RE:</b><u>{{ $appointment->ref }}</u></td>
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
          <td colspan="3">{{ $appointment->name }}</td>
        </tr>
          <tr>
          <td colspan="3">{{ $appointment->title }}</td>
          </tr>
</table>
    </body>
    </html>

    