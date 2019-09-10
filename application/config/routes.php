<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'init';

$route["admin/p/(:any)"] = "admin/init/pages/$1";

$route['kasir/p/(:any)'] = "kasir/init/pages/$1";

$route['waiter/p/(:any)'] = "waiter/init/pages/$1";

$route['owner/p/(:any)'] = "owner/init/pages/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
