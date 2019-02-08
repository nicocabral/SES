<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/User.php';
include_once '../objects/Student.php';


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
$student = new Student($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));
$user->id = intval($data->id);
$student->id = $user->id;
$userData = $user->read();

if($userData) {
	$metas = [];
	http_response_code(200);
	if($userData["type"] == "student") {
		$meta = $student->getMetas();
		$metas = $meta ? $meta : [];
		foreach($metas as $k => $v) {
			$userData["metas"][$v["meta_key"]] = $v["meta_value"];
		}
		die(json_encode(["success" => true, "message" => $userData]));
	}
	echo json_encode([
		"success" => true,
		"message" => $userData
	]);
} else {
	http_response_code(200);
	echo json_encode([
		"success" => false,
		"message" => "User not found"
	]);
}