<?php

class GramStainResultController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		|	not a logical function since GramStainResult
		|	should be specific to a particular result
		*/
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$gramStainResult = new GramStainResult;
		$gramStainResult->test_id = Input::get('test_id');
		$gramStainResult->user_id = Auth::user()->id;
		$gramStainResult->gram_stain_range_id = Input::get('gram_stain_range_id');
		$gramStainResult->save();
		return $gramStainResult->load('gramStainRange');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($testId)
	{
		//Get the gram stain ranges for gram stain
		$test = UnhlsTest::find($testId);
		$gramStainRanges = ['']+GramStainRange::lists('name', 'id');
		return View::make('unhls_test.gramstain.edit')
			->with('gramStainRanges', $gramStainRanges)
			->with('test', $test);
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
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gramStainResult = GramStainResult::find($id);
		$gramStainResult->delete();
		return $id;
	}
}
