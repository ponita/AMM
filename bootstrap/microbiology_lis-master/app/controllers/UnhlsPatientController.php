<?php

use Illuminate\Database\QueryException;

/**
 *Contains functions for managing patient records 
 *
 */
class UnhlsPatientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
		{
		$search = Input::get('search');

		$patients = UnhlsPatient::search($search)->orderBy('id', 'desc')->paginate(Config::get('kblis.page-items'))->appends(Input::except('_token'));

		if (count($patients) == 0) {
		 	Session::flash('message', trans('messages.no-match'));
		}

		// Load the view and pass the patients
		return View::make('unhls_patient.index')->with('patients', $patients)->withInput(Input::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create Patient
		$lastInsertId = DB::table('unhls_patients')->max('id')+1;
		$ulin = $this->generateUniqueLabID();
		return View::make('unhls_patient.create')->with('lastInsertId', $lastInsertId)->with('ulin',$ulin);
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

			'patient_number' => 'required|unique:unhls_patients,patient_number',
			// 'ulin'			=> 'required',
			'name'       => 'required',
			'gender' => 'required',
			'dob' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			$thisYear = substr(date('Y'), 2);
			$nextPatientID = DB::table('unhls_patients')->max('id')+1;

			$nextULIN = $thisYear.'/'.\Config::get('constants.FACILITY_CODE').'/'.str_pad($nextPatientID, 6, '0', STR_PAD_LEFT);

			// store
			$patient = new UnhlsPatient;
			$patient->patient_number = Input::get('patient_number');
			$patient->ulin =$nextULIN;
			$patient->nin = Input::get('nin');
			$patient->name = Input::get('name');
			$patient->gender = Input::get('gender');
			$patient->dob = Input::get('dob');
			$patient->village_residence = Input::get('village_residence');
			$patient->village_workplace = Input::get('village_workplace');
			$patient->occupation = Input::get('occupation');
			$patient->email = Input::get('email');
			$patient->address = Input::get('address');
			$patient->phone_number = Input::get('phone_number');
			$patient->created_by = Auth::user()->id;

			try{
				$patient->save();
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'Successfully created patient!');
			}catch(QueryException $e){
				Log::error($e);
				echo $e->getMessage();
			}
			
			// redirect
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
		//Show a patient
		$patient = UnhlsPatient::find($id);

		//Show the view and pass the $patient to it
		return View::make('unhls_patient.show')->with('patient', $patient);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Get the patient
		$patient = UnhlsPatient::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('unhls_patient.edit')->with('patient', $patient);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
			'patient_number' => 'required',
			'name'       => 'required',
			'gender' => 'required',
			'dob' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('unhls_patient/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// Update
			$patient = UnhlsPatient::find($id);
			$patient->patient_number = Input::get('patient_number');
			$patient->nin = Input::get('nin');
			$patient->name = Input::get('name');
			$patient->gender = Input::get('gender');
			$patient->dob = Input::get('dob');
			$patient->village_residence = Input::get('village_residence');
			$patient->village_workplace = Input::get('village_workplace');
			$patient->occupation = Input::get('occupation');
			$patient->email = Input::get('email');
			$patient->address = Input::get('address');
			$patient->phone_number = Input::get('phone_number');
			$patient->created_by = Auth::user()->id;
			$patient->save();

			// redirect
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'The patient details were successfully updated!') ->with('activepatient',$patient ->id);

		}
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

	/**
	 * Remove the specified resource from storage (soft delete).
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//Soft delete the patient
		$patient = UnhlsPatient::find($id);

		$patient->delete();

		// redirect
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
			->with('message', 'The commodity was successfully deleted!');
	}

	/**
	 * Return a Patients collection that meets the searched criteria as JSON.
	 *
	 * @return Response
	 */
	public function search()
	{
        return UnhlsPatient::search(Input::get('text'))->take(Config::get('kblis.limit-items'))->get()->toJson();
	}

	/**
	 *Return a unique Lab Number
	 *
	 * @return string of current age concatenated with incremental Number.
	 */
	Private function generateUniqueLabID(){

		//Get Year, Month and day of today. If Jan O1 then reset last insert ID to 1 to start a new cycle of IDs 
		$year = date('Y');
		$month = date('m');
		$day = date('d');

		if($month == '01' && $day == '01'){
			$lastInsertId = 1;
		} 
		$lastInsertId = DB::table('unhls_patients')->max('id')+1;
		$fcode = \Config::get('constants.FACILITY_CODE');
		$num = $year.str_pad($lastInsertId, 6, '0', STR_PAD_LEFT);
		return $fcode.'-'.$num;
	}


}