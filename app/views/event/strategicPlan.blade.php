<!--@extends("layout")-->
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
	  <li class="active"><a href="{{ URL::route('meetings.report') }}">Report</a></li>
	</ol>
</div>
<!--
<div class='container-fluid'>

</div>-->


@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-dashboard"></span>
		UNHLS WORKPLAN
		 <!-- ({{ count($meetings); }}) -->
		

		
		
	</div>

    <ul class="nav nav-tabs">
   <li class="active"><a href="#">Home</a></li> 
   <li><a href="#">SVN</a></li> 
   <li><a href="#">iOS</a></li> 
   <li><a href="#">VB.Net</a></li> 
   <li class="dropdown"> 
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
         HLIMS <span class="caret"></span> 
      </a> 
    
      <ul class="dropdown-menu"> 
        @foreach($departments as $key => $value)
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
         {{ $value->name }} <span class="caret"></span> 
      </a></li> 
        @endforeach 
          <ul class="nav nav-pills nav-stacked"> 
        @foreach($departmentworkplan as $key => $value)
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
         {{ $value->name }} <span class="caret"></span> 
      </a></li> 
        @endforeach 
          <ul class="nav nav-pills nav-stacked"> 
        @foreach($events as $key => $value)
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
         {{ $value->name }} <span class="caret"></span> 
      </a></li> 
        @endforeach 
            
      </ul>  
      </ul>  
      </ul>
  </li>
</ul>

    <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
        <li role="presentation" class="active">
            <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">HLIMS</a>
        </li>
         <li role="presentation" class="">
            <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Operation</a>
        </li>
         <li role="presentation" class="dropdown">
          <a href="#" id="myTabDrop1" class="dropdown- ← toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded=" ← false">Dropdown <span class="caret"></span></a>
     <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
      <li class="">
        <a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab" aria- ← controls="dropdown1" aria-expanded="false">Dropdown1</a>
    </li> 
    <li><a href="#dropdown2" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls= ← "dropdown2" aria-expanded="false">Dropdown2</a>
    </li> 
</ul> 
</li> 
</ul>
<!-- <div id="myTabContent" class="tab-content">
   @foreach($thematicAreas as $key => $value)
    @if($value->id == 1)
 <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" ← >
    <pre>

        <strong style="color: red">Department</strong> {{ $value->name }}
        <br>
        @foreach($departments as $key => $value)

            <strong style="color: blue">Strategic Plan</strong> : {{ $value->name }}

            @foreach($departmentworkplan as $key => $value)
                <strong style="color: green">Objective</strong> : {{ $value->workplan }}<br>
                
                @foreach($events as $key => $event)
                    Event: {{ $event->name }}
                @endforeach()

            @endforeach()


        @endforeach()

    </pre>


    </div >
    
 @endif

 @endforeach() -->
    <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="profile-tab" ← > Raw denim you probably haven’t heard of them jean shorts Austin. Nesciunt tofu ← stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg ← carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. ← Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat ← salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher ← voluptate nisi qui. 
    </div >
    <!--  <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="profile-tab" ←> Food truck fixie locavore, accusamus mcsweeney’s marfa nulla single-origin coffee squid ← . Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson ← artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, ← commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo ← nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica ← VHS salvia yr, vero magna velit sapiente labore stumptown. 
     </div > -->
      <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab" ← > Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney’s ← organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify ← pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy ← hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred ← pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel ← fixie etsy retro mlkshk vice blog. Scenester cred you probably haven’t heard of them ← , vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr. 
     </div > 
        <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab" ← > Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they ← sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny ← pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. ← Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS ← viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats ← keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park ← vegan. 
        </div >
     </div >
	
	<div class="panel-body">

	<div class="container">

    <div class="page-header">
      <h1>SubCategory<small> Repository</small></h1>
    </div>

    <!-- @foreach($thematicAreas as $key => $value) -->
    
    <pre>

        <strong style="color: red">Department</strong> {{ $value->name }}
        <br>
        @foreach($departments as $key => $value)

            <strong style="color: blue">Strategic Plan</strong> : {{ $value->name }}

            @foreach($departmentworkplan as $key => $value)
                <strong style="color: green">Objective</strong> : {{ $value->workplan }}<br>
                
                @foreach($events as $key => $event)
                    Event: {{ $event->name }}
                @endforeach()

            @endforeach()


        @endforeach()

    </pre>

    <!-- @endforeach() -->


</div>

</div>
</div>
@stop

