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
$data = json_decode(file_get_contents("php://input"));
$user->tokenData = $middleware->decoded->data;
$user->password = $data->password;
$user->id = intval($data->id);
try{
	http_response_code(200);
	echo json_encode([
		"success" => true,
		"message" => $user->resetPassword()
	]);

}catch(Exception $e) {
	http_response_code(200);
	echo  json_encode([
		"success" => false,
		"message" => $e->getMessage()
	]);	
}
