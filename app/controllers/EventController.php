<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$events = UNHLSEvent::orderBy('start_date','DESC')->get();


		$permissions = Permission::all();
		$permissionsRolesData = array('permissions' => $permissions);

		
		return View::make('event.index')->with('events', $events)
										->with('permissions', $permissionsRolesData);
										
	}

	
	public function downloadAttachment($report_filename){
        $path=public_path().'/attachments/'.$report_filename;
        //return response()->download($path);
        return Response::download($path);
}



 public function report()
	{
		//
		$events = UNHLSEvent::orderBy('start_date','DESC')->get();		
		
		return View::make('event.report')->with('events', $events);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//$districts = District::orderBy('name')->get();
		$districts = District::orderBy('name')->lists('name','id');

		$country = Country::orderBy('name')->lists('name','id');

		$healthregion =['Select Health region']+ Healthregion::orderBy('name')->lists('name', 'id');

		$funders =['Select funder']+ Funder::orderBy('name')->lists('name', 'id');

		$organisers =['Select organiser']+ Organiser::orderBy('name','telephoneNo')->lists('name','id');

		$thematicAreas =['Select department']+ ThematicAreas::orderBy('name')->lists('name','id');

	


		return View::make('event.create')->with('districts', $districts)
										->with('country', $country)
										->with('healthregion', $healthregion)
										->with('funders', $funders)
										->with('organisers', $organisers)
										
										->with('thematicAreas', $thematicAreas);
										
	}


	/**
	 * Store a newly created resource in storage.
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
			'start_date' => 'required',
			'end_date' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else {
			// store

		$event = new UNHLSEvent;

		$event->user_id = Input::get('user_id');
		$event->name = Input::get('name');
		$event->thematicArea_id = Input::get('thematicarea');
		$event->type = Input::get('type');
		$event->start_date = Input::get('start_date');
		$event->end_date = Input::get('end_date');
		$event->location = Input::get('location');
		$event->premise = Input::get('premise');
		$event->co_organiser = Input::get('co_organiser');
		$event->district_id = Input::get('district');
		$event->country_id = Input::get('country');
		$event->healthregion_id = Input::get('healthregion');
		$event->funders_id = Input::get('funder');
		$event->organiser_id = Input::get('organiser');
		$event->audience_id = Input::get('audience_id');
		$event->participants_no = Input::get('participants_no');
		
		$event->status_id = 0;
		$event->obj_status_id = 0;
		$event->les_status_id = 0;
		$event->rec_status_id = 0;
		$event->action_status_id = 0;
		$event->approval_status_id = 0;

		$event->save();


		$objectives = Input::get('objective');
		foreach($objectives as $ob) {
		$objective = new UNHLSEventObjective;
		$objective->event_id = $event->id;
		$objective->objective= $ob;
		$objective->save();
		} 
		 
		$audiences = Input::get('audience');
		foreach ($audiences as $au) {
			$audience = new Audience;
			$audience->event_id = $event->id;
			$audience->audience=$au;
			$audience->save();			# code...
		}

		// saving the attached report
		if (Input::hasFile('report_path')) {
        	$file = Input::file('report_path');
        	$destinationPath = public_path().'\attachments';
        	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
        	$filename = 'Report'.$event->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);

        	//$event->report_path = $destinationPath .'\\'. $filename;
        	$event->report_filename = $filename;
        	$event->save();
    	}




		return Redirect::to('event')->with('message', 'Successfully registered an activity with ID No '.$event->id)
								->with('message', 'Successfully registered an activity with ID No '.$audience->event_id)
								->with('message', 'Successfully registered objectives for for ID No '.$objective->event_id);
	
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = UNHLSEvent::find($id);
		



		$firstInsertedId = DB::table('unhls_events')->min('id');
		$lastInsertedId = DB::table('unhls_events')->max('id');
		
		$id>=$lastInsertedId ? $nextevent=$lastInsertedId : $nextevent = $id+1;
		$id<=$firstInsertedId ? $previousevent=$firstInsertedId : $previousevent = $id-1;

		//Show the view and pass the $event to it
		$html = View::make('event.show')->with('event', $event)
		->with('nextevent', $nextevent)
		->with('previousevent', $previousevent);

		// $html = View::make('event.show')->with('event', $event);

		/*$pdf = new MYPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		*/// return $pdf->output($event->id.'.pdf');
		return $html;
	}

	

		

	public function print($id)
	{
		$event = UNHLSEvent::find($id);
// Log::info($event);
	
		$firstInsertedId = DB::table('unhls_events')->min('id');
		$lastInsertedId = DB::table('unhls_events')->max('id');
		
		$id>=$lastInsertedId ? $nextevent=$lastInsertedId : $nextevent = $id+1;
		$id<=$firstInsertedId ? $previousevent=$firstInsertedId : $previousevent = $id-1;

		//Show the view and pass the $event to it
		// $html = View::make('event.show')->with('event', $event)
		// ->with('nextevent', $nextevent)
		// ->with('previousevent', $previousevent);
		$header_img = $this->getImageData('/pictures/img2.jpg');

		$html = View::make('event.print')->with('event', $event)->with('header_img', $header_img);
		// dd($event);

		$pdf = new MYPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		return $pdf->output($event->id.'.pdf');
		// return $html;
	}
	private function getImageData($file){
		$ret = "";
		$path = base_path('public/'.$file);
		if(file_exists($path)){
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			$ret = 'data:image/' . $type . ';base64,' . base64_encode($data);
		}	
		return $ret;		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = UNHLSEvent::find($id);
		$districts = District::orderBy('name')->lists('name','id');

		$country = Country::orderBy('name')->lists('name','id');
		
		$healthregion = Healthregion::orderBy('name')->lists('name', 'id');

		$funders = Funder::orderBy('name')->lists('name', 'id');

		$organisers = Organiser::orderBy('name')->lists('name','id');

		$thematicAreas = ThematicAreas::orderBy('name')->lists('name','id');

		// $audience = Audience::lists('audience','id');
		
		return View::make('event.edit')->with('event', $event)->with('districts', $districts)
															->with('country', $country)
															->with('healthregion', $healthregion)
															->with('funders', $funders)
															->with('organisers', $organisers)
															// ->with('audience', $audience)
															->with('thematicAreas', $thematicAreas);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// print_r(Input::all());
		// exit();
		//
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'user_id' => 'required',
			'name' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
		// update
		$event = UNHLSEvent::find($id);

		$event->user_id = Input::get('user_id');
		$event->name = Input::get('name');
		$event->thematicArea_id = Input::get('thematicarea');
		$event->type = Input::get('type');
		$event->start_date = Input::get('start_date');
		$event->end_date = Input::get('end_date');
		$event->location = Input::get('location');
		$event->premise = Input::get('premise');
		$event->co_organiser = Input::get('co_organiser');
		$event->district_id = Input::get('district');
		$event->country_id = Input::get('country');
		$event->healthregion_id = Input::get('healthregion');
		$event->funders_id = Input::get('funders');
		$event->organiser_id = Input::get('organiser');
		$event->audience_id = Input::get('audience_id');
		$event->participants_no = Input::get('participants_no');
		
		$event->save();

		// $objective = new UNHLSEventObjective;

		// $objective->objective = Input::get('objective');

		// $objective->save();

		// $audiences = Input::get('audience');
		// foreach ($audiences as $au) {
		// 	$audience = new Audience;
		// 	$audience->event_id = Input::get('event_id');
		// 	$audience->audience=$au;
		// 	$audience->save();			# code...
		// }

		// saving the attached report
		if (Input::hasFile('report_path')) {
        	$file = Input::file('report_path');
        	$destinationPath = public_path().'\attachments';
        	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
        	$filename = 'Report'.$event->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);

        	//$event->report_path = $destinationPath .'\\'. $filename;
        	$event->report_filename = $filename;
        	$event->save();
    	}
		return Redirect::to('event')->with('message', 'Successfully updated event information for ID No '.$event->id);
									// ->with('message', 'Successfully updated event information for ID No '.$audience->event_id);
									// ->with('message', 'Successfully updated objectives for for ID No '.$objective->event_id);
	
		}
	}

	public function editapproval($id)
	{
		$event = UNHLSEvent::find($id);
		
		return View::make('event.editapproval')->with('event', $event);
	}

	
	public function addreport($id)
	{
		$event = UNHLSEvent::find($id);


		return View::make('event.addreport')->with('event', $event);
	}

	public function updatereport($id)
	{
		$event = UNHLSEvent::find($id);
		
		if (Input::hasFile('reports')) {
        	$file = Input::file('reports');
        	$destinationPath = public_path().'\attachments';
        	$filename = 'Report'.$event->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);

        	//$event->report_path = $destinationPath .'\\'. $filename;
        	$event->reports = $filename;
		
		$event->status_id = 1;
        	$event->save();
    	}

    	//Fire of entry saved/edited event
		// Event::fire('test.saved', array($id));

		// $input = Session::get('TESTS_FILTER_INPUT');
		// Session::put('fromRedirect', 'true');

		return Redirect::to('event')->with('message', 'Successfully updated event information for ID No '.$event->id);
									// ->withInput($input);
	
		}
	


