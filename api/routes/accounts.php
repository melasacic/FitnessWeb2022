<?php

Flight::route('GET /accounts', function(){
  // grabbing parameters form URL
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));
});

//if user is admin he can get every account if user is not admin he can get only his account
// this method shuol not execute until we login
Flight::route('GET /accounts/@id', function($id){
  $headers = getallheaders();
  $token = @$headers['Authentication'];
  // decode token and transform into class obj
  try {
    // if token is successfuly dedoced we can perform this action
    $decoded = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ['HS256']);
    if($decoded['account_id'] == $id){
    Flight::json(Flight::accountService()->get_by_id($id));
  }else{
    Flight::json(["message" => "That account is noy for you"], 403);
  }
  } catch (\Exception $e) {
    // if not fail
    Flight::json(["message" => $e->getMessage()], 401);
  }
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
