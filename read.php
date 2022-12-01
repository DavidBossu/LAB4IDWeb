<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// baza de date si obiectul cu care vom lucra
include_once 'db/database.php';
include_once 'objects/server.php';

// initializam baza de date
$database = new Database();
$db = $database->getConnection();

// initializam obiectul
$server = new server($db);

// queriul propriu zis
$stmt = $server->read();

$num = $stmt->rowCount();

if($num > 0){

    $servers_arr = array();
    $servers_arr["records"] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $server_item = array(
            "id" => $id,
            "title" => $title,
            "type" => $type,
            "price" => $price
        );

        array_push($servers_arr["records"],$server_item);
    }

    http_response_code(200);

    echo json_encode($servers_arr);
}
else {

    http_response_code(404);

    echo json_encode(
        array("message" => "No servers found.")
    );
}

?>