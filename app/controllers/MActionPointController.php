<?php

class MActionPointController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		$maction = UNHLSMeetingAction::orderBy('action', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('maction.index')->with('maction',$maction);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create test category
		return View::make('maction.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation
		$rules = array('name' => 'required|unique:test_categories,name');
		$validator = Validator::make(Input::all(), $rules);
	
		//process
		if($validator->fails()){
			$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)->withErrors($validator);
		}else{
			//store
			$maction = new UNHLSMeetingAction;
			$maction->action = Input::get('action');
			$maction->name = Input::get('name');
			$maction->date = Input::get('date');
			$maction->location = Input::get('location');
			$maction->action_status_id = 0;

			try{
				$maction->save();
			

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-funder')) ->with('activeaction', $maction ->id);
			}catch(QueryException $e){
				Log::error($e);
			}
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
		//show a test category
		$maction = UNHLSMeetingAction::find($id);
		//show the view and pass the $maction to it
		return View::make('maction.show')->with('maction',$maction);
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
		$maction = UNHLSMeetingAction::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('maction.edit')->with('maction', $maction);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			// $maction = UNHLSMeetingAction::find($id);
			// print_r(Input::all());
			// exit();

		//Validate
		$rules = array(
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			// Update
			$maction = UNHLSMeetingAction::find($id);
			$maction->action_status_id = 1;
			
			$maction->save();

			$solutions = Input::get('solution');

			foreach ($solutions as $ob) {
				$solution = new UNHLSEventActionSolution;
				$solution->meeting_action_id = Input::get('meeting_action_id');
				$solution->solution=$ob;
				
				$solution->save();
			}
			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-funder')) ->with('activeaction', $maction ->id)
								->with('message', 'Successfully updated solutions for for ID No '.$solution->meeting_action_id);
		
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
		//Soft delete the test category
		$maction = UNHLSMeetingAction::find($id);

		$mactionInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($mactionInUse)) {
		    // The test category is not in use
			$maction->delete();
		} else {
		    // The test category is in use
		    $url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
		    	->with('message', trans('messages.failure-test-category-in-use'));
		}
		// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
			->with('message', trans('messages.success-deleting-test-category'));
	}
}