public function team()
	{
		return View::make('event.team');
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
		$event = UNHLSEvent::find($id);
		$event->approvedby = Auth::user()->id;

		$event->approval_status = Input::get('approvalstatus');
		$event->approvedby = Input::get('approvedby');
		$event->comment = Input::get('comment');
		$event->approvedon = \Carbon\Carbon::now()->toDateTimeString();
		
		$event->approval_status_id = 1;

		$event->save();
		}
		//Fire of entry saved/edited event
		Event::fire('test.verified', array($id));

		$input = Session::get('TESTS_FILTER_INPUT');
		Session::put('fromRedirect', 'true');

		return Redirect::to('event')->with('message', 'Successfully updated event information for ID No '.$event->id)
									->withInput($input);
	
		
	}


	public function editobjectives($id)
	{
		$event = UNHLSEvent::find($id);


		return View::make('event.editobjectives')->with('event', $event);
	}


	public function updateobjectives($id)
	{
		
		$event = UNHLSEvent::find($id);
		// $event->event_status_id = UNHLSEvent::COMPLETED;
		// $event->created_by = Auth::user()->id;
		// $event->time_completed = date('Y-m-d H:i:s');
		// // store

		$event->obj_status_id = 1;


		$objectives = Input::get('objective');
		foreach ($objectives as $ob) {
			$objective = new UNHLSEventObjective;
			$objective->event_id = Input::get('event_id');
			$objective->objective=$ob;
			
			$objective->save();			# code...
		}
		$event->save();
		
		//Fire of entry saved/edited event
		// Event::fire('test.saved', array($id));

		// $input = Session::get('TESTS_FILTER_INPUT');
		// Session::put('fromRedirect', 'true');

return Redirect::to('event')->with('message', 'Successfully updated objectives for for ID No '.$objective->event_id);
							// ->withInput($input);
		
	}


	public function editlessons($id)
	{
		$event = UNHLSEvent::find($id);


		return View::make('event.editlessons')->with('event', $event);
	}


	public function updatelessons($id)
	{
		$event = UNHLSEvent::find($id);
		// $event->event_status_id = UNHLSEvent::COMPLETED;
		// $event->created_by = Auth::user()->id;
		// $event->time_completed = date('Y-m-d H:i:s');
		// // store

		$event->les_status_id = 1;
		

		$lessons = Input::get('lesson');
		foreach ($lessons as $l) {
			$lesson = new UNHLSEventLesson;
			$lesson->event_id = Input::get('event_id');
			$lesson->lesson=$l;
			$lesson->save();			# code...
		}
		
		$event->save();
    	//Fire of entry saved/edited event
		// Event::fire('test.saved', array($id));

		// $input = Session::get('TESTS_FILTER_INPUT');
		// Session::put('fromRedirect', 'true');

		return Redirect::to('event')->with('message', 'Successfully updated lessons for for ID No '.$lesson->event_id);
									// ->withInput($input);
	}


	public function editrecommendations($id)
	{
		$event = UNHLSEvent::find($id);


		return View::make('event.editrecommendations')->with('event', $event);
	}


	public function updaterecommendations($id)
	{
		$event = UNHLSEvent::find($id);
		// $event->event_status_id = UNHLSEvent::COMPLETED;
		// $event->created_by = Auth::user()->id;
		// $event->time_completed = date('Y-m-d H:i:s');
		// // store

		$event->rec_status_id = 1;
		

		$recommendations = Input::get('recommendation');
		foreach ($recommendations as $r) {
			$recommendation = new UNHLSEventRecommendation;
			$recommendation->event_id = Input::get('event_id');
			$recommendation->recommendation=$r;
			$recommendation->save();			# code...
		}
    	
    	$event->save();
//Fire of entry saved/edited event
		// Event::fire('test.saved', array($id));

		// $input = Session::get('TESTS_FILTER_INPUT');
		// Session::put('fromRedirect', 'true');

		return Redirect::to('event')->with('message', 'Successfully updated recommendations for for ID No '.$recommendation->event_id);
									// ->withInput($input);
	}


	public function editactions($id)
	{
		$event = UNHLSEvent::find($id);




		return View::make('event.editactions')->with('event', $event);
	}


	public function updateactions($id)
	{
		$event = UNHLSEvent::find($id);
		
		$event->action_status_id = 1;
    	
    	$actions = Input::get('action');
		$names = Input::get('name');
		$dates = Input::get('date');
		$locations = Input::get('location');
		foreach ($actions as $k=>$ac) {
			$action = new UNHLSEventAction;
			$action->event_id = Input::get('event_id');
			$action->action = $ac;
			$action->name = $names[$k];
			$action->date = $dates[$k];
			$action->location =$locations[$k];
			$action->save();			# code...
		}

		$event->save();
//Fire of entry saved/edited event
		// Event::fire('test.saved', array($id));

		// $input = Session::get('TESTS_FILTER_INPUT');
		// Session::put('fromRedirect', 'true');

		return Redirect::to('event')->with('message', 'Successfully updated recommendations for for ID No '.$action->event_id);
									// ->withInput($input);
	}


	public function eventfilter()
	{
		//
		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');
		$name = Input::get('name');


		//$events = UNHLSEvent::get();
		
		
		if($datefrom != '' or $name){
			$events = UNHLSEvent::filtereventsbydate($datefrom,$dateto,$name);
		}
		else{
		$events = '';
		}

		return View::make('event.eventfilter')->with('events', $events);
	}

	/**
	*	Function to return test types of a particular test category to fill test types dropdown
	*/
	public function reportsDropdown(){
        $input = Input::get('option');
        $department = ThematicAreas::find($input);
        $types = $department->thematicarea();
        return Response::make($types->get(['id','name']));
    }

   

public function department()
	{
		//
		$datefrom = Input::get('datefrom');
		$dateto = Input::get('dateto');
		$name = Input::get('name');
		$type = Input::get('type');
		$thematicArea = Input::get('thematicArea_id');

		
		
		if($datefrom != '' or $name){
			$events = UNHLSEvent::reportfilter($datefrom,$dateto,$name,$type,$thematicArea);
		}
		else{
		$events = '';
		}

		// $selectedUser = Input::get('type'); 
		// if(!$selectedUser)$selectedUser = "";
		// else $selectedUser = " USER: ".UNHLSEvent::find($selectedUser)->type;



		return View::make('reports.department')->with('events', $events);
	}

	

	


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
