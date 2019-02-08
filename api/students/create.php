<?php 
require_once('../config/Middleware.php');
$middleware = new Middleware();
include_once '../config/Database.php';
include_once '../objects/User.php';
include_once '../objects/Student.php';



// get database connection
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$student = new Student($db);
$data = json_decode(file_get_contents("php://input"));

try {
	$student->firstname = $data->firstname;
	$student->lastname  = $data->lastname;
	$student->email     = $data->email;
	$student->username  = $data->username;
	$student->status    = $data->status;
	$student->contactNumber = $data->contactNumber;
	$student->gender    = $data->gender;
	$student->address   = $data->address;
	$student->metas = json_decode($data->metas,true);
	$student->type = 'student';
	if(!$student->checkUsernameIfExist()) {
		$create = $student->create();
		if($create) {
			$student->id = $create;
			http_response_code(200);
			if(count($student->metas) > 0) {
				if($student->saveStudentMetas()) {
					
					die( json_encode([
						"success" => true,
						"message" => "Save successfully!",
						"user_credentials" => [
				    		"username" => $student->username,
				    		"password" => $student->password
				    	]
					]));
				}
			}
			die(json_encode([
				"success" => true,
				"message" => "Save successfully",
				"user_credentials" => [
		    		"username" => $student->username,
		    		"password" => $student->password
		    	]
			]));
		} 
		die(json_encode([
				"success" => false,
				"message" => "Unable to save student"
		]));

	}
} catch(Exception $e) {
	http_response_code(200);
	die(json_encode([
		"success" => false,
		"error" => $e->getMessage()
	]));
}