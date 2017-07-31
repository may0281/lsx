<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "dashboard";
$route['404_override'] = 'errorpage';

$route['product/type/add'] = 'product/typeCreate';
$route['product/type/update/(:any)'] = 'product/typeUpdate/$1';
$route['product/category/(:any)/(:any)'] = 'product/subCategory/$1/$2';
$route['product/api-category/(:any)'] = 'product/apiCategory/$1';
$route['product/api-sub-category/(:any)/(:any)'] = 'product/apiSubCategory/$1/$2';


