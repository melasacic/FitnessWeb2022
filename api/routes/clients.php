<?php

Flight::route('GET /cl', function(){
  // grabbing parameters form URL
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::clientService()->get_clients($search, $offset, $limit, $order));
});

Flight::route('GET /clients/@id', function($id){
  Flight::json(Flight::clientService()->get_by_id($id));
});

// route for posting new client and saving him to DB
// kada posaljem request podatci koje sam unjela se spase u $data
Flight::route('POST /clients', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::clientService()->add($data));
});

// getting the account that we are updateing
Flight::route('PUT /clients/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::clientService()->update($id, $data));
});


?>
