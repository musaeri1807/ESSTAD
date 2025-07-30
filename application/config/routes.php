<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// $route['default_controller'] = 'Ztest/recaptcha'Authorization;replicateTablesWelcome
// $route['default_controller'] = 'Replication/replicateTablesMasterSlave';
$route['default_controller'] = 'Authorization';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;

$route['Email']     = 'Emailblast/sendEmail';
$route['security']  = 'Homepage/securitySetting';

// Authorization
$route['login']             = 'Authorization';
$route['register']          = 'Authorization/signup';
$route['verify']            = 'Authorization/verify';
$route['verify-otp']        = 'Authorization/verifyOTP';
$route['forgot']            = 'Authorization/forgot';
$route['reset']             = 'Authorization/reset';
$route['otp']               = 'Authorization/signinotp';
$route['otp-account']       = 'Authorization/accountOTP';
$route['change-password']   = 'Authorization/changepassword';
$route['terms']             = 'authorization/terms';
$route['logout']            = 'authorization/logout';

$route['clear']            = 'authorization/clear_all_session';
// // Authorization_users
// $route['login']         = 'Authorization_Users';
// $route['register']      = 'Authorization_Users/signup';
// $route['verify']        = 'Authorization_Users/verify';
// $route['verify-otp']    = 'Authorization_Users/verifyOTP';
// $route['forgot']        = 'Authorization_Users/forgot';
// $route['reset']         = 'Authorization_Users/reset';
// $route['otp']           = 'Authorization_Users/signinotp';
// $route['change-password']='Authorization_Users/changepassword';
// $route['terms']         = 'Authorization_Users/terms';
// $route['logout']        = 'Authorization_Users/logout';
//SEO 
$route['sitemap.xml'] = 'sitemap';
$route['robots.txt']  = 'sitemap/robots';

// Frontend
$route['home']              = 'Welcome';
$route['home']              = 'Welcome/index';
$route['aboutme']           = 'Welcome/tentangkami';
$route['tonase']            = 'Welcome/tonase';
$route['service-nasabah']   = 'Welcome/layanannasabah';
$route['service-bsp']       = 'Welcome/layananunit';
$route['register-bsp']      = 'Welcome/unit';

// Users
$route['settings']          = 'Users/settings';
$route['change-pin']        = 'Users/updatePIN';
$route['change-password']   = 'Users/updatePassword';
$route['change-email']      = 'Users/updateEmail';
$route['change-nomor']      = 'Users/nomorWatsApp';
