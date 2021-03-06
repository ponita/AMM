<?php

class FunderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		$funders = Funder::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('funders.index')->with('funders',$funders);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Create test category
		return View::make('funders.create');
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
			$funders = new Funder;
			$funders->name = Input::get('name');
			$funders->description = Input::get('description');
			try{
				$funders->save();
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-funder')) ->with('activefunders', $funders ->id);
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
		$funders = Funder::find($id);
		//show the view and pass the $funders to it
		return View::make('funders.show')->with('funders',$funders);
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
		$funders = Funder::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('funders.edit')->with('funders', $funders);
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
			$funders = Funder::find($id);
			$funders->name = Input::get('name');
			$funders->description = Input::get('description');
			$funders->save();

			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-funder')) ->with('activefunders', $funders ->id);
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
		$funders = Funder::find($id);

		$fundersInUse = TestType::where('test_category_id', '=', $id)->first();
		if (empty($fundersInUse)) {
		    // The test category is not in use
			$funders->delete();
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

