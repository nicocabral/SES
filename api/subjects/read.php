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
$subjectData = $subject->read();
if($subjectData) {
	http_response_code(200);
	echo json_encode([
		"success" => true,
		"message" => $subjectData
	]);
} else {
	http_response_code(200);
	echo json_encode([
		"success" => false,
		"message" => "Subject not found"
	]);
}