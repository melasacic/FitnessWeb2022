<?php

Flight::route('GET /accounts', function(){
  // grabbing parameters form URL
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));
});

/*if user is admin he can get every account if user is not admin he can get only his account
 this method shol not execute until we login*/
Flight::route('GET /accounts/@id', function($id){
  if(Flight::get('user')['account_id'] != $id) throw new Exception("This account is not for you", 403);

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
