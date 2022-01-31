<?php

Flight::route('GET /accounts', function(){
  // grabbing parameters form URL
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));
});


Flight::route('GET /accounts/@id', function($id){
  $headers = getallheaders();
  $token = @$headers['Authentication'];
  try {

  } catch (\Exception $e) {

  }

  Flight::json(Flight::accountService()->get_by_id($id));
});


Flight::route('POST /accounts', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::accountService()->add($data));
});


Flight::route('PUT /accounts/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::accountService()->update($id, $data));
});


?>
