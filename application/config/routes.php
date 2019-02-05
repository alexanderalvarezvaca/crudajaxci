<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['maestros-lista'] = 'Welcome/ajaxGetMaestros';
$route['maestros-guardar'] = 'Welcome/ajaxSaveMaestros';
