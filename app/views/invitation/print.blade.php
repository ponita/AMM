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
          <td colspan="2"><b>To:</b> Head, Laboratory Services-CPHL/MOH<br>
            Dr. Nabadda Suzan<br></td>
          </tr>
        <tr>
          <td colspan="1">Dear Madam,</td>
          <td colspan="3"></td>
          </tr>
          <br>
          <tr>
          <td colspan="3"><b>RE: {{ $appointment->reference }}</b></td>
          </tr>
<br>
          <tr>
          <td colspan="3">{{ $appointment->body }}</td>
          </tr>
          <br>
        <tr>
          <td colspan="3"><b>Objective</b></td>
          </tr>

          <tr>
          <td colspan="3">{{ $appointment->objective }}</td>
          </tr>
<br>
          <tr>
          <td colspan="3"><b>Output</b></td>
          </tr>
          <tr>
          <td colspan="3">{{ $appointment->output }}</td>
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

    