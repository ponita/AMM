<?php

class MeetingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /meeting
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}
		$meetings = Meeting::orderBy('start_time','DESC')->get();
		$meetingsss = Meeting::where('approval_status_id', '=', '0')->orderBy('start_time','DESC')->get();

		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings)
													->with('meetingsss', $meetingsss)
													->withInput($input);
	}

public function meetingtypes($type)
	{
		//
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}


		$meetings = Meeting::where('approval_status_id',0)
							->where('category',$type)
							->orderBy('start_time','ASC')->get();


		$meetingsss = Meeting::where('approval_status_id',0)
							->where('category',$type)
							->orderBy('start_time','ASC')->get();
		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings)
													->with('meetingsss', $meetingsss)
													->withInput($input);
	}

	public function cancelled($type)
	{
		//
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}


		$meetings = Meeting::where('approval_status_id',1)
							->where('approval_status',$type)
							->orderBy('start_time','ASC')->get();


		$meetingsss = Meeting::where('approval_status_id',1)
							->where('approval_status',$type)
							->orderBy('start_time','ASC')->get();
		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings)
													->with('meetingsss', $meetingsss)
													->withInput($input);
	}

	public function posponed($type)
	{
		//
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}


		$meetings = Meeting::where('approval_status_id',1)
							->where('approval_status',$type)
							->orderBy('start_time','ASC')->get();


		$meetingsss = Meeting::where('approval_status_id',1)
							->where('approval_status',$type)
							->orderBy('start_time','ASC')->get();
		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings)
													->with('meetingsss', $meetingsss)
													->withInput($input);
	}

	public function statuses( $action)
	{
		//
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}


		$meetings = Meeting::where('action_status_id', $action)
								->where('approval_status_id',1)
								->orderBy('start_time','ASC')->get();

		$meetingsss = Meeting::where('action_status_id', $action)
								->where('approval_status_id',1)
								->orderBy('start_time','ASC')->get();						
		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings)
													->with('meetingsss', $meetingsss)
													->withInput($input);
	}

	public function unattached($status_id)
	{
		//
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}


		$meetings = Meeting::where('status_id',$status_id)
								->where('approval_status_id',1)
								->orderBy('start_time','ASC')->get();
		$meetingsss = Meeting::where('status_id',$status_id)
								->where('approval_status_id',1)
								->orderBy('start_time','ASC')->get();
		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings)
												->with('meetingsss', $meetingsss)
													->withInput($input);
	}

	public function downloadAttachment($minutes){
        $path=public_path().'/attachment2/'.$minutes;
        return Response::download($path);
}

