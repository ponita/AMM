<?php

class YearStrategicplanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function yearActivitiesIndex()
	{
		$funder =['Select funder']+ Funder::orderBy('name')->lists('name', 'id');
		$activities = YearActivities::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('strategicplans.yearActivities.index')
		->with('funder',$funder)
		->with('activities',$activities);
										// ->with('thematicAreas', $thematicAreas);
	}
	public function yearActivitylocationIndex()
	{
		
		$location = YearActivityLocation::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('strategicplans.yearActivitylocation.index')->with('location',$location);
										// ->with('thematicAreas', $thematicAreas);
	}
	public function yearObjectivesIndex()
	{
		
		$obj = YearObjectives::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('strategicplans.yearObjectives.index')->with('obj',$obj);
										// ->with('thematicAreas', $thematicAreas);
	}
	public function yearplanIndex()
	{
		$yrobj = YearObjectives::all();
		$data = DB::Select(
			
			"SELECT 
				
				B.name AS objective, B.id AS identity, 
				C.name AS strategy,
				D.name AS sub_objective,
				E.name AS activity, person_responsible, funder,
				F.name AS sub_activities, location, target, from_timeframe, to_timeframe  
				
				     FROM year_objectives AS B 
				     LEFT JOIN year_strategies AS C ON C.year_objective_id = B.id
				     LEFT JOIN year_subobjectives AS D ON D.year_strategies_id = C.id 
				     LEFT JOIN year_activities AS E ON E.year_subobjectives_id = D.id 
				     LEFT JOIN year_subactivities AS F ON F.year_activities_id = E.id 
				     
				     
			ORDER BY identity, objective, strategy, sub_objective, activity, funder, sub_activities, location, target, person_responsible, from_timeframe, to_timeframe"
 
	);
		
		return View::make('strategicplans.yearplan.index')->with('data',$data)
															->with('yrobj', $yrobj);
															
	}

	public function filteredyearplanIndex()
	{
		

		$data = YearObjectives::leftjoin('year_strategies AS C', 'C.year_objective_id', '=', 'year_objectives.id')
			->leftjoin('year_subobjectives AS D', 'D.year_strategies_id', '=', 'C.id')
			->leftjoin('year_activities AS E', 'E.year_subobjectives_id', '=', 'D.id')
			->leftjoin('year_subactivities AS F', 'F.year_activities_id', '=', 'E.id')
			->select('year_objectives.id as identity', 'year_objectives.name as objective', 'C.name as strategy', 'D.name as sub_objective', 'E.name as activity', 'E.person_responsible', 'E.funder','F.name as sub_activities', 'F.location', 'F.target', 'F.from_timeframe', 'F.to_timeframe')
			->from('year_objectives')
			->get();

			// $dateframe = YearSubActivities::orderBy('name', 'ASC')->get();;
			// $start = date_create($dateframe->from_timeframe = Input::get('from_timeframe'));
			// 				$end = date_create($dateframe->to_timeframe = Input::get('to_timeframe'));
			// 				$interval = DateInterval::createFromDateString('1 month');
			// 				$period   = new DatePeriod($start, $interval, $end);
			// 				$spanned_months = array();
			// 				foreach ($period as $dt) {
	  //   						$spanned_months[] = $dt->format("n");
			// 				}
		
		return View::make('strategicplans.yearplan.filtered')	
															->with('data', $data);	
										
	}
	public function yearstrategiesIndex()
	{
		
		$stgic = YearStrategies::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('strategicplans.yearstrategies.index')->with('stgic',$stgic);
										// ->with('thematicAreas', $thematicAreas);
	}
	public function yearSubactivitiesIndex()
	{
		
		$subactivities = YearSubActivities::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('strategicplans.yearSubactivities.index')->with('subactivities',$subactivities);
										// ->with('thematicAreas', $thematicAreas);
	}
	public function yearSubobjectivesIndex()
	{
		
		$subobj = YearSubObjectives::orderBy('name', 'ASC')->get();
		//Load the view and pass the test categories
		return View::make('strategicplans.yearSubobjectives.index')->with('subobj',$subobj);
										// ->with('thematicAreas', $thematicAreas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function yearActivitiesCreate()
	{
		$funders =['Select funder']+ Funder::orderBy('name')->lists('name', 'id');
		$thematicAreas =['Select sub objective']+ YearSubObjectives::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearActivities.create')
		->with('funders', $funders)
		->with('thematicAreas', $thematicAreas);
	}
	public function yearActivitylocationCreate()
	{
		
		$thematicAreas =['Select sub activity']+ YearSubActivities::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearActivitylocation.create')->with('thematicAreas', $thematicAreas);
	}
	public function yearObjectivesCreate()
	{
		
		$thematicAreas =['Select strategic plan']+ YearPlan::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearObjectives.create')->with('thematicAreas', $thematicAreas);
	}
	public function yearplanCreate()
	{
		
		$thematicAreas =['Select department']+ YearPlan::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearplan.create')->with('thematicAreas', $thematicAreas);
	}
	public function yearstrategiesCreate()
	{
		
		$thematicAreas =['Select objective']+ YearObjectives::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearstrategies.create')->with('thematicAreas', $thematicAreas);
	}
	public function yearSubactivitiesCreate()
	{
		
		$thematicAreas =['Select activity']+ YearActivities::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearSubactivities.create')->with('thematicAreas', $thematicAreas);
	}
	public function yearSubobjectivesCreate()
	{
		
		$thematicAreas =['Select strategy']+ YearStrategies::orderBy('name')->lists('name','id');
		//Create category
		return View::make('strategicplans.yearSubobjectives.create')->with('thematicAreas', $thematicAreas);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function yearActivitiesStore()
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
			$activities = new YearActivities;
			$activities->name = Input::get('name');
			$activities->person_responsible = Input::get('person_responsible');
			$activities->funder = Input::get('funder');
			$activities->year_subobjectives_id = Input::get('year_subobjectives_id');
			$activities->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activeactivities', $activities ->id);
			
		}
	}

	public function yearActivitylocationStore()
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
			$location = new YearActivityLocation;
			$location->name = Input::get('name');
			$location->target = Input::get('target');
			$location->from_timeframe = Input::get('from_timeframe');
			$location->to_timeframe = Input::get('to_timeframe');
			$location->year_subactivities_id = Input::get('year_subactivities_id');
			$location->save();

			
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activelocation', $location ->id);
			
		}
	}

	public function yearObjectivesStore()
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
			$obj = new YearObjectives;
			$obj->name = Input::get('name');
			$obj->year = Input::get('year');
			$obj->save();
	
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activeobj', $obj ->id);
			
		}
	}

	public function yearplanStore()
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
			$yearplan = new YearPlan;
			$yearplan->name = Input::get('name');
			$yearplan->year = Input::get('year');
			$yearplan->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activedepartments', $yearplan ->id);
					
			
		}
	}

	public function yearstrategiesStore()
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
			$stgic = new YearStrategies;
			$stgic->name = Input::get('name');
			$stgic->year_objective_id = Input::get('year_objective_id');
			$stgic->save();
	
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activestgic', $stgic ->id);
			
		}
	}

	public function yearSubactivitiesStore()
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
			$subactivities = new YearSubActivities;
			$subactivities->name = Input::get('name');
			$subactivities->location = Input::get('location');
			$subactivities->target = Input::get('target');
			$subactivities->from_timeframe = Input::get('from_timeframe');
			$subactivities->to_timeframe = Input::get('to_timeframe');
			$subactivities->year_activities_id = Input::get('year_activities_id');
			$subactivities->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activesubactivities', $subactivities ->id);
			
		}
	}

	public function yearSubobjectivesStore()
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
			$subobj = new YearSubObjectives;
			$subobj->name = Input::get('name');
			$subobj->year_strategies_id = Input::get('year_strategies_id');
			$subobj->save();
		
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activesubobj', $subobj ->id);
			
		}
	}

	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function yearActivitiesShow($id)
	{
		//show a test category
		$activities = YearActivities::find($id);
		//show the view and pass the $activities to it
		return View::make('strategicplans.yearActivities.show')->with('activities',$activities);
	}

	public function yearActivitylocationShow($id)
	{
		//show a test category
		$location = YearActivityLocation::find($id);
		//show the view and pass the $location to it
		return View::make('strategicplans.yearActivitylocation.show')->with('location',$location);
	}

	public function yearObjectivesShow($id)
	{
		//show a test category
		$obj = YearObjectives::find($id);
		//show the view and pass the $obj to it
		return View::make('strategicplans.yearObjectives.show')->with('obj',$obj);
	}

	public function yearplanShow($id)
	{
		//show a test category
		$yearplan = YearPlan::find($id);
		//show the view and pass the $departments to it
		return View::make('strategicplans.yearplan.show')->with('yearplan',$yearplan);
	}

	public function yearstrategiesShow($id)
	{
		//show a test category
		$stgic = YearStrategies::find($id);
		//show the view and pass the $stgic to it
		return View::make('strategicplans.yearstrategies.show')->with('stgic',$stgic);
	}

	public function yearSubactivitiesShow($id)
	{
		//show a test category
		$subactivities = YearSubActivities::find($id);
		//show the view and pass the $subactivities to it
		return View::make('strategicplans.yearSubactivities.show')->with('subactivities',$subactivities);
	}

	public function yearSubobjectivesShow($id)
	{
		//show a test category
		$subobj = YearSubObjectives::find($id);
		//show the view and pass the $subobj to it
		return View::make('strategicplans.yearSubobjectives.show')->with('subobj',$subobj);
	}

	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function yearActivitiesEdit($id)
	{
		//Get the patient
		$activities = YearActivities::find($id);
		$funders =['Select funder']+ Funder::orderBy('name')->lists('name', 'id');
		$thematicAreas =['Select sub objective']+ YearSubObjectives::orderBy('name')->lists('name','id');
		//Create category
		

		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearActivities.edit')
		->with('activities', $activities)
		->with('funders', $funders)
		->with('thematicAreas', $thematicAreas);
	}

	public function yearActivitylocationEdit($id)
	{
		//Get the patient
		$location = YearActivityLocation::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearActivitylocation.edit')->with('location', $location);
	}

	public function yearObjectivesEdit($id)
	{
		//Get the patient
		$obj = YearObjectives::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearObjectives.edit')->with('obj', $obj);
	}

	public function yearplanEdit($id)
	{
		$yearplan = YearPlan::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearplan.edit')->with('yearplan', $yearplan);
	}

	public function yearstrategiesEdit($id)
	{
		//Get the patient
		$stgic = YearStrategies::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearstrategies.edit')->with('stgic', $stgic);
	}

	public function yearSubactivitiesEdit($id)
	{
		//Get the patient
		$subactivities = YearSubActivities::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearSubactivities.edit')->with('subactivities', $subactivities);
	}

	public function yearSubobjectivesEdit($id)
	{
		//Get the patient
		$subobj = YearSubObjectives::find($id);
		$thematicAreas =['Select strategy']+ YearStrategies::orderBy('name')->lists('name','id');
		//Open the Edit View and pass to it the $patient
		return View::make('strategicplans.yearSubobjectives.edit')->with('subobj', $subobj)
																->with('thematicAreas', $thematicAreas);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function yearActivitiesUpdate($id)
	{
		
			$activities = YearActivities::find($id);
			$activities->name = Input::get('name');
			$activities->year_subobjectives_id = Input::get('year_subobjectives_id');
			$activities->person_responsible = Input::get('person_responsible');
			$activities->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activeactivities', $activities ->id);
		
	}
	public function yearActivitylocationUpdate($id)
	{
		
			$location = YearActivityLocation::find($id);
			$location->name = Input::get('name');
			$location->year_subactivities_id = Input::get('year_subactivities_id');
			$location->save();

			
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activelocation', $location ->id);
		
	}
	public function yearObjectivesUpdate($id)
	{
		
			$obj = YearObjectives::find($id);
			$obj->name = Input::get('name');
			$obj->year = Input::get('year');
			$obj->save();
	
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activeobj', $obj ->id);
		
	}
	public function yearplanUpdate($id)
	{
		
			$yearplan = YearPlan::find($id);
			$yearplan->name = Input::get('name');
			$yearplan->year = Input::get('year');
			$yearplan->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activedepartments', $yearplan ->id);
					
		
	}
	public function yearstrategiesUpdate($id)
	{
		
			$stgic = YearStrategies::find($id);
			$stgic->name = Input::get('name');
			$stgic->year_objective_id = Input::get('year_objective_id');
			$stgic->save();
	
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activestgic', $stgic ->id);
		
	}
	public function yearSubactivitiesUpdate($id)
	{
		
			$subactivities = YearSubActivities::find($id);
			$subactivities->location = Input::get('location');
			$subactivities->update_from_timeframe = Input::get('update_from_timeframe');
			$subactivities->update_to_timeframe = Input::get('update_to_timeframe');
			$subactivities->target_count = Input::get('target_count');
			$subactivities->save();

				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activesubactivities', $subactivities ->id);
		
	}
	public function yearSubobjectivesUpdate($id)
	{
		
			$subobj = YearSubObjectives::find($id);
			$subobj->name = Input::get('name');
			$subobj->year_strategies_id = Input::get('year_strategies_id');
			$subobj->save();
		
				$url = Session::get('SOURCE_URL');
            
            	return Redirect::to($url)
					->with('message', trans('messages.success-creating-department')) ->with('activesubobj', $subobj ->id);
		
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
