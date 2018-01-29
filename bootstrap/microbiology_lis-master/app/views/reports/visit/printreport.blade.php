    <style type="text/css">
    table {
      padding: 2px;
    }
    </style>
    <?php
    $testedBy = '';
    ?>
    <table>
        <tr>
          <td><b>Facility Name</b></td>
          <td>{{$specimen->referral->facility->name}}</td>
          <td><b>Date Received</b></td>
          <td>{{$specimen->time_accepted}}</td>
        </tr>
        <tr>
          <td><b>Patient Name</b></td>
          <td>{{ $specimen->patient->name }}</td>
          <td><b>Specimen Type</b></td>
          <td>{{ $specimen->specimenType->name }}</td>
        </tr>
        <tr>
          <td><b>{{ trans('messages.patient-id')}}</b></td>
          <td>{{ $specimen->patient->patient_number}}</td>
          <td><b>Lab ID</b></td>
          <td>{{ $specimen->lab_id }}</td>
        </tr>
        <tr>
          <td><b>{{ trans('messages.gender')}} & {{ trans('messages.age')}}</b></td>
          <td>{{ $specimen->patient->getGender(false) }} | {{ $specimen->patient->getAge()}}</td>
          <!-- todo: uncomment when functionality is done -->
          <td><!-- Study No. --></td>
          <td></td>
        </tr>
    </table>
    <table style="border-bottom: 1px solid #cecfd5;">
        <tr>
         <td colspan="3">Laboratory Findings</td>
        </tr>
    </table>

    <table style="border-bottom: 1px solid #cecfd5;">
        <tr>
         <td colspan="1"><b>Test</b></td>
         <td colspan="2"><b>Results</b></td>
         <td colspan="1"><b>Comments</b></td>
        </tr>
    </table>
    @forelse($specimen->tests as $test)
        @if(!$test->testType->isCulture() && ($test->isCompleted() || $test->isVerified()))
        <?php
          if ($test->isCompleted() || $test->isVerified()) {
            $testedBy = $test->testedBy->name;
          }
        ?>
        <table style="border-bottom: 1px solid #cecfd5;">
          <tr>
             <td colspan="1">{{ $test->testType->name }}</td>
             <td colspan="2">
                @foreach($test->testResults as $result)
                  @if($test->testType->measures->count() > 1)
                  {{ Measure::find($result->measure_id)->name }}:
                  @endif
                  {{ $result->result }}
                  {{ Measure::getRange($test->specimen->patient, $result->measure_id) }}
                  {{ Measure::find($result->measure_id)->unit }}
                @endforeach
             </td>
             <td colspan="1">
                {{ $test->interpretation }}
             </td>
          </tr>
        </table>
        @endif
    @empty
    <table style="border-bottom: 1px solid #cecfd5;">
     <tr>
        <td colspan="3">{{trans("messages.no-records-found")}}</td>
     </tr>
    </table>
    @endforelse
        <br>
        @foreach($specimen->tests as $test)
        @if($test->testType->isCulture())
        <!-- Culture and Sensitivity analysis -->
        <?php
          if ($test->isCompleted() || $test->isVerified()) {
            $testedBy = $test->testedBy->name;
          }
        ?>

        @if(count($test->isolated_organisms)>0)<!-- if there are any isolated organisms -->
        <br>
        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
              <td colspan="3">Antimicrobial Susceptibility Testing(AST)</td>
            </tr>
            <tr>
                <th><b>Organism(s)</b></th>
                <th><b>Antibiotic(s)</b></th>
                <th><b>Result(s)</b></th>
            </tr>
        </table>
        @foreach($test->isolated_organisms as $isolated_organism)
        <table style="border-bottom: 1px solid #cecfd5;">
          <tr>
            <td rowspan="{{$isolated_organism->drug_susceptibilities->count()}}" class="organism">{{$isolated_organism->organism->name}}</td>
              <?php $i = 1; ?>
            @if($isolated_organism->drug_susceptibilities->count() == 0)
              </tr>
            @else
              @foreach($isolated_organism->drug_susceptibilities as $drug_susceptibility)
                @if ($i > 1)
                <tr>
                @endif
                <?php $i++; ?>
                <td class="antibiotic">{{$drug_susceptibility->drug->name}}</td>
                <td class="result">{{$drug_susceptibility->drug_susceptibility_measure->symbol}}</td>
              </tr>
              @endforeach
            @endif
        </table>
        @endforeach

        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
              <td>Comment(s)</td>
              <td colspan="2">
              {{$test->interpretation}}
              </td>
            </tr>
        </table>

        <br>

        <table style="border-bottom: 1px solid #cecfd5;">
            <tr>
               <td colspan="2">Result Guide</td>
               <td colspan="4" style="text-align:left;">S-Sensitive | R-Resistant | I-Intermediate</td>
            </tr>
        </table>
        @else<!-- if there are no isolated organisms -->
        <table>
          <caption>Antimicrobial Susceptibility Testing(AST)</caption>
        </table>

        @if($test->culture_observation)<!-- if there are comments -->
        <table>
              <tr>
                <td>{{ $test->culture_observation->observation }}</td>
              </tr>
        </table>
        @endif<!--./ if there are comments -->

        @endif<!--./ if there are no isolated organisms -->
        @endif
        @endforeach
        <br>
        <br>
        <table>
            <tr>
              <td><b>Test/Analysis Performed by:</b></td>
              <td>{{ $testedBy }}</td>
              <td>Signed:</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><b>Reviewed by:</b></td>
              <td></td>
              <td>Signed:</td>
            </tr>
        </table>
