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
$route['default_controller'] = 'Cpublic';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 *  Routing alamat website / url
 */

///////////////////////////////////
// ADMIN ROUTE
///////////////////////////////////

$route['admin']				= 'cadmin';
$route['admin/beranda']		= 'admin/dashboard';
$route['admin/halaman']		= 'admin/page';
$route['admin/bus']			= 'admin/bus';
$route['admin/seat']		= 'admin/seat';
$route['admin/tipe']		= 'admin/type';
$route['admin/tagihan'] 	= 'admin/invoice';
$route['admin/setting'] 	= 'admin/setting';

///////////////////////////////////
// LOGIN ROUTE
///////////////////////////////////

$route['login']			= 'clogin/p_login';
$route['login/process'] = 'clogin/login_process';
$route['logout']		= 'clogin/logout';

///////////////////////////////////
// PUBLIC ROUTE
///////////////////////////////////

$route['kendaraan']					= 'public/vehicle';
$route['kendaraan/(:any)']  		= 'public/vehicle/single_page/$1';
$route['ordercheck']			 	= 'cpublic/p_order_check';
$route['invoice/(:any)']		 	= 'public/invoice/index/$1';
$route['ordercheck/process'] 	 	= 'cpublic/proccess_order_check';
$route['page/(:any)'] 				= 'public/page/index/$1';
 

