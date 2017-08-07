<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "home";
$route['404_override'] = 'errors';

$route['change-lang/(:any)'] = 'changeLang/index/$1';

$route['altyno'] = 'product/altyno';
$route['altyno/(:any)'] = 'product/altyno/$1';

$route['cerarl'] = 'product/cerarl';
$route['cerarl/(:any)'] = 'product/cerarl/$1';

$route['decor-surfaces'] = 'product/decorSurfaces';
$route['decor-surfaces/(:any)'] = 'product/decorSurfaces/$1';

$route['jolypate'] = 'product/jolypate';
$route['jolypate/(:any)'] = 'product/jolypate/$1';

$route['blog/page/(:any)'] = "blog/index/$1";
$route['blog/(:num)/(:any)'] = "blog/detail/$1/$2";

$route['promotion/page/(:num)'] = "promotion/index/$1";
$route['promotion/(:num)/(:any)'] = "promotion/detail/$1/$2";

$route['portfolio/page/(:any)'] = "portfolio/index/$1";
$route['portfolio/(:num)/(:any)'] = "portfolio/detail/$1/$2";

$route['product/page/(:any)'] = "product/index/$1";
$route['product/(:any)/(:any)'] = "product/detail/$1/$2";

$route['contact/send-email'] = "contact/sendEmail";

$route['product/api-product'] = 'product/apiProductFilter';

$route['landing/register'] = 'landing/register';
$route['landing/(:any)'] = 'landing/index/$1';
$route['our-company'] = 'contact/ourCompany';