public function report()
	{
		//
		$events = UNHLSEvent::orderBy('start_date','DESC')->get();
		$meetings = Meeting::orderBy('start_time','DESC')->get();		
		
		return View::make('meetings.report')->with('meetings', $meetings)
											->with('events',$events);
	}

	public function workplans()
	{
		$departmentId =Input::get('department_id');

		$workplan = DepartmentWorkplan::where('department_id', $departmentId)->get();

		return View::make('event.workplanList')
			->with('workplan', $workplan);
	}

	public function strategy()
	{

		$thematicareaId =Input::get('thematicArea_id');
		//$thematicareaId = $id;
		
		$departments = Department::where('thematicArea_id', $thematicareaId)->get();

		return View::make('event.strategyList')
			->with('departments', $departments);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /meeting/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$organisers =['Select organiser']+ Organiser::lists('name','id');

		$thematicAreas =['Select department']+ ThematicAreas::lists('name','id');
		
		$departments =['Select department']+ Department::lists('name','id');

		$departmentworkplan = ['Select workplan']+DepartmentWorkplan::orderBy('workplan')->lists('workplan','id');
		
		$audiencedata = AudienceData::orderBy('name')->get();
		
		$agenda = MeetingAgenda::lists('agenda','id');
		//
		return View::make('meetings.meeting')->with('organisers', $organisers)
										->with('audiencedata', $audiencedata)
											->with('agenda', $agenda)
											->with('departmentworkplan', $departmentworkplan)
										->with('departments', $departments)
										->with('thematicAreas', $thematicAreas);


	}

	/**
	 * Store a newly created resource in storage.
	 * POST /meeting
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'user_id' => 'required',
			'name' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',
			'targetAudience' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::route('meetings.meeting')
                ->withErrors($validator)
                ->withInput(Input::except('agenda'));
		}
		else { 
			// store

		$meetings = new Meeting;

		$meetings->user_id = Input::get('user_id');
		$meetings->name = Input::get('name');
		$meetings->category = Input::get('category');
		$meetings->department = Input::get('department');
		$meetings->department_id = Input::get('department_id');
		$meetings->workplan_id = Input::get('workplan');
		$meetings->organiser_id = Input::get('organiser');
		$meetings->start_time = Input::get('start_time');
		$meetings->end_time = Input::get('end_time');
		$meetings->venue = Input::get('venue');
		$meetings->objective = Input::get('objective');
		$meetings->participants_no = Input::get('participants_no');
		$meetings->user->name = Auth::user()->email;
		$meetings->status_id = 1;
		$meetings->approval_status_id = 0;
		$meetings->action_status_id = 1;
		 $meetings->save();

		 
		// $meetings->serial_no = $meetings->getUidd();
		// 		$meetings->save();
		// 		$uidd = new UiddGenerator; 
		// 	$uidd->save();

		// $agendas = Input::get('agenda');
		// foreach($agendas as $ag) {
		// $agenda = new MeetingAgenda;
		// $agenda->meeting_id = $meetings->id;
		// $agenda->agenda= $ag;
		// $agenda->save();
		// }

		$audiences = Input::get('targetAudience');
		foreach ($audiences as $aud) {
			$targetAudience = new TargetAudience;
			$targetAudience->meeting_id = $meetings->id;
			$targetAudience->targetAudience=$aud;
			$targetAudience->save();			# code...
		}

	// 	if ($meetings->category == 'Internal') {
	// 	 	$emails = ['ritaneragu@gmail.com','lunyolosarah@gmail.com','poniagusto@gmail.com','sandykagame@gmail.com','pronam@gmail.com','sewyisaac@yahoo.co.uk'];
	// 	Mail::send('meetings.approval',
	// 				array('user_id'=>Input::get('user_id'),'name'=>Input::get('name')),
	// 				function($message) use ($emails){
	// 					$message->to($emails)->subject('System Alerts');
	// 				});
	// 	}else{
	// 	 	$emails = ['naidarayaan@gmail.com','nambozosusan@gmail.com','poniagusto@gmail.com','sula2050@gmail.com','sndidde@gmail.com'];
		
	// 	Mail::send('meetings.approval',
	// 				array('user_id'=>Input::get('user_id'),'name'=>Input::get('name')),
	// 				function($message) use ($emails){
	// 					$message->to($emails)->subject('System Alerts');
	// 				});
	// }
	//	saving the attached report
		// if (Input::hasFile('minutes')) {
  //       	$file = Input::file('minutes');
  //       	$destinationPath = public_path().'\attachment2';
  //       	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
  //       	$filename = 'Minutes'.$meetings->id . '_' . $file->getClientOriginalName();
  //       	$uploadSuccess = $file->move($destinationPath, $filename);

  //       	//$meetings->report_path = $destinationPath .'\\'. $filename;
  //       	$meetings->minutes = $filename;
  //       	$meetings->save();
  //   	}
		// 		$email = $meetings->user->email = Input::get('chairperson');

		
		// Mail::send('meetings.mailer', array('email' => $email), function($message) use ($email){
		// 		$message->from('poniagusto@gmail.com', 'ACTIVITY MODULE NOTIFICATIONS');
		// 	$message->to($email, $email)->subject('Message sent to the secretariat desk');

		// });
		


		return Redirect::to('meetings')->with('message', 'Successfully registered an activity with ID No '.$meetings->id)
								// ->with('message', 'Successfully registered an activity with ID No '.$agenda->meeting_id)
								->with('message', 'Successfully registered an activity with ID No '.$targetAudience->meeting_id);
			
	
		}
	}



	/**
	 * Display the specified resource.
	 * GET /meeting/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$meetings = Meeting::find($id);

		$firstInsertedId = DB::table('unhls_meetings')->min('id');
		$lastInsertedId = DB::table('unhls_meetings')->max('id');
		
		$id>=$lastInsertedId ? $nextmeetings=$lastInsertedId : $nextmeetings = $id+1;
		$id<=$firstInsertedId ? $previousmeetings=$firstInsertedId : $previousmeetings = $id-1;

		//Show the view and pass the $meetings to it
		
		
		 $html = View::make('meetings.showmeeting')->with('meetings', $meetings)
		->with('nextmeetings', $nextmeetings)
		->with('previousmeetings', $previousmeetings);

		// $html = View::make('meetings.show')->with('meetings', $meetings);

		/*$pdf = new MYPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		*/// return $pdf->output($meetings->id.'.pdf');
		return $html;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /meeting/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$meetings = Meeting::find($id);
		$districts = District::orderBy('name')->lists('name','id');
		$organisers = Organiser::orderBy('name')->lists('name','id');
		$audiencedata = AudienceData::orderBy('name')->get();
		// $departments =['Select department']+ Department::lists('name','id');
		$departmentworkplan = ['Select workplan']+DepartmentWorkplan::orderBy('workplan')->lists('workplan','id');

		$thematicAreas = ThematicAreas::orderBy('name')->lists('name','id');
		
		return View::make('meetings.m_edit')->with('meetings', $meetings)->with('districts', $districts)
										->with('organisers', $organisers)
										->with('audiencedata', $audiencedata)
										// ->with('departments', $departments)
										->with('departmentworkplan', $departmentworkplan)
										->with('thematicAreas', $thematicAreas);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /meeting/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'user_id' => 'required',
			'name' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
		// update
		$meetings = Meeting::find($id);

		$meetings->user_id = Input::get('user_id');
		$meetings->name = Input::get('name');
		$meetings->chairperson = Input::get('chairperson');
		$meetings->category = Input::get('category');
		$meetings->thematicArea_id = Input::get('thematicarea');
		$meetings->department = Input::get('department');
		// $meetings->workplan_id = Input::get('workplan');
		$meetings->organiser_id = Input::get('organiser');
		$meetings->start_time = Input::get('start_time');
		$meetings->end_time = Input::get('end_time');
		$meetings->venue = Input::get('venue');
		$meetings->objective = Input::get('objective');
		$meetings->participants_no = Input::get('participants_no');
		

		$meetings->save();

		$agendas = Input::get('agenda');
		foreach($agendas as $ag) {
		$agenda = new MeetingAgenda;
		$agenda->meeting_id = $meetings->id;
		$agenda->agenda= $ag;
		$agenda->save();
		}

	

		//saving the attached report
		// if (Input::hasFile('minutes')) {
  //       	$file = Input::file('minutes');
  //       	$destinationPath = public_path().'\attachment2';
  //       	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
  //       	$filename = 'Minutes'.$meetings->id . '_' . $file->getClientOriginalName();
  //       	$uploadSuccess = $file->move($destinationPath, $filename);

  //       	//$meetings->report_path = $destinationPath .'\\'. $filename;
  //       	$meetings->minutes = $filename;
  //       	$meetings->save();
  //   	}
		return Redirect::to('meetings')->with('message', 'Successfully updated meetings information for ID No '.$meetings->id)
								->with('message', 'Successfully registered an activity with ID No '.$agenda->meeting_id);
	
		}
	}

		public function print($id)
			{
				// return View::make('reportHeader');

				$meetings = Meeting::find($id);
		// Log::info($meetings);
			
				$firstInsertedId = DB::table('unhls_meetings')->min('id');
				$lastInsertedId = DB::table('unhls_meetings')->max('id');
				
				$id>=$lastInsertedId ? $nextmeetings=$lastInsertedId : $nextmeetings = $id+1;
				$id<=$firstInsertedId ? $previousmeetings=$firstInsertedId : $previousmeetings = $id-1;

				//Show the view and pass the $meetings to it
				// $html = View::make('meetings.showmeeting')->with('meetings', $meetings)
				// ->with('nextmeetings', $nextmeetings)
				// ->with('previousmeetings', $previousmeetings);

				$html = View::make('meetings.print')->with('meetings', $meetings);

				$pdf = new MYPDF;
				$pdf->AddPage();
				$pdf->SetFont('', '', 10);
				$pdf->writeHTML($html, true, false, false, false, '');
				
				return $pdf->output($meetings->id.'.pdf');
				// return $html;
			}

	
	public function editposponed($id)
	{
		$meetings = Meeting::find($id);
		
		return View::make('meetings.editposponed')->with('meetings', $meetings);
	}

	public function updateposponedmeeting($id)
	{
		$rules = array(
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
		// update
		$meetings = Meeting::find($id);

		$meetings->approval_status = Input::get('approvalstatus');
		$meetings->approvedby = Input::get('approvedby');
		$meetings->comment = Input::get('comment');
		$meetings->start_time = Input::get('start_time');
		$meetings->end_time = Input::get('end_time');
		$meetings->user->name = Input::get('name');
		$meetings->approvedon = \Carbon\Carbon::now()->toDateTimeString();
		
		$meetings->approval_status_id = 2;
		$meetings->save();

 
   
		return Redirect::to('meetings')->with('message', 'Successfully updated meetings information for ID No '.$meetings->id);
	
		}
	}

	public function editapproval($id)
	{
		$meetings = Meeting::find($id);
		
		return View::make('meetings.editapproval')->with('meetings', $meetings);
	}

	public function updateEditedApproval($id)
	{
		$rules = array(
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
		// update
		$meetings = Meeting::find($id);

		$meetings->approval_status = Input::get('approvalstatus');
		$meetings->approvedby = Input::get('approvedby');
		$meetings->comment = Input::get('comment');
		$meetings->user->name = Input::get('name');
		$meetings->approvedon = \Carbon\Carbon::now()->toDateTimeString();
		
		$meetings->approval_status_id = 1;
		$meetings->save();

 
   
		return Redirect::to('meetings')->with('message', 'Successfully updated meetings information for ID No '.$meetings->id);
	
		}
	}

	public function addminutes($id)
	{
		$meetings = Meeting::find($id);


		return View::make('meetings.addminutes')->with('meetings', $meetings);
	}


