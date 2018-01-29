<?php

class MetricController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$metrics = Metric::orderBy('name', 'ASC')->get();
		return View::make('metric.index')->with('metrics', $metrics);
		//return View::make('inventory.metricsList');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('metric.create');
	}

	public function store()
	{
		//
		$rules = array(
			'unit-of-issue' => 'required|unique:metrics,name');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('metric.index')->withErrors($validator);
		} else {
			// store
			$metric = new Metric;
			$metric->name= Input::get('unit-of-issue');
			$metric->description= Input::get('description');
			try{
				$metric->save();
				$url = Session::get('SOURCE_URL');
				return Redirect::route('metric.index') ->with('message', trans('messages.metric-succesfully-added'));
			}catch(QueryException $e){
				Log::error($e);
			}
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$metrics = Metric::find($id);

		//Open the Edit View and pass to it the $patient
		return View::make('metric.edit')->with('metrics', $metrics);
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
			return Redirect::route('metric.index')->withErrors($validator);
		} else {
		// Update
			$metric = Metric::find($id);
			$metric->name= Input::get('unit-of-issue');
			$metric->description= Input::get('description');
				
		try{
			$metric->save();
			return Redirect::route('metric.index')
			->with('message', trans('messages.success-updating-metric'))->with('activemetric', $metric ->id);
			}catch(QueryException $e){
				Log::error($e);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//Soft delete the patient
		$metric = Metric::find($id);
		$metric->delete();

		// redirect
		return Redirect::route('metric.index')->with('message', trans('messages.metric-succesfully-deleted'));
	}
}
