@extends("layout-menu")
@section("content")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.flip-card {
  background-color: transparent;
  width: 50px;
  height: 50px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #ffffff;
  color: black;
  z-index: 2;
}

.flip-card-back {
  background-color: #ffffff;
  color: white;
  transform: rotateY(180deg);
  z-index: 1;
}

/*.section-title {
text-align:center;
margin-top: 1em;
background-color: #e5e8e8;
padding: .5em 0;
border-radius: .3em;
}
.service {
border-radius: .3em;
background-color: white;
border: 1px solid grey;
box-sizing: border-box;
text-align: center;
padding: 3em 2em 1em 2em;

}*/
.service .glyphicon {
font-size: 3em;
color: #34495e;
}

.circle {
  height: 50px;
  width: 50px;
  /*background-color: #eee;*/
  border-radius: 50%;
}

/*.panel > .panel-heading {
    background-image: none;
    background-color: #BBFA7C;
    color: white;

}*/
</style>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105243767-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-105243767-2');
</script>

<!--
<div class='container-fluid'>

</div>-->

@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="panel">
	<div class="panel-heading ">
		<!-- <span class="glyphicon glyphicon-dashboard"></span>
		
    <marquee direction="down" scrollamount='1'><h3> NATIONAL HEALTH LABORATORY SERVICES and DIAGNOSTICS</h3></marquee> -->
		
		<h2>DASHBOARD</h2>
	</div>
	

  <div class="panel-body">
    
           
            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                
                                <div class="col-xs-9 text-right">
                                    <div>NHLDS SYSTEMS</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <ul>
                                <li><a href="http://www.cphl.go.ug/" target="_blank" >NHLDS Website</a></li>
                                <li><a href="http://10.200.254.66:5152/" target="_blank">Inventory Mgt System</a></li>
                                <li><a href="https://10.200.254.70/" target="_blank">EID Dashboard</a></li>
                                <li><a href="https://10.200.254.70:1111/" target="_blank">VL Dashboard</a></li>
                                <li><a href="http://10.200.254.31/" target="_blank">ALIS</a></li>
                                <li><a href="http://10.200.254.59:8080/" target="_blank">Hub Module</a></li>
                                <li><a href="http://10.200.254.36/" target="_blank">Microbiology</a></li>
                                <li><a href="http://10.200.254.66:5151/" target="_blank">Archival System</a></li>
                                <li><a href="http://10.200.254.66/" target="_blank">Cytoflex Results Management System</a></li>
                                <li><a href="#" target="_blank">Human Resource</a></li>  
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                
                                <div class="col-xs-9 text-right">
                                    <div>Report templates</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                               
                                @foreach($template as $template)
        <ul @if(Session::has('activetemplate'))
                            {{(Session::get('activetemplate') == $template->id)?"class='info'":""}}
                        @endif
                        >

                    <li>
                    <a href="{{ URL::to( 'attachment1/' . $template->doc) }}"
                      target="_blank">{{ $template->doc }}</a>
                    </li>
                                </ul>
                                @endforeach
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading white">
                            <div class="row">
                                <div class="col-xs-3">
                                    <a href="#" ></a>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <div class="huge"></div>
                                    <div>Leave forms</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::route('leave.create') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Click here to access a leave form</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 
            
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                
                                <div class="col-xs-9 text-right">
                                    <div align="center">Sections</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                            <div class="row service">
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: fuchsia" class="glyphicon glyphicon-stats" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('meetings.report')}}">Reports</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: limegreen" class="glyphicon glyphicon-list" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('event.index')}}">Activities</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: mediumblue" class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('meetings.meetingindex')}}"><strong>Meetings</strong></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: darkred" class="glyphicon glyphicon-filter" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('event.calender')}}"><strong>Dashboard</strong></a>
          </div>
        </div>
      </div>
    </div>


    </div>
    <div class="row spacedtop service">
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: greenyellow" class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('event.team')}}"><strong>Team</strong></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: indigo" class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('invitation.invitation_index')}}"><strong>Invitations</strong></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
          <span style="color: red" class="glyphicon glyphicon-file" aria-hidden="true"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('letters.letter_index')}}"><strong>Memo</strong></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
    <span style="color: orange" class="glyphicon glyphicon-cog" aria-hidden="true" background-color="red"></span>
          </div>
          <div class="flip-card-back">
          <a href="{{ URL::route('user.index')}}"><strong>Access Control</strong></a>
          </div>
        </div>
      </div>
    </div>
    

                                
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            
                </div>
                <!-- /.col-lg-4 -->
            

  </div>
