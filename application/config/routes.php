<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth
$route['login']     = 'AuthController/index';
$route['auth']      = 'AuthController/loginProcess';
$route['logout']    = 'AuthController/logout';


// CRM - Leads
$route['crm/leads'] = 'crm/LeadsController/index';

// Inventory - Products
$route['products'] = 'inventory/ProductsController/index';
$route['products/create'] = 'inventory/ProductsController/form';
$route['products/edit/(:num)'] = 'inventory/ProductsController/form/$1';
$route['products/save'] = 'inventory/ProductsController/save';
$route['products/save/(:num)'] = 'inventory/ProductsController/save/$1';
$route['products/destroy/(:num)'] = 'inventory/ProductsController/delete/$1';
