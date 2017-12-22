<?php

class InvitationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /protocal
	 *
	 * @return Response
	 */
	public function invitation()
	{
		// $appointment = UNHLSappointment::find($id);
		
		return View::make('invitation.invitation');
	}

	public function index()
	{
		//
		$appointment = Invitation::orderBy('date','DESC')->get();		
		
		return View::make('invitation.invitation_index')->with('appointment', $appointment);
	}

	public function downloadAttachment($attachment){
        $path=public_path().'/attachment1/'.$attachment;
        //return response()->download($path);
        return Response::download($path);
}


	/**
	 * Show the form for creating a new resource.
	 * GET /protocal/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /protocal
	 *
	 * @return Response
	 */
	public function store()
	{
	$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			// 'user_id' => 'required',
			// 'name' => 'required',
			'date' => 'required',
			// 'end_date' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else {
			// store

		$appointment = new Invitation;
		$appointment->date = Input::get('date');
		$appointment->user_id = Input::get('user_id');
		$appointment->reference = Input::get('reference');
		$appointment->objective = Input::get('objective');
		$appointment->body = Input::get('body');
		$appointment->title = Input::get('title');
		$appointment->name = Input::get('name');
		$appointment->output =Input::get('output');
		$appointment->venue = Input::get('venue');
		$appointment->start_date = Input::get('start_date');
		$appointment->end_date = Input::get('end_date');
		
		

		$appointment->save();

		// saving the attached report
		if (Input::hasFile('attachment')) {
        	$file = Input::file('attachment');
        	$destinationPath = public_path().'\attachment1';
        	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
        	$filename = 'Invitation'.$appointment->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);

        	//$appointment->report_path = $destinationPath .'\\'. $filename;
        	$appointment->attachment = $filename;
        	$appointment->save();
    	}




		return Redirect::to('invitation')->with('message', 'Successfully registered an activity with ID No '.$appointment->id);
	
		}	//
	}

public function editapproval($id)
	{
		$appointment = Invitation::find($id);
		
		return View::make('invitation.editapproval')->with('appointment', $appointment);
	}
	/**
	 * Display the specified resource.
	 * GET /protocal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$appointment = Invitation::find($id);

		$firstInsertedId = DB::table('unhls_invitations')->min('id');
		$lastInsertedId = DB::table('unhls_invitations')->max('id');
		
		$id>=$lastInsertedId ? $nextappointment=$lastInsertedId : $nextappointment = $id+1;
		$id<=$firstInsertedId ? $previousappointment=$firstInsertedId : $previousappointment = $id-1;

		//Show the view and pass the $appointment to it
		$html = View::make('invitation.showinvitation')->with('appointment', $appointment)
		->with('nextappointment', $nextappointment)
		->with('previousappointment', $previousappointment);

		// $html = View::make('appointment.show')->with('appointment', $appointment);

		/*$pdf = new MYPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		*/// return $pdf->output($appointment->id.'.pdf');
		return $html;
	}

	public function print($id)
	{
		$appointment = Invitation::find($id);
// Log::info($event);
	
		$firstInsertedId = DB::table('unhls_invitations')->min('id');
		$lastInsertedId = DB::table('unhls_invitations')->max('id');
		
		$id>=$lastInsertedId ? $nextappointment=$lastInsertedId : $nextappointment = $id+1;
		$id<=$firstInsertedId ? $previousappointment=$firstInsertedId : $previousappointment = $id-1;

		//Show the view and pass the $appointment to it
		// $html = View::make('appointment.show')->with('appointment', $appointment)
		// ->with('nextappointment', $nextappointment)
		// ->with('previousappointment', $previousappointment);

		$html = View::make('invitation.print')->with('appointment', $appointment);
		// dd($event);

		$pdf = new MYPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, true, false, '');
		return $pdf->output($appointment->id.'.pdf');
		// return $html;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /protocal/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

	/**
	 * Update the specified resource in storage.
	 * PUT /protocal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			// 'user_id' => 'required',
			// 'name' => 'required',
			'date' => 'required',
			// 'end_date' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else {
			// store

		$appointment = new Invitation;
		$appointment->date = Input::get('date');
		$appointment->user_id = Input::get('user_id');
		$appointment->reference = Input::get('reference');
		$appointment->objective = Input::get('objective');
		$appointment->body = Input::get('body');
		$appointment->output =Input::get('output');
		$appointment->venue = Input::get('venue');
		$appointment->start_date = Input::get('start_date');
		$appointment->end_date = Input::get('end_date');
		$appointment->body = Input::get('body');
		$appointment->title = Input::get('title');
		
		

		$appointment->save();

		// saving the attached report
		if (Input::hasFile('attachment')) {
        	$file = Input::file('attachment');
        	$destinationPath = public_path().'\attachment1';
        	//$filename = str_random(3) . '_' . $file->getClientOriginalName();
        	$filename = 'Invitation'.$appointment->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);

        	//$appointment->report_path = $destinationPath .'\\'. $filename;
        	$appointment->attachment = $filename;
        	$appointment->save();
    	}




		return Redirect::to('invitation')->with('message', 'Successfully registered an activity with ID No '.$appointment->id);
	
		}	//
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
		$appointment = Invitation::find($id);

		$appointment->approval_status = Input::get('approvalstatus');
		$appointment->approvedby = Input::get('approvedby');
		$appointment->comment = Input::get('comment');
		$appointment->approvedon = \Carbon\Carbon::now()->toDateTimeString();
		
		$appointment->save();
		return Redirect::to('invitation')->with('message', 'Successfully updated invitation information for ID No '.$appointment->id);
	
		}
	}


	

	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /protocal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}