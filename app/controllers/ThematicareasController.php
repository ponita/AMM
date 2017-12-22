<?php

class ThematicareasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		$thematicAreas = ThematicAreas::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('thematicAreas.index')->with('thematicAreas',$thematicAreas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create test category
		return View::make('thematicAreas.create');
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
			$thematicAreas = new ThematicAreas;
			$thematicAreas->name = Input::get('name');
			$thematicAreas->description = Input::get('description');
			try{
				$thematicAreas->save();
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-test-category')) ->with('activethematicAreas', $thematicAreas ->id);
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
		$thematicAreas = ThematicAreas::find($id);
		//show the view and pass the $thematicAreas to it
		return View::make('thematicAreas.show')->with('thematicAreas',$thematicAreas);
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
		$thematicAreas = ThematicAreas::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('thematicAreas.edit')->with('thematicAreas', $thematicAreas);
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
		$rules = array('name' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		} else {
			// Update
			$thematicAreas = ThematicAreas::find($id);
			$thematicAreas->name = Input::get('name');
			$thematicAreas->description = Input::get('description');
			$thematicAreas->save();

			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-test-category')) ->with('activethematicAreas', $thematicAreas ->id);
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
		$thematicAreas = ThematicAreas::find($id);

		$thematicAreasInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($thematicAreasInUse)) {
		    // The test category is not in use
			$thematicAreas->delete();
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
