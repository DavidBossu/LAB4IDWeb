<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once 'db/database.php';
include_once 'objects/server.php';

$database = new Database();
$db = $database->getConnection();

$server = new server($db);

$server->id = isset($_GET['id']) ? $_GET['id'] : die();

$server->readOne();

if($server->title!=null){
    $server_arr = array(
        "id" => $server->id,
        "title" => $server->title,
        "type" => $server->type,
        "price" => $server->price
    );
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($server_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "server does not exist."));
}
?>