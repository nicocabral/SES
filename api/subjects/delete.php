<?php
require_once('../config/Middleware.php');
new Middleware();
include_once '../config/Database.php';
include_once '../objects/Subject.php';


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$subject = new Subject($db);
// get posted data
$data = json_decode(file_get_contents("php://input"));
$subject->id = intval($data->id);
if($subject->delete()) {
	echo json_encode([
		"success" => true,
		"message" => "Deleted succesfully."
	]);
} else {
	echo json_encode([
		"success" => true,
		"message" => "Unable to delete subject."
	]);
}