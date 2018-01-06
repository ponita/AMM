@extends("layout")
@section("content")
<!--<script>
$('#location').on('change', function() {
var el = $('#field-location');
if (this.value === 'Field Activity') { el.show();} 
else { el.hide();}
});
</script> -->



	<div>
		<ol class="breadcrumb">
		  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		  <li><a href="{{ URL::route('event.team') }}">TEAM</a></li>
		  <li class="active">MANAGEMENT</li>
		</ol>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-user"></span>
			TEAM
		</div>
		

<div class="panel panel-info">
	<div class="panel-heading" align="center"><strong>SENIOR MANAGEMENT</strong></div>
	<div class="panel-body">				
		<div class="container">


	<div class="row">
	<div class="col-md-12" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/img.jpg")}}">
                

		<h3><strong>Dr. Nabadda Suzan</strong></h3>
	<em>Executive Director</em>
	</div >

</div >

<div class="row">
	<div class="col-md-6" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/img2.jpg")}}">

		<h3><strong>Aisu Stephen</strong></h3>
	<em>SLA</em>
	</div >
<div class="col-md-6" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Gaspard Guma</strong></h3>
		<em>Senior TA</em>
	</div >

</div > 

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Amato Ojwiya</strong></h3>
	<em>STA </em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Dr. Nakakawa Agnes</strong></h3>
		<em>TA</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Dr. Hakim Sendagire</strong></h3>
		<em>TA</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Dr. Kajumbula Henry</strong></h3>
	<em>TA</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Charles Kiyaga</strong></h3>
	<em>ASLM-Program manager</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Dr. Kalyesubula Simon</strong></h3>
		<em>M&E</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Patrick Ogwok</strong></h3>
		<em>QA</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Bakunda Kamaranzi</strong></h3>
	<em>Training Coordinator</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Wilson Nyegenye</strong></h3>
	<em>Logistics Coordinator</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Dr.Murungi Miriam</strong></h3>
		<em>M&E VL</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Dr. Zziwa Martin</strong></h3>
		<em>VL Coordinator</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Dr. Nanyeenya Nicholas</strong></h3>
	<em>Sickle Cell coordinator</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/prossy.jpg")}}">

		<h3><strong>Proscovia Mbabazi</strong></h3>
	<em>ICT Manager</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/BigD.jpg")}}">
		<h3><strong>Kasule Dan</strong></h3>
		<em>LIMS Coordinator</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/isaac.png")}}">
			<h3><strong>Isaac Ssewanyana</strong></h3>
		<em>Lab manager</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/sula.jpg")}}">
	<h3><strong>Ikoba Sulaiman</strong></h3>
	<em>Operation Manager</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Fredrick Nsubuga</strong></h3>
	<em>M&E</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Mutaka Abdul</strong></h3>
		<em>Biomedical Enginner</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Akello Patricia</strong></h3>
		<em>Accreditation Officer</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Atek Kagirita</strong></h3>
	<em>BB officer</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Nambozo Susan</strong></h3>
	<em>Operation/Logistics</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Kamusiime Diana</strong></h3>
		<em>Office Manager</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Namakula Aidah</strong></h3>
		<em>Operation/Logistics</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Eragu Rita</strong></h3>
	<em>Program Secretary</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Mujuuzi Godfrey</strong></h3>
	<em>Lab Advisor</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Kitone Ivan</strong></h3>
		<em>Stores Manager</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Mugerwa Ibrahim</strong></h3>
		<em>AMR Secretariate</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Dr. Grace Najjuka</strong></h3>
	<em>S. Consultant Microbiologist</em>
	</div>
</div >

<div class="row">
	<div class="col-md-3" style="text-align:center;">
	<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">

		<h3><strong>Nakidde Rebecca</strong></h3>
	<em>Hub Coordinator</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
		<h3><strong>Pimundu Godfrey</strong></h3>
		<em>Lab manager MicroB</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.png")}}">
			<h3><strong>Miriam Nabukenya</strong></h3>
		<em>Data manager</em>
	</div >
	<div class="col-md-3" style="text-align:center;">
		<img class="img-circle" src="{{asset("/pictures/download.jpg")}}">
	<h3><strong>Chris Okiira</strong></h3>
	<em>Research and Devt</em>
	</div>
</div >

</div >
	</div>
</div>
				

								
				


</div>
</div>
@stop	