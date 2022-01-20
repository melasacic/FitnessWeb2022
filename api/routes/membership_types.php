<?php

Flight::route('POST /membership_types', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::membershipTypeService()->add($data));
});
 ?>
