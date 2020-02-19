<!--@extends("layout")-->
@section("content")



<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active">leave </li>
	</ol>
</div>



@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<!-- <div class="container-fluid" onclick="myFunction()">
	<h3><strong>Leave</strong></h3>
</div> -->

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
	{{ count($actualdata); }}
		
		
	</div>
	
	<div class="panel panel-default">
        <div class="panel-heading"><h1>Products</h1></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                            
         <?php
          for ($i=0; $i < count($actualdata); $i++) { 
		 	$user = (array)$actualdata[$i];

		 	echo "$i. ".$user['STAFFNAME']."<br>";
		 }
		 ?>


                        </div>
               <div class="col-md-12 ">
		<span class="glyphicon glyphicon-dashboard"></span>
		
		
	</div>
            </div>
        </div>

        </div>
    
			
		{{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}
	
</div>
@stop