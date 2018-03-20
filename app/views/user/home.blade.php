@extends("layout-menu")
@section("content")

<style type="text/css">
.section-title {
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

}
.service .glyphicon {
font-size: 5em;
color: #34495e;
}
</style>


<div class="container" border: 1px solid grey;
    box-sizing: border-box;>
<h2 class="section-title"><strong>ATM</strong></h2>
	
	<div class="row">
		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('event.report')}}">
		<span style="color: fuchsia" class="glyphicon glyphicon-stats" aria-hidden="true"></span>
		<h3><strong>Reports</strong></h3>

		</div >
		</div >
		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('event.index')}}">
		<span style="color: limegreen" class="glyphicon glyphicon-list" aria-hidden="true"></span>
		<h3><strong>Activities</strong></h3>

		</div >
		</div >


		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('meetings.meetingindex')}}">
		<span style="color: mediumblue" class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
		<h3><strong>Meetings</strong></h3>

		</div >
		</div >
		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('event.calender')}}">
		<span style="color: darkred" class="glyphicon glyphicon-filter" aria-hidden="true"></span>
		<h3><strong>Dashboard</strong></h3>

		</div >
		</div >
		</div>

<div class="row spacedtop">
		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('event.team')}}">
		<span style="color: greenyellow" class="glyphicon glyphicon-user" aria-hidden="true"></span>
		<h3><strong>Team</strong></h3>

		</div >
		</div >
		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('invitation.invitation_index')}}">
		<span style="color: indigo" class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
		<h3><strong>Invitations</strong></h3>

		</div >
		</div >


		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('letters.letter_index')}}">
		<span style="color: red" class="glyphicon glyphicon-file" aria-hidden="true"></span>
		<h3><strong>Memo</strong></h3>

		</div >
		</div >
		<div class="col-md-3">
		<div class="service">
			<a href="{{ URL::route('user.index')}}">
		<span style="color: orange" class="glyphicon glyphicon-cog" aria-hidden="true" background-color="red"></span>
		<h3><strong>Access Control</strong></h3>

		</div >
		</div >





<!-- <div class="container"> 
	<h2 class="section-title"><strong>Our Services</strong>
	</h2> <div class="row">
	 <div class="col-md-4">
	  <div class="service">
	   <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> <h3><strong>Cloud Storage</strong></h3> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ← incididunt ut labore et dolore magna aliqua
	   	 </div >
	    </div > 
	    </div>
	</div> -->
@stop