<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/services/ClientService.class.php';

// utility function for reading query parameters from URL
Flight::map('query', function($firstName, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$firstName];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});

// register Bussines Logic layer services
Flight::register('clientService', 'ClientService');

// include all routes
require_once dirname(__FILE__)."/routes/clients.php";

Flight::start();
?>
