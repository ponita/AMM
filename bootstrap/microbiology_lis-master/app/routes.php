<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/* Routes accessible before logging in */
Route::group(array("before" => "guest"), function()
{
    /*
    |-----------------------------------------
    | API route
    |-----------------------------------------
    | Proposed route for the BLIS api, we will receive api calls 
    | from other systems from this route.
    */
    Route::post('/api/receiver', array(
        "as" => "api.receiver",
        "uses" => "InterfacerController@receiveLabRequest"
    ));
    Route::post('/api/testinfo', array(
        "uses" => "InterfacerController@getTestInfo"
    ));
    Route::post('/api/searchtests', array(
        "uses" => "InterfacerController@getTests"
    ));
    Route::post('/api/saveresults', array(
        "uses" => "InterfacerController@saveTestResults"
    ));
    Route::any('/', array(
        "as" => "user.login",
        "uses" => "UserController@loginAction"
    ));
    
});
/* Routes accessible AFTER logging in */
Route::group(array("before" => "auth"), function()
{
    Route::any('/home', array(
        "as" => "user.home",
        "uses" => "UserController@homeAction"
        ));

    Route::any('/dashboard', array(
        "as" => "user.dashboard",
        "uses" => "UserController@dashboard"
        ));
    Route::group(array("before" => "checkPerms:manage_users"), function() {
        Route::resource('user', 'UserController');
        Route::get("/user/{id}/delete", array(
            "as"   => "user.delete",
            "uses" => "UserController@delete"
        ));
    });
    
    Route::any("/logout", array(
        "as"   => "user.logout",
        "uses" => "UserController@logoutAction"
    ));
    Route::any('/user/{id}/updateown', array(
        "as" => "user.updateOwnPassword",
        "uses" => "UserController@updateOwnPassword"
        ));
	Route::resource('bbincidence', 'BbincidenceController'); /* Added by Justus */
    
    //Unhls patient routes start here
    Route::resource('unhls_patient', 'UnhlsPatientController');
    Route::get("/unhls_patient/{id}/delete", array(
        "as"   => "unhls_patient.delete",
        "uses" => "UnhlsPatientController@delete"
    ));
    Route::post("/unhls_patient/search", array(
        "as"   => "unhls_patient.search",
        "uses" => "UnhlsPatientController@search"
    ));
    //Unhls patiend routes end
    Route::any("/instrument/getresult", array(
        "as"   => "instrument.getResult",
        "uses" => "InstrumentController@getTestResult"
    ));
    Route::group(array("before" => "checkPerms:manage_test_catalog"), function()
    {
        Route::resource('specimentype', 'SpecimenTypeController');
        Route::get("/specimentype/{id}/delete", array(
            "as"   => "specimentype.delete",
            "uses" => "SpecimenTypeController@delete"
        ));
        Route::resource('testcategory', 'TestCategoryController');
        
        Route::get("/testcategory/{id}/delete", array(
            "as"   => "testcategory.delete",
            "uses" => "TestCategoryController@delete"
        ));
        Route::resource('measure', 'MeasureController');
    
        Route::get("/measure/{id}/delete", array(
            "as"   => "measure.delete",
            "uses" => "MeasureController@delete"
        ));
        Route::resource('testtype', 'TestTypeController');
        Route::get("/testtype/{id}/delete", array(
            "as"   => "testtype.delete",
            "uses" => "TestTypeController@delete"
        ));
        Route::resource('specimenrejection', 'RejectionReasonController');
        Route::any("/specimenrejection/{id}/delete", array(
            "as"   => "specimenrejection.delete",
            "uses" => "RejectionReasonController@delete"
        ));
        Route::resource('drug', 'DrugController');
        
        Route::get("/drug/{id}/delete", array(
            "as"   => "drug.delete",
            "uses" => "DrugController@delete"
        ));
        Route::resource('organism', 'OrganismController');
        
        Route::get("/organism/{id}/delete", array(
            "as"   => "organism.delete",
            "uses" => "OrganismController@delete"
        ));
    });
    Route::group(array("before" => "checkPerms:manage_lab_configurations"), function()
    {
        Route::resource('instrument', 'InstrumentController');
        Route::get("/instrument/{id}/delete", array(
            "as"   => "instrument.delete",
            "uses" => "InstrumentController@delete"
        ));
        Route::any("/instrument/importdriver", array(
            "as"   => "instrument.importDriver",
            "uses" => "InstrumentController@importDriver"
        ));
    });
    Route::any("/specimen/{patient_id}/create", array(
        "as"   => "specimen.patient.create",
        "uses" => "SpecimenController@create"
    ));
    Route::any("/specimens/{status?}", array(
        "as"   => "specimen.index",
        "uses" => "SpecimenController@index"
    ));

    Route::resource('specimen', 'SpecimenController', [
        'except' => ['index']
    ]);

    //Unhls test route starts 
    Route::any("/unhls_test", array(
        "as"   => "unhls_test.index",
        "uses" => "UnhlsTestController@index"
    ));
    Route::post("/unhls_test/testlist", array(
        "as"   => "unhls_test.testList",
        "uses" => "UnhlsTestController@testList"
    ));
    Route::get("/unhls_test/{specimen_id}/addtest", array(
        "as"   => "unhls_test.getAddTest",
        "uses" => "UnhlsTestController@addTestToSpecimenCreate"
    ));
    Route::post("/unhls_test/addtest", array(
        "as"   => "unhls_test.addtest",
        "uses" => "UnhlsTestController@addTestToSpecimenStore"
    ));

    Route::post("/unhls_test/resultinterpretation", array(
    "as"   => "unhls_test.resultinterpretation",
    "uses" => "UnhlsTestController@getResultInterpretation"
    ));
     Route::any("/test/{id}/receive", array(
        "before" => "checkPerms:receive_external_test",
        "as"   => "test.receive",
        "uses" => "UnhlsTestController@receive"
    ));
    Route::any("/test/create/{patient?}", array(
        "before" => "checkPerms:request_test",
        "as"   => "test.create",
        "uses" => "UnhlsTestController@create"
    ));
    //Unhls test  create route starts
    Route::any("/unhls_test/create/{patient?}", array(
        "before" => "checkPerms:request_test",
        "as"   => "unhls_test.create",
        "uses" => "UnhlsTestController@create"
    ));
     //unhls test savenewtest starts here
     Route::post("/unhls_test/savenewtest", array(
        "before" => "checkPerms:request_test",
        "as"   => "unhls_test.saveNewTest",
        "uses" => "UnhlsTestController@saveNewTest"
    ));
     //unhls test refer starts here
    Route::post("/unhls_test/acceptspecimen", array(
        "before" => "checkPerms:accept_test_specimen",
        "as"   => "unhls_test.acceptSpecimen",
        "uses" => "UnhlsTestController@acceptSpecimenAction"
    ));
     //unhls test refer ends here
     Route::get("/test/{id}/refer", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "test.refer",
        "uses" => "TestController@showRefer"
    ));
    Route::get("/unhls_test/{id}/refer", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "unhls_test.refer",
        "uses" => "UnhlsTestController@showRefer"
    ));
    Route::post("/unhls_test/referaction", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "unhls_test.referAction",
        "uses" => "UnhlsTestController@referAction"
    ));
    Route::get("/test/{id}/reject", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "test.reject",
        "uses" => "UnhlsTestController@reject"
    ));
    Route::get("/unhls_test/{id}/reject", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "unhls_test.reject",
        "uses" => "UnhlsTestController@reject"
    ));
    Route::post("/test/rejectaction", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "test.rejectAction",
        "uses" => "UnhlsTestController@rejectAction"
    ));
    Route::post("/unhls_test/rejectaction", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "unhls_test.rejectAction",
        "uses" => "UnhlsTestController@rejectAction"
    ));
     Route::post("/test/changespecimen", array(
        "before" => "checkPerms:change_test_specimen",
        "as"   => "test.changeSpecimenType",
        "uses" => "TestController@changeSpecimenType"
    ));
     //Repeat of above code for UNHLS test
     Route::post("/unhls_test/changespecimen", array(
        "before" => "checkPerms:change_test_specimen",
        "as"   => "unhls_test.changeSpecimenType",
        "uses" => "UnhlsTestController@changeSpecimenType"
    ));
     Route::post("/test/updatespecimentype", array(
        "before" => "checkPerms:change_test_specimen",
        "as"   => "test.updateSpecimenType",
        "uses" => "TestController@updateSpecimenType"
    ));
     Route::post("/unhls_test/updatespecimentype", array(
        "before" => "checkPerms:change_test_specimen",
        "as"   => "unhls_test.updateSpecimenType",
        "uses" => "UnhlsTestController@updateSpecimenType"
    ));

    Route::post("/unhls_test/start", array(
        "before" => "checkPerms:start_test",
        "as"   => "unhls_test.start",
        "uses" => "UnhlsTestController@start"
    ));
     Route::get("/unhls_test/{test}/enterresults", array(
        "before" => "checkPerms:enter_test_results",
        "as"   => "unhls_test.enterResults",
        "uses" => "UnhlsTestController@enterResults"
    ));
    Route::get("/test/{test}/edit", array(
        "before" => "checkPerms:edit_test_results",
        "as"   => "test.edit",
        "uses" => "TestController@edit"
    ));
    Route::get("/unhls_test/{test}/edit", array(
        "before" => "checkPerms:edit_test_results",
        "as"   => "unhls_test.edit",
        "uses" => "UnhlsTestController@edit"
    ));
    Route::post("/unhls_test/{test}/saveresults", array(
        "before" => "checkPerms:edit_test_results",
        "as"   => "unhls_test.saveResults",
        "uses" => "UnhlsTestController@saveResults"
    ));
    Route::get("/test/{test}/viewdetails", array(
        "as"   => "test.viewDetails",
        "uses" => "TestController@viewDetails"
    ));
    Route::post("unhls_test/collectspecimen", array(
        "as" => "unhls_test.collectSpecimen",
        "uses" => "UnhlsTestController@acceptSpecimen"));
    Route::post("/unhls_test/collectspecimenaction", array(
        "before" => "checkPerms:refer_specimens", //TODO create permissions for collecting sample and update acordingly
        "as"   => "unhls_test.collectSpecimenAction",
        "uses" => "UnhlsTestController@collectSpecimenAction"
    ));
    Route::get("unhls_test/completed", array(
        "as" => "unhls_test.completed",
        "uses" => "UnhlsTestController@completed"));
    Route::get("unhls_test/pending", array(
        "as" => "unhls_test.pending",
        "uses" => "UnhlsTestController@pending"));
    Route::get("unhls_test/started", array(
        "as" => "unhls_test.started",
        "uses" => "UnhlsTestController@started"));
    Route::get("unhls_test/notrecieved", array(
        "as" => "unhls_test.notrecieved",
        "uses" => "UnhlsTestController@notRecieved"));
    Route::get("unhls_test/verified", array(
        "as" => "unhls_test.verified",
        "uses" => "UnhlsTestController@verified"));
    Route::get("/unhls_test/{test}/viewdetails", array(
        "as"   => "unhls_test.viewDetails",
        "uses" => "UnhlsTestController@viewDetails"
    ));
    Route::any("/test/{test}/verify", array(
        "before" => "checkPerms:verify_test_results",
        "as"   => "test.verify",
        "uses" => "UnhlsTestController@verify"
    ));
    Route::resource('culture', 'CultureController');
    Route::resource('cultureobservation', 'CultureObservationController');
    Route::resource('drugsusceptibility', 'DrugSusceptibilityController');
    Route::resource('isolatedorganism', 'IsolatedOrganismController');
    Route::resource('gramstain', 'GramStainResultController');

    Route::get("/organismantibiotic/{organism_id}/show", array(
        "as"   => "organismantibiotic.show",
        "uses" => "OrganismAntibioticController@show"
    ));
    Route::get("/organismantibiotic/{organism_id}/create", array(
        "as"   => "organismantibiotic.create",
        "uses" => "OrganismAntibioticController@create"
    ));
    Route::get("/organismantibiotic/{zone_diameter_id}/edit", array(
        "as"   => "organismantibiotic.edit",
        "uses" => "OrganismAntibioticController@edit"
    ));
    Route::post("/organismantibiotic/store", array(
        "as"   => "organismantibiotic.store",
        "uses" => "OrganismAntibioticController@store"
    ));
    Route::put("/organismantibiotic/{zone_diameter_id}/update", array(
        "as"   => "organismantibiotic.update",
        "uses" => "OrganismAntibioticController@update"
    ));
    Route::delete("/organismantibiotic/{zone_diameter_id}/destroy", array(
        "as"   => "organismantibiotic.destroy",
        "uses" => "OrganismAntibioticController@destroy"
    ));

    Route::group(array("before" => "admin"), function()
    {
        Route::resource("permission", "PermissionController");
        Route::get("role/assign", array(
            "as"   => "role.assign",
            "uses" => "RoleController@assign"
        ));
        Route::post("role/assign", array(
            "as"   => "role.assign",
            "uses" => "RoleController@saveUserRoleAssignment"
        ));
        Route::resource("role", "RoleController");
        Route::get("/role/{id}/delete", array(
            "as"   => "role.delete",
            "uses" => "RoleController@delete"
        ));
    });
    // Check if able to manage lab configuration
    Route::group(array("before" => "checkPerms:manage_lab_configurations"), function()
    {
        Route::resource("facility", "FacilityController");
        Route::get("/facility/{id}/delete", array(
            "as"   => "facility.delete",
            "uses" => "FacilityController@delete"
        ));
        Route::any("/reportconfig/surveillance", array(
            "as"   => "reportconfig.surveillance",
            "uses" => "ReportController@surveillanceConfig"
        ));
        Route::any("/reportconfig/disease", array(
            "as"   => "reportconfig.disease",
            "uses" => "ReportController@disease"
        ));

        Route::resource("barcode", "BarcodeController");
        Route::any("/blisclient", array(
            "as"   => "blisclient.index",
            "uses" => "BlisClientController@index"
        ));
        Route::any("/blisclient/details", array(
            "as"   => "blisclient.details",
            "uses" => "BlisClientController@details"
        ));
        Route::any("/blisclient/properties", array(
            "as"   => "blisclient.properties",
            "uses" => "BlisClientController@properties"
        ));
    });
    
    //  Check if able to manage reports
    Route::group(array("before" => "checkPerms:view_reports"), function()
    {
        Route::resource('reports', 'ReportController');
		
		Route::any("/patientreport", array(
            "as"   => "reports.patient.index",
            "uses" => "ReportController@loadPatients"
        ));
        Route::any("/patientreport/{id}", array(
            "as" => "reports.patient.report", 
            "uses" => "ReportController@viewPatientReport"
        ));
        Route::any("/patientreport/{id}/{visit}/{testId?}", array(
            "as" => "reports.patient.report", 
            "uses" => "ReportController@viewPatientReport"
        ));
        Route::any("/visitreport/{id}/print", array(
            "as" => "reports.visit.report.print", 
            "uses" => "ReportController@printVisitReport"
        ));
        Route::any("/dailylog", array(
            "as"   => "reports.daily.log",
            "uses" => "ReportController@dailyLog"
        ));
        Route::get('reports/dropdown', array(
            "as"    =>  "reports.dropdown",
            "uses"  =>  "ReportController@reportsDropdown"
        ));
        Route::any("/prevalence", array(
            "as"   => "reports.aggregate.prevalence",
            "uses" => "ReportController@prevalenceRates"
        ));
        Route::any("/surveillance", array(
            "as"   => "reports.aggregate.surveillance",
            "uses" => "ReportController@surveillance"
        ));
        Route::any("/counts", array(
            "as"   => "reports.aggregate.counts",
            "uses" => "ReportController@countReports"
        ));
        Route::any("/tat", array(
            "as"   => "reports.aggregate.tat",
            "uses" => "ReportController@turnaroundTime"
        ));
        Route::any("/infection", array(
            "as"   => "reports.aggregate.infection",
            "uses" => "ReportController@infectionReport"
        ));
        
        Route::any("/userstatistics", array(
            "as"   => "reports.aggregate.userStatistics",
            "uses" => "ReportController@userStatistics"
        ));

        Route::any("/moh706", array(
            "as"   => "reports.aggregate.moh706",
            "uses" => "ReportController@moh706"
        ));

        Route::any("/cd4", array(
            "as"   => "reports.aggregate.cd4",
            "uses" => "ReportController@cd4"
        ));
        
        Route::get("/qualitycontrol", array(
            "as"   => "reports.qualityControl",
            "uses" => "ReportController@qualityControl"
        ));
        Route::post("/qualitycontrol", array(
            "as"   => "reports.qualityControl",
            "uses" => "ReportController@qualityControlResults"
        ));
        Route::get("/inventory", array(
            "as"   => "reports.inventory",
            "uses" => "ReportController@stockLevel"
        ));
        Route::post("/inventory", array(
            "as"   => "reports.inventory",
            "uses" => "ReportController@stockLevel"
        ));
    });
    Route::group(array("before" => "checkPerms:manage_qc"), function()
    {
        Route::resource("lot", "LotController");
        Route::get('lot/{lotId}/delete', array(
            'uses' => 'LotController@delete'
        ));
        Route::any("controlresult/{id}/update",array(
            "as" => "controlresult.update",
            "uses" => "ControlResultsController@update"
            )
        );

        Route::get('controlresult/{controlTestId}/delete', array(
            'uses' => 'ControlResultsController@delete'
        ));
        Route::resource("control", "ControlController");
        Route::get("controlresults", array(
            "as"   => "control.resultsIndex",
            "uses" => "ControlController@resultsIndex"
        ));
        Route::get("controlresults/{controlId}/resultsEntry", array(
            "as" => "control.resultsEntry",
            "uses" => "ControlController@resultsEntry"
        ));
        Route::get("controlresults/{controlId}/resultsEdit", array(
            "as" => "control.resultsEdit",
            "uses" => "ControlController@resultsEdit"
        ));
    
        Route::get("controlresults/{controlId}/resultsList", array(
            "as" => "control.resultsList",
            "uses" => "ControlController@resultsList"
        ));
        Route::get('control/{controlId}/delete', array(
            'uses' => 'ControlController@destroy'
        ));
        Route::post('control/{controlId}/saveResults', array(
            "as" => "control.saveResults",
            'uses' => 'ControlController@saveResults'
        ));
        Route::post('control/{controlId}/resultsUpdate', array(
            "as" => "control.resultsUpdate",
            'uses' => 'ControlController@resultsUpdate'
        ));
    });
    
    Route::group(array("before" => "checkPerms:request_topup"), function()
    {
        //top-ups
        Route::resource('topup', 'TopUpController');
        Route::get("/topup/{id}/delete", array(
            "as"   => "topup.delete",
            "uses" => "TopUpController@delete"
        ));
        Route::get('topup/{id}/availableStock', array(
            "as"    =>  "issue.dropdown",
            "uses"  =>  "TopUpController@availableStock"
        ));
    });
    Route::group(array("before" => "checkPerms:manage_inventory"), function()
    {
        //Commodities
        Route::resource('commodity', 'CommodityController');
        Route::get("/commodity/{id}/delete", array(
            "as"   => "commodity.delete",
            "uses" => "CommodityController@delete"
        ));
        //issues
        Route::resource('issue', 'IssueController');
        Route::get("/issue/{id}/delete", array(
            "as"   => "issue.delete",
            "uses" => "IssueController@delete"
        ));
        Route::get("/issue/{id}/dispatch", array(
            "as"   => "issue.dispatch",
            "uses" => "IssueController@dispatch"
        ));
        //Metrics
        Route::resource('metric', 'MetricController');
        Route::get("/metric/{id}/delete", array(
            "as"   => "metric.delete",
            "uses" => "MetricController@delete"
        ));
        //Suppliers
        Route::resource('supplier', 'SupplierController');
        
        Route::get("/supplier/{id}/delete", array(
            "as"   => "supplier.delete",
            "uses" => "SupplierController@delete"
        ));
        //Receipts
        Route::resource('receipt', 'ReceiptController');
        Route::get("/receipt/{id}/delete", array(
            "as"   => "receipt.delete",
            "uses" => "ReceiptController@delete"
        ));
        //Stock card
        Route::post("/stockcard/index", array(
            "as"   => "stockcard.index",
            "uses" => "StockCardController@index"
        ));        
        Route::post("/stockcard/create", array(
            "as"   => "stockcard.create",
            "uses" => "StockCardController@create"
        ));
        Route::post("/stockcard/store", array(
            "as"   => "stockcard.store",
            "uses" => "StockCardController@store"
        ));
        Route::get("/stockcard/{id}/delete", array(
            "as"   => "stockcard.delete",
            "uses" => "StockCardController@delete"
        ));
        Route::resource('stockcard', 'StockCardController');   

        //Stock requisition form
        Route::post("/stockrequisition/index", array(
            "as"   => "stockrequisition.index",
            "uses" => "StockRequisitionController@index"
        ));        
        Route::post("/stockrequisition/create", array(
            "as"   => "stockrequisition.create",
            "uses" => "StockRequisitionController@create"
        ));
        Route::post("/stockrequisition/store", array(
            "as"   => "stockrequisition.store",
            "uses" => "StockRequisitionController@store"
        ));        
        Route::get("/stockrequisition/{id}/delete", array(
            "as"   => "stockrequisition.delete",
            "uses" => "StockRequisitionController@delete"
        ));
        Route::resource('stockrequisition', 'StockRequisitionController');


        //Equipment supplier form
       Route::post("/equipmentsupplier/index", array(
            "as"   => "equipmentsupplier.index",
            "uses" => "EquipmentSupplierController@index"
        ));        
        Route::post("/equipmentsupplier/create", array(
            "as"   => "equipmentsupplier.create",
            "uses" => "EquipmentSupplierController@create"
        ));
        Route::post("/equipmentsupplier/store", array(
            "as"   => "equipmentsupplier.store",
            "uses" => "EquipmentSupplierController@store"
        ));        
        Route::get("/equipmentsupplier/{id}/delete", array(
            "as"   => "equipmentsupplier.delete",
            "uses" => "EquipmentSupplierController@delete"
        ));
        Route::resource('equipmentsupplier', 'EquipmentSupplierController');
 

        //Equipment inventory
       Route::post("/equipmentinventory/index", array(
            "as"   => "equipmentinventory.index",
            "uses" => "EquipmentInventoryController@index"
        ));        
        Route::post("/equipmentinventory/create", array(
            "as"   => "equipmentinventory.create",
            "uses" => "EquipmentInventoryController@create"
        ));
        Route::post("/equipmentinventory/store", array(
            "as"   => "equipmentinventory.store",
            "uses" => "EquipmentInventoryController@store"
        ));        
        Route::get("/equipmentinventory/{id}/delete", array(
            "as"   => "equipmentinventory.delete",
            "uses" => "EquipmentInventoryController@delete"
        ));
        Route::resource('equipmentinventory', 'EquipmentInventoryController');

        //Equipment maintenance
       Route::post("/equipmentmaintenance/index", array(
            "as"   => "equipmentmaintenance.index",
            "uses" => "EquipmentMaintenanceController@index"
        ));        
        Route::post("/equipmentmaintenance/create", array(
            "as"   => "equipmentmaintenance.create",
            "uses" => "EquipmentMaintenanceController@create"
        ));
        Route::post("/equipmentmaintenance/store", array(
            "as"   => "equipmentmaintenance.store",
            "uses" => "EquipmentMaintenanceController@store"
        ));        
        Route::get("/equipmentmaintenance/{id}/delete", array(
            "as"   => "equipmentmaintenance.delete",
            "uses" => "EquipmentMaintenanceController@delete"
        ));
        Route::resource('equipmentmaintenance', 'EquipmentMaintenanceController');


        //Equipment breakdown
       Route::post("/equipmentbreakdown/index", array(
            "as"   => "equipmentbreakdown.index",
            "uses" => "EquipmentBreakdownController@index"
        ));        
        Route::post("/equipmentbreakdown/create", array(
            "as"   => "equipmentbreakdown.create",
            "uses" => "EquipmentBreakdownController@create"
        ));
        Route::post("/equipmentbreakdown/store", array(
            "as"   => "equipmentbreakdown.store",
            "uses" => "EquipmentBreakdownController@store"
        ));        
        Route::get("/equipmentbreakdown/{id}/delete", array(
            "as"   => "equipmentbreakdown.delete",
            "uses" => "EquipmentBreakdownController@delete"
        ));
        Route::resource('equipmentbreakdown', 'EquipmentBreakdownController');


        //API controller        
        Route::resource('apite', 'ApiController');       
        Route::post("/apite/facility", array(
            "as"   => "apite.facility",
            "uses" => "ApiController@facility"
        ));

        //Route::get('api/facility-by-district/{districtId}', 'ApiController@getFacilityListByDistrict');

    });
	//BB Incidents
	Route::resource('bbincidence', 'BbincidenceController');
    
	Route::get("/bbincidence/clinical/clinical", array(
        "as"   => "bbincidence.clinical",
        "uses" => "BbincidenceController@clinical"
    ));
	
	Route::get("/bbincidence/{id}/clinicaledit", array(
        "as"   => "bbincidence.clinicaledit",
        "uses" => "BbincidenceController@clinicaledit"
    ));

    Route::any("/bbincidence/{id}/clinicalupdate", array(
        "as"   => "bbincidence.clinicalupdate",
        "uses" => "BbincidenceController@clinicalupdate"
    ));

    Route::any("/bbincidence/bbfacilityreport/bbfacilityreport", array(
        "as"   => "bbincidence.bbfacilityreport",
        "uses" => "BbincidenceController@bbfacilityreport"
    ));

    Route::get("/bbincidence/{id}/analysisedit", array(
        "as"   => "bbincidence.analysisedit",
        "uses" => "BbincidenceController@analysisedit"
    ));

    Route::any("/bbincidence/{id}/analysisupdate", array(
        "as"   => "bbincidence.analysisupdate",
        "uses" => "BbincidenceController@analysisupdate"
    ));

    Route::get("/bbincidence/{id}/responseedit", array(
        "as"   => "bbincidence.responseedit",
        "uses" => "BbincidenceController@responseedit"
    ));

    Route::any("/bbincidence/{id}/responseupdate", array(
        "as"   => "bbincidence.responseupdate",
        "uses" => "BbincidenceController@responseupdate"
    ));

    //Bike Management
    Route::resource('bike', 'BikeController');

    //Events/Activities Reporting
    Route::resource('event', 'EventController');

    // Route for downloading Activity/Event reports
    Route::get('/attachments', 'EventController@downloadAttachment');

    Route::any("/event/{id}/editobjectives", array(
        "as"   => "event.editobjectives",
        "uses" => "EventController@editobjectives"
    ));

    Route::any("/event/{id}/updateobjectives", array(
        "as"   => "event.updateobjectives",
        "uses" => "EventController@updateobjectives"
    ));

    Route::any("/event/{id}/editlessons", array(
        "as"   => "event.editlessons",
        "uses" => "EventController@editlessons"
    ));

    Route::any("/event/{id}/updatelessons", array(
        "as"   => "event.updatelessons",
        "uses" => "EventController@updatelessons"
    ));

    Route::any("/event/{id}/editrecommendations", array(
        "as"   => "event.editrecommendations",
        "uses" => "EventController@editrecommendations"
    ));

    Route::any("/event/{id}/updaterecommendations", array(
        "as"   => "event.updaterecommendations",
        "uses" => "EventController@updaterecommendations"
    ));

    Route::any("/event/{id}/editactions", array(
        "as"   => "event.editactions",
        "uses" => "EventController@editactions"
    ));

    Route::any("/event/{id}/updateactions", array(
        "as"   => "event.updateactions",
        "uses" => "EventController@updateactions"
    ));

    Route::any("/event/eventfilter/eventfilter", array(
        "as"   => "event.eventfilter",
        "uses" => "EventController@eventfilter"
    ));
	
	 Route::resource('unhls_els', 'UnhlsElsController');

});
