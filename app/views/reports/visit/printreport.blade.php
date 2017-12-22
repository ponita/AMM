<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
       
    table {
      border-spacing: 0;
      width: 100%;
    }
    th,
    td {
      padding: 10px 15px;
      text-align: left;
    }
    .report-body tr td {
      border-top: 1px solid #cecfd5;
    }
    td.organism,
    td.antibiotic,
    td.comment {
      width: 154px;
    }

    td.result {
      width: 115px;
    }

    .ast-head tr th {
      border-bottom: 1px solid #cecfd5;
    }
    .ast-body tr td.organism,
    .ast-body tr:last-child td {
      border-bottom: 1px solid #cecfd5;
    }
    tfoot tr th, tfoot tr td{
      border-top: 1px solid #cecfd5;
    }
    tfoot tr:first-child th, tfoot tr:first-child td{
      border-top: 0;
    }

    caption{
      text-align: left;
    }

   .ast-table { page-break-inside:avoid; page-break-after:auto }
    </style>
  </head>
  <body>
  <div id="wrap">
      <div class="container-fluid">
          <div class="row">
        @include("reportHeader")
		<table class="report_body">
			<tbody>
				<tr>
					<th>{{ trans('messages.patient-name')}}</th>
					<td>{{ $visit->patient->name }}</td>
					<th>{{ trans('messages.gender')}}</th>
					<td>{{ $visit->patient->getGender(false) }}</td>
				</tr>
				<tr>
					<th>{{ trans('messages.patient-id')}}</th>
					<td>{{ $visit->patient->patient_number}}</td>
					<th>{{ trans('messages.age')}}</th>
					<td>{{ $visit->patient->getAge()}}</td>
				</tr>
				<tr>
					<th>{{ trans('messages.patient-lab-number')}}</th>
					<td>{{ $visit->patient->external_patient_number }}</td>
					<th>{{ trans('messages.requesting-facility-department')}}</th>
					<td>{{ Config::get('kblis.organization') }}</td>
				</tr>
			</tbody>
		</table>
		<table>
			<tbody class="report-body">
				<tr>
					<th colspan="5">{{trans('messages.specimen')}}</th>
				</tr>
				<tr>
					<th>{{ Lang::choice('messages.specimen-type', 1)}}</th>
					<th>{{ Lang::choice('messages.test', 2)}}</th>
				</tr>
				@forelse($visit->tests as $test)
						<tr>
							<td>{{ $test->specimen->specimenType->name }}</td>
							<td>{{ $test->testType->name }}</td>
						</tr>
				@empty
					<tr>
						<td colspan="5">{{trans("messages.no-records-found")}}</td>
					</tr>
				@endforelse

			</tbody>
		</table>
		<table>
         <caption>Laboratory Findings</caption>
         <tbody class="report-body">
            @forelse($visit->tests as $test)
                  <tr>
                     <td>{{ $test->testType->name }}</td>
                     <td colspan="2">
                        @foreach($test->testResults as $result)
                           <p>
                              {{ Measure::find($result->measure_id)->name }}: {{ $result->result }}
                              {{ Measure::getRange($test->visit->patient, $result->measure_id) }}
                              {{ Measure::find($result->measure_id)->unit }}
                           </p>
                        @endforeach
                     </td>
                  </tr>
            @empty
               <tr>
                  <td colspan="3">{{trans("messages.no-records-found")}}</td>
               </tr>
            @endforelse
               <tr>
                  <td rowspan="3">Culture Findings</td>
                  <td><strong>Microorganism(s)</strong></td>
                  <td><strong>Corresponding Serotype(s)</strong></td>
               </tr>
               <tr>
                  <td>Microorganism1</td>
                  <td>Corresponding Serotype1</td>
               </tr>
               <tr>
                  <td>Microorganism2</td>
                  <td>Corresponding Serotype2</td>
               </tr>
         </tbody>
      </table>
        </br>
        </br>
        <!-- Culture and Sensitivity analysis -->
        <table>
          <caption>Antimicrobial Susceptibility Testing(AST)</caption>
          <thead class="ast-head">
            <tr>
                <th class="organism" scope="col">Organism(s)</th>
                <th class="antibiotic" scope="col">Antibiotic(s)</th>
                <th class="result" scope="col">Result(s)</th>
                <th class="comment" scope="col">Comment(s)</th>
            </tr>
          </thead>
        </table>
        @foreach($visit->tests as $test)
        @if($test->testType->microbiologyTestType->worksheet_required)   
        @foreach($test->culture->isolated_organisms as $isolated_organism)
        <table class="ast-table">
            <tbody class="ast-body">
              <tr>
                <td rowspan="{{$isolated_organism->drug_susceptibilities->count()}}"
                  class="organism">{{$isolated_organism->organism->name}}</td>
                  <?php $i = 1; ?>
                @foreach($isolated_organism->drug_susceptibilities as $drug_susceptibility)
                @if ($i > 1)
              <tr>
                @endif <?php $i++; ?>
                <td class="antibiotic">{{$drug_susceptibility->drug->name}}</td>
                <td class="result">{{$drug_susceptibility->drug_susceptibility_measure->symbol}}</td>
                <td class="comment">-</td>
              </tr>
              @endforeach
            </tbody>
        </table>
        @endforeach
        @endif
        @endforeach

        </hr>

        <table>
          <tbody class="report-body">
            <tr>
               <td>Result Guide</td>
               <td>S-Sensitive | R-Resistant | I-Intermediate</td>
            </tr>
          </tbody>
        </table>

        <hr style="border: 1px solid black;">
        <table>
          <tbody>
            <tr>
              <td>Comment(s)</td>
              <td colspan="2">
              ...................................................................................................................
              </td>
            </tr>
            <tr>
              <td><strong>Reviewed by:</strong></td>
              <td>Name of Officer</td>
              <td>Signed</td>
            </tr>
            <tr>
              <td></td>
              <td>{{ trans('messages.signature-holder') }}</td>
              <td>{{ trans('messages.signature-holder') }}</td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </body>
</html>
