<?php

class HubController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//List all test categories
		$hubs = Hub::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('hubs.index')->with('hubs',$hubs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$facilities = Facility::orderBy('name')->get();
		
		//Create test category
		return View::make('hubs.create')->with('facilities', $facilities);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $formdata = Input::all();
		// print_r($formdata);
		// exit();

		//Validation
		$rules = array('name' => 'required|unique:test_categories,name');
		$validator = Validator::make(Input::all(), $rules);
	
		//process
		if($validator->fails()){
			$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)->withErrors($validator);
		}else{
			//store
			$hubs = new Hub;
			$hubs->name = Input::get('name');
			$hubs->save();

			$facilitys = Input::get('facilityId');
		foreach ($facilitys as $fa) {
			$facility = new HubFacilities;
			$facility->hub_id = $hubs->id;
			$facility->facilityId=$fa;
			$facility->save();			# code...
		}
		
				
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-Hubs')) ->with('activehub', $hubs ->id)
								->with('message', 'Successfully registered an activity with ID No '.$facility->hub_id);
							
			
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
		$hubs = Hub::find($id);

		// dd($hubs );
		//show the view and pass the $hubs to it
		return View::make('hubs.show')->with('hubs',$hubs);
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
		$hubs = Hub::find($id);
		
		$facilities = Facility::orderBy('name')->get();

		//Open the Edit View and pass to it the $patient
		return View::make('hubs.edit')->with('hubs', $hubs)
								->with('facilities', $facilities);
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
			$hubs = Hub::find($id);
			$hubs->name = Input::get('name');
			$hubs->save();

			$facilitys = Input::get('facilityId');
		foreach ($facilitys as $fa) {
			$facilityId = new HubFacilities;
			$facilityId->hub_id = $hubs->id;
			$facilityId->facilityId=$fa;
			$facilityId->save();			# code...
		
			// redirect
			$url = Session::get('SOURCE_URL');
            
            return Redirect::to($url)
				->with('message', trans('messages.success-updating-Hubs')) ->with('activehubs', $hubs ->id)
								->with('message', 'Successfully registered an activity with ID No '.$facilityId->hub_id);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	
	/**
	 * Remove the specified resource from storage (soft delete).
	 *
	 * @param  int  $id
	 * @return Response
	 */

}

}
