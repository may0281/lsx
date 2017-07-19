<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "home";
$route['404_override'] = 'errors';

$route['change-lang/(:any)'] = 'changeLang/index/$1';

$route['blog/(:num)/(:any)'] = "blog/detail/$1/$2";
$route['blog/page/(:any)'] = "blog/index/$1";

$route['portfolio/(:num)/(:any)'] = "portfolio/detail/$1/$2";
$route['portfolio/page/(:any)'] = "portfolio/index/$1";
