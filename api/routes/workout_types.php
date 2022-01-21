<?php
Flight::route('GET /workout_types', function(){
  $name = Flight::query('name');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');

  Flight::json(Flight::workoutTypeService()->get_workout_types($name, $offset, $limit, $search));
});

Flight::route('GET /workout_types/@id', function($id){
  Flight::json(Flight::workoutTypeService()->get_by_id($id));
});

Flight::route('POST /workout_types', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutTypeService()->add($data));
});

Flight::route('PUT /workout_types/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutTypeService()->update($id, $data));
});

 ?>
