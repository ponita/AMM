
				<option value="">Select Strategic plan</option>
					@foreach($departments as $key=>$value)
	
		            <option value="{{$value->id}}">{{$value->name}}</option>
		           
		@endforeach
		