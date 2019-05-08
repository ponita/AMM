<?php

class UnhlsWorkplanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		// $thematicAreas =['Select department']+ ThematicAreas::orderBy('name')->lists('name','id');
		
		$departments = Department::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('unhlsWorkplan.index')->with('departments',$departments);
										// ->with('thematicAreas', $thematicAreas);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$thematicAreas =['Select department']+ ThematicAreas::orderBy('name')->lists('name','id');
		//Create test category
		return View::make('unhlsWorkplan.create')->with('thematicAreas', $thematicAreas);
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
			$departments = new Department;
			$departments->name = Input::get('name');
			$departments->thematicArea_id = Input::get('thematicArea_id');
		
				$departments->save();

			$dptworkplan = Input::get('workplan');
		$dates_fro = Input::get('from_timeframe');
		$dates_to = Input::get('to_timeframe');
		foreach($dptworkplan as $k=>$wk) {
		$workplan = new DepartmentWorkplan;
		// $workplan->thematicArea_id = $thematicAreas->id;
		$workplan->department_id = $departments->id;
		$workplan->workplan= $wk;
		$workplan->from_timeframe= $dates_fro[$k];
		$workplan->to_timeframe= $dates_to[$k];
		$workplan->save();
		}
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activedepartments', $departments ->id)
					->with('message', trans('messages.success-creating-department')) ->with('activedepartments', $workplan ->department_id);
					// ->with('message', trans('messages.success-creating-department')) ->with('activedepartments', $thematicAreas ->id);
			
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
		$departments = Department::find($id);
		//show the view and pass the $departments to it
		return View::make('unhlsWorkplan.show')->with('departments',$departments);
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
		$departments = Department::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('unhlsWorkplan.edit')->with('departments', $departments);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validate
		// $rules = array('name' => 'required');
		// $validator = Validator::make(Input::all(), $rules);

		// // process the login
		// if ($validator->fails()) {
		// 	return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		// } else {
			// Update
			$departments = Department::find($id);
			$departments->save();

		$dptworkplan = Input::get('workplan');
		$dates_fro = Input::get('from_timeframe');
		$dates_to = Input::get('to_timeframe');
		foreach($dptworkplan as $k=>$wk) {
		$workplan = new DepartmentWorkplan;
		// $workplan->thematicArea_id = $thematicAreas->id;
		$workplan->department_id = $departments->id;
		$workplan->workplan= $wk;
		$workplan->from_timeframe= $dates_fro[$k];
		$workplan->to_timeframe= $dates_to[$k];
		$workplan->save();
		}
			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-department')) ->with('activedepartments', $departments ->id)
				->with('message', trans('messages.success-updating-department')) ->with('activedepartments', $workplan ->department_id);
		
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
		$departments = Department::find($id);

		$departmentsInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($departmentsInUse)) {
		    // The test category is not in use
			$departments->delete();
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
