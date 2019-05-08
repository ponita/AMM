<?php

class LeaveController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				$leave = LeaveForm::orderBy('id','DESC')->get();		
		
		return View::make('leave.index')->with('leave', $leave);
	}

	public function transfer()
	{
		$handle = curl_init();
		
		curl_setopt($handle, CURLOPT_URL, "http://localhost/CheckinAPI/?cmd=GetCheckinuser");

		// $json = curl_init('http://localhost/CheckinAPI/?cmd=GetCheckinuser');
		curl_setopt($handle,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		 $response = curl_exec($handle);
		 curl_close($handle);
		 $actualdata = (array)json_decode($response);
		// print_r($actualdata[3]);

		// \Log::info('....1....');
		// 		\Log::info($response);

		// \Log::info(".....2.....");
		//  $now = new DateTime();
		// $collectionDate = $now->format('Y-m-d H:i');
		
		return View::make('leave.transfer')->with('actualdata', $actualdata);
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
	return View::make('leave.create');
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'user_id' => 'required',
			'name' => 'required',
			'date_from' => 'required',
			'date_to' => 'required',
			'leave_type' => 'required',
			'nok_name' => 'required',
			'nok_contact' => 'required',
			'supermail' => 'required',

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::route('leave.create')
                ->withErrors($validator)
                ->withInput(Input::except('days'));
		}
		else {

		$leave = new LeaveForm;

		$leave->user_id = Input::get('user_id');
		$leave->leave_type = Input::get('leave_type');
		$leave->department = Input::get('department');
		$leave->name = Input::get('name');
		$leave->position = Input::get('position');
		$leave->destination = Input::get('destination');
		$leave->email = Input::get('email');
		$leave->emp_contact = Input::get('emp_contact');
		$leave->nok_contact = Input::get('nok_contact');
		$leave->nok_name = Input::get('nok_name');
		$leave->days = Input::get('days');
		$leave->supermail = Input::get('supermail');
		$leave->comment = Input::get('comment');
		$leave->date_from = Input::get('date_from');
		$leave->date_to = Input::get('date_to');
		$leave->approval_status_id = 0;
		

		$leave->save();

				$semail = $leave->supermail = Input::get('supermail');

		Mail::send('leave.super_approval',
					array('user_id'=>Input::get('user_id'),'semail'=> $semail),
					function($message) use ($semail){
						$message->to($_POST['supermail'])->subject('System Alerts');
					});
    	
			$url = Session::get('SOURCE_URL');



		return Redirect::to('event.calender')->with('message', 'Successfully registered an activity with ID No '.$leave->id);
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
		$leave = LeaveForm::find($id);
		

		$firstInsertedId = DB::table('leave_form')->min('id');
		$lastInsertedId = DB::table('leave_form')->max('id');
		
		$id>=$lastInsertedId ? $nextleave=$lastInsertedId : $nextleave = $id+1;
		$id<=$firstInsertedId ? $previousleave=$firstInsertedId : $previousleave = $id-1;

		//Show the view and pass the $event to it
		$html = View::make('leave.show')->with('leave', $leave)
		->with('nextleave', $nextleave)
		->with('previousleave', $previousleave);

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
		$leave = LeaveForm::find($id);
// Log::info($event);
	
		$firstInsertedId = DB::table('leave_form')->min('id');
		$lastInsertedId = DB::table('leave_form')->max('id');
		
		$id>=$lastInsertedId ? $nextleave=$lastInsertedId : $nextleave = $id+1;
		$id<=$firstInsertedId ? $previousleave=$firstInsertedId : $previousleave = $id-1;

		//Show the view and pass the $event to it
		// $html = View::make('event.show')->with('event', $event)
		// ->with('nextevent', $nextevent)
		// ->with('previousevent', $previousevent);
		$header_img = $this->getImageData('/pictures/img2.jpg');

		$html = View::make('leave.print')->with('leave', $leave)->with('header_img', $header_img);
		// dd($leave);

		$pdf = new MYPDF;
		$pdf->AddPage();
		$pdf->SetFont('', '', 10);
		$pdf->writeHTML($html, true, false, false, false, '');
		return $pdf->output($leave->id.'.pdf');
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
	
	//return View::make('leave.supervisor')->with('leave', $leave);
		
	}

	public function supervisor($id)
	{
	
	$leave = LeaveForm::find($id);

	return View::make('leave.supervisor')->with('leave', $leave);
		
	}

	public function updatesupervisor($id)
	{
	
	$leave = LeaveForm::find($id);

		$leave->approvedbys = Input::get('approvedbys');
		$leave->s_approval_status = Input::get('s_approval_status');
		$leave->s_comment = Input::get('s_comment');
		$leave->mangmail = Input::get('mangmail');
		$leave->approvedon = \Carbon\Carbon::now()->toDateTimeString();
		$leave->approval_status_id = 2;
		

		$leave->save();

			Mail::send('leave.m_approval',
					array('approvedbys'=>Input::get('approvedbys')),
					function($message){
						$message->to($_POST['mangmail'])->subject('System Alerts');
					});
    	
			$url = Session::get('SOURCE_URL');



		return Redirect::to('leave')->with('message', 'Successfully updated leave form with ID No '.$leave->id);
		
	}

	public function manager($id)
	{
	
	$leave = LeaveForm::find($id);

	return View::make('leave.manager')->with('leave', $leave);
		
	}

	public function updatemanager($id)
	{
	
	$leave = LeaveForm::find($id);

		$leave->approvedbym = Input::get('approvedbym');
		$leave->m_approval_status = Input::get('m_approval_status');
		$leave->m_comment = Input::get('m_comment');
		$leave->m_approvedon = \Carbon\Carbon::now()->toDateTimeString();
		$leave->approval_status_id = 3;
		

		$leave->save();

    	//$semail = {{$leave->email}};

		Mail::send('leave.h_approval',
					array('approvedbym'=>Input::get('approvedbym')),
					function($message){
						$message->to('poniagusto@gmail.com')->subject('System Alerts');
					});

			$url = Session::get('SOURCE_URL');



		return Redirect::to('leave')->with('message', 'Successfully updated leave form with ID No '.$leave->id);
		
	}

	public function head($id)
	{
	
	$leave = LeaveForm::find($id);

	return View::make('leave.head')->with('leave',$leave);
		
	}

	public function updatehead($id)
	{
	
	$leave = LeaveForm::find($id);

		$leave->approvedbyh = Input::get('approvedbyh');
		$leave->h_approval_status = Input::get('h_approval_status');
		$leave->section = Input::get('section');
		$leave->h_comment = Input::get('h_comment');
		$leave->email = Input::get('email');
		$leave->name = Input::get('name');
		$leave->h_approvedon = \Carbon\Carbon::now()->toDateTimeString();
		$leave->approval_status_id = 4;
		

		$leave->save();

    	//$semail = {{$leave->email}};

		Mail::send('leave.staff_message',
					array('approvedbyh'=>Input::get('approvedbyh'),'name'=>Input::get('name'),'section'=>Input::get('section')),
					function($message){
						$message->to($_POST['email'])->subject('System Alerts');
						$message->cc('poniagusto10@gmail.com')->subject('System Alerts');
					});

			$url = Session::get('SOURCE_URL');



		return Redirect::to('leave')->with('message', 'Successfully updated leave form with ID No '.$leave->id);
		
	}

	public function report()
	{
		//
		$leave = LeaveForm::orderBy('id','DESC')->get();

		return View::make('leave.report')->with('leave', $leave);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$leave = new LeaveForm;

		$leave->user_id = Input::get('user_id');
		$leave->s_comment = Input::get('s_comment');
		$leave->approval_status_id = 1;
		

		$leave->save();

    	
			$url = Session::get('SOURCE_URL');



		return Redirect::to('leave')->with('message', 'Successfully registered an activity with ID No '.$leave->id);
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
