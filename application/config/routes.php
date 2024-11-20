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
|	https://codeigniter.com/userguide3/general/routing.html
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
//====================User routes=======================
$route['upload_document'] = 'pages/upload_document';
$route['confirm_employer/(:any)'] = 'pages/confirm_employer/$1';
$route['save_application'] = 'pages/save_application';
$route['apply_job/(:any)'] = 'pages/apply_job/$1';
$route['view_all_jobs'] = 'pages/view_all_jobs';
$route['search_jobs'] = 'pages/search_jobs';
$route['update_user_account'] = 'pages/update_user_account';
$route['update_interest'] = 'pages/update_interest';
$route['update_profile'] = 'pages/update_profile';
$route['user_application'] = 'pages/user_application';
$route['user_profile'] = 'pages/user_profile';
$route['user_logout'] = 'pages/user_logout';
$route['user_registration'] = 'pages/user_registration';
$route['user_authentication'] = 'pages/user_authentication';
$route['user_signin'] = 'pages/user_signin';
//====================User routes=======================
//====================Company routes====================
$route['view_document/(:any)'] = 'pages/view_document/$1';
$route['delete_document/(:any)'] = 'pages/delete_document/$1';
$route['save_document'] = 'pages/save_document';
$route['manage_documents'] = 'pages/manage_documents';
$route['send_email'] = 'pages/send_email';
$route['view_resume/(:any)'] = 'pages/view_resume/$1';
$route['manage_applicant'] = 'pages/manage_applicant';
$route['delete_job/(:any)'] = 'pages/delete_job/$1';
$route['change_job_status/(:any)/(:any)'] = 'pages/change_job_status/$1/$2';
$route['save_job'] = 'pages/save_job';
$route['manage_job'] = 'pages/manage_job';
$route['company_logout'] = 'pages/company_logout';
$route['company_authentication'] = 'pages/company_authentication';
$route['company_main'] = 'pages/company_main';
$route['save_company_account'] = 'pages/save_company_account';
//====================Company routes====================
//====================Admin routes=======================
$route['admin_notify/(:any)'] = 'pages/admin_notify/$1';
$route['manage_user_application'] = 'pages/manage_user_application';
$route['view_company_documents/(:any)'] = 'pages/view_company_documents/$1';
$route['update_user_status/(:any)/(:any)'] = 'pages/update_user_status/$1/$2';
$route['manage_users'] = 'pages/manage_users';
$route['delete_company/(:any)'] = 'pages/delete_company/$1';
$route['save_company'] = 'pages/save_company';
$route['manage_company'] = 'pages/manage_company';
$route['admin_logout'] = 'pages/admin_logout';
$route['admin_main'] = 'pages/admin_main';
$route['admin_authentication'] = 'pages/admin_authentication';
//====================Admin routes=======================
$route['company'] = 'pages/company';
$route['admin'] = 'pages/admin';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
