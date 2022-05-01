<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homeController';

$route['home'] = 'homeController/home';
$route['purpose'] = 'homeController/purpose';
$route['admin-home'] = 'homeController/adminHome';
$route['login'] = 'homeController/login';
$route['report'] = 'homeController/report';
$route['patients'] = 'homeController/patients';
$route['face-detect'] = 'homeController/detectFace';
$route['view-reports'] = 'homeController/viewReports';
$route['success-register'] = 'homeController/successRegister';

$route['new-medical'] = 'homeController/newMedical';
$route['register'] = 'customController/register';
$route['update'] = 'customController/update';



$route['account-management'] = 'homeController/manageAccounts';
$route['registration'] = 'homeController/registration';
$route['view_medical/(:any)'] = 'homeController/viewMedical/$1';
$route['update_medical/(:any)'] = 'homeController/updateMedical/$1';
$route['register'] = 'customController/register';


// Ajax
$route['ajax/get-all-users'] = 'customController/getAllUsers';
$route['ajax/get-patients'] = 'customController/getPatients';
$route['ajax/get-view-time-logs'] = 'customController/getViewingTimeLogs';
$route['ajax/get-view-building-time-logs'] = 'customController/getViewingBuildingTimeLogs';
$route['ajax/get-all-accounts'] = 'customController/getAllAccounts';
$route['ajax/get-new-password'] = 'customController/getnewpassword';
$route['ajax/login'] = 'globalController/validatelogin';
$route['ajax/update-password'] = 'customController/updatepassword';
$route['ajax/get-view-reports'] = 'customController/getViewReports';
$route['ajax/get-visitor-counts'] = 'customController/getVisitorCounts';
$route['ajax/get-visitor-counts-for-building'] =  'customController/getVisitorCountsForBuilding';
$route['ajax/delete-user'] = 'customController/deleteUser';

$route['ajax/archive-patient'] = 'customController/archive';

// api
$route['api/v1/getUser'] = 'apiController/getUserData';
$route['api/v1/addTime'] = 'apiController/insertTime';
$route['api/v1/addTimeInMainGate'] = 'apiController/insertTimeForMainGate';
$route['api/v1/addCivilianReport'] = 'apiController/addCivilianReport';
$route['api/v1/addIncidentReport'] = 'apiController/addIncidentReport';
$route['api/v1/validate-officer-login'] = 'apiController/validateOfficerLogin';

$route['logout'] = 'homeController/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

