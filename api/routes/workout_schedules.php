<?php
Flight::route('GET /workout_shedules', function(){
  $workout_id = Flight::query('workout_id');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  
  Flight::json(Flight::workoutScheduleService()->get_workout_schedule($workout_type_id, $offset, $limit, $search));
});

Flight::route('GET /workout_shedules/@id', function($id){
  Flight::json(Flight::workoutScheduleService()->get_by_id($id));
});

Flight::route('POST /workout_shedules', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutScheduleService()->add($data));
});

Flight::route('PUT /workout_shedules/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutScheduleService()->update($id, $data));
});

Flight::start();
 ?>
