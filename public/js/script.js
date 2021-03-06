/**
 * Custom javascript function
 * @author  (c) @iLabAfrica
 */
$(function(){
	/**	HEADER
	 *   Username display
	 */
	$('.user-link').click(function(){
		$('.user-settings').toggle();
	});

	$('.user-profile .user-settings a').click(function(){
		$('.user-settings').toggle();
	});

	/*	LEFT SIDEBAR FUNCTIONS	*/
	
	/*  Click main menu */
	$('.main-menu').click(function(){

		$('.main-menu').removeClass('active');
		$(this).addClass('active');

		$('.main-menu').siblings().hide();
		$(this).siblings().show();
	});

	/**  USER 
	 *-  Load password reset input field
	 */

	$('a.reset-password').click(function() {
		if ( $('input.reset-password').hasClass('hidden')) {
				$('input.reset-password').removeClass('hidden');
		}else {
			$('input.reset-password').addClass('hidden');
		}
	});

	/*Submitting Profile edit, with password change validation*/
	$('.update-reset-password').click(function() {
			editUserProfile();
	});

	/** 
	 *	LAB CONFIGURATION 
	 */

	 /* Add another surveillance */
	$('.add-another-surveillance').click(function(){
		newSurveillanceNo = $(this).data('new-surveillance');
		var inputHtml = $('.addSurveillanceLoader').html();
		//Count new measures on the new measure button
		$('.surveillance-input').append(inputHtml);
		$('.surveillance-input .new').addClass('new-surveillance-'+newSurveillanceNo).removeClass('new');
		$(this).data('new-surveillance',  newSurveillanceNo+1).attr('data-new-surveillance',  newSurveillanceNo+1);
		addNewSurveillanceAttributes(newSurveillanceNo);
		delete newSurveillanceNo;
	});
	 
	 /* Add another disease */
	$('.add-another-disease').click(function(){
		newDiseaseNo = $(this).data('new-disease');
		var inputHtml = $('.addDiseaseLoader').html();
		//Count new measures on the new measure button
		$('.disease-input').append(inputHtml);
		$('.disease-input .new').addClass('new-disease-'+newDiseaseNo).removeClass('new');
		$(this).data('new-disease',  newDiseaseNo+1).attr('data-new-disease',  newDiseaseNo+1);
		addNewDiseaseAttributes(newDiseaseNo);
		delete newDiseaseNo;
	});

	/** 
	 *	MEASURES 
	 */

	 /* Add another measure */
	$('.add-another-measure').click(function(){
		newMeasureNo = $(this).data('new-measure');
		var inputHtml = $('.measureGenericLoader').html();
		//Count new measures on the new measure button
		$('.measure-container').append(inputHtml);
		$('.measure-container .new-measure-section').find(
			'.measuretype-input-trigger').addClass('new-measure-'+newMeasureNo);
		$('.measure-container .new-measure-section').find(
			'.measuretype-input-trigger').attr('data-new-measure-id',  newMeasureNo);
		$('.measure-container .new-measure-section').find(
			'.add-another-range').attr('data-new-measure-id',  newMeasureNo);
		$('.measure-container .new-measure-section').find(
			'.add-another-range').addClass('new-measure-'+newMeasureNo);
		$('.measure-container .new-measure-section').find(
			'.measurevalue').addClass('new-measure-'+newMeasureNo);
		$('.measure-container .new-measure-section').addClass(
			'measure-section new-'+newMeasureNo).removeClass('new-measure-section');
		$(this).data('new-measure',  newMeasureNo+1).attr('data-new-measure',  newMeasureNo+1);
		addNewMeasureAttributes(newMeasureNo);
		delete newMeasureNo;
	});

	 /* Add another measure range value */
	$('.measure-container').on('click', '.add-another-range', function(){
		var inputClass = [
			'.numericInputLoader',
			'.alphanumericInputLoader',
			'.alphanumericInputLoader',
			'.freetextInputLoader'
		]; 

		if ($(this).data('measure-id') === 0) {
			var newMeasureId = $(this).data('new-measure-id');
			var measureID = 'new-measure-'+newMeasureId;
		} else {
			var measureID = $(this).data('measure-id');
		}
		var measureTypeId = $('.measuretype-input-trigger.'+measureID).val() - 1;
		var inputHtml = $(inputClass[measureTypeId]).html();
		$(".measurevalue."+measureID).append(inputHtml);
		if ($(this).data('measure-id') != 0) {
			editMeasureRangeAttributes(measureTypeId,measureID);
		}else{
			addMeasureRangeAttributes(measureTypeId, newMeasureId);
		}
	});

	/*  load measure range input UI for the selected measure type */
	$( '.measure-container' ).on('change', '.measuretype-input-trigger', loadRangeFields);

	/*  re-load measure range input UI for the selected measure type on error */
	if ($('.measurevalue').is(':empty')){
		var measure_type = $( '.measuretype-input-trigger' ).val();
		if ( measure_type > 0 ) {
			loadRangeFields();
		}
	}

	/** GLOBAL DELETE	
	 *	Alert on irreversible delete
	 */
	$('.confirm-delete-modal').on('show.bs.modal', function(e) {
	    $('#delete-url').val($(e.relatedTarget).data('id'));
	});

	$('.btn-delete').click(function(){
		$('.confirm-delete-modal').modal('toggle');
		window.location.href = $('#delete-url').val();
	});

    /** 
     *  MICROBIOLOGY
     */
    var cultureID;
    var isolatedOrganismID;
    var isolatedOrganismUrl;
    var isolatedOrganismUrlVerb;
    var cultureObservationUrl;
    var cultureObservationUrlVerb;
    var cultureObservationEditionId;
    var drugSusceptibilityUrl;
    var drugSusceptibilityUrlVerb;
    var drugSusceptibilityEditionId;
    /*culture observation*/
    $('.add-culture-observation').click(function(){
        $('.duration').val('');
        $('.observation').val('');
        cultureID = $(this).data('culture-id');
        cultureObservationUrl = $(this).data('url');
        cultureObservationUrlVerb = 'POST';
        $('.culture-observation').removeClass('hidden');
    });
    $('.culture-observation-tbody').on('click', '.edit-culture-observation', function(){
        cultureObservationUrl = $(this).data('url');
        cultureObservationUrlVerb = 'PUT';
        $('.duration').val($(this).data('duration-id'));
        $('.observation').val($(this).data('observation'));
        $('.culture-observation').removeClass('hidden');
    });
    // save culture observation addition or editon
    $('.save-culture-observation').click(function(){
        var duration = $('.duration').val();
        var observation = $('.observation').val();
        $.ajax({
            type: cultureObservationUrlVerb,
            url:  cultureObservationUrl,
            data: {
                culture_id: cultureID,
                culture_duration_id: duration,
                observation: observation
            },
            success: function(cultureObservation){
                if (cultureObservationUrlVerb == 'POST') {
                    var cultureObservationEntry = $('.cultureObservationEntryLoader').html();
                    $('.culture-observation-tbody').append(cultureObservationEntry);
                    $('.culture-observation-tbody')
                        .find('.new-culture-observation-tr')
                        .addClass('culture-observation-tr-'+cultureObservation.id)
                        .removeClass('new-culture-observation-tr')
                        .find('.edit-culture-observation')
                            .attr('data-id',cultureObservation.id)
                            .attr('data-url',cultureObservationUrl+'/'+cultureObservation.id)
                            .attr('data-duration-id',cultureObservation.culture_duration_id)
                            .attr('data-observation',cultureObservation.observation);
                    $('.culture-observation-tr-'+cultureObservation.id)
                        .find('.delete-culture-observation')
                            .attr('data-url',cultureObservationUrl+'/'+cultureObservation.id)
                            .attr('data-id',cultureObservation.id);
                } else {
                    $('.culture-observation-tr-'+cultureObservation.id)
                        .find('.edit-culture-observation')
                            .attr('data-duration-id',cultureObservation.culture_duration_id)
                            .attr('data-observation',cultureObservation.observation);
                        $('.culture-observation-tr-'+cultureObservation.id+' .duration-entry').empty();
                        $('.culture-observation-tr-'+cultureObservation.id+' .observation-entry').empty();
                }
                // update rows with edition already made in the database
                $('.culture-observation-tr-'+cultureObservation.id+' .duration-entry')
                    .append(cultureObservation.culture_duration.duration);
                $('.culture-observation-tr-'+cultureObservation.id+' .observation-entry')
                    .append(cultureObservation.observation);

                // hide input fields for culutre observations
                $('.culture-observation').addClass('hidden');
            }
        });

    });
    // delete culture observation entry from database and dynamicallly remove from UI
    /*
    hint: (parent).on(element) can find javascript added elements which
    (element).click() is incapable of
    */
    $('.culture-observation-tbody').on('click', '.delete-culture-observation', function(){
        var url = $(this).data('url');
        $.ajax({
            type: 'DELETE',
            url:  url,
            success: function(id){
            // remove newly deleted(dynamically) entry of culture observation
            $('.culture-observation-tr-'+id).remove();
            }
        });
    });
    $('.cancel-culture-observation-edition').click(function(){
            $('.culture-observation').addClass('hidden');
        $('.duration').val('');
        $('.observation').val('');
    });
    /*isolated organism*/
    $('.add-isolated-organism').click(function(){
        $('.organism').val('');
        $('.save-isolated-organism').attr('data-url',$(this).data('url'))
        // update global varible so that it's available in the save isolated organism function
        isolatedOrganismUrl = $(this).data('url');
        drugSusceptibilityUrl = $(this).data('drug-susceptibility-store-url');
        isolatedOrganismUrlVerb = 'POST';
        cultureID = $(this).data('culture-id');
        $('.isolated-organism-addition').removeClass('hidden');
    });
    // save isolated organism addition
    $('.save-isolated-organism').click(function(){
        var organismID = $('.isolated-organism-input').val();

        $.ajax({
            type: isolatedOrganismUrlVerb,
            url:  isolatedOrganismUrl,
            data: {
                organism_id: organismID,
                culture_id: cultureID
            },
            success: function(isolatedOrganism){
                // update rows with edition already made in the database
                var isolatedOrganismEntry = $('.isolatedOrganismEntryLoader').html();
                $('.isolated-organism-tbody').append(isolatedOrganismEntry);
                $('.isolated-organism-tbody')
                    .find('.new-isolated-organism-tr')
                    .addClass('isolated-organism-tr-'+isolatedOrganism.id)
                    .removeClass('new-isolated-organism-tr')
                    .find('.add-drug-susceptibility')
                            .attr('data-url',drugSusceptibilityUrl)
                            .attr('data-isolated-organism-id',isolatedOrganism.id)
                            .attr('data-isolated-organism-name',isolatedOrganism.organism.name);
                    $('.isolated-organism-tr-'+isolatedOrganism.id)
                        .find('.delete-isolated-organism')
                            .attr('data-url',isolatedOrganismUrl+'/'+isolatedOrganism.id)
                            .attr('data-id',isolatedOrganism.id);
                // hide input fields for isolated organism
                $('.isolated-organism-addition').addClass('hidden');
                $('.isolated-organism-tr-'+isolatedOrganism.id+' .isolated-organism-entry')
                        .append(isolatedOrganism.organism.name);

            }
        });
    });
    // delete drug susceptbility entry from database and dynamicallly remove from UI
    $('.isolated-organism-tbody').on('click', '.delete-isolated-organism', function(){
        var url = $(this).data('url');
        $.ajax({
            type: 'DELETE',
            url:  url,
            success: function(id){
            // remove newly deleted(dynamically) entry of drug susceptibility
            $('.isolated-organism-tr-'+id).remove();
            }
        });
    });
    // cancel a drug susceptibility addition or edition
    $('.cancel-isolated-organism-addition').click(function(){
        $('.susceptibility-result').addClass('hidden');
        $('.drug').val('');
        $('.susceptibility').val('');
    });
    /*drug susceptibility*/
    $('.isolated-organism-tbody').on('click', '.add-drug-susceptibility', function(){
        $('.drug').val('');
        $('.susceptibility').val('');
        // update url value in the save button
        $('.save-drug-susceptibility').attr('data-url',$(this).data('url'));
        // update global varible so that it's available in the save susceptibility function
        isolatedOrganismID = $(this).data('isolated-organism-id');
        drugSusceptibilityUrlVerb = 'POST';
        drugSusceptibilityUrl = $(this).data('url');
        // insert name of isolated organism to be subjected to a drug above the input for drug and result
        $('.isolated-organism-input-header').append($(this).data('isolated-organism-name'));
        $('.susceptibility-result').removeClass('hidden');
    });
    $('.drug-susceptibility-tbody').on('click', '.edit-drug-susceptibility', function(){
        // update url value in the save button
        $('.save-drug-susceptibility').attr('data-url',$(this).data('url'));
        // update global varible so that it's available in the save susceptibility function
        drugSusceptibilityUrlVerb = 'PUT';
        drugSusceptibilityUrl = $(this).data('url');
        drugSusceptibilityEditionId = $(this).data('id');
        isolatedOrganismID = $(this).data('isolated-organism-id');
        // populate with initial values fields tobe edited
        $('.drug').val($(this).data('drug-id'));
        $('.susceptibility').val($(this).data('drug-susceptibility-measure-id'));
        // hide input fields after submission
        $('.susceptibility-result').removeClass('hidden');
    });
    // save drug susceptibility addition or editon
    $('.save-drug-susceptibility').click(function(){
        var drug = $('.drug').val();
        var susceptibility = $('.susceptibility').val();
        $.ajax({
            type: drugSusceptibilityUrlVerb,
            url:  drugSusceptibilityUrl,
            data: {
                isolated_organism_id: isolatedOrganismID,
                drug_id: drug,
                drug_susceptibility_measure_id: susceptibility
            },
            success: function(drugSusceptibility){

                if (drugSusceptibilityUrlVerb == 'POST') {
                    // update rows with addition already made in the database
                    var drugSusceptibilityEntry = $('.drugSusceptibilityEntryLoader').html();
                    $('.drug-susceptibility-tbody').append(drugSusceptibilityEntry);
                    $('.drug-susceptibility-tbody')
                        .find('.new-drug-susceptibility-tr')
                        .addClass('drug-susceptibility-tr-'+drugSusceptibility.id)
                        .removeClass('new-drug-susceptibility')
                        .find('.edit-drug-susceptibility')
                            .attr('data-url',drugSusceptibilityUrl+'/'+drugSusceptibility.id)
                            .attr('data-id',drugSusceptibility.id)
                            .attr('data-drug-id',drugSusceptibility.drug_id)
                            .attr('data-isolated-organism-id',drugSusceptibility.isolated_organism_id)
                            .attr('data-drug-susceptibility-measure-id',drugSusceptibility.drug_susceptibility_measure_id)
                    $('.drug-susceptibility-tbody')
                        .find('.delete-drug-susceptibility')
                            .attr('data-url',drugSusceptibilityUrl+'/'+drugSusceptibility.id)
                            .attr('data-id',drugSusceptibility.id);
                } else {
                // clear rows before updating with new values from the backend
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .isolated-organism-entry').empty();
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .drug-entry').empty();
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .result-entry').empty();
                    $('.drug-susceptibility-tr-'+drugSusceptibility.id)
                        .find('.edit-drug-susceptibility')
                            .attr('data-drug-id',drugSusceptibility.drug_id)
                            .attr('data-isolated-organism-id',drugSusceptibility.isolated_organism_id)
                            .attr('data-drug-susceptibility-measure-id',drugSusceptibility.drug_susceptibility_measure_id)
                }
                // update rows with edition already made in the database
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .isolated-organism-entry')
                    .append(drugSusceptibility.isolated_organism.organism.name);
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .drug-entry')
                    .append(drugSusceptibility.drug.name);
                $('.drug-susceptibility-tr-'+drugSusceptibility.id+' .result-entry')
                    .append(drugSusceptibility.drug_susceptibility_measure.interpretation);
                // hide input fields for drug susceptibility
                $('.susceptibility-result').addClass('hidden');
            }
        });
    });
    // delete drug susceptbility entry from database and dynamicallly remove from UI
    $('.drug-susceptibility-tbody').on('click', '.delete-drug-susceptibility', function(){
        var url = $(this).data('url');
        $.ajax({
            type: 'DELETE',
            url:  url,
            success: function(id){
            // remove newly deleted(dynamically) entry of drug susceptibility
            $('.drug-susceptibility-tr-'+id).remove();
            }
        });
    });
    // cancel a drug susceptibility addition or edition
    $('.cancel-drug-susceptibility-edition').click(function(){
        $('.drug').val('');
        $('.susceptibility').val('');
        $('.susceptibility-result').addClass('hidden');
    });
    /*completing the culture and sensitivity analysis*/
    // prepare to complete culture sensitivity
    $('.prepare-culture-sensitivity-completion').click(function(){
        $(this).addClass('hidden');
        $('.complete-culture-sensitivity').removeClass('hidden');
    });

    // cancel culture sensitivity completion
    $('.cancel-completion-of-culture-sensitivity-analysis').click(function(){
        $('.prepare-culture-sensitivity-completion').removeClass('hidden');
        $('.complete-culture-sensitivity').addClass('hidden');
    });

    // complete culture sensitivity
    $('.submit-completed-culture-sensitivity-analysis').click(function(){
        $.ajax({
            type: 'POST',
            url:  $(this).data('url'),
            data: {
                interpretation: $('.interpretation').val()
            },
            success: function(){
                location.href = $('.submit-completed-culture-sensitivity-analysis')
                    .data('redirect-url');
            }
        });
    });

	UIComponents();

	/* Clicking the label of an radio/checkbox, checks the control*/
	$('span.input-tag').click(function(){
		$(this).siblings('input').trigger('click');
	});

	// Delete measure range

	$('body').on('click', '.measure-input .close', function(){
		$(this).parent().parent().remove();
	});

	// Delete measure

	$('.measure-container').on('click', '.close', function(){
		$(this).parent().parent().remove();
	});
	
	// Delete Surveillance entry

	$('.surveillance-input').on('click', '.close', function(){
		$(this).parent().parent().parent().remove();
	});

	// Delete Disease entry

	$('.disease-input').on('click', '.close', function(){
		$(this).parent().parent().parent().remove();
	});

	/**
	 *Fetch tests for selected Lab category when requesting 
	 */

	 //Jquery for UNHLS kind of test menu goes in here!!!!!
	$('#test_cat').on('change', function() {
		var testCatId = this.value;
        var labSec = $(this).find("option:selected").text();
		var cnt =0;
		var zebra ="";
	 	$.ajax(
		{
		    url: "/unhls_test/testlist",
		    type: 'POST',
		    dataType: 'json',
		    data: {id: testCatId}, 
		}).done( 
		    function(data) 
		    {
      	        var myHTML = '';
      	        var count = 0;
				var item_per_row = 4;
                myHTML += '<h4 align="left">' + labSec + '</h4></br>';
				$.each(data, function(i, item) {
				    /*optional stuff to do after success */
					if (count === 0) { // Start of a row
						myHTML += '<div class = "row">';
					}
					myHTML += '<div class = "col-md-3">';
					myHTML += "<td><label class ='editor-active'><input type ='checkbox' name='testtypes[]' value = "+ item.id + "></label>" + item.name + "</td>";
					myHTML += '</div>';
					++count;
					if (count === item_per_row) {  // End of row
						myHTML += '</div>';
					}
				});

				if (count > 0) {  // Close the last row if it exist.
					myHTML += '</div>';
				}

				$('#test_list').append(myHTML);		    	
		    }
		);

	});

    /**
	 * formatting date and time text/input fields as dropdown selection
	 */
	$(function(){
		$('#dob').combodate({
			format: 'DD-MM-YYYY', 
			template: 'D / MMM / YYYY',
			//min year
			minYear: '1916'
		});
	});

    $(function(){
    	$('#datetime12').combodate();  
	});

	/**
	 *Convert Age to date and visa viz
	 */
	$("#dob").change(function(){
		set_age();			
	});

	$("#age").change(function(){
		set_dob();		
	});

	$("#id_age_units").change(function(){
		set_dob();			
	});

	function round1(val){
		return Math.round(val*10)/10;
	}

	function set_dob(){
		var date_now = new Date();
		var now_s = date_now.getTime();
		var age = $("#age").val();
		var units = $("#id_age_units").val();
		if(units=='M'){
			var age = age/12;
		}
		var age_s = age*365*24*3600*1000;
		var dob_s = now_s-age_s;
		var dob = new Date(dob_s);
		$("#dob").combodate('setValue', dob);
	}

	function set_age(){

		var dob = new Date($("#dob").val());
		var dob_s = dob.getTime();
		var yrs = (now_s-dob_s)/(365*24*3600*1000) || 0;
		if(yrs<1){
			var mths = yrs*12;
			$("#age").val(round1(mths));
			$("#id_age_units").val("M");
		}else{
			$("#age").val(round1(yrs));
			$("#id_age_units").val("Y");
		}
	}

	
	/**
	 * Disable country select field  based on location selected
	 */
	 $("#location").on('change', function() {
    	if(this.value === "Field Activity Foreign" || this.value === "null") {
            $("#district").prop("disabled", true);
    		$("#healthregion").prop("disabled", true);
            $("#hub").prop("disabled", true);

    	} else{
            $("#district").prop("disabled", false);
            $("#healthregion").prop("disabled", false);
            $("#hub").prop("disabled", false);
            
    	}
	});

     $("#location").on('change', function() {
        if(this.value === "Butabika Headquaters" || this.value === "null") {
            $("#district").prop("disabled", true);
            $("#healthregion").prop("disabled", true);
            $("#country").prop("disabled", true);
            // $("#hub").prop("disabled", true);
            // $("#facility").prop("disabled", true);
            
        } else{
            $("#district").prop("disabled", false);
            $("#healthregion").prop("disabled", false);
            $("#country").prop("disabled", false);
            // $("#hub").prop("disabled", false);
            // $("#facility").prop("disabled", false);
        }
    });

     $("#location").on('change', function() {
        if(this.value === "Field Activity InCountry" || this.value === "null") {
            $("#country").prop("disabled", true);
            $("#hub").prop("disabled", true);
            $("#facility").prop("disabled", true);
            
        } else{
            $("#country").prop("disabled", false);
            $("#hub").prop("disabled", false);
            $("#facility").prop("disabled", false);
        }
    });

$(".select2").select2({
                multiple:true
            });

 



    // $('#department').on('change', function(e) {
    //     // todo: this code is almost the same as below, make a reusable one
    //     console.log(e);
    //     var departmentId = e.target.value;
    //     $.get('/json-workplan?departmentId=' +departmentId, function(data){
    //         console.log(data);
    //         $('#workplan').empty();
    //         $('#workplan').append('<option value="0" selected="true">===Workplan===</option>');
            
    //         $.each(data, function(index, workplanObj){
    //             $('#workplan').append('<option value="'+ workplanObj.id +'">'+ workplanObj.name +'</option>');
    //            })
    //         });
    //     });

   


$(function() {  
//Created By: Brij Mohan
//Website: https://techbrij.com
function groupTable($rows, startIndex, total){
if (total === 0){
return;
}
var i , currentIndex = startIndex, count=1, lst=[];
var tds = $rows.find('td:eq('+ currentIndex +')');
var ctrl = $(tds[0]);
lst.push($rows[0]);
for (i=1;i<=tds.length;i++){
if (ctrl.text() ==  $(tds[i]).text()){
count++;
$(tds[i]).addClass('deleted');
lst.push($rows[i]);
}
else{
if (count>1){
ctrl.attr('rowspan',count);
groupTable($(lst),startIndex+1,total-1)
}
count=1;
lst = [];
ctrl=$(tds[i]);
lst.push($rows[i]);
}
}
}
groupTable($('#myTable tr:has(td)'),0,3);
$('#myTable .deleted').remove();
});
    /**
     *Create List of workplans in the create page
     */
     /**
    *Fetch tests for selected Lab category when requesting
     */
    $('#thematicarea').on('change', function() {
        // todo: this code is almost the same as below, make a reusable one
        var thematicareaId = $('#thematicarea').val();
        var departmentId = $('.department').val();

        if (thematicareaId != 0) {
            $.ajax({
                type: 'POST',
                url: "/event/strategy",
                data: {
                    thematicArea_id: thematicareaId
                },
                success: function(department){
                    $('#department').empty();
                    $('#department').empty();
                    $('#department').append(department);
                }
            });
        }
    });

    // 

     $('.department').on('change', function() {
        // todo: this code is almost the same as below, make a reusable one
        var departmentId = $('.department').val();
        var workplanId = $('.workplan').val();
        if (departmentId != 0 && workplanId != 0) {
            $.ajax({
                type: 'POST',
                url: "/event/workplans",
                data: {
                    department_id: departmentId,
                    workplan_id: workplanId
                },
                success: function(workplan){
                    $('.workplan-list').empty();
                    $('.workplan-list').append(workplan);
                }
            });
        }
    });

     $('.strategicplan').on('change', function() {
        // todo: this code is almost the same as below, make a reusable one
        var departmentId = $('.department').val();
        var workplanId = $('.workplan').val();
        if (departmentId != 0 && workplanId != 0) {
            $.ajax({
                type: 'POST',
                url: "/meetings/workplanlist",
                data: {
                    department_id: departmentId,
                    workplan_id: workplanId
                },
                success: function(workplan){
                    $('.workplan-list').empty();
                    $('.workplan-list').append(workplan);
                }
            });
        }
    });


	/**
	 * Display other (specify) text field when other is selected during specimen refferal storage condition selection
	 */

	$(function () {
		$("#storage_condition").on('change',function () {
            if ($(this).val() == "3") {
                $("#other_storage").show();
            } else {
                $("#other_storage").hide();
            }
        });
    }); 

    /**
	 * Display other (specify) text field when other is selected during specimen refferal type of transport selection
	 */

	$(function () {
		$("#transport_type").on('change',function () {
            if ($(this).val() == "4") {
                $("#other_transport").show();
            } else {
                $("#other_transport").hide();
            }
        });
    }); 

	/** 
	 * Fetch Test results
	 */

	$('.fetch-test-data').click(function(){
		var testTypeID = $(this).data('test-type-id');
		var url = $(this).data('url');
		$.post(url, { test_type_id: testTypeID}).done(function(data){
			$.each($.parseJSON(data), function (index, obj) {
				console.log(index + " " + obj);
				$('#'+index).val(obj);
			});
		});
	});

	/** 
	 * Search for patient from new test modal
	 * UI Rendering Logic here
	 */

	$('#new-test-modal .search-patient').click(function(){
		var searchText = $('#new-test-modal .search-text').val();
		var url = location.protocol+ "//"+location.host+ "/patient/search";
		var output = "";
		var cnt = 0;
		$.post(url, { text: searchText}).done(function(data){
			$.each($.parseJSON(data), function (index, obj) {
				output += "<tr>";
				output += "<td><input type='radio' value='" + obj.id + "' name='pat_id'></td>";
				output += "<td>" + obj.patient_number + "</td>";
				output += "<td>" + obj.name + "</td>";
				output += "</tr>";
				cnt++;
			});
			$('#new-test-modal .table tbody').html( output );
			if (cnt === 0) {
				$('#new-test-modal .table').hide();
			} else {
				$('#new-test-modal .table').removeClass('hide');
				$('#new-test-modal .table').show();
			}
		});
	});
	/**
	 * Repeat of above AJAX request for UNHLS test pages
	 */

	 $('#new-test-modal-unhls .search-patient').click(function(){
		var searchText = $('#new-test-modal-unhls .search-text').val();
		var url = location.protocol+ "//"+location.host+ "/unhls_patient/search";
		var output = "";
		var cnt = 0;
		$.post(url, { text: searchText}).done(function(data){
			$.each($.parseJSON(data), function (index, obj) {
				output += "<tr>";
				output += "<td><input type='radio' value='" + obj.id + "' name='pat_id'></td>";
				output += "<td>" + obj.patient_number + "</td>";
				output += "<td>" + obj.name + "</td>";
				output += "</tr>";
				cnt++;
			});
			$('#new-test-modal-unhls .table tbody').html( output );
			if (cnt === 0) {
				$('#new-test-modal-unhls .table').hide();
			} else {
				$('#new-test-modal-unhls .table').removeClass('hide');
				$('#new-test-modal-unhls .table').show();
			}
		});
	});


	/* 
	* Prevent patient search modal form submit (default action) when the ENTER key is pressed
	*/

	$('#new-test-modal, #new-test-modal-unhls .search-text').keypress(function( event ) {
		if ( event.which == 13 ) {
			event.preventDefault();
			$('#new-test-modal .search-patient').click();
		}
	});

	/* 
	* Repeat of above code for UNHLS to Prevent patient search modal form submit (default action) when the ENTER key is pressed
	

	$('#new-test-modal-unhls .search-text').keypress(function( event ) {
		if ( event.which == 13 ) {
			event.preventDefault();
			$('#new-test-modal-unhls .search-patient').click();
		}
	}); */


	/** - Get a Test->id from the button clicked,
	 *  - Fetch corresponding test and default specimen data
	 *  - Display all in the modal.
	 */
	$('#change-specimen-modal').on('show.bs.modal', function(e) {
	    //get data-id attribute of the clicked element
	    var id = $(e.relatedTarget).data('test-id');
		var url = $(e.relatedTarget).data('url');

	    $.post(url, { id: id}).done(function(data){
		    //Show it in the modal
		    $(e.currentTarget).find('.modal-body').html(data);
	    });
	});
  

	/** Receive Test Request button.
	 *  - Updates the Test status via an AJAX call
	 *  - Changes the UI to show the right status and buttons
	 */
	$('.tests-log').on( "click", ".receive-test", function(e) {

		var testID = $(this).data('test-id');
		var specID = $(this).data('specimen-id');

		var url = location.protocol+ "//"+location.host+ "/test/" + testID+ "/receive";
		$.post(url, { id: testID}).done(function(){});

		var parent = $(e.currentTarget).parent();
		// First replace the status
		var newStatus = $('.pending-test-not-collected-specimen').html();
		parent.siblings('.test-status').html(newStatus);

		// Add the new buttons
		var newButtons = $('.accept-button').html();
		parent.append(newButtons);

		// Set properties for the new buttons
		parent.children('.accept-specimen').attr('data-test-id', testID);
		parent.children('.accept-specimen').attr('data-specimen-id', specID);

		// Now remove the unnecessary buttons
		$(this).siblings('.receive-test').remove();
		$(this).remove();
	});

	/** Accept Specimen button.
	 *  - Updates the Specimen status via an AJAX call
	 *  - Changes the UI to show the right status and buttons
	 */
	$('.tests-log').on( "click", ".accept-specimen", function(e) {

		var testID = $(this).data('test-id');
		var specID = $(this).data('specimen-id');
		var url = $(this).data('url');
		$.post(url, { id: specID}).done(function(){});

		var parent = $(e.currentTarget).parent();
		// First replace the status
		var newStatus = $('.pending-test-accepted-specimen').html();
		parent.siblings('.test-status').html(newStatus);

		// Add the new buttons
		var newButtons = $('.reject-start-buttons').html();
		parent.append(newButtons);
		var referButton = $('.start-refer-button').html();
		parent.append(referButton);

		// Set properties for the new buttons
		var rejectURL = location.protocol+ "//"+location.host+ "/test/" + specID+ "/reject";
		parent.children('.reject-specimen').attr('id',"reject-" + testID + "-link");
		parent.children('.reject-specimen').attr('href', rejectURL);

		var referURL = location.protocol+ "//"+location.host+ "/test/" + specID+ "/refer";
		parent.children('.refer-button').attr('href', referURL);

		parent.children('.start-test').attr('data-test-id', testID);

		// Now remove the unnecessary buttons
		$(this).siblings('.change-specimen').remove();
		$(this).remove();
	});


/**Adding action points
     * - Allow for selection of multiple action points
     */
    $(document).ready(function () {
        tinymce.init({
            selector: "textarea.htmleditor",
            theme: "modern",
            height : 100,
            width :500,
            plugins: [
                "advlist autolink lists link charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime nonbreaking save table contextmenu directionality",
                "emoticons paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify",
            toolbar2: "preview forecolor backcolor emoticons | bullist numlist outdent indent link",
            image_advtab: true
        });
        });
       
     $(document).ready(function () {
      var rejectReason = $('#action-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-action').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#action-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });


/**Addition of lessons learnt
     * - Allow for selection of multiple lessons learnt
     */
    $(document).ready(function () {
      var rejectReason = $('#lesson-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-lesson').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#lesson-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });


/**Addition of recommendation
     * - Allow for selection of multiple recommendations
     */
    $(document).ready(function () {
      var rejectReason = $('#rec-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-rec').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#rec-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of challenges
     * - Allow for selection of multiple challengess
     */
    $(document).ready(function () {
      var rejectReason = $('#challenge-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-challenge').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#challenge-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of copies
     * - Allow for selection of multiple copies
     */
    $(document).ready(function () {
      var rejectReason = $('#copy-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-copy').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#copy-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    $(document).ready(function () {
      var rejectReason = $('#agenda-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-agenda').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#agenda-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of YEAR SUB ACTIVITIES
     * - Allow for selection of multiple copies
     */
    $(document).ready(function () {
      var rejectReason = $('#YSO-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-YSO').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#YSO-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of copies
     * - Allow for selection of multiple copies
     */
    $(document).ready(function () {
      var rejectReason = $('#YS-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-YS').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#YS-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of Year plan
     * - Allow for selection of multiple year plans
     */
    $(document).ready(function () {
      var rejectReason = $('#YP-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-YP').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#YP-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of year objectives
     * - Allow for selection of multiple copies
     */
    $(document).ready(function () {
      var rejectReason = $('#YO-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-YO').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#YO-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of year activity location
     * - Allow for selection of multiple copies
     */
    $(document).ready(function () {
      var rejectReason = $('#YAL-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-YAL').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#YAL-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });

    /**Addition of year activities
     * - Allow for selection of multiple activities
     */
    $(document).ready(function () {
      var rejectReason = $('#YA-point');
      var reasonRow = rejectReason.children(":first");
      var reasonRowTemp = reasonRow.clone();
      reasonRow.find('button.remove-reason').remove();
      
      // nb can't use .length for inputCount as we are dynamically removing from middle of collection
      var inputCount = 1; 

      $('#add-YA').click(function () {
        var newRow = reasonRowTemp.clone();
        inputCount++;
        newRow.find('select.rejectionReason').attr('placeholder', 'Select '+inputCount);
        rejectReason.append(newRow);

        //make a call for calender
        $( '.standard-datepicker').datetimepicker({ dateFormat: "yy-mm-dd hh:ii" });
        
      });  
      
      $('#YA-point').on('click', 'button.remove-reason', function () {
        $(this).parent().remove();
      }); 
    });
	/**
	 * Automatic Results Interpretation
	 * Updates the test  result via ajax call
	 */
	 /*UNSTABLE!---TO BE RE-THOUGHT
	$(".result-interpretation-trigger").focusout(function() {
		var interpretation = "";
		var url = $(this).data('url');
		var measureid = $(this).data('measureid');
		var age = $(this).data('age');
		var gender = $(this).data('gender');
		var measurevalue = $(this).val();
		$.post(url, { 
				measureid: measureid,
				age: age,
				measurevalue: measurevalue,
				gender: gender
			}).done( function( interpretation ){
			$( ".result-interpretation" ).val( interpretation );
		});
	});
	*/

	/** Start Test button.
	 *  - Updates the Test status via an AJAX call
	 *  - Changes the UI to show the right status and buttons
	 */
	$('.tests-log').on( "click", ".start-test", function(e) {
		var testID = $(this).data('test-id');
		var url = $(this).data('url');
		$.post(url, { id: testID}).done(function(){});

		var parent = $(e.currentTarget).parent();
		// First replace the status
		var newStatus = $('.started-test-accepted-specimen').html();
		parent.siblings('.test-status').html(newStatus);

		// Add the new buttons
		var newButtons = $('.enter-result-buttons').html();
		parent.append(newButtons);

		// Set properties for the new buttons
		var resultURL = location.protocol+ "//"+location.host+ "/test/" + testID+ "/enterresults";
		parent.children('.enter-result').attr('id',"enter-results-" + testID + "-link");
		parent.children('.enter-result').attr('href',resultURL);

		// Now remove the unnecessary buttons
		$(this).siblings('.refer-button').remove();
		$(this).remove();
	});

	/**
	 *-----------------------------------
	 * REPORTS
	 *-----------------------------------
	 */

		/*Dynamic loading of select list options*/
		$('#section_id').change(function(){
			$.get("/reports/dropdown", 
				{ option: $(this).val() }, 
				function(data) {
					var type = $('#type');
					type.empty();
					type.append("<option value=''>Select Test Type</option>");
					$.each(data, function(index, element) {
			            type.append("<option value='"+ element.id +"'>" + element.name + "</option>");
			        });
				});
		});
		/*End dynamic select list options*/
				/*Dynamic loading of select list options*/
		$('#commodity-id').change(function(){
			$.get("/topup/"+$(this).val()+"/availableStock", 
				function(data) {
					$('#current_bal').val(data.availableStock);
				});
		});
		/*End dynamic select list options*/
		
		/*Toggle summary div for reports*/
		$('#reveal').click(function(){
			if ( $('#summary').hasClass('hidden')) {
					$('#summary').removeClass('hidden');
			}else {
				$('#summary').addClass('hidden');
			}
		});



});
	/**
	 *-----------------------------------
	 * Section for AJAX loaded components
	 *-----------------------------------
	 */
	$( document ).ajaxComplete(function() {
		/* - Identify the selected patient by setting the hidden input field
		   - Enable the 'Next' button on the modal
		*/
		$('#new-test-modal .table input[type=radio]').click(function(){
			$('#new-test-modal #patient_id').val($(this).val());
			$('#new-test-modal .modal-footer .next').prop('disabled', false);

		});
		/* - Check the radio button when the row is clicked
		   - Identify the selected patient by setting the hidden input field
		   - Enable the 'Next' button on the modal
		*/
		$('#new-test-modal .patient-search-result tr td').click(function(){
			var theRadio = $(this).parent().find('td input[type=radio]');
			theRadio.prop("checked", true);
			$('#new-test-modal #patient_id').val(theRadio.val());
			$('#new-test-modal .modal-footer .next').prop('disabled', false);
		});
	});

	/**
	 *-----------------------------------
	 * Section for AJAX loaded components ----A repeat of above code for UNHLS test
	 *-----------------------------------
	 */
	$( document ).ajaxComplete(function() {
		/* - Identify the selected patient by setting the hidden input field
		   - Enable the 'Next' button on the modal
		*/
		$('#new-test-modal-unhls .table input[type=radio]').click(function(){
			$('#new-test-modal-unhls #patient_id').val($(this).val());
			$('#new-test-modal-unhls .modal-footer .next').prop('disabled', false);

		});
		/* - Check the radio button when the row is clicked
		   - Identify the selected patient by setting the hidden input field
		   - Enable the 'Next' button on the modal
		*/
		$('#new-test-modal-unhls .patient-search-result tr td').click(function(){
			var theRadio = $(this).parent().find('td input[type=radio]');
			theRadio.prop("checked", true);
			$('#new-test-modal-unhls #patient_id').val(theRadio.val());
			$('#new-test-modal-unhls .modal-footer .next').prop('disabled', false);
		});
	});

	/**
	 *	Lab Configurations Functions
	 */
	function addNewSurveillanceAttributes (newSurveillanceNo) {
		$('.new-surveillance-'+newSurveillanceNo).find('select.test-type').attr(
			'name', 'new-surveillance['+newSurveillanceNo+'][test-type]');
		$('.new-surveillance-'+newSurveillanceNo).find('select.disease').attr(
			'name', 'new-surveillance['+newSurveillanceNo+'][disease]');
	}

	function addNewDiseaseAttributes (newDiseaseNo) {
		$('.new-disease-'+newDiseaseNo).find('input.disease').attr(
			'name', 'new-diseases['+newDiseaseNo+'][disease]');
	}

	/**
	 *	Measure Functions
	 */
	function loadRangeFields () {
		var headerClass = [
			'.numericHeaderLoader',
			'.alphanumericHeaderLoader',
			'.alphanumericHeaderLoader',
			'.freetextHeaderLoader'
		]; 
		var inputClass = [
			'.numericInputLoader',
			'.alphanumericInputLoader',
			'.alphanumericInputLoader',
			'.freetextInputLoader'
		];

		if ($(this).data('measure-id') === 0) {
			var newMeasureId = $(this).data('new-measure-id');
			var measureID = 'new-measure-'+newMeasureId;
		} else {
			var measureID = $(this).data('measure-id');
		}

			measureTypeId = $('.measuretype-input-trigger.'+measureID).val() - 1;
			var headerHtml = $(headerClass[measureTypeId]).html();
			var inputHtml = $(inputClass[measureTypeId]).html();
		if (measureTypeId == 0) {
			$('.measurevalue.'+measureID).removeClass('col-md-6');
			$('.measurevalue.'+measureID).addClass('col-md-12');
		} else{
			$('.measurevalue.'+measureID).removeClass('col-md-12');
			$('.measurevalue.'+measureID).addClass('col-md-6');
		}
		if (measureTypeId == 3) {
			$('.measurevalue.'+measureID).siblings('.actions-row').addClass('hidden')
		}else{
			$('.measurevalue.'+measureID).siblings('.actions-row').removeClass('hidden')
		}
		$('.measurevalue.'+measureID).empty();
		$('.measurevalue.'+measureID).append(headerHtml);
		$('.measurevalue.'+measureID).append(inputHtml);
		if ($(this).data('measure-id') != 0) {
			editMeasureRangeAttributes(measureTypeId,measureID);
		}else{
			addMeasureRangeAttributes(measureTypeId, newMeasureId);
		}
	}

	function addNewMeasureAttributes (measureID) {
		$('.measure-section.new-'+measureID+' input.name').attr(
			'name', 'new-measures['+measureID+'][name]');
		$('.measure-section.new-'+measureID+' select.measure_type_id').attr(
			'name', 'new-measures['+measureID+'][measure_type_id]');
		$('.measure-section.new-'+measureID+' input.unit').attr(
			'name', 'new-measures['+measureID+'][unit]');
		$('.measure-section.new-'+measureID+' input.expected').attr(
			'name', 'new-measures['+measureID+'][expected]');
		$('.measure-section.new-'+measureID+' textarea.description').attr(
			'name', 'new-measures['+measureID+'][description]');
	}

	function addMeasureRangeAttributes (measureTypeId,measureID) {
		if (measureTypeId == 0) {
			$('.measurevalue.new-measure-'+measureID+' input.agemin').attr(
				'name', 'new-measures['+measureID+'][agemin][]');
			$('.measurevalue.new-measure-'+measureID+' input.agemax').attr(
				'name', 'new-measures['+measureID+'][agemax][]');
			$('.measurevalue.new-measure-'+measureID+' select.gender').attr(
				'name', 'new-measures['+measureID+'][gender][]');
			$('.measurevalue.new-measure-'+measureID+' input.rangemin').attr(
				'name', 'new-measures['+measureID+'][rangemin][]');
			$('.measurevalue.new-measure-'+measureID+' input.rangemax').attr(
				'name', 'new-measures['+measureID+'][rangemax][]');
			$('.measurevalue.new-measure-'+measureID+' input.interpretation').attr(
				'name', 'new-measures['+measureID+'][interpretation][]');
			$('.measurevalue.new-measure-'+measureID+' input.measurerangeid').attr(
				'name', 'new-measures['+measureID+'][measurerangeid][]');
		} else{
			$('.measurevalue.new-measure-'+measureID+' input.val').attr(
				'name', 'new-measures['+measureID+'][val][]');
			$('.measurevalue.new-measure-'+measureID+' input.interpretation').attr(
				'name', 'new-measures['+measureID+'][interpretation][]');
			$('.measurevalue.new-measure-'+measureID+' input.measurerangeid').attr(
				'name', 'new-measures['+measureID+'][measurerangeid][]');
		}
	}

	function editMeasureRangeAttributes (measureTypeId,measureID) {
		if (measureTypeId == 0) {
			$('.measurevalue.'+measureID+' input.agemin').attr(
				'name', 'measures['+measureID+'][agemin][]');
			$('.measurevalue.'+measureID+' input.agemax').attr(
				'name', 'measures['+measureID+'][agemax][]');
			$('.measurevalue.'+measureID+' select.gender').attr(
				'name', 'measures['+measureID+'][gender][]');
			$('.measurevalue.'+measureID+' input.rangemin').attr(
				'name', 'measures['+measureID+'][rangemin][]');
			$('.measurevalue.'+measureID+' input.rangemax').attr(
				'name', 'measures['+measureID+'][rangemax][]');
			$('.measurevalue.'+measureID+' input.interpretation').attr(
				'name', 'measures['+measureID+'][interpretation][]');
			$('.measurevalue.'+measureID+' input.measurerangeid').attr(
				'name', 'measures['+measureID+'][measurerangeid][]');
		} else{
			$('.measurevalue.'+measureID+' input.val').attr(
				'name', 'measures['+measureID+'][val][]');
			$('.measurevalue.'+measureID+' input.interpretation').attr(
				'name', 'measures['+measureID+'][interpretation][]');
			$('.measurevalue.'+measureID+' input.measurerangeid').attr(
				'name', 'measures['+measureID+'][measurerangeid][]');
		}
	}

	function UIComponents(){
		/* Datepicker */
        $( '.standard-datepicker').datetimepicker({ dateFormat: "Y/m/d H:i:s", inline:true,
        lang:'ru' });
        $( '.datepicker').datepicker({ dateFormat: "yy-mm-dd" });
        $( '.timepicker').datetimepicker({ datepicker:false,
        format:'H:i' });
        
	}

        
	function editUserProfile()
	{
		/*If Password-Change Validation*/
	    var currpwd = $('#current_password').val();
	    var newpwd1 = $('#new_password').val();
	    var newpwd2= $('#new_password_confirmation').val();
	    var newpwd1_len = newpwd1.length;
	    var newpwd2_len = newpwd2.length;
	    var error_flag = false;
	    if(currpwd == '')
	    {
	        $('.curr-pwd-empty').removeClass('hidden');
	        error_flag = true;
	    }
	    else
	    {
	        $('.curr-pwd-empty').addClass('hidden');
	    }

	    if(newpwd1 == '')
	    {
	        $('.new-pwd-empty').removeClass('hidden');
	        error_flag = true;
	    }
	    else
	    {
	        $('.new-pwd-empty').addClass('hidden');
	    }
	    if(newpwd2 == '')
	    {
	        $('.new-pwdrepeat-empty').removeClass('hidden');
	        error_flag = true;
	    }
	    else
	    {
	        $('.new-pwdrepeat-empty').addClass('hidden');
	    }
	    
	    if(!error_flag)
	    {
	        if(newpwd1_len != newpwd2_len || newpwd1 != newpwd2)
	        {
	            $('.new-pwdmatch-error').removeClass('hidden');
	            error_flag = true;
	        }
	        else
	        {
	            $('.new-pwdmatch-error').addClass('hidden');
	        }
	    }
	    if(!error_flag)
	    {
	        $('#form-edit-password').submit();
	    }
	}

	//DataTables search functionality
	$(document).ready( function () {
		$('.search-table').DataTable({
        	'bStateSave': true,
        	'fnStateSave': function (oSettings, oData) {
            	localStorage.setItem('.search-table', JSON.stringify(oData));
        	},
        	'fnStateLoad': function (oSettings) {
            	return JSON.parse(localStorage.getItem('.search-table'));
        	}
   		});
	});

	//Make sure all input fields are entered before submission
	function authenticate (form) {
    	var empty = false;
		$('form :input:not(button)').each(function() {

            if ($(this).val() == '') {
                empty = true;
	            $('.error-div').removeClass('hidden');
            }
	        if (empty) return false;
	    });
        if (empty) return;
	    $(form).submit();
	}

	function saveObservation(tid, user, username){
		txtarea = "observation_"+tid;
		observation = $("#"+txtarea).val();

		$.ajax({
			type: 'POST',
			url:  '/culture/storeObservation',
			data: {obs: observation, testId: tid, userId: user, action: "add"},
			success: function(){
				drawCultureWorksheet(tid , user, username);
			}
		});
	}
	/**
	 * Request a json string from the server containing contents of the culture_worksheet table for this test
	 * and then draws a table based on this data.
	 * @param  {int} tid      Test Id of the test
	 * @param  {string} username Current user
	 * @return {void}          No return
	 */
	function drawCultureWorksheet(tid, user, username){
		console.log(username);
		$.getJSON('/culture/storeObservation', { testId: tid, userId: user, action: "draw"}, 
			function(data){
				var tableBody ="";
				$.each(data, function(index, elem){
					tableBody += "<tr>"
					+" <td>"+elem.timeStamp+" </td>"
					+" <td>"+elem.user+"</td>"
					+" <td>"+elem.observation+"</td>"
					+" <td> </td>"
					+"</tr>";
				});
				tableBody += "<tr>"
					+"<td>0 seconds ago</td>"
					+"<td>"+username+"</td>"
					+"<td><textarea id='observation_"+tid+"' class='form-control result-interpretation' rows='2'></textarea></td>"
					+"<td><a class='btn btn-xs btn-success' href='javascript:void(0)' onclick='saveObservation("+tid+", &quot;"+user+"&quot;, &quot;"+username+"&quot;)'>Save</a></td>"
					+"</tr>";
				$("#tbbody_"+tid).html(tableBody);
			}
		);
	}

	/*Begin save drug susceptibility*/	
	function saveDrugSusceptibility(tid, oid){
		console.log(oid);
		var dataString = $("#drugSusceptibilityForm_"+oid).serialize();
		$.ajax({
			type: 'POST',
			url:  '/susceptibility/saveSusceptibility',
			data: dataString,
			success: function(){
				drawSusceptibility(tid, oid);
			}
		});
	}
	/*End save drug susceptibility*/
	/*Function to render drug susceptibility table after successfully saving the results*/
	function drawSusceptibility(tid, oid){
		$.getJSON('/susceptibility/saveSusceptibility', { testId: tid, organismId: oid, action: "results"}, 
			function(data){
				var tableRow ="";
				var tableBody ="";
				var suscept = "";
				$.each(data, function(index, elem){
					tableRow += "<tr>"
					+" <td>"+elem.drugName+" </td>"
					+" <td>"+elem.zone+"</td>"
					+" <td>"+elem.interpretation+"</td>"
					+"</tr>";
					suscept+=elem.drugName+" - "+elem.sensitivity+", ";
				});

				//$(".sense"+tid).val($(".sense"+tid).val()+elem.drugName+" - "+elem.sensitivity+", ");
				$(".sense"+tid).val(suscept);
				//tableBody +="<tbody>"+tableRow+"</tbody>";
				$( "#enteredResults_"+oid).html(tableRow);
				$("#submit_drug_susceptibility_"+oid).hide();
			}
		);
	}
	/*End drug susceptibility table rendering script*/
	/*Function to toggle possible isolates*/
	function toggle(className, obj){
		var $input = $(obj);
		if($input.prop('checked'))
			$(className).show();
		else
			$(className).hide();
	}
	/*End toggle function*/
	/*Toggle susceptibility tables*/
	function showSusceptibility(id){
		$('#drugSusceptibilityForm_'+id).toggle(this.checked);
	}
	/*End toggle susceptibility*/
	/* Fetch equipment details without page reload */
	function fetch_equipment_details()
    {
        $('#eq_con_details').html("");
        id = $("#client").val();
        if(id !='0')
        {
        	$.getJSON('blisclient/details', { equip: id }, 
				function(data)
				{
					var html = "<h4 class='text-center'>EQUIPMENT</h4>"+
					"<div class='form-group'>"+
					"<label for='equipment_name'>Equipment Name</label>"+
					"<input type='text' class='form-control' id='equipment_name' value = '"+data.equipment_name+"'><input type='hidden' id = 'equipment_id' value = '"+data.id+"'>"+
					"</div>"+
					"<div class='form-group'>"+
					"<label for='equipment_version'>Equipment Version</label>"+
					"<input type='text' class='form-control' id='equipment_version' value = '"+data.equipment_version+"'>"+
					"</div>"+
					"<div class='form-group'>"+
					"<label for='lab_section'>Lab Section</label>"+
					"<input type='text' class='form-control' id='lab_section' value = '"+data.lab+"'>"+
					"</div>"+
					"<div class='form-group'>"+
					"<label for='comm_type'>Communication Type</label>"+
					"<input type='text' class='form-control' id='comm_type' value = '"+data.comm+"'>"+
					"</div>"+
					"<div class='form-group'>"+
					"<label for='feed_source'>Feed Source</label>"+
					"<input type='text' class='form-control' id='feed_source' value = '"+data.feed+"'>"+
					"</div>"+
					"<div class='form-group'>"+
					"<label for='config_file'>Config File</label>"+
					"<input type='text' class='form-control' id='config_file' value = '"+data.config_file+"'>"+
					"</div>"+
					"<h4 class='text-center'>"+data.feed+" CONFIGURATIONS</h4>";
			        $.getJSON('blisclient/properties', { client: id }, 
						function(data)
						{
							$.each(data, function(index, elem)
							{
								html +=  "<div class='form-group'>"+
									"<label for='"+elem.config_prop+"'>"+elem.config_prop+"</label>"+
									"<input type='text' class='form-control' name = '"+elem.prop_id+"' value = '"+elem.prop_value+"'>"+
									"</div>";
							});
							html += "<div class='form-group actions-row'>"+
									"<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-cog' aria-hidden='true'></span> Generate Config File</button>"+
								    "<button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Update Fields</button>"+
								    "</div>";
                            $('#eq_con_details').html(html);
						}
					);
				}
			);                               
        }  
                         
    }


