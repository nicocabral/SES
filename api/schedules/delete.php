<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Schedule.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$schedule = new Schedule($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
$schedule->id = intval($data->id);
if($schedule->delete()) {
	http_response_code(200);
	echo json_encode([
		"success" => true,
		"message" => "Deleted successfully"
	]);
} else {
	http_response_code(200);
	echo json_encode([
		"success" => false,
		"message" => "Schedule not found"
	]);
}