public function updateminutes($id)
	{
		$meetings = Meeting::find($id);
		
		if (Input::hasFile('minutes')) {
        	$file = Input::file('minutes');
        	$destinationPath = public_path().'\attachment2';
        	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
        	$filename = 'Minutes'.$meetings->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);


// dd($uploadSuccess);

        	//$meetings->report_path = $destinationPath .'\\'. $filename;
        	$meetings->minutes = $filename;
        	$meetings->status_id = 2;
        	$meetings->save();
    	}
		return Redirect::to('meetings')->with('message', 'Successfully uploaded minutes information for ID No '.$meetings->id);
	
		}
	// public function meeting()
	// {
	// 	// $meetings = Meeting::find($id);
		
	// 	return View::make('meetings.meeting');
	// }

	public function meetingreport()
	{
		//
		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');
		// $name = Input::get('name');
		$thematicArea = Input::get('department');
		
		

		//$events = UNHLSEvent::get();
		
		
		if($datefrom != '' or $name){
			$meetings = Meeting::reportfilters($datefrom,$dateto,$thematicArea);
		}
		else{
		$meetings = '';
		}

		if(Input::has('word')){
				$date = date("Ymdhi");
				$fileName = "daily_visits_log_".$date.".doc";
				$headers = array(
				    "Content-type"=>"text/html",
				    "Content-Disposition"=>"attachment;Filename=".$fileName
				);
				$content = View::make('reports.mreportlog')
								->with('meetings', $meetings)
								->withInput(Input::all());
		    	return Response::make($content,200, $headers);
			}
			else{

		return View::make('reports.meetingreport')->with('meetings', $meetings);
	}
}

	public function detailed()
	{
		$meetings = Meeting::orderBy('start_time','DESC')->get();
		//
		$datefrom = Input::get('start_time');
		$dateto = Input::get('end_time');
		$thematicArea = Input::get('department');
		
		
		
		if($datefrom != '' or $thematicArea){
			$meetings = Meeting::detailedfilter($datefrom,$dateto,$thematicArea);
		}
		else{
		$meetings = '';
		}

		

		if(Input::has('word')){
				$date = date("Ymdhi");
				$fileName = "daily_visits_log_".$date.".doc";
				$headers = array(
				    "Content-type"=>"text/html",
				    "Content-Disposition"=>"attachment;Filename=".$fileName
				);
				$content = View::make('reports.exportLog')
								->with('meetings', $meetings)
								->withInput(Input::all());
		    	return Response::make($content,200, $headers);
			}
			else{

		return View::make('reports.detailed')->with('meetings', $meetings);
	}
}

