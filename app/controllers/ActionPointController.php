<?php

class ActionPointController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		$action = UNHLSEventAction::orderBy('action', 'ASC')->get();
		$maction = UNHLSMeetingAction::orderBy('action', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('action.index')->with('action',$action)
										->with('maction', $maction);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create test category
		return View::make('action.create');
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
			$action = new UNHLSEventAction;
			$action->action = Input::get('action');
			$action->name = Input::get('name');
			$action->date = Input::get('date');
			$action->location = Input::get('location');
			$action->action_status_id = 0;

			// try{
				$action->save();
			$maction = new UNHLSMeetingAction;
			$maction->action = Input::get('action');
			$maction->name = Input::get('name');
			$maction->date = Input::get('date');
			$maction->location = Input::get('location');
			$maction->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-funder')) ->with('activeaction', $action ->id)
																				->with('activeaction', $maction ->id);
			// }catch(QueryException $e){
			// 	Log::error($e);
			// }
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
		$action = UNHLSEventAction::find($id);
		//show the view and pass the $action to it
		return View::make('action.show')->with('action',$action);
	}

	public function mshow($id)
	{
		//show a test category
		$action = UNHLSMeetingAction::find($id);
		//show the view and pass the $action to it
		return View::make('action.mshow')->with('action',$action);
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
		$action = UNHLSEventAction::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('action.edit')->with('action', $action);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			// $action = UNHLSEventAction::find($id);
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
			$action = UNHLSEventAction::find($id);
			$action->action_status_id = 1;
			
			$action->save();

			$solutions = Input::get('solution');

			foreach ($solutions as $ob) {
				$solution = new UNHLSEventActionSolution;
				$solution->event_action_id = Input::get('event_action_id');
				$solution->solution=$ob;
				
				$solution->save();
			}
			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-funder')) ->with('activeaction', $action ->id)
								->with('message', 'Successfully updated solutions for for ID No '.$solution->event_action_id);
		
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
		$action = UNHLSEventAction::find($id);

		$actionInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($actionInUse)) {
		    // The test category is not in use
			$action->delete();
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


