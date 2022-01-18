<?php
Flight::route('GET /clients', function(){
    Flight::json(Flight::clientDao()->get_all(0, 10));
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
