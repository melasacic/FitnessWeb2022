<?php

Flight::route('GET /workouts', function(){
  $workout_type_id = Flight::query('workout_type_id');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  Flight::json(Flight::workoutService()->get_workouts($workout_type_id, $offset, $limit, $search));
});

Flight::route('POST /workouts', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutService()->add($data));
});
 ?>