</div>


<div class="row">
<div class="col-lg-8 col-md-6">

<div class="panel" style="background-color: #cce6ff">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-dashboard"></span>
        Recent
        
        
    </div>
    
    <div class="panel-body" style="background-color: #ffffff">
        <table class="table table-striped table-hover table-condensed search-table">
            <!-- <table class="table text-wrap"> -->
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Name</th>
                    

                </tr>
            </thead>
            <tbody>
                
             @foreach($events as $key => $event)
              
                <tr @if(Session::has('activeevent'))
                        {{(Session::get('activeevent') == $event->id)?"class='info'":""}}
                    @endif
                >
                    <td>{{ $event->start_date }}</td>
                    <td>{{ date('d', strtotime($event->start_date)) }}-{{ date('d M', strtotime($event->end_date)) }}</td>
                    <td>{{ $event->name }}</td>

                    
                </tr>
            @endforeach

            @foreach($meetings as $key => $meetings)
             
                    <tr  @if(Session::has('activemeetings'))
                        {{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
                    @endif
                >
                    <td>{{$meetings->start_time }}</td>
                   <td>{{ date('d', strtotime($meetings->start_time)) }}-{{ date('d M', strtotime($meetings->end_time)) }}</td>
                    <td>{{ $meetings->name }}</td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

</div>
<div class="col-lg-4 col-md-6">

<div class="panel" style="background-color: #ffccff">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-dashboard"></span>
         <i>Upcoming Meetings</i>
        
        
    </div>
    
    <div class="panel-body" style="background-color: #faf5ff">
      <div class="table-responsive">
        <table class="table text-wrap">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>

            @foreach($mupcoming as $key => $meetings)
               
                    <tr  @if(Session::has('activemeetings'))
                        {{(Session::get('activemeetings') == $meetings->id)?"class='info'":""}}
                    @endif
                >
                    <td>{{$meetings->start_time }}</td>
                    <td> &nbsp; &nbsp; &nbsp; &nbsp;{{ $meetings->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
      <hr class="my-0">
      </div>
    </div>
</div>
<div class="panel" style="background-color: #ffe6ff">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-dashboard"></span>
        <i>Upcoming Field Activity</i>
        
        
    </div>
    
    <div class="panel-body" style="background-color: #ffffff">
      <div class="table-responsive">
        <table class="table text-wrap">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                
            @foreach($upcoming as $key => $event)
             
                <tr @if(Session::has('activeevent'))
                        {{(Session::get('activeevent') == $event->id)?"class='info'":""}}
                    @endif
                >
                    <td>{{ date('d', strtotime($event->start_date)) }}-{{ date('d M Y', strtotime($event->end_date)) }}</td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $event->name }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
      <hr class="my-0">
      </div>
    </div>
</div>

<div class="panel" style="background-color: #cce6ff">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-dashboard"></span>
         <i>Staff leave List</i>
        
        
    </div>
    
    <div class="card-body" style="background-color: #ffffff">
      <div class="table-responsive">
        <table class="table text-wrap">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Duration</th>
                    
                </tr>
            </thead>
    
            <tbody>

            @foreach($leave as $key => $leave)
             
                <tr @if(Session::has('activeleave'))
                        {{(Session::get('activeleave') == $leave->id)?"class='info'":""}}
                    @endif
                >
                    <td>{{ $leave->name }}</td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
      <hr class="my-0">
    </div>
  </div>
</div>
</div>
</div>

@stop