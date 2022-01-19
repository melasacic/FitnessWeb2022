<?php

// URL=give me membership_payement for my client
/*Flight::route('GET /membership_payements?client_id=1', function(){
  // grabbing parameters form URL
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::clientService()->get_clients($search, $offset, $limit, $order));
});*/

// OVE RUTE SU PRESENTATION LAYER I ONE ZOVU BUSSINES LAYER STO SU NAMA SERVICES

Flight::route('GET /membership_payements', function(){
  $client_id = Flight::query('client_id');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  Flight::json(Flight::membershipPayementService()->get_membership_payements($client_id, $offset, $limit));
});


// route for posting new client and saving him to DB
// kada posaljem request podatci koje sam unjela se spase u $data
Flight::route('POST /membership_payements', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::membershipPayementService()->add($data));
});

Flight::start();
?>
