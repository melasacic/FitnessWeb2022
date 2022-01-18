<?php

Flight::route('GET /clients', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

  if ($search){
    // if we are getting clients with search (by name for example) we use get_clients method that is in our ClientDao
      Flight::json(Flight::clientDao()->get_clients($search, $offset, $limit));
  }else{
    // if we are getting clients without search we use get_all method that is in our BaseDao
      Flight::json(Flight::clientDao()->get_all($offset, $limit));
  }
});

Flight::route('GET /clients/@id', function($id){
  Flight::json(Flight::clientDao()->get_by_id($id));
});

// route for posting new client and saving him to DB
// kada posaljem request podatci koje sam unjela se spase u $data
Flight::route('POST /clients', function(){
  $request = Flight::request()->data->getData();
  Flight::json(Flight::clientDao()->add($data));
});

// getting the account that we are updateing
Flight::route('PUT /clients/@id', function($id){
  $request = Flight::request();
  $data = $request->data->getData();
  Flight::clientDao()->update($id, $data);
  $client = Flight::clientDao()->get_by_id($id);
  Flight::request($client);
});

Flight::start();
 ?>
