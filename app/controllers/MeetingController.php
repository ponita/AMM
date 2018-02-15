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
		$meetings = Meeting::orderBy('start_time','DESC')->get();
		// $meetingss = Meeting::find($id);		
		
		return View::make('meetings.meetingindex')->with('meetings', $meetings);
	}

	public function downloadAttachment($minutes){
        $path=public_path().'/attachment2/'.$minutes;
        return Response::download($path);
}

public function report()
	{
		//
		$meetings = Meeting::orderBy('start_time','DESC')->get();		
		
		return View::make('meetings.report')->with('meetings', $meetings);
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

		$agenda = MeetingAgenda::lists('agenda','id');
		//
		return View::make('meetings.meeting')->with('organisers', $organisers)
											->with('agenda', $agenda)
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

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else {
			// store

		$meetings = new Meeting;

		$meetings->user_id = Input::get('user_id');
		$meetings->name = Input::get('name');
		$meetings->category = Input::get('category');
		$meetings->thematicArea_id = Input::get('thematicarea');
		$meetings->organiser_id = Input::get('organiser');
		$meetings->start_time = Input::get('start_time');
		$meetings->end_time = Input::get('end_time');
		$meetings->venue = Input::get('venue');
		$meetings->objective = Input::get('objective');
		$meetings->participants_no = Input::get('participants_no');
		$meetings->status_id = 1;
		$meetings->approval_status_id = 0;
		 

		$meetings->save();

		$agendas = Input::get('agenda');
		foreach($agendas as $ag) {
		$agenda = new MeetingAgenda;
		$agenda->meeting_id = $meetings->id;
		$agenda->agenda= $ag;
		$agenda->save();
		}

		$audiences = Input::get('targetAudience');
		foreach ($audiences as $aud) {
			$targetAudience = new TargetAudience;
			$targetAudience->meeting_id = $meetings->id;
			$targetAudience->targetAudience=$aud;
			$targetAudience->save();			# code...
		}

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




		return Redirect::to('meetings')->with('message', 'Successfully registered an activity with ID No '.$meetings->id)
								->with('message', 'Successfully registered an activity with ID No '.$agenda->meeting_id)
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

		$thematicAreas = ThematicAreas::orderBy('name')->lists('name','id');
		
		return View::make('meetings.m_edit')->with('meetings', $meetings)->with('districts', $districts)
										->with('organisers', $organisers)
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
		$meetings->category = Input::get('category');
		$meetings->thematicArea_id = Input::get('thematicarea');
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

	// $audiences = Input::get('targetAudience');
	// 	foreach ($audiences as $aud) {
	// 		$targetAudience = new TargetAudience;
	// 		$targetAudience->meeting_id = $meetings->id;
	// 		$targetAudience->targetAudience=$aud;
	// 		$targetAudience->save();			# code...
	// 	}

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
								// ->with('message', 'Successfully registered an activity with ID No '.$targetAudience->meeting_id);
	
		}
	}

		public function print($id)
			{
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
				// dd($meetings);

				$pdf = new MYPDF;
				$pdf->AddPage();
				$pdf->SetFont('', '', 10);
				$pdf->writeHTML($html, true, false, true, false, '');
				return $pdf->output($meetings->id.'.pdf');
				// return $html;
			}

	
	public function editapproval($id)
	{
		$meetings = Meeting::find($id);
		
		return View::make('meetings.editapproval')->with('meetings', $meetings);
	}

	public function updateapproval($id)
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

        	//$meetings->report_path = $destinationPath .'\\'. $filename;
        	$meetings->minutes = $filename;
        	$meetings->status_id = 2;
        	$meetings->save();
    	}
		return Redirect::to('meetings')->with('message', 'Successfully uploaded minutes information for ID No '.$meetings->id);
	
		}
	public function meeting()
	{
		// $meetings = Meeting::find($id);
		
		return View::make('meetings.meeting');
	}

	public function meetingreport()
	{
		//
		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');
		$name = Input::get('name');
		$thematicArea = Input::get('thematicArea_id');
		
		

		//$events = UNHLSEvent::get();
		
		
		if($datefrom != '' or $name){
			$meetings = Meeting::reportfilter($datefrom,$dateto,$name,$thematicArea);
		}
		else{
		$meetings = '';
		}

		

		return View::make('reports.meetingreport')->with('meetings', $meetings);
	}

	public function editactions($id)
	{
		$meetings = Meeting::find($id);

		return View::make('meetings.actionpoints')->with('meetings', $meetings);
	}


	public function updateactions($id)
	{
		$meetings = Meeting::find($id);
		
		// $meetings->action_status_id = 1;
    	
    	$actions = Input::get('action');
		$names = Input::get('name');
		$dates = Input::get('date');
		$locations = Input::get('location');
		foreach ($actions as $k=>$ac) {
			$action = new UNHLSMeetingAction;
			$action->meeting_id = Input::get('meeting_id');
			$action->action = $ac;
			$action->name = $names[$k];
			$action->date = $dates[$k];
			$action->location =$locations[$k];
			$action->save();			# code...
		}

		$meetings->save();


		return Redirect::to('meetings')->with('message', 'Successfully updated recommendations for for ID No '.$action->meeting_id);
									
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