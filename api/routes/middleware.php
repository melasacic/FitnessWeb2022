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
})
 ?>
