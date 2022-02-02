<?php

// OVE RUTE SU PRESENTATION LAYER I ONE ZOVU BUSSINES LAYER STO SU NAMA SERVICES

Flight::route('GET /membership_payement', function(){

  $client_id = Flight::query('client_id');
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  //$search = Flight::query('search');
  // respornse of DB should be sorted in ASC ordern Fbased on a column
  $order = Flight::query('order', '-id');

  Flight::json(Flight::membershipPayementService()->get_membership_payements($client_id, $offset, $limit, $order));
});

Flight::route('GET /membership_payements/@id', function($id){
  Flight::json(Flight::membershipPayementService()->get_by_id($id));
});
// route for posting new client and saving him to DB
// kada posaljem request podatci koje sam unjela se spase u $data
Flight::route('POST /membership_payements', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::membershipPayementService()->add($data));
});

Flight::route('PUT /membership_payements/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::membershipPayementService()->update($id, $data));
});

?>
