<?php
/*
FILTER BASED MIDDLEWARE
Flight::before('start', function(&$params, &$output){

  // user routes are publically avaliable
  if(str_starts_with(Flight::request()->url, '/users/')) return TRUE;

 // all other methods require authentification
  $headers = getallheaders();
  $token = @$headers['Authentication'];
  // decode token and transform into class obj
  try {
    //if token is successfuly dedoced we can perform this action
    $decoded = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ['HS256']);
    Flight::set('user', $decoded);
    // ADMIN -> create set of routes /admin/something
    // USER -> set of routes of regular users
    // USER_READ_ONLY -> block POST and PUT methods
    return TRUE;
  } catch (\Exception $e) {
    //if not fail
    Flight::json(["message" => $e->getMessage()], 401);
    //return FALSE;
    die;
  }
});*/

// ROUTE BASED MIDDLEWARE -> with thisn option i can create multiple middlewares
Flight::route('*', function(){
  // user routes are publically avaliable
  if(str_starts_with(Flight::request()->url, '/users/')) return TRUE;
  // decode token and transform into class obj
  try {
    //if token is successfuly dedoced we can perform this action
    $token = explode(" ", Flight::header("Authorization"))[1];
    $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjE3IiwiYWNjb3VudF9pZCI6IjE5Iiwicm9sZSI6IlVTRVIifQ.gtNR4DO0I-b-TQKca3sGOuKqMpbGCeEu0PIAKcSG6Pc";
  //  $decoded = (array)\Firebase\JWT\JWT::decode($token, ["JWTSECRET"], ['HS256']);
    $decoded = (array)\Firebase\JWT\JWT::decode($token, new \Firebase\JWT\Key("JWTSECRET", 'HS256'));
  //  print_r($decoded); die;
    Flight::set('user', $decoded);
    // ADMIN -> create set of routes /admin/something
    // USER -> set of routes of regular users
    // USER_READ_ONLY -> block POST and PUT methods
    return TRUE;
  } catch (\Exception $e) {
    //if not fail
    Flight::json(["message" => $e->getMessage()], 401);
    //return FALSE;
    die;
  }
})
 ?>
