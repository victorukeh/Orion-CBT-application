<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $routes['userindex'] = 'user/index';
// $route['login/'] = 'examinations/create_exam';
$route['examinations/create_exam/(:any)'] = 'examinations/create_exam';
$route['examinations/viewExamsCreated/(:any)'] = 'examinations/viewExamsCreated/$1';
$routes['examinations'] = 'examinations/index';
$route['examinations/create_exam'] = 'examinations/create_exam';
$route['categories/examinations/(:any)'] = 'categories/examinations/$1';
$route['(:any)'] = 'pages/view';
$route['default_controller'] = 'user/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