public function download(){
		$test_date_fro = Input::get('start_time');
		$test_date_to = Input::get('end_time');
		if(!empty($test_date_fro) and !empty($test_date_to)){
			$this->csv_download($test_date_fro, $test_date_to);
		}else{
			return View::make('reports.download');
		};
	}

private function csv_download($fro, $to){
		$meetings = Meeting::leftjoin('unhls_meeting_actions as ac', 'ac.meeting_id', '=', 'unhls_meetings.id')
							->leftjoin('unhls_meeting_agenda as pr', 'pr.meeting_id', '=', 'unhls_meetings.id')
						->select('unhls_meetings.*','pr.agenda', 'ac.action','ac.date','ac.location','ac.name')
						->from('unhls_meetings')
						->where('start_time','>=',$fro)
						->where('end_time','<=',$to)
						->get();
		header('Content-Type: text/csv; charset=utf-8');
		header("Content-Disposition: attachment; filename=Report_date_$fro"."_$to.csv");
		$output = fopen('php://output', 'w');
		$headers = array(
				'Date',
				'Time',
				'Title',
				'Venue',
				'Organiser',
				'Agenda',
				'Action Points'
				
				);

		fputcsv($output, $headers);
		foreach ($meetings as $meeting) {
			$row=array(
				$meeting->start_time,
					 date('h:m:i', strtotime($meeting->start_time)),
					 $meeting->name,
					 $meeting->venue,
					 $meeting->organiser->name
					
    //       @foreach ($meeting->agenda as $agenda)
    //       <li>{{$agenda->agenda}}</li>
    //       @endforeach,				
				// <table class="table table-condensed table-bordered" BORDER="1" CELLPADDING="0" CELLSPACING="0" width="100%">
				//     <tr>
				//         <th align="center">Action Point</th>
				//         <th align="center">Person responsible</th>
				//         <th align="center">date</th>
				//         <th align="center">location</th>
				//     </tr>
				//     @foreach($meeting->action as $action)
				//     <tr>
				//         <td>{{ $action['action'] }}</td>
				//         <td align="center">{{ $action['name'] }}</td>
				//         <td align="center">{{ $action['date'] }}</td>
				//         <td align="center">{{ $action['location'] }} </td>
				//     </tr>
				//     @endforeach

				// </table>
				);
			fputcsv($output, $row);	
		}
		fclose($output);

	}

	public function editactions($id)
	{
		$meetings = Meeting::find($id);

		return View::make('meetings.actionpoints')->with('meetings', $meetings);
	}


	public function updateactions($id)
	{
		$meetings = Meeting::find($id);
		
		$meetings->chairperson = Input::get('chairperson');
		$meetings->action_status_id = 2;
    	
    	$mactions = Input::get('action');
		$names = Input::get('name');
		$dates = Input::get('date');
		$locations = Input::get('location');
		foreach ($mactions as $k=>$ac) {
			$maction = new UNHLSMeetingAction;
			$maction->meeting_id = Input::get('meeting_id');
			$maction->action = $ac;
			$maction->name = $names[$k];
			$maction->date = $dates[$k];
			// $maction->location =$locations[$k];
			$maction->save();			# code...
		}

		$agendas = Input::get('agenda');
		foreach($agendas as $ag) {
		$agenda = new MeetingAgenda;
		$agenda->meeting_id = $meetings->id;
		$agenda->agenda= $ag;
		$agenda->save();
		}


		if (Input::hasFile('plist')) {
        	$file = Input::file('plist');
        	$destinationPath = public_path().'\attachment2';
        	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
        	$filename = 'List'.$meetings->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);
        	$meetings->plist = $filename;

        }
		$meetings->save();


		return Redirect::to('meetings')->with('message', 'Successfully updated recommendations for for ID No '.$maction->meeting_id)
			->with('message', 'Successfully registered an activity with ID No '.$agenda->meeting_id);
									
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /meeting/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}