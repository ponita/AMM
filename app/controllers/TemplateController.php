<?php

class TemplateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				$template = Templte::orderBy('id','DESC')->get();		
		
		return View::make('template.index')->with('template', $template);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
	return View::make('template.create');
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
		//	'patient_number' => 'required|unique:patients,patient_number',
			'user_id' => 'required',
			't_name' => 'required',
			

		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {

			return Redirect::route('template.create')
                ->withErrors($validator)
                ->withInput(Input::except('doc'));
		}
		else {

		$template = new Templte;

		$template->user_id = Input::get('user_id');
		$template->t_name = Input::get('t_name');
		// $template->doc = Input::get('doc');
		
		if (Input::hasFile('doc')) {
        	$file = Input::file('doc');
        	$destinationPath = public_path().'\attachment1';
        	$filename = 'NHLDS'.$template->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);
        	$template->doc = $filename;
        }
		$template->save();
    	
			$url = Session::get('SOURCE_URL');



		return Redirect::to('template')->with('message', 'Successfully registered a template with ID No '.$template->id);
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
		
	}

	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = Templte::find($id);
	
	return View::make('template.edit')->with('template', $template);
		
	}

	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$template = Templte::find($id);

		$template->user_id = Input::get('user_id');
		// $template->doc = Input::get('doc');
		
		if (Input::hasFile('doc')) {
        	$file = Input::file('doc');
        	$destinationPath = public_path().'\attachment2';
        	$filename = 'Template'.$template->id . '_' . $file->getClientOriginalName();
        	$uploadSuccess = $file->move($destinationPath, $filename);
        	$template->doc = $filename;
        }
		$template->save();

			$url = Session::get('SOURCE_URL');



		return Redirect::to('template')->with('message', 'Successfully registered a template with ID No '.$template->id);	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		 $template = Templte::find($id);

        $template->delete();

        // redirect
        $url = Session::get('SOURCE_URL');

        return Redirect::to($url)->with('message', trans('messages.success-deleting-user'));
	}


}
