<?php

Flight::route('GET /membership_types', function(){
  $name = Flight::query('name');
//  $price = Flight::query('price');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  Flight::json(Flight::membershipTypeService()->get_membership_types($name, $offset, $limit, $search));
});

Flight::route('POST /membership_types', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::membershipTypeService()->add($data));
});
 ?>
