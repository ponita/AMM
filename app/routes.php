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
    Route::any('/', array(
        "as" => "user.dashboard",
        "uses" => "UserController@dashboard"
    ));
    
    
});

Route::any('/login', array(
        "as" => "user.login",
        "uses" => "UserController@loginAction"
    ));
/* Routes accessible AFTER logging in */
Route::group(array("before" => "auth"), function()
{ 
    Route::any('/home', array(
        "as" => "user.home",
        "uses" => "UserController@homeAction"
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
    Route::resource('patient', 'PatientController');
	Route::resource('bbincidence', 'BbincidenceController'); /* Added by Justus */
    
	Route::get("/patient/{id}/delete", array(
        "as"   => "patient.delete",
        "uses" => "PatientController@delete"
    ));
    Route::post("/patient/search", array(
        "as"   => "patient.search",
        "uses" => "PatientController@search"
    ));
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
        Route::resource('specimenrejection', 'SpecimenRejectionController');
        Route::any("/specimenrejection/{id}/delete", array(
            "as"   => "specimenrejection.delete",
            "uses" => "SpecimenRejectionController@delete"
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
    Route::any("/test", array(
        "as"   => "test.index",
        "uses" => "TestController@index"
    ));
    //Unhls test route starts 
    Route::any("/unhls_test", array(
        "as"   => "unhls_test.index",
        "uses" => "UnhlsTestController@index"
    ));
    Route::post("/unhls_test/testlist", array(
        "as"   => "unhls_test.testList",
        "uses" => "UnhlsTestController@testList"
    ));
    //unhls test route ends
    Route::post("/test/resultinterpretation", array(
    "as"   => "test.resultinterpretation",
    "uses" => "TestController@getResultInterpretation"
    ));
    //Repeat of above route for UNHLS
    Route::post("/unhls_test/resultinterpretation", array(
    "as"   => "unhls_test.resultinterpretation",
    "uses" => "UnhlsTestController@getResultInterpretation"
    ));
     Route::any("/test/{id}/receive", array(
        "before" => "checkPerms:receive_external_test",
        "as"   => "test.receive",
        "uses" => "TestController@receive"
    ));
    Route::any("/test/create/{patient?}", array(
        "before" => "checkPerms:request_test",
        "as"   => "test.create",
        "uses" => "TestController@create"
    ));
    //Unhls test  create route starts
    Route::any("/unhls_test/create/{patient?}", array(
        "before" => "checkPerms:request_test",
        "as"   => "unhls_test.create",
        "uses" => "UnhlsTestController@create"
    ));
    //Unhls test create route ends
     Route::post("/test/savenewtest", array(
        "before" => "checkPerms:request_test",
        "as"   => "test.saveNewTest",
        "uses" => "TestController@saveNewTest"
    ));
     //unhls test savenewtest starts here
     Route::post("/unhls_test/savenewtest", array(
        "before" => "checkPerms:request_test",
        "as"   => "unhls_test.saveNewTest",
        "uses" => "UnhlsTestController@saveNewTest"
    ));
     //unhls test savenewtest ends here
     Route::post("/test/acceptspecimen", array(
        "before" => "checkPerms:accept_test_specimen",
        "as"   => "test.acceptSpecimen",
        "uses" => "TestController@accept"
    ));
     //unhls test refer starts here
    Route::post("/unhls_test/acceptspecimen", array(
        "before" => "checkPerms:accept_test_specimen",
        "as"   => "unhls_test.acceptSpecimen",
        "uses" => "UnhlsTestController@accept"
    ));
     //unhls test refer ends here
     Route::get("/test/{id}/refer", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "test.refer",
        "uses" => "TestController@showRefer"
    ));
     //Repeat of above code for UNHLS test
    Route::get("/unhls_test/{id}/refer", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "unhls_test.refer",
        "uses" => "UnhlsTestController@showRefer"
    ));
    Route::post("/test/referaction", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "test.referAction",
        "uses" => "TestController@referAction"
    ));
    //Repeat of above Route for UNHLS
    Route::post("/unhls_test/referaction", array(
        "before" => "checkPerms:refer_specimens",
        "as"   => "unhls_test.referAction",
        "uses" => "UnhlsTestController@referAction"
    ));
    Route::get("/test/{id}/reject", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "test.reject",
        "uses" => "TestController@reject"
    ));
    //Repeat of above code for UNHLS
    Route::get("/unhls_test/{id}/reject", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "unhls_test.reject",
        "uses" => "UnhlsTestController@reject"
    ));
    Route::post("/test/rejectaction", array(
        "before" => "checkPerms:reject_test_specimen",
        "as"   => "test.rejectAction",
        "uses" => "TestController@rejectAction"
    ));
    //Repeat of above code for UNHLS
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
     //Unhls test updatespecimentype starts here
     Route::post("/unhls_test/updatespecimentype", array(
        "before" => "checkPerms:change_test_specimen",
        "as"   => "unhls_test.updateSpecimenType",
        "uses" => "UnhlsTestController@updateSpecimenType"
    ));
     //Unhls test updatespecimentype ends
    Route::post("/test/start", array(
        "before" => "checkPerms:start_test",
        "as"   => "test.start",
        "uses" => "TestController@start"
    ));
    //Repeat of above route for UNHLS test 
    Route::post("/unhls_test/start", array(
        "before" => "checkPerms:start_test",
        "as"   => "unhls_test.start",
        "uses" => "UnhlsTestController@start"
    ));
     Route::get("/test/{test}/enterresults", array(
        "before" => "checkPerms:enter_test_results",
        "as"   => "test.enterResults",
        "uses" => "TestController@enterResults"
    ));
     //Repeat of above route for UNHLS
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
    //Repeat of above route for UNHLS
    Route::get("/unhls_test/{test}/edit", array(
        "before" => "checkPerms:edit_test_results",
        "as"   => "unhls_test.edit",
        "uses" => "UnhlsTestController@edit"
    ));
     Route::post("/test/{test}/saveresults", array(
        "before" => "checkPerms:edit_test_results",
        "as"   => "test.saveResults",
        "uses" => "TestController@saveResults"
    ));
     //Repeat of above route for UNHLS
    Route::post("/unhls_test/{test}/saveresults", array(
        "before" => "checkPerms:edit_test_results",
        "as"   => "unhls_test.saveResults",
        "uses" => "UnhlsTestController@saveResults"
    ));
    Route::get("/test/{test}/viewdetails", array(
        "as"   => "test.viewDetails",
        "uses" => "TestController@viewDetails"
    ));
    //Test viewDetails start
    Route::get("/unhls_test/{test}/viewdetails", array(
        "as"   => "unhls_test.viewDetails",
        "uses" => "UnhlsTestController@viewDetails"
    ));
    //Test viewDetail ends
    Route::any("/test/{test}/verify", array(
        "before" => "checkPerms:verify_test_results",
        "as"   => "test.verify",
        "uses" => "TestController@verify"
    ));
    Route::resource('culture', 'CultureController');
    Route::resource('cultureobservation', 'CultureObservationController');
    Route::resource('drugsusceptibility', 'DrugSusceptibilityController');
    Route::resource('isolatedorganism', 'IsolatedOrganismController');
    Route::any("/culture/storeObservation", array(
        "as"   => "culture.worksheet",
        "uses" => "CultureController@store"
    ));
    Route::any("/susceptibility/saveSusceptibility", array(
        "as"   => "drug.susceptibility",
        "uses" => "DrugSusceptibilityController@store"
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
        Route::any("/patientreport", array(
            "as"   => "reports.patient.index",
            "uses" => "UnhlsReportController@loadPatients"
        ));
        Route::any("/patientreport/{id}", array(
            "as" => "reports.patient.report", 
            "uses" => "UnhlsReportController@viewPatientReport"
        ));
        Route::any("/patientreport/{id}/{visit}/{testId?}", array(
            "as" => "reports.patient.report", 
            "uses" => "UnhlsReportController@viewPatientReport"
        ));
        Route::any("/visitreport/{id}", array(
            "as" => "reports.visit.report", 
            "uses" => "ReportController@viewVisitReport"
        ));
        Route::any("/visitreport/{id}/print", array(
            "as" => "reports.visit.report.print", 
            "uses" => "ReportController@printVisitReport"
        ));
        Route::any("/dailylog", array(
            "as"   => "reports.daily.log",
            "uses" => "ReportController@dailyLog"
        ));
        Route::any("/reports.department", array(
        "as"   => "reports.department",
        "uses" => "EventController@department"
        ));
        Route::get("/reports_download/", array(
        "as"   => "reports.download",
        "uses" => "MeetingController@download"
    ));
        Route::any("/reports.meetingreport", array(
        "as"   => "reports.meetingreport",
        "uses" => "MeetingController@meetingreport"
         ));
        Route::any("/reports.detailed", array(
        "as"   => "reports.detailed",
        "uses" => "MeetingController@detailed"
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
            "as"   => "reports.aggregate.department",
            "uses" => "ReportController@departmentReport"
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
    
//Hub manageement
    Route::resource('hubs', 'HubController');
    Route::get("/hubs/{id}/delete", array(
            "as"   => "hubs.delete",
            "uses" => "HubController@delete"
        ));

    //Emergency Samples manageement
    Route::resource('emergencySamples', 'EmergencySamplesController');
    Route::get("/emergencySamples/{id}/delete", array(
            "as"   => "emergencySamples.delete",
            "uses" => "EmergencySamplesController@delete"
        ));

    Route::any("/emergencySamples.create", array(
        "as"   => "emergencySamples.create",
        "uses" => "EmergencySamplesController@create"
    ));

    Route::any("/emergencySamples.index", array(
        "as"   => "emergencySamples.index",
        "uses" => "EmergencySamplesController@index"
    ));

    Route::any("/emergencySamples/{id}/show", array(
        "as"   => "emergencySamples.show",
        "uses" => "EmergencySamplesController@show"
    ));

    //Events/Activities Reporting
    Route::resource('event', 'EventController');


    Route::post("/event/workplans", array(
        "as"   => "event.workplans",
        "uses" => "EventController@workplans"
    ));

    Route::post("/event/strategy", "EventController@strategy");

    Route::post('event/facilitiesforhub', 'EventController@facilitiesForHub');


    // Route for downloading Activity/Meeting reports
    Route::get('/attachment2', 'MeetingController@downloadAttachment');
    Route::get('/attachments', 'EventController@downloadAttachment');
    Route::get('/attachment1', 'InvitationController@downloadAttachment');
	
	Route::any("/event/{id}/editapproval", array(
        "as"   => "event.editapproval",
        "uses" => "EventController@editapproval"
    ));

    Route::any("/event/{id}/updateapproval", array(
        "as"   => "event.updateapproval",
        "uses" => "EventController@updateapproval"
    ));

    Route::any("/event/{id}/editPosponedApproval", array(
        "as"   => "event.editPosponedApproval",
        "uses" => "EventController@editPosponedApproval"
    ));

    Route::any("/event/{id}/UpdatePosponedApproval", array(
        "as"   => "event.UpdatePosponedApproval",
        "uses" => "EventController@UpdatePosponedApproval"
    ));

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

    Route::any("/event/{id}/solution", array(
        "as"   => "event.solution",
        "uses" => "EventController@solution"
    ));

    Route::any("/event/{id}/updatesolution", array(
        "as"   => "event.updatesolution",
        "uses" => "EventController@updatesolution"
    ));

     Route::any("/event/{id}/reportings", array(
        "as"   => "event.reportings",
        "uses" => "EventController@reportings"
    ));

    Route::any("/event/{id}/updatereportings", array(
        "as"   => "event.updatereportings",
        "uses" => "EventController@updatereportings"
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

    Route::any("/event.eventfilter", array(
        "as"   => "event.eventfilter",
        "uses" => "EventController@eventfilter"
    ));

   
    Route::any("/event/{id}/addreport", array(
        "as"   => "event.addreport",
        "uses" => "EventController@addreport"
    ));

    Route::any("/event/{id}/updatereport", array(
        "as"   => "event.updatereport",
        "uses" => "EventController@updatereport"
    ));

     Route::any("/event.report", array(
        "as"   => "event.report",
        "uses" => "EventController@report"
    ));

     Route::any("/event.create", array(
        "as"   => "event.create",
        "uses" => "EventController@create"
    ));

Route::any("/event.store", array(
        "as"   => "event.store",
        "uses" => "EventController@store"
    ));

     Route::any("/event.edit", array(
        "as"   => "event.edit",
        "uses" => "EventController@edit"
    ));

     Route::any("/event/{id}/update", array(
        "as"   => "event.update",
        "uses" => "EventController@update"
    ));

     Route::any("/event.strategicPlan", array(
        "as"   => "event.strategicPlan",
        "uses" => "EventController@strategicPlan"
    ));

     Route::any("/event.calender", array(
        "as"   => "event.calender",
        "uses" => "EventController@calender"
    ));

     Route::any("/event/Unapproved/{approval_status_id}", array(
        "as"   => "event.Unapproved",
        "uses" => "EventController@statusapproval"
    ));

    Route::any("/event/cancelled/{approval_status_id}", array(
        "as"   => "event.cancelled",
        "uses" => "EventController@cancelled"
    ));

    Route::any("/event/posponed/{approval_status_id}", array(
        "as"   => "event.posponed",
        "uses" => "EventController@posponed"
    ));

      Route::get("/event/pending/{approval_status_id}/{action_status_id}", array(
        "as"   => "event.pending",
        "uses" => "EventController@pending"
        ));
    
    Route::get("/event/unattached/{status_id}/{approval_status_id}", array(
        "as"   => "event.unattached",
        "uses" => "EventController@unattached"
        ));

     Route::any("/event/complete/{status_id}/{action_status_id}", array(
            "as"   => "event.complete",
            "uses" => "EventController@complete"
        ));

//Meeting, invitation and memo management
    Route::resource('invitation', 'InvitationController');

     Route::resource('letters', 'LetterController');

     Route::resource('meetings', 'MeetingController');

    Route::any("/letters.letter", array(
        "as"   => "letters.letter",
        "uses" => "LetterController@letter"
    ));

    Route::any("/invitation.invitation", array(
        "as"   => "invitation.invitation",
        "uses" => "InvitationController@invitation"
    ));

    Route::any("/invitation/{id}/attachment", array(
        "as"   => "invitation.attachment",
        "uses" => "InvitationController@attachment"
    ));

    Route::any("/invitation/{id}/updateattachment", array(
        "as"   => "invitation.updateattachment",
        "uses" => "InvitationController@updateattachment"
    ));

    Route::any("/meetings.meeting", array(
        "as"   => "meetings.meeting",
        "uses" => "MeetingController@create"
    ));

    Route::any("/meetings/{id}/showmeeting", array(
        "as"   => "meetings.showmeeting",
        "uses" => "MeetingController@show"
    ));

    Route::any("/meetings.meetingindex", array(
        "as"   => "meetings.meetingindex",
        "uses" => "MeetingController@index"
    ));

    Route::post("/meetings.workplanlist", array(
        "as"   => "meetings.workplanlist",
        "uses" => "MeetingController@workplanlist"
    ));

    Route::any("/meetings/{id}/addminutes", array(
        "as"   => "meetings.addminutes",
        "uses" => "MeetingController@addminutes"
    ));

    Route::any("/meetings/{id}/updateminutes", array(
        "as"   => "meetings.updateminutes",
        "uses" => "MeetingController@updateminutes"
    ));

    Route::any("/meetings/{id}/actionpoints", array(
        "as"   => "meetings.actionpoints",
        "uses" => "MeetingController@editactions"
    ));

    Route::any("/meetings/{id}/updateactions", array(
        "as"   => "meetings.updateactions",
        "uses" => "MeetingController@updateactions"
    ));


    Route::any("/meetings/{id}/m_edit", array(
        "as"   => "meetings.m_edit",
        "uses" => "MeetingController@edit"
    ));

    Route::any("/meetings.report", array(
        "as"   => "meetings.report",
        "uses" => "MeetingController@report"
    ));

    Route::any("/meetings/{id}/m_approval", array(
        "as"   => "meetings.m_approval",
        "uses" => "MeetingController@m_approval"
    ));

    Route::any("/meetings/print/{print}", array(
        "as"   => "meetings.print",
        "uses" => "MeetingController@print"
    ));

   
    Route::any("/meeting/comp/{status_id}/{action_status_id}", array(
        "as"   => "meeting.comp",
        "uses" => "MeetingController@statuses"
    ));

    Route::any("/meeting/pending/{action_status_id}", array(
        "as"   => "meeting.pending",
        "uses" => "MeetingController@statuses"
    ));

    Route::any("/meeting/unattached/{status_id}", array(
        "as"   => "meeting.unattached",
        "uses" => "MeetingController@unattached"
    ));

     Route::any("/meeting/internal/{category}", array(
        "as"   => "meeting.internal",
        "uses" => "MeetingController@meetingtypes"
    ));
      Route::any("/meeting/external/{category}", array(
        "as"   => "meeting.external",
        "uses" => "MeetingController@meetingtypes"
    ));
      Route::any("/meeting/cancelled/{approval_status_id}", array(
        "as"   => "meeting.cancelled",
        "uses" => "MeetingController@cancelled"
    ));
      Route::any("/meeting/posponed/{approval_status_id}", array(
        "as"   => "meeting.posponed",
        "uses" => "MeetingController@posponed"
    ));

    Route::any("/event/print/{print}", array(
        "as"   => "event.print",
        "uses" => "EventController@print"
    ));

    Route::any("/meetings/{id}/editposponed", array(
        "as"   => "meetings.editposponed",
        "uses" => "MeetingController@editposponed"
    ));

    Route::any("/meetings/{id}/editapproval", array(
        "as"   => "meetings.editapproval",
        "uses" => "MeetingController@editapproval"
    ));

    Route::any("/meetings/{id}/updateposponedmeeting", array(
        "as"   => "meetings.updateposponedmeeting",
        "uses" => "MeetingController@updateposponedmeeting"
    ));

    Route::any("/meetings/{id}/updateEditedApproval", array(
        "as"   => "meetings.updateEditedApproval",
        "uses" => "MeetingController@updateEditedApproval"
    ));
       Route::any("/letters.letter_index", array(
        "as"   => "letters.letter_index",
        "uses" => "LetterController@index"
    ));

       Route::any("/letters.report", array(
        "as"   => "letters.report",
        "uses" => "LetterController@report"
    ));

       Route::any("/letters/{id}/editapproval", array(
        "as"   => "letters.editapproval",
        "uses" => "LetterController@editapproval"
    ));

    Route::any("/letters/{id}/updateapproval", array(
        "as"   => "letters.updateapproval",
        "uses" => "LetterController@updateapproval"
    ));

          Route::any("/letters/{id}/showletter", array(
        "as"   => "letters.showletter",
        "uses" => "LetterController@show"
    ));

          Route::any("/letters/{id}/editletter", array(
        "as"   => "letters.editletter",
        "uses" => "LetterController@edit"
    ));

          Route::any("/letters/print/{print}", array(
        "as"   => "letters.print",
        "uses" => "LetterController@print"
    ));

          Route::any("/invitation.invitation_index", array(
        "as"   => "invitation.invitation_index",
        "uses" => "InvitationController@index"
    ));
           Route::any("/invitation/{id}/showinvitation", array(
        "as"   => "invitation.showinvitation",
        "uses" => "InvitationController@show"
    ));
           Route::any("/invitation/{id}/editapproval", array(
        "as"   => "invitation.editapproval",
        "uses" => "InvitationController@editapproval"
    ));

    Route::any("/invitation/{id}/updateapproval", array(
        "as"   => "invitation.updateapproval",
        "uses" => "InvitationController@updateapproval"
    ));

             Route::any("/invitation.invitation_approval", array(
        "as"   => "invitation.invitation_approval",
        "uses" => "InvitationController@invitation_approval"
    ));

             Route::any("/invitation/print/{print}", array(
        "as"   => "invitation.print",
        "uses" => "InvitationController@print"
    ));

             Route::any("/letters.letter_approval", array(
        "as"   => "letters.letter_approval",
        "uses" => "LetterController@letter_approval"
    ));   


             Route::any("/event.team", array(
        "as"   => "event.team",
        "uses" => "EventController@team"
    )); 

    //           Route::any("/event.fullcalender", array(
    //     "as"   => "event.fullcalender",
    //     "uses" => "EventController@fullcalender"
    // )); 
              Route::resource('thematicAreas', 'ThematicareasController');

        Route::get("/thematicAreas/{id}/delete", array(
            "as"   => "thematicAreas.delete",
            "uses" => "ThematicareasController@delete"
        ));

         Route::resource('unhlsWorkplan', 'UnhlsWorkplanController');

        Route::get("/unhlsWorkplan/{id}/delete", array(
            "as"   => "unhlsWorkplan.delete",
            "uses" => "UnhlsWorkplanController@delete"
        ));

         Route::resource('organisers', 'OrganiserController');

        Route::get("/organisers/{id}/delete", array(
            "as"   => "organisers.delete",
            "uses" => "OrganiserController@delete"
        ));

         Route::resource('healthregion', 'HealthregionController');

        Route::get("/healthregion/{id}/delete", array(
            "as"   => "healthregion.delete",
            "uses" => "HealthregionController@delete"
        ));

         Route::resource('funders', 'FunderController');

        Route::get("/funders/{id}/delete", array(
            "as"   => "funders.delete",
            "uses" => "FunderController@delete"
        ));
         Route::resource('action', 'ActionPointController');

        Route::any("/action/{id}/delete", array(
            "as"   => "action.delete",
            "uses" => "ActionPointController@delete"
        ));

        Route::resource('maction', 'MActionPointController');

        Route::any("/maction/{id}/delete", array(
            "as"   => "maction.delete",
            "uses" => "MActionPointController@delete"
        ));

          Route::resource('leave', 'LeaveController');
        Route::get("/leave/{id}/delete", array(
            "as"   => "leave.delete",
            "uses" => "LeaveController@delete"
        ));
        Route::post("/leavsearch", array(
            "as"   => "search",
            "uses" => "LeaveController@search"
        ));

        //  Route::any("/leave/{id}/show", array(
        // "as"   => "leave.show",
        // "uses" => "LeaveController@show"
        // ));

        Route::any("/leave/{id}/clearance", array(
        "as"   => "leave.clearance",
        "uses" => "LeaveController@clearance"
        )); 

         Route::any("/leave/{id}/updateclearance", array(
        "as"   => "leave.updateclearance",
        "uses" => "LeaveController@updateclearance"
        ));
        Route::any("/leave/{id}/supervisor", array(
        "as"   => "leave.supervisor",
        "uses" => "LeaveController@supervisor"
        )); 

         Route::any("/leave/{id}/updatesupervisor", array(
        "as"   => "leave.updatesupervisor",
        "uses" => "LeaveController@updatesupervisor"
        ));   
          Route::any("/leave/{id}/manager", array(
        "as"   => "leave.manager",
        "uses" => "LeaveController@manager"
        ));

          Route::any("/leave/{id}/updatemanager", array(
        "as"   => "leave.updatemanager",
        "uses" => "LeaveController@updatemanager"
        ));

         Route::any("/leave/{id}/head", array(
        "as"   => "leave.head",
        "uses" => "LeaveController@head"
        ));

          Route::any("/leave/{id}/updatehead", array(
        "as"   => "leave.updatehead",
        "uses" => "LeaveController@updatehead"
        ));
        Route::any("/leave/{id}/confirmation", array(
        "as"   => "leave.confirmation",
        "uses" => "LeaveController@confirmation"
        )); 
          Route::any("/leave/{id}/delete", array(
        "as"   => "leave.delete",
        "uses" => "LeaveController@delete"
        ));   
           Route::any("/leave.create", array(
        "as"   => "leave.create",
        "uses" => "LeaveController@create"
        ));   

        Route::any("/leave.report", array(
        "as"   => "leave.report",
        "uses" => "LeaveController@report"
         ));
         Route::any("/leave/{id}/staff_detail", array(
        "as"   => "leave.detail",
        "uses" => "LeaveController@viewStaffLeaveDetails"
         ));
        Route::any("/leave.transfer", array(
        "as"   => "leave.transfer",
        "uses" => "LeaveController@transfer"
         ));

        Route::any("/leave/print/{print}", array(
        "as"   => "leave.print",
        "uses" => "LeaveController@print"
    ));

         Route::resource('template', 'TemplateController');
        Route::get("/template/{id}/delete", array(
            "as"   => "template.delete",
            "uses" => "TemplateController@delete"
        ));

Route::resource('strategicplans', 'YearStrategicplanController');
     
     Route::any("/yearActivities.index", array(
        "as"   => "yearActivities.index",
        "uses" => "YearStrategicplanController@yearActivitiesIndex"
        ));
     Route::any("/yearActivitylocation.index", array(
        "as"   => "yearActivitylocation.index",
        "uses" => "YearStrategicplanController@yearActivitylocationIndex"
        ));
     Route::any("/yearObjectives.index", array(
        "as"   => "yearObjectives.index",
        "uses" => "YearStrategicplanController@yearObjectivesIndex"
        ));
     Route::any("/yearplan.index", array(
        "as"   => "yearplan.index",
        "uses" => "YearStrategicplanController@yearplanIndex"
        ));
     Route::any("/yearplan.filtered", array(
        "as"   => "yearplan.filtered",
        "uses" => "YearStrategicplanController@filteredyearplanIndex"
        ));
     Route::any("/yearstrategies.index", array(
        "as"   => "yearstrategies.index",
        "uses" => "YearStrategicplanController@yearstrategiesIndex"
        ));
     Route::any("/yearSubactivities.index", array(
        "as"   => "yearSubactivities.index",
        "uses" => "YearStrategicplanController@yearSubactivitiesIndex"
        ));
     Route::any("/yearSubobjectives.index", array(
        "as"   => "yearSubobjectives.index",
        "uses" => "YearStrategicplanController@yearSubobjectivesIndex"
        ));
     Route::any("/yearActivities.create", array(
        "as"   => "yearActivities.create",
        "uses" => "YearStrategicplanController@yearActivitiesCreate"
        ));
     Route::any("/yearActivitylocation.create", array(
        "as"   => "yearActivitylocation.create",
        "uses" => "YearStrategicplanController@yearActivitylocationCreate"
        ));
     Route::any("/yearObjectives.create", array(
        "as"   => "yearObjectives.create",
        "uses" => "YearStrategicplanController@yearObjectivesCreate"
        ));
     Route::any("/yearplan.create", array(
        "as"   => "yearplan.create",
        "uses" => "YearStrategicplanController@yearplanCreate"
        ));
     Route::any("/yearstrategies.create", array(
        "as"   => "yearstrategies.create",
        "uses" => "YearStrategicplanController@yearstrategiesCreate"
        ));
     Route::any("/yearSubactivities.create", array(
        "as"   => "yearSubactivities.create",
        "uses" => "YearStrategicplanController@yearSubactivitiesCreate"
        ));
     Route::any("/yearSubobjectives.create", array(
        "as"   => "yearSubobjectives.create",
        "uses" => "YearStrategicplanController@yearSubobjectivesCreate"
        ));
     Route::any("/yearActivities.store", array(
        "as"   => "yearActivities.store",
        "uses" => "YearStrategicplanController@yearActivitiesStore"
        ));
     Route::any("/yearActivitylocation.store", array(
        "as"   => "yearActivitylocation.store",
        "uses" => "YearStrategicplanController@yearActivitylocationStore"
        ));
     Route::any("/yearObjectives.store", array(
        "as"   => "yearObjectives.store",
        "uses" => "YearStrategicplanController@yearObjectivesStore"
        ));
     Route::any("/yearplan.store", array(
        "as"   => "yearplan.store",
        "uses" => "YearStrategicplanController@yearplanStore"
        ));
     Route::any("/yearstrategies.store", array(
        "as"   => "yearstrategies.store",
        "uses" => "YearStrategicplanController@yearstrategiesStore"
        ));
     Route::any("/yearSubactivities.store", array(
        "as"   => "yearSubactivities.store",
        "uses" => "YearStrategicplanController@yearSubactivitiesStore"
        ));
     Route::any("/yearSubobjectives.store", array(
        "as"   => "yearSubobjectives.store",
        "uses" => "YearStrategicplanController@yearSubobjectivesStore"
        ));
     Route::any("/yearActivities/{id}/show", array(
        "as"   => "yearActivities.show",
        "uses" => "YearStrategicplanController@yearActivitiesShow"
        ));
     Route::any("/yearActivitylocation/{id}/show", array(
        "as"   => "yearActivitylocation.show",
        "uses" => "YearStrategicplanController@yearActivitylocationShow"
        ));
     Route::any("/yearObjectives/{id}/show", array(
        "as"   => "yearObjectives.show",
        "uses" => "YearStrategicplanController@yearObjectivesShow"
        ));
     Route::any("/yearplan/{id}/show", array(
        "as"   => "yearplan.show",
        "uses" => "YearStrategicplanController@yearplanShow"
        ));
     Route::any("/yearstrategies/{id}/show", array(
        "as"   => "yearstrategies.show",
        "uses" => "YearStrategicplanController@yearstrategiesShow"
        ));
     Route::any("/yearSubactivities/{id}/show", array(
        "as"   => "yearSubactivities.show",
        "uses" => "YearStrategicplanController@yearSubactivitiesShow"
        ));
     Route::any("/yearSubobjectives/{id}/show", array(
        "as"   => "yearSubobjectives.show",
        "uses" => "YearStrategicplanController@yearSubobjectivesShow"
        ));
     Route::any("/yearActivities/{id}/edit", array(
        "as"   => "yearActivities.edit",
        "uses" => "YearStrategicplanController@yearActivitiesEdit"
        ));
     Route::any("/yearActivitylocation/{id}/edit", array(
        "as"   => "yearActivitylocation.edit",
        "uses" => "YearStrategicplanController@yearActivitylocationEdit"
        ));
     Route::any("/yearObjectives/{id}/edit", array(
        "as"   => "yearObjectives.edit",
        "uses" => "YearStrategicplanController@yearObjectivesEdit"
        ));
     Route::any("/yearplan/{id}/edit", array(
        "as"   => "yearplan.edit",
        "uses" => "YearStrategicplanController@yearplanEdit"
        ));
     Route::any("/yearstrategies/{id}/edit", array(
        "as"   => "yearstrategies.edit",
        "uses" => "YearStrategicplanController@yearstrategiesEdit"
        ));
     Route::any("/yearSubactivities/{id}/edit", array(
        "as"   => "yearSubactivities.edit",
        "uses" => "YearStrategicplanController@yearSubactivitiesEdit"
        ));
     Route::any("/yearSubobjectives/{id}/edit", array(
        "as"   => "yearSubobjectives.edit",
        "uses" => "YearStrategicplanController@yearSubobjectivesEdit"
        ));
     Route::any("/yearActivities/{id}/update", array(
        "as"   => "yearActivities.update",
        "uses" => "YearStrategicplanController@yearActivitiesUpdate"
        ));
     Route::any("/yearActivitylocation/{id}/update", array(
        "as"   => "yearActivitylocation.update",
        "uses" => "YearStrategicplanController@yearActivitylocationUpdate"
        ));
     Route::any("/yearObjectives/{id}/update", array(
        "as"   => "yearObjectives.update",
        "uses" => "YearStrategicplanController@yearObjectivesUpdate"
        ));
     Route::any("/yearplan/{id}/update", array(
        "as"   => "yearplan.update",
        "uses" => "YearStrategicplanController@yearplanUpdate"
        ));
     Route::any("/yearstrategies/{id}/update", array(
        "as"   => "yearstrategies.update",
        "uses" => "YearStrategicplanController@yearstrategiesUpdate"
        ));
     Route::any("/yearSubactivities/{id}/update", array(
        "as"   => "yearSubactivities.update",
        "uses" => "YearStrategicplanController@yearSubactivitiesUpdate"
        ));
     Route::any("/yearSubobjectives/{id}/update", array(
        "as"   => "yearSubobjectives.update",
        "uses" => "YearStrategicplanController@yearSubobjectivesUpdate"
        ));

// Route::get('test/', function(){
//            $thematicareaId = 2;
//            echo 'pic data';

//         $department =Department::where('thematicArea_id', $thematicareaId)->lists('name','id');
//         print_r($department);
//         exit();
//         });
 
});
