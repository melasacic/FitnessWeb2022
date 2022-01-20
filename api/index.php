<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// when I do this things to include that is something like manual process od inpendency injection I have in java
require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/services/ClientService.class.php';
require_once dirname(__FILE__).'/services/MembershipPayementService.class.php';
require_once dirname(__FILE__).'/services/MembershipTypeService.class.php';
require_once dirname(__FILE__).'/services/WorkoutService.class.php';
require_once dirname(__FILE__).'/services/WorkoutScheduleService.class.php';

/*Flight::map('error', function(Exception $ex){
  Flight::json(["message" => $ex->get_message()], $ex->getCode());
});*/

/*utility function for reading query parameters from URL
WE MAPPED THIS FUNCTION HERE AND WE CAN CALL IT AS MUCH AS WE LIKE
THIS FUNCTION IS PARSING QUERY PARAMETERS AND ASSIGNING A VALUJE TO THEM
*/
Flight::map('query', function($firstName, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$firstName];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});

// register Bussines Logic layer services
Flight::register('clientService', 'ClientService');
Flight::register('membershipPayementService', 'MembershipPayementService');
Flight::register('membershipTypeService', 'MembershipTypeService');
Flight::register('workoutService', 'WorkoutService');
Flight::register('workoutScheduleService', 'WorkoutScheduleService');

// include all routes
require_once dirname(__FILE__)."/routes/clients.php";
require_once dirname(__FILE__)."/routes/membership_payements.php";
require_once dirname(__FILE__)."/routes/membership_types.php";
require_once dirname(__FILE__)."/routes/workouts.php";
require_once dirname(__FILE__)."/routes/workout_shedules.php";

Flight::start();
?>
