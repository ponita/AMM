<?php

class LetterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /letter
	 *
	 * @return Response
	 */
	

	public function index()
	{
		//
		$appointment = Letter::orderBy('ref_no','DESC')->get();		
		
		return View::make('letters.letter_index')->with('appointment', $appointment);
	}

	public function report()
	{
		//
		$appointment = Letter::orderBy('ref_no','DESC')->get();		
		
		return View::make('letters.report')->with('appointment', $appointment);
	}
 


	/**
	 * Show the form for creating a new resource.
	 * GET /letter/create
	 *
	 * @return Response
	 */
	public function letter()
	{
		// $event = UNHLSEvent::find($id);
		
		return View::make('letters.letter');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /letter
	 *
	 * @return Response
	 */
	public function store()
	{
	
		// $validator = Validator::make(Input::all());

		// if ($validator->fails()) {

		// 	return Redirect::back()->withErrors($validator)->withInput(Input::all());
		// }
		// else {
			// store

		$appointment = new Letter;

		$appointment->user_id = Input::get('user_id');
		$appointment->dear = Input::get('dear');
		$appointment->date = Input::get('date');
		$appointment->receiver = Input::get('receiver');
		$appointment->ref = Input::get('ref');
		$appointment->body = Input::get('body');
		// $appointment->name = Input::get('name');
		// $appointment->title = Input::get('title');
		$appointment->approval_status_id = 0;
		
		//$event->objective = Input::get('objective');
		

		$appointment->save();

    	// }
    	$lettercopie = Input::get('copied');
		foreach ($lettercopie as $chal) {
			$copied = new UNHLSLettersCopied;
			$copied->letter_id = $appointment->id;
			$copied->copied=$chal;
			$copied->save();			# code...
		}

		$appointment->ref_no = $appointment->getUids();
				$appointment->save();
				$uuid = new UidGenerator; 
				$uuid->save();
			$url = Session::get('SOURCE_URL');



		return Redirect::to('letters')->with('message', 'Successfully registered an activity with ID No '.$appointment->id)
								->with('message', 'Successfully registered an activity with ID No '.$copied->letter_id);
	
		}	//
	

	/**
	 * Display the specified resource.
	 * GET /letter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$appointment = Letter::find($id);
		

		$firstInsertedId = DB::table('unhls_letters')->min('id');
		$lastInsertedId = DB::table('unhls_letters')->max('id');
		
		$id>=$lastInsertedId ? $nextappointment=$lastInsertedId : $nextappointment = $id+1;
		$id<=$firstInsertedId ? $previousappointment=$firstInsertedId : $previousappointment = $id-1;

		//Show the view and pass the $event to it
		$html = View::make('letters.showletter')->with('appointment', $appointment)
		->with('nextappointment', $nextappointment)
		->with('previousappointment', $previousappointment);

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
		$appointment = Letter::find($id);
// Log::info($appointment);
	
		$firstInsertedId = DB::table('unhls_letters')->min('id');
		$lastInsertedId = DB::table('unhls_letters')->max('id');
		
		$id>=$lastInsertedId ? $nextappointment=$lastInsertedId : $nextappointment = $id+1;
		$id<=$firstInsertedId ? $previousappointment=$firstInsertedId : $previousappointment = $id-1;

		//Show the view and pass the $appointment to it
		// $html = View::make('appointment.show')->with('appointment', $appointment)
		// ->with('nextappointment', $nextappointment)
		// ->with('previousappointment', $previousappointment);

		$html = View::make('letters.print')->with('appointment', $appointment);
		// dd($appointment);

		$pdf = new YOURPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, true, false, '');
		return $pdf->output($appointment->id.'.pdf');
		// return $html;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /letter/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$appointment = Letter::find($id);
		// $districts = District::orderBy('name')->lists('name','id');
		// $content = Letter::orderBy('body')->lists('body','id');
		
		return View::make('letters.editletter')->with('appointment', $appointment);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /letter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	

		$appointment = Letter::find($id);
// Log::info(Input::get('dear'));
		$appointment->user_id = Auth::user()->id;
		$appointment->dear = Input::get('dear');
		$appointment->date = Input::get('date');
		$appointment->receiver = Input::get('receiver');
		$appointment->ref = Input::get('ref');
		$appointment->body = Input::get('body');
		// $appointment->name = Input::get('name');
		// $appointment->title = Input::get('title');

		
		//$event->objective = Input::get('objective');
		

		$appointment->save();

    	




		return Redirect::to('letters')->with('message', 'Successfully registered an activity with ID No '.$appointment->id);
	
		}	//
	

	public function editapproval($id)
	{
		$appointment = Letter::find($id);
		
		return View::make('letters.editapproval')->with('appointment', $appointment);
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
		$appointment = Letter::find($id);

		$appointment->approval_status = Input::get('approvalstatus');
		$appointment->approvedby = Input::get('approvedby');
		$appointment->comment = Input::get('comment');
		$appointment->approval_status_id = 1;
		$appointment->approvedon = \Carbon\Carbon::now()->toDateTimeString();
		
		$appointment->save();
		return Redirect::to('letters')->with('message', 'Successfully updated memo information for ID No '.$appointment->id);
	
		}
	}

	// public function eventfilter()
	// {
	// 	//
	// 	$datefrom = Input::get('datefrom');
	// 	$dateto = Input::get('dateto');
	// 	$name = Input::get('name');

	// 	//$events = UNHLSEvent::get();
		
		
	// 	if($datefrom != '' or $name){
	// 		$events = UNHLSEvent::filtereventsbydate($datefrom,$dateto,$name);
	// 	}
	// 	else{
	// 	$events = '';
	// 	}

	// 	return View::make('event.eventfilter')->with('events', $events);
	// }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /letter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}