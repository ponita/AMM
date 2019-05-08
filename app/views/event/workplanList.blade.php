{{Form::label('workplan-list', 'Select sub-objective')}}
	<div class="container-fluid">
		
		<div class="col-md-6">
			<label  class="checkbox">
				<select id="workplan" class="form-control input-sm" name="workplan">
					<option>Select Sub Objective</option>
					@foreach($workplan as $key=>$value)
		            <option value="{{$value->id}}">{{$value->workplan}}</option>
		@endforeach
		       </select>
				
		</div>
		
</div>