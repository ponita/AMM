<?php

	# This class require_onces functions to access and use the different drop down lists within
	# this application

	/**
	 * function to return the results of an options query as array. This function assumes that
	 * the query returns two columns optionvalue and optiontext which correspond to the corresponding key
	 * and values respectively. 
	 * 
	 * The selection of the names is to avoid name collisions with database reserved words
	 * 
	 * @param String $query The database query
	 * 
	 * @return Array of values for the query 
	 */
	function getOptionValuesFromDatabaseQuery($query) {
		//$conn = getDatabaseConnection(); 
		//echo $query;
		$result = DB::select($query);
		//print_r($result);
		//exit;
		$valuesarray = array();
		foreach ($result as $value) {
			$valuesarray[$value->optionvalue]	= htmlentities($value->optiontext);
		}
		//print_r($valuesarray);
		//exit;
		return decodeHtmlEntitiesInArray($valuesarray);
	}
      
	//get all facilities
	function getAllHubs(){
		$hubs = array_merge_maintain_keys(array('' => 'Select One'), Facility::where('parentid', '=', NULL)->lists('name', 'id'));
		return $hubs;
	}
	
	function getAllHealthRgions(){
		$healthregions = array_merge_maintain_keys(array('' => 'Select One'), \App\Models\HeathRegion::pluck('name', 'id'));
		return $healthregions;
	}
	
	function getAllDistricts(){
		$districts =  District::lists('name', 'id');
		return $districts;
	}

	
	
	function getFacilitiesforHub($hubid){
		$facilities = Facility::where('parentid', '=', $hubid)->lists('name', 'id');
		return $facilities;
	}
	
		
	function getDistrictforHub($hubid){
		$valuesquery = "SELECT d.id as optionvalue, d.name as optiontext 
		FROM facility f
		INNER JOIN district d ON(f.districtid = d.id)
		WHERE  f.id = '".$hubid."' ORDER BY optiontext";
		return getOptionValuesFromDatabaseQuery($valuesquery);
	}
	
	function getGenerateHtmlforAjaxSelect($options, $empty_string = 'Select One'){
		$select_string = '<option value="">'.$empty_string.'</option>';
		foreach($options as $key => $value){
			$select_string .= '<option value="'.$key.'">'.$value.'</option>';
		}
		return $select_string;
	}
?>