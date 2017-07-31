<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "home";
$route['404_override'] = 'errors';

$route['change-lang/(:any)'] = 'changeLang/index/$1';
$route['altyno'] = 'product/altyno';
$route['altyno/page/(:num)'] = 'product/altyno/$1';

$route['blog/page/(:any)'] = "blog/index/$1";
$route['blog/(:num)/(:any)'] = "blog/detail/$1/$2";

$route['promotion/page/(:num)'] = "promotion/index/$1";
$route['promotion/(:num)/(:any)'] = "promotion/detail/$1/$2";

$route['portfolio/page/(:any)'] = "portfolio/index/$1";
$route['portfolio/(:num)/(:any)'] = "portfolio/detail/$1/$2";

$route['product/page/(:any)'] = "product/index/$1";
$route['product/(:any)/(:any)'] = "product/detail/$1/$2";

$route['contact/send-email'] = "contact/sendEmail";