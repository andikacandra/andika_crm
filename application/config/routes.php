<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'AuthController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth
$route['login']     = 'AuthController/index';
$route['auth']      = 'AuthController/loginProcess';
$route['logout']    = 'AuthController/logout';

// CRM - Leads
$route['crm/leads']                 = 'crm/LeadsController/index';
$route['crm/leads/(:num)']          = 'crm/LeadsController/form/$1/true';
$route['crm/leads/create']          = 'crm/LeadsController/form';
$route['crm/leads/edit/(:num)']     = 'crm/LeadsController/form/$1';
$route['crm/leads/save']            = 'crm/LeadsController/save';
$route['crm/leads/save/(:num)']     = 'crm/LeadsController/save/$1';
$route['crm/leads/destroy/(:num)']  = 'crm/LeadsController/delete/$1';

// CRM - Quotation
$route['crm/quotation']                 = 'crm/QuotationController/index';
$route['crm/quotation/(:num)']          = 'crm/QuotationController/detail/$1';
$route['crm/quotation/create/(:num)']   = 'crm/QuotationController/form/$1';
$route['crm/quotation/save']            = 'crm/QuotationController/save';

// CRM - QuotationManager
$route['crm/qapproval']                 = 'crm/QuotationManagerController/index';
$route['crm/qapproval/form/(:num)']     = 'crm/QuotationManagerController/form/$1';
$route['crm/qapproval/approve/(:num)']  = 'crm/QuotationManagerController/save/$1/1';
$route['crm/qapproval/reject/(:num)']   = 'crm/QuotationManagerController/save/$1/2';


// CRM - Customer
$route['crm/customers']             = 'crm/CustomersController/index';
$route['crm/customers/(:num)']      = 'crm/CustomersController/detail/$1';

// Inventory - Products
$route['products']                  = 'inventory/ProductsController/index';
$route['products/create']           = 'inventory/ProductsController/form';
$route['products/edit/(:num)']      = 'inventory/ProductsController/form/$1';
$route['products/save']             = 'inventory/ProductsController/save';
$route['products/save/(:num)']      = 'inventory/ProductsController/save/$1';
$route['products/destroy/(:num)']   = 'inventory/ProductsController/delete/$1';
$route['products/one/(:num)']       = 'inventory/ProductsController/getOne/$1';
