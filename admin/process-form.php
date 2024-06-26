<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    
}

// $conn = mysqli_connect("localhost", 'root', '', 'pies');
$conn = mysqli_connect("localhost","swiftlet_admin","@admin.swift","swiftlet_pies");;

if(isset($_REQUEST['adder']))
{
    $comment = mysqli_escape_string($conn, $_REQUEST['comment']);
    if(strlen($comment) < 24)
    {
        echo json_encode([
            "status" => "fail",
            "message"=> "invalid passkey"
        ]);
    }
    $sql = "INSERT INTO comments(_comment) values('$comment')";
    $query = mysqli_query($conn, $sql);
    echo json_encode([
        "done"
    ]);
    exit;
}

http_response_code(404);
echo json_encode([
    "message"=> "no request fills"
]);
