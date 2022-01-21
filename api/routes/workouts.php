<?php

Flight::route('GET /workouts', function(){
  $workout_type_id = Flight::query('workout_type_id');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', '-id');
  Flight::json(Flight::workoutService()->get_workouts($workout_type_id, $offset, $limit, $search, $order));
});

Flight::route('GET /workouts/@id', function($id){
  Flight::json(Flight::workoutService()->get_by_id($id));
});

Flight::route('POST /workouts', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutService()->add($data));
});

Flight::route('PUT /workouts/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutService()->update($id, $data));
});

 ?>
