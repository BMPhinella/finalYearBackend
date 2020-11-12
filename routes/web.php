<?php

use App\patients;
use App\visits;
use App\appointments;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){ return view('welcome');});
Route::group(['middleware' => ['auth']], function () {
Route::get('/dashboard', 'dashboardController@getDashboard');
Route::get('/get-graphs', 'dashboardController@getGraphs');
Route::get('/get-piechart', 'dashboardController@getPieChart');
    //how to pass data to the the API
    // $arr = [$count_patients, $count_visits, $count_appointments];
    // return response()->json($arr);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create-patients','patientsController@validatePatient');
Route::get('/change-patient/{id}','patientsController@changePatient');
Route::get('/delete-patient/{id}','patientsController@deletePatients');
Route::get('/get-patient','patientsController@getpatient')->name("Patients Details");
Route::get('/get-patients-create-form','patientsController@getCreatePatientsForm')->name("Register Patient");
Route::get('/get-edit-patients-form/{id}','patientsController@getEditPatientsForm')->name("Edit Patients");

Route::post('/create-diseases', 'diseasesController@validateDiseases');
Route::patch('/change-diseases/{id}','diseasesController@changeDiseases');
Route::delete('/delete-diseases/{id}','diseasesController@deleteDisease');
Route::get('/get-diseases','diseasesController@getdiseases')->name("Diseases Details");

Route::get('/create-clinicFindings','clinicFindingsController@validateClinicFindings');
Route::patch('/change-clinicFindings/{id}','clinicFindingsController@changeClinicFindings');
Route::get('/delete-clinicFindings/{id}','clinicFindingsController@deleteClinicFindings');
Route::get('/get-clinicFindings','clinicFindingsController@getclinicFindings')->name("Clinic Findings Details");
Route::get('/get-create-clinic-findings-form','clinicFindingsController@getCreateClinicFindingsForm')->name("Make Clinic Examinations");
Route::get('/get-edit-clinic-findings-form/{id}','clinicFindingsController@getEditClinicFindingsForm')->name('Edit Clinic Examination');

Route::post('/create-medicalPractitioners','medicalPractitionersController@validateMedicalPractitioners');
Route::patch('/change-medicalPractitioners/{id}','medicalPractitionersController@changeMedicalPractitioners');
Route::delete('/delete-medicalPractitioners/{id}','medicalPractitionersController@deleteMedicalPractitioners');
Route::get('/get-medicalPractitioners','medicalPractitionersController@getmedicalPractitioners')->name("medicalPractitioners Details");

Route::post('/create-permissions','permissionsController@createPermissions');
Route::patch('/change-permissions/{id}','permissionsController@changePermissions');
Route::delete('/delete-permissions/{id}','permissionsController@deletePermissions');

Route::post('/create-roles','rolesController@validateRoles');
Route::patch('/change-roles/{id}','rolesController@changeRoles');
Route::delete('/delete-roles/{id}','rolesController@deleteRoles');
Route::get('/get-roles','rolesController@getRoles')->name("roles Details");

Route::post('/create-ageGroup','ageGroupController@validateAgeGroup');
Route::patch('/change-ageGroup/{id}','ageGroupController@changeAgeGroup');
Route::delete('/delete-ageGroup/{id}','ageGroupController@deleteAgeGroup');
Route::get('/get-ageGroup','ageGroupController@getAgeGroup')->name("ageGroup Details");

Route::post('/create-treatment','treatmentController@validateTreatment');
Route::patch('/change-treatment/{id}','treatmentController@changeTreatment');
Route::delete('/remove-treatment/{id}','treatmentController@removeTreatment');
Route::get('/get-treatment','treatmentController@getTreatment')->name("treatment Details");

Route::post('/create-ageGroupTreatment','ageGroupTreatmentController@createAgeGroupTreatment');
Route::patch('/change-ageGroupTreatment/{id}','ageGroupTreatmentController@changeAgeGroupTreatment');
Route::delete('/remove-ageGroupTreatment/{id}','ageGroupTreatmentController@removeAgeGroupTreatment');
Route::get('/get-ageGroupTreatment','ageGroupTreatmentController@getAgeGroupTreatment')->name("ageGroupTreatment Details");

Route::post('/create-diseasesManagement','diseasesManagementController@createDiseasesManagement');
Route::patch('/change-diseasesManagement/{id}','diseasesManagementController@changeDiseasesManagement');
Route::delete('/remove-diseasesManagement/{id}','diseasesManagementController@removeDiseasesManagement');
Route::get('/get-diseasesManagement','diseasesManagementController@getDiseasesManagement')->name("Diseases Management Details");

Route::post('/create-diseasesClinicFindings','diseasesClinicFindingsController@createDiseasesClinicFindings');
Route::patch('/change-diseasesClinicFindings/{id}','diseasesClinicFindingsController@changeDiseasesClinicFindings');
Route::delete('/delete-diseasesClinicFindings/{id}','diseasesClinicFindingsController@removeDiseasesClinicFindings');
Route::get('/get-diseasesClinicFindings','diseasesClinicFindingsController@getDiseasesClinicFindings')->name("diseasesClinicFindings Details");

Route::post('/create-diseasesTreatment','diseasesTreatmentController@createDiseasesTreatment');
Route::patch('/change-diseasesTreatment/{id}','diseasesTreatmentController@changeDiseasesTreatment');
Route::delete('/remove-diseasesTreatment/{id}','diseasesTreatmentController@removeDiseasesTreatment');
Route::get('/get-diseasesTreatment','diseasesTreatmentController@getDiseasesTreatment')->name("Diseases Treatment Details");

Route::post('/create-patientsDiseases','patientsDiseasesController@createPatientsDiseases');
Route::patch('/change-patientsDiseases/{id}','patientsDiseasesController@changePatientsDiseases');
Route::delete('/delete-patientsDiseases/{id}','patientsDiseasesController@removePatientsDiseases');
Route::get('/get-patientsDiseases','patientsDiseasesController@getPatientsDiseases')->name("Patients Diseases Details");

Route::post('/create-patientsClinicFindings','patientsClinicFindingsController@createPatientsClinicFindings');
Route::patch('/change-patientsClinicFindings/{id}','patientsClinicFindingsController@changePatientsClinicFindings');
Route::delete('/delete-patientsClinicFindings/{id}','patientsClinicFindingsController@removePatientsclinicFindings');
Route::get('/get-patientsClinicFindings','patientsClinicFindingsController@getPatientsClinicFindings')->name("Patients ClinicFindings Details");

Route::post('/create-management','managementController@validateManagement');
Route::patch('/change-management/{id}','managementController@changeManagement');
Route::delete('/remove-management/{id}','managementController@removeManagement');
Route::get('/get-manangement','manangementController@getManangement')->name("Manangement Details");

Route::get('/create-visits','visitsController@validateVisits');
Route::get('/change-visits/{id}','visitsController@changeVisits');
Route::get('/delete-visits/{id}','visitsController@deleteVisits');
Route::get('/get-visits','visitsController@getVisits')->name("Visits Details");
Route::get('/get-create-visits-form','visitsController@getCreateVisitsForm')->name("Register Visit");
Route::get('/get-edit-visits-form/{id}','visitsController@getEditVisitsForm')->name("Edit Visits");

Route::get('/create-appointments','appointmentsController@validateAppointments');
Route::patch('/change-appointments/{id}','appointmentsController@changeAppointments');
Route::get('/delete-appointments/{id}','appointmentsController@deleteAppointments');
Route::get('/get-appointments','appointmentsController@getAppointments')->name("Appointments Details");
Route::get('/get-create-appointments-form','appointmentsController@getCreateAppointmentsForm')->name("Make Appointment");
Route::get('/get-edit-appointments-form/{id}','appointmentsController@getEditAppointmentsForm')->name('Edit Appointments');

Route::get('/logout','HomeController@logMeOut');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
