<?php

Flight::route('POST /workouts', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::workoutService()->add($data));
});
 ?>
