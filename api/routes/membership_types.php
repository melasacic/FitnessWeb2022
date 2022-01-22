<?php

Flight::route('GET /membership_types', function(){
  $name = Flight::query('name');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');

  Flight::json(Flight::membershipTypeService()->get_membership_types($name, $offset, $limit, $search));
});

Flight::route('GET /membership_types/@id', function($id){
  Flight::json(Flight::membershipTypeService()->get_by_id($id));
});

Flight::route('POST /membership_types', function(){
  $data = Flight::request()->data->getData();
  Flight::membershipTypeService()->add($data);
  Flight::json(["message"=>"Successfully added"]);
});

Flight::route('PUT /membership_types/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::membershipTypeService()->update($id, $data));
});

 ?>
