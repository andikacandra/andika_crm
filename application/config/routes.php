<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Auth
$route['login']     = 'AuthController/index';
$route['auth']      = 'AuthController/loginProcess';
$route['logout']    = 'AuthController/logout';


// CRM
$route['crm/leads'] = 'crm/LeadsController/index';
