<?php 
require_once('../config/Middleware.php');
$middleware = new Middleware();
include_once '../config/Database.php';
include_once '../objects/User.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
$data = $_GET;
$user->tokenData = $middleware->decoded->data;
try{
	http_response_code(200);
	echo json_encode([
		"success" => true,
		"message" => $user->list(["type" => $data["type"]])
	]);

}catch(Exception $e) {
	http_response_code(200);
	echo  json_encode([
		"success" => false,
		"message" => $e->getMessage()
	]);	
}
