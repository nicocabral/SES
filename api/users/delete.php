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
$student->id = intval($data->id);
$userData = $user->read();
if($userData) {
	if($user->delete()) {
		if($userData["type"] == 'student') {
			return $student->deleteMetas() ? die(json_encode(["success" => true, "message" => "Deleted succesfully"])) : die(json_encode(["success" => false, "message" => "Unable to delete student"]));
		} else {
			die(json_encode([ "success" => true, "message" => "Deleted succesfully." ]));
		}
	} 
	die(json_encode([ "success" => false, "message" => "Deleted succesfully." ]));
	
} else {
	echo json_encode([
		"success" => true,
		"message" => "Unable to delete user."
	]);
}