<?php

class OrganiserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		$organisers = Organiser::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('organisers.index')->with('organisers',$organisers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create test category
		return View::make('organisers.create');
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
			$organisers = new Organiser;
			$organisers->name = Input::get('name');
			$organisers->description = Input::get('description');
			try{
				$organisers->save();
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-organiser')) ->with('activeorganisers', $organisers ->id);
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
		$organisers = Organiser::find($id);
		//show the view and pass the $organisers to it
		return View::make('organisers.show')->with('organisers',$organisers);
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
		$organisers = Organiser::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('organisers.edit')->with('organisers', $organisers);
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
			$organisers = Organiser::find($id);
			$organisers->name = Input::get('name');
			$organisers->description = Input::get('description');
			$organisers->save();

			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-organiser')) ->with('activeorganisers', $organisers ->id);
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
		$organisers = Organiser::find($id);

		$organisersInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($organisersInUse)) {
		    // The test category is not in use
			$organisers->delete();
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
