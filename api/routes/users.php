<?php

/*Flight::route('GET /users', function(){
  // grabbing parameters form URL
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 25);
  $search = Flight::query('search');
  $order = Flight::query('order', "-id");

  Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));
});*/

/*Flight::route('GET /users/@id', function($id){
 $user = Flight::userService()->get_by_id($id);
 Flight::json($user);
});*/


Flight::route('POST /users/register', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->register($data);

// nece vratiti citav objekat (citavog usera) nego ce samo ispisati ovu poruku
  Flight::json(["message" => "Confirmation email has been sent. Please confirm your account."]);
});

Flight::route('GET /users/confirm/@token', function($token){
  Flight::userService()->confirm($token);
  Flight::json(["message" => "Your account has been activated"]);
});

Flight::route('POST /users/login', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->login($data));
});



/*Flight::route('PUT /users/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::accountService()->update($id, $data));
});*/

 ?>